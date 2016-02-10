<?php

/**
 * cache.class.php
 *
 * @author Dominik Kocuj <dominik@kocuj.pl>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @copyright Copyright (c) 2013 Dominik Kocuj
 * @package kocuj_sitemap
 */

// security
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {
	die ('Please do not load this page directly. Thanks!');
}

/**
 * Plugin cache class
 *
 * @access public
 */
class KocujSitemapPluginCache {
	/**
	 * Singleton instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance = NULL;

	/**
	 * Cache content
	 *
	 * @access private
	 * @var array
	 */
	private $cacheContent = array();

	/**
	 * Constructor
	 *
	 * @access private
	 * @return void
	 */
	private function __construct() {
		// add actions
		if (is_admin()) {
			global $wp_version;
			add_action('edit_post', array($this, 'actionRecreateCache'), $this->calculateNewPriority('edit_post'));
			add_action('publish_post', array($this, 'actionRecreateCache'), $this->calculateNewPriority('publish_post'));
			add_action('edit_page_form', array($this, 'actionRecreateCache'), $this->calculateNewPriority('edit_page_form'));
			add_action('edited_category', array($this, 'actionRecreateCache'), $this->calculateNewPriority('edited_category'));
			add_action('delete_category', array($this, 'actionRecreateCache'), $this->calculateNewPriority('delete_category'));
			add_action('new_to_publish', array($this, 'actionRecreateCache'), $this->calculateNewPriority('new_to_publish'));
			add_action('draft_to_publish', array($this, 'actionRecreateCache'), $this->calculateNewPriority('draft_to_publish'));
			add_action('future_to_publish', array($this, 'actionRecreateCache'), $this->calculateNewPriority('future_to_publish'));
			if (version_compare($wp_version, '3.0.0', '>=')) {
				add_action('wp_update_nav_menu', array($this, 'actionRecreateCache'), $this->calculateNewPriority('wp_update_nav_menu'));
				add_action('wp_delete_nav_menu', array($this, 'actionRecreateCache'), $this->calculateNewPriority('wp_delete_nav_menu'));
			}
		}
	}

	/**
	 * Clone
	 *
	 * @access private
	 * @return void
	 */
	private function __clone() {
	}

	/**
	 * Get singleton instance
	 *
	 * @access public
	 * @return object Singleton instance
	 */
	public static function getInstance() {
		// optionally create new instance
		if (!self::$instance) {
			self::$instance = new KocujSitemapPluginCache();
		}
		// exit
		return self::$instance;
	}

	/**
	 * Calculate new higher than maximum priority of filter or action
	 *
	 * @access private
	 * @param string $type Filter or action
	 * @return int New priority
	 */
	private function calculateNewPriority($type) {
		// calculate new priority
		global $wp_filter;
		if (isset($wp_filter[$type])) {
			$newPriority = max(array_keys($wp_filter[$type]))+1;
		} else {
			$newPriority = 1;
		}
		if ($newPriority < 9999) {
			$newPriority = 9999;
		}
		// exit
		return $newPriority;
	}

	/**
	 * Check if cache directory is writable
	 *
	 * @access private
	 * @return bool Cache directory is writable (true) or not (false)
	 */
	public function checkWritable() {
		// get cache directory
		$dir = KocujSitemapPlugin::getInstance()->getPluginDir().'/cache';
		// check if directory is writable
		if (!is_writable($dir)) {
			return false;
		}
		// exit
		return true;
	}

	/**
	 * Get cache directory
	 *
	 * @access private
	 * @return string Cache directory
	 */
	private function getCacheDirectory() {
		// get cache directory
		return KocujSitemapPlugin::getInstance()->getPluginDir().'/cache';
	}

	/**
	 * Get cache filename
	 *
	 * @access private
	 * @param string $locale Language locale - default: empty
	 * @return string Cache filename - if empty, there is an error in cache directory
	 */
	private function getCacheFilename($locale = '') {
		// get cache directory
		$dir = $this->getCacheDirectory();
		// check if directory is writable
		if (!$this->checkWritable()) {
			return '';
		}
		// prepare locale suffix
		$localeSuffix = '';
		if (!empty($locale)) {
			$localeSuffix = '_'.$locale;
		}
		// exit
		return $dir.'/cache'.$localeSuffix.'.dat';
	}

	/**
	 * Create cache
	 *
	 * @access public
	 * @return bool Status - true or false
	 */
	public function createCache() {
		// remove all cache files
		$cacheDir = $this->getCacheDirectory();
		$dir = opendir($cacheDir);
		while ($item = readdir($dir)) {
			if ((is_file($cacheDir.'/'.$item)) && (substr($item, strlen($item)-4, 4) == '.dat')) {
				@unlink($cacheDir.'/'.$item);
			}
		}
		// get all languages
		$langs = KocujSitemapPluginMultiLang::getInstance()->getLanguages();
		// create cached sitemap for each language
		$this->cacheContent = array();
		if (!empty($langs)) {
			foreach ($langs as $lang) {
				// create sitemap
				$array = KocujSitemapPluginSitemap::getInstance()->createSitemap($lang);
				// set cache content in memory
				$this->cacheContent[$lang] = $array;
				// check if cache directory is writable
				if (!$this->checkWritable()) {
					return false;
				}
				// set filename
				$filename = $this->getCacheFilename($lang);
				if (empty($filename)) {
					return false;
				}
				// save cache
				@unlink($filename);
				$file = @fopen($filename, 'w');
				@flock($file, LOCK_EX);
				if (empty($file)) {
					@flock($file, LOCK_UN);
					@fclose($file);
					return false;
				}
				if (fwrite($file, maybe_serialize($array)) === false) {
					@flock($file, LOCK_UN);
					@fclose($file);
					return false;
				}
				@flock($file, LOCK_UN);
				if (@fclose($file) === false) {
					return false;
				}
			}
		}
		// exit
		return true;
	}

	/**
	 * Load cache
	 *
	 * @access public
	 * @param string $title Website title
	 * @param string &$buffer Returned buffer
	 * @param string $locale Language locale - default: empty
	 * @return bool Status - true or false
	 */
	public function loadCache($title, &$buffer, $locale = '') {
		// optionally get cache from memory
		if (!empty($this->cacheContent)) {
			if (!isset($this->cacheContent[$locale])) {
				$locale = get_locale();
			}
			if (isset($this->cacheContent[$locale])) {
				$array = $this->cacheContent[$locale];
			} else {
				$array = array();
			}
		} else {
			// set filename
			$filename = $this->getCacheFilename($locale);
			if (empty($filename)) {
				return false;
			}
			// check if file exists */
			if (!file_exists($filename)) {
				return false;
			}
			// load file
			$array = array();
			$input = '';
			$file = file($filename);
			if (!empty($file)) {
				foreach ($file as $line) {
					$input .= $line."\n";
				}
				$array = @maybe_unserialize($input);
				if (empty($array)) {
					$array = @maybe_unserialize($array);
				}
			}
		}
		// generate output
		$buffer = $array['output'];
		$titlepos = $array['titlepos'];
		if ($titlepos > -1) {
			$buffer = substr($buffer, 0, $titlepos).$title.substr($buffer, $titlepos, strlen($buffer)-$titlepos);
		}
		// exit
		return true;
	}

	/**
	 * Action - recreate cache
	 *
	 * @access public
	 * @param int $id Element id
	 * @return void
	 */
	public function actionRecreateCache($id) {
		// renew cache
		$this->createCache();
	}
}

?>