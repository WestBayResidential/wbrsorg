<?php

/**
 * html5.class.php
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
 * HTML5 class
 *
 * @access public
 */
class KocujSitemapPluginHTML5 {
	/**
	 * Singleton instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance = NULL;

	/**
	 * Constructor
	 *
	 * @access private
	 * @return void
	 */
	private function __construct() {
		// add shortcode
		add_shortcode('KocujSitemap', array($this, 'shortcodeSitemap'));
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
			self::$instance = new KocujSitemapPluginHTML5();
		}
		// exit
		return self::$instance;
	}

	/**
	 * Get agent
	 *
	 * @access private
	 * @return string Agent
	 */
	private function getAgent() {
		// get agent
		if (isset($_SERVER['HTTP_USER_AGENT'])) {
			return $_SERVER['HTTP_USER_AGENT'];
		} else {
			return '';
		}
	}

	/**
	 * Check if it is IE
	 *
	 * @access public
	 * @return bool
	 */
	public function checkIE() {
		// get agent
		$agent = $this->getAgent();
		// check if it is IE
		if ((preg_match('/MSIE/i', $agent) && (!preg_match('/Opera/i', $agent)))) {
			return true;
		}
		// exit
		return false;
	}

	/**
	 * Get IE version
	 *
	 * @access public
	 * @return int|bool IE version or false
	 */
	public function getIEVersion() {
		// initialize
		$output = false;
		// get agent
		$agent = $this->getAgent();
		// get browser information
		$version = strtok($agent, '/');
		$version = strtok(' ');
		// check if it is IE
		if ($this->checkIE()) {
			// get version
			$version = strtok('MSIE');
			$version = strtok(' ');
			$version = strtok(';');
			$div = explode('.', $version);
			if (count($div) > 1) {
				$version = $div[0];
			}
			$version = (int)$version;
			$output = $version;
		}
		// exit
		return $output;
	}

	/**
	 * Get tag begin
	 *
	 * @access private
	 * @param string $tag Tag name
	 * @param string $id Tag id - default: empty
	 * @param string $class Tag class - default: empty
	 * @param string $additional Additional tag parameters - default: empty
	 * @return string Tag
	 */
	private function getTagBegin($tag, $id = '', $class = '', $additional = '') {
		// initialize
		$output = '';
		// set class
		if (!empty($class)) {
			$class .= ' ';
		}
		$class .= 'tag'.$tag;
		// check browser
		if (($this->checkIE()) && ($this->getIEVersion() < 9)) {
			$tag = 'div';
		}
		// get tag
		$output = '<'.$tag;
		if (!empty($id)) {
			$output .= ' id="'.$id.'"';
		}
		if (!empty($class)) {
			$output .= ' class="'.$class.'"';
		}
		if (!empty($additional)) {
			$output .= ' '.$additional;
		}
		$output .= '>';
		// exit
		return $output;
	}

	/**
	 * Get tag end
	 *
	 * @access private
	 * @param string $tag Tag name
	 * @return string Tag
	 */
	private function getTagEnd($tag) {
		// initialize
		$output = '';
		// check browser
		if (($this->checkIE()) && ($this->getIEVersion() < 9)) {
			$tag = 'div';
		}
		// get tag
		$output = '</'.$tag.'>';
		// exit
		return $output;
	}

	/**
	 * Get tag begin: <nav>
	 *
	 * @access public
	 * @param string $id Tag id - default: empty
	 * @param string $class Tag class - default: empty
	 * @param string $additional Additional tag parameters - default: empty
	 * @return string Tag
	 */
	public function getTagNavBegin($id = '', $class = '', $additional = '') {
		// get tag begin
		return $this->getTagBegin('nav', $id, $class, $additional);
	}

	/**
	 * Get tag end: <nav>
	 *
	 * @access public
	 * @return string Tag
	 */
	public function getTagNavEnd() {
		// get tag end
		return $this->getTagEnd('nav');
	}
}

?>