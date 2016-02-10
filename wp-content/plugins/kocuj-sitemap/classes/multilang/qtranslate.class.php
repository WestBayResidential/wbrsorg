<?php

/**
 * qtranslate.class.php
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
 * Multi-language plugin class - qTranslate
 *
 * @access public
 */
class KocujSitemapPluginMultiLang_kocujsitemap_qtranslate {
	/**
	 * Singleton instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance = NULL;

	/**
	 * Languages list prepared (true) or not (false)
	 *
	 * @access private
	 * @var array
	 */
	private $languagesPrepared = false;

	/**
	 * Languages list
	 *
	 * @access private
	 * @var array
	 */
	private $languages = array();

	/**
	 * Filter for action before get pages exists (true) or not (false)
	 *
	 * @access private
	 * @var bool
	 */
	private $beforeGetPagesFilterExists = true;

	/**
	 * Filter for action before get menu exists (true) or not (false)
	 *
	 * @access private
	 * @var bool
	 */
	private $beforeGetMenuFilterExists = true;

	/**
	 * Constructor
	 *
	 * @access private
	 * @return void
	 */
	private function __construct() {
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
			self::$instance = new KocujSitemapPluginMultiLang_kocujsitemap_qtranslate();
		}
		// exit
		return self::$instance;
	}

	/**
	 * Prepare languages list if any
	 *
	 * @access private
	 * @return void
	 */
	private function prepareLanguages() {
		// check if languages list not prepared already
		if (!empty($this->languagesPrepared)) {
			return;
		}
		// get languages
		$langs = qtrans_getSortedLanguages();
		if (!empty($langs)) {
			global $q_config;
			foreach ($langs as $key => $val) {
				if (isset($q_config['locale'][$val])) {
					$this->languages[$q_config['locale'][$val]] = $val;
				}
			}
		}
		// set languages list as prepared
		$this->languagesPrepared = true;
	}

	/**
	 * Get translated URL
	 *
	 * @access private
	 * @param string $origURL Original URL
	 * @param string $locale Language locale
	 * @return string Translated URL
	 */
	private function getTranslatedURL($origURL, $locale) {
		// prepare languages list
		$this->prepareLanguages();
		// initialize
		$url = $origURL;
		// translate URL
		if (isset($this->languages[$locale])) {
			$url = qtrans_convertURL($origURL, $this->languages[$locale], true);
		}
		// exit
		return $url;
	}

	/**
	 * Get translated text
	 *
	 * @access private
	 * @param string $origText Original text
	 * @param string $locale Language locale
	 * @return string Translated text
	 */
	private function getTranslatedText($origText, $locale) {
		// prepare languages list
		$this->prepareLanguages();
		// initialize
		$text = $origText;
		// translate text
		if (isset($this->languages[$locale])) {
			$text = qtrans_use($this->languages[$locale], $origText, false);
		}
		// exit
		return $text;
	}

	/**
	 * Get plugin name
	 *
	 * @access public
	 * @return string Plugin name
	 */
	public function getName() {
		// get plugin name
		return 'qTranslate';
	}

	/**
	 * Get languages list
	 *
	 * @access public
	 * @return array Languages list
	 */
	public function getLanguages() {
		// prepare languages list
		$this->prepareLanguages();
		// get languages list
		return $this->languages;
	}

	/**
	 * Check if qTranslate plugin option should be displayed in administration panel
	 *
	 * @access public
	 * @return bool qTranslate plugin option should be displayed in administration panel (true) or not (false)
	 */
	public function checkPluginAdmin() {
		// check WordPress version
		global $wp_version;
		if (!version_compare($wp_version, '3.0.0', '>=')) {
			return false;
		}
		// exit
		return true;
	}

	/**
	 * Check if qTranslate plugin exists
	 *
	 * @access public
	 * @return bool qTranslate plugin exists (true) or not (false)
	 */
	public function checkPlugin() {
		// check WordPress version
		global $wp_version;
		if (!version_compare($wp_version, '3.0.0', '>=')) {
			return false;
		}
		// check if qTranslate plugin exists
		global $q_config;
		if ((!isset($q_config)) || (!is_array($q_config)) || (!function_exists('qtrans_getSortedLanguages')) ||
			(!function_exists('qtrans_use')) || (!function_exists('qtrans_convertURL')) ||
			(!function_exists('qtrans_useTermLib')) || (!function_exists('qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage'))) {
			return false;
		}
		// exit
		return true;
	}

	/**
	 * Something to do before get blog name
	 *
	 * @access public
	 * @return void
	 */
	public function beforeGetBlogName() {
	}

	/**
	 * Something to do after get blog name
	 *
	 * @access public
	 * @return void
	 */
	public function afterGetBlogName() {
	}

	/**
	 * Get translated blog name
	 *
	 * @access public
	 * @param string $origText Original text
	 * @return string Translated text
	 */
	public function getTranslatedBlogName($origText) {
		// get translated blog name
		return $this->getTranslatedText($origText, get_locale());
	}

	/**
	 * Something to do before get home URL
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetHomeURL($locale) {
	}

	/**
	 * Something to do after get home URL
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetHomeURL($locale) {
	}

	/**
	 * Get translated home URL
	 *
	 * @access public
	 * @param string $origURL Original home URL
	 * @param string $locale Language locale
	 * @return string Translated home URL
	 */
	public function getTranslatedHomeURL($origURL, $locale) {
		// get translated home URL
		return $this->getTranslatedURL($origURL, $locale);
	}

	/**
	 * Something to do before get pages
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetPages($locale) {
		// remove plugin filter
		$value = has_filter('get_pages', 'qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage');
		if ($value !== false) {
			$this->beforeGetPagesFilterExists = true;
			remove_filter('get_pages', 'qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage', 0);
		} else {
			$this->beforeGetPagesFilterExists = false;
		}
	}

	/**
	 * Something to do after get pages
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetPages($locale) {
		// add plugin filter again
		if (!empty($this->beforeGetPagesFilterExists)) {
			add_filter('get_pages', 'qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage', 0);
		}
	}

	/**
	 * Something to do before get page item
	 *
	 * @access public
	 * @param int $pageId Page id
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetPageItem($pageId, $locale) {
	}

	/**
	 * Something to do after get page item
	 *
	 * @access public
	 * @param int $pageId Page id
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetPageItem($pageId, $locale) {
	}

	/**
	 * Get translated page URL
	 *
	 * @access public
	 * @param string $origURL Original page URL
	 * @param int $pageId Page id
	 * @param string $locale Language locale
	 * @return string Translated page URL
	 */
	public function getTranslatedPageURL($origURL, $pageId, $locale) {
		// get translated page URL
		return $this->getTranslatedURL($origURL, $locale);
	}

	/**
	 * Get translated page title
	 *
	 * @access public
	 * @param string $origTitle Original page title
	 * @param int $pageId Page id
	 * @param string $locale Language locale
	 * @return string Translated page title
	 */
	public function getTranslatedPageTitle($origTitle, $pageId, $locale) {
		// get translated page title
		return $this->getTranslatedText($origTitle, $locale);
	}

	/**
	 * Something to do before get posts
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetPosts($locale) {
	}

	/**
	 * Something to do after get posts
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetPosts($locale) {
	}

	/**
	 * Something to do before get post item
	 *
	 * @access public
	 * @param int $postId Post id
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetPostItem($postId, $locale) {
	}

	/**
	 * Something to do after get post item
	 *
	 * @access public
	 * @param int $postId Post id
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetPostItem($postId, $locale) {
	}

	/**
	 * Get translated post URL
	 *
	 * @access public
	 * @param string $origURL Original post URL
	 * @param int $postId Post id
	 * @param string $locale Language locale
	 * @return string Translated post URL
	 */
	public function getTranslatedPostURL($origURL, $postId, $locale) {
		// get translated post URL
		return $this->getTranslatedURL($origURL, $locale);
	}

	/**
	 * Get translated post title
	 *
	 * @access public
	 * @param string $origTitle Original post title
	 * @param int $postId Post id
	 * @param string $locale Language locale
	 * @return string Translated post title
	 */
	public function getTranslatedPostTitle($origTitle, $postId, $locale) {
		// get translated post title
		return $this->getTranslatedText($origTitle, $locale);
	}

	/**
	 * Something to do before get categories
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetCategories($locale) {
	}

	/**
	 * Something to do after get categories
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetCategories($locale) {
	}

	/**
	 * Something to do before get category item
	 *
	 * @access public
	 * @param int $categoryId Category id
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetCategoryItem($categoryId, $locale) {
	}

	/**
	 * Something to do after get category item
	 *
	 * @access public
	 * @param int $categoryId Category id
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetCategoryItem($categoryId, $locale) {
	}

	/**
	 * Get translated category URL
	 *
	 * @access public
	 * @param string $origURL Original category URL
	 * @param int $categoryId Category id
	 * @param string $locale Language locale
	 * @return string Translated category URL
	 */
	public function getTranslatedCategoryURL($origURL, $categoryId, $locale) {
		// get translated category URL
		return $this->getTranslatedURL($origURL, $locale);
	}

	/**
	 * Get translated category title
	 *
	 * @access public
	 * @param string $origTitle Original category title
	 * @param int $categoryId Category id
	 * @param string $locale Language locale
	 * @return string Translated category title
	 */
	public function getTranslatedCategoryTitle($origTitle, $categoryId, $locale) {
		// declare global
		global $q_config;
		// prepare title
		$title = $origTitle;
		// translate title
		if (isset($q_config['language'])) {
			// save old language value
			$oldLang = $q_config['language'];
			// change language
			if (isset($this->languages[$locale])) {
				$q_config['language'] = $this->languages[$locale];
			}
			// get title
			$obj = qtrans_useTermLib(get_term($categoryId, 'category'));
			if (isset($obj->name)) {
				$title = $obj->name;
			}
			// set old language value
			$q_config['language'] = $oldLang;
		}
		// exit
		return $title;
	}

	/**
	 * Something to do before get menu
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetMenu($locale) {
		// remove plugin filter
		$value = has_filter('wp_setup_nav_menu_item', 'qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage');
		if ($value !== false) {
			$this->beforeGetMenuFilterExists = true;
			remove_filter('wp_setup_nav_menu_item', 'qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage');
		} else {
			$this->beforeGetMenuFilterExists = false;
		}
	}

	/**
	 * Something to do after get menu
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetMenu($locale) {
		// add plugin filter again
		if (!empty($this->beforeGetMenuFilterExists)) {
			add_filter('wp_setup_nav_menu_item', 'qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage');
		}
	}

	/**
	 * Something to do before get menu item
	 *
	 * @access public
	 * @param int $itemId Menu item id
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetMenuItem($itemId, $locale) {
	}

	/**
	 * Something to do after get menu item
	 *
	 * @access public
	 * @param int $itemId Menu item id
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetMenuItem($itemId, $locale) {
	}

	/**
	 * Get translated menu URL
	 *
	 * @access public
	 * @param string $origURL Original menu URL
	 * @param int $menuId Menu id
	 * @param string $locale Language locale
	 * @return string Translated menu URL
	 */
	public function getTranslatedMenuURL($origURL, $menuId, $locale) {
		// get translated menu URL
		return $this->getTranslatedURL($origURL, $locale);
	}

	/**
	 * Get translated menu title
	 *
	 * @access public
	 * @param string $origTitle Original menu title
	 * @param int $menuId Menu id
	 * @param string $locale Language locale
	 * @return string Translated menu title
	 */
	public function getTranslatedMenuTitle($origTitle, $menuId, $locale) {
		// get translated menu title
		return $this->getTranslatedText($origTitle, $locale);
	}
}

?>