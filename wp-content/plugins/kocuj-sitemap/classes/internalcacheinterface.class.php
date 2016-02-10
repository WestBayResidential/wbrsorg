<?php

/**
 * internalcacheinterface.class.php
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

// include class
include_once dirname(__FILE__).'/internalcache.class.php';

/**
 * Internal cache interface
 *
 * @access public
 */
class KocujSitemapPluginInternalCacheInterface {
	/**
	 * Internal cache class
	 *
	 * @access private
	 * @var object
	 */
	private static $internalCacheClass = null;

	/**
	 * Initialize
	 *
	 * @access public
	 * @return void
	 */
	public static function init() {
		// initialize class
		self::$internalCacheClass = new KocujInternalCache1();
	}

	/**
	 * Get internal cache class
	 *
	 * @access public
	 * @return object Internal cache class
	 */
	public static function getClass() {
		// get class
		return self::$internalCacheClass;
	}
}

// initialize
KocujSitemapPluginInternalCacheInterface::init();

?>