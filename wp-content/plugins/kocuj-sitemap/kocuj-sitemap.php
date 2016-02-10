<?php

/*
	Plugin Name: Kocuj Sitemap
	Plugin URI: http://kocujsitemap.wpplugin.kocuj.pl
	Description: This plugin adds shortcode and PHP function that prepares the sitemap which contains links to all of your posts, pages and menu items in the place where it is located. It supports multilingual websites (by using qTranslate plugin if exists). The sitemap is automatically generated and stored in the cache to speeds up the loading of sitemap on your website.
	Version: 1.3.2
	Author: Dominik Kocuj <dominik@kocuj.pl>
	Author URI: http://kocuj.pl
	License: GPL2 or newer
	Text Domain: kocuj-sitemap-meta
	Domain Path: /languages/

	Kocuj Sitemap plugin is released under the GNU General Public License (GPL)
	http://www.gnu.org/licenses/gpl-2.0.html

	This is a WordPress plugin (http://wordpress.org).
*/

/*  Copyright 2013  Dominik Kocuj  (email : dominik@kocuj.pl)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 3, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * kocuj-sitemap.php
 *
 * @author Dominik Kocuj <dominik@kocuj.pl>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @copyright Copyright (c) 2013 Dominik Kocuj
 * @package kocuj_sitemap
 */

// include classes
include_once dirname(__FILE__).'/classes/internalcacheinterface.class.php';
include_once dirname(__FILE__).'/classes/kocuj-admin-4/kocuj-admin.class.php';
include_once dirname(__FILE__).'/classes/config.class.php';
include_once dirname(__FILE__).'/classes/admin.class.php';
include_once dirname(__FILE__).'/classes/html5.class.php';
include_once dirname(__FILE__).'/classes/sitemap.class.php';
include_once dirname(__FILE__).'/classes/cache.class.php';
include_once dirname(__FILE__).'/classes/multilang.class.php';
global $wp_version;
if (version_compare($wp_version, '3.0.0', '>=')) {
	include_once dirname(__FILE__).'/classes/menu.class.php';
}

/**
 * Class KocujSitemapPluginAdmin
 *
 * @var object
 */
global $classKocujSitemapAdmin;
$classKocujSitemapAdmin = NULL;

/**
 * Plugin class
 *
 * @access public
 */
class KocujSitemapPlugin {
	/**
	 * Singleton instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance = NULL;

	/**
	 * Plugin major version
	 *
	 * @access private
	 * @var int
	 */
	private $versionMajor = 1;

	/**
	 * Plugin minor version
	 *
	 * @access private
	 * @var int
	 */
	private $versionMinor = 3;

	/**
	 * Plugin revision version
	 *
	 * @access private
	 * @var int
	 */
	private $versionRevision = 1;

	/**
	 * Plugin directory
	 *
	 * @access private
	 * @var string
	 */
	private $pluginDir = '';

	/**
	 * Plugin URL
	 *
	 * @access private
	 * @var string
	 */
	private $pluginUrl = '';

	/**
	 * Cron id
	 *
	 * @access private
	 * @var string
	 */
	private $cronId = 'kocujsitemapcron';

	/**
	 * Plugin has been initialized (true) or not (false)
	 *
	 * @access private
	 * @var bool
	 */
	private $initialized = false;

	/**
	 * Constructor
	 *
	 * @access private
	 * @return void
	 */
	private function __construct() {
		// get plugin directory
		$this->pluginDir = dirname(__FILE__);
		$this->pluginUrl = plugins_url('kocuj-sitemap');
		// initialize classes
		global $classKocujSitemapAdmin;
		$classKocujSitemapConfig = new KocujSitemapPluginConfig();
		$classKocujSitemapAdmin = new KocujSitemapPluginAdmin($classKocujSitemapConfig, dirname( __FILE__ ).'/languages', __FILE__, 'kocuj-sitemap', dirname(plugin_basename( __FILE__ )).'/languages', $this->getVersion());
		KocujSitemapPluginCache::getInstance();
		KocujSitemapPluginSitemap::getInstance();
		// add initialize
		add_action('init', array($this, 'init'));
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
			self::$instance = new KocujSitemapPlugin();
		}
		// exit
		return self::$instance;
	}

	/**
	 * Initialize
	 *
	 * @access public
	 * @return void
	 */
	public function init() {
		// check if make an initialization
		if (!empty($this->initialized)) {
			return;
		}
		// add cron
		if (!wp_next_scheduled($this->cronId)) {
			wp_schedule_event(time(), 'hourly', $this->cronId);
		}
		add_action($this->cronId, array($this, 'cron'));
		// set initialization status
		$this->initialized = true;
	}

	/**
	 * Get major version
	 *
	 * @access public
	 * @return int Major version
	 */
	public function getVersionMajor() {
		// get major version
		return $this->versionMajor;
	}

	/**
	 * Get minor version
	 *
	 * @access public
	 * @return int Minor version
	 */
	public function getVersionMinor() {
		// get minor version
		return $this->versionMinor;
	}

	/**
	 * Get revision version
	 *
	 * @access public
	 * @return int Revision version
	 */
	public function getVersionRevision() {
		// get revision version
		return $this->versionRevision;
	}

	/**
	 * Get version
	 *
	 * @access public
	 * @return string Version
	 */
	public function getVersion() {
		// get version
		return $this->versionMajor.'.'.$this->versionMinor.'.'.$this->versionRevision;
	}

	/**
	 * Get plugin directory
	 *
	 * @access public
	 * @return int Plugin directory
	 */
	public function getPluginDir() {
		// get plugin directory
		return $this->pluginDir;
	}

	/**
	 * Get plugin URL
	 *
	 * @access public
	 * @return int Plugin URL
	 */
	public function getPluginUrl() {
		// get plugin URL
		return $this->pluginUrl;
	}

	/**
	 * Plugin activation
	 *
	 * @access public
	 * @return void
	 */
	public function activate() {
		// initialize
		$this->init();
		// create cache
		KocujSitemapPluginCache::getInstance()->createCache();
		// make cron
		$this->cron();
	}

	/**
	 * Plugin deactivation
	 *
	 * @access public
	 * @return void
	 */
	public function deactivate() {
		// delete cron
		remove_action($this->cronId, array($this, 'cronDelete'));
	}

	/**
	 * Plugin update - call after plugin update and plugin activation
	 *
	 * @access public
	 * @return void
	 */
	public function updatePlugin() {
		// remove database values for old plugin versions
		delete_option('kocujsitemap_plugin_data_version');
		// create cache
		KocujSitemapPluginCache::getInstance()->createCache();
	}

	/**
	 * Cron
	 *
	 * @access public
	 * @return void
	 */
	public function cron() {
		// create cache
		KocujSitemapPluginCache::getInstance()->createCache();
	}

	/**
	 * Delete cron
	 *
	 * @access public
	 * @return void
	 */
	public function cronDelete() {
		// cron delete
		wp_clear_scheduled_hook($this->cronId);
	}
}

// initialize class
KocujSitemapPlugin::getInstance();

/**
 * Display sitemap
 *
 * @access public
 * @param string $title Sitemap title - default: empty
 * @param string $class Sitemap class - default: empty
 * @return void
 */
function kocujsitemap_show_sitemap($title = '', $class = '') {
	// show sitemap
	echo KocujSitemapPluginSitemap::getInstance()->getSitemap($title, $class);
}

?>
