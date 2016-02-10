<?php

/**
 * config.class.php
 *
 * @author Dominik Kocuj <dominik@kocuj.pl>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @copyright Copyright (c) 2013 Dominik Kocuj
 * @package kocuj_sitemap
 */

/* security */
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {
	die ('Please do not load this page directly. Thanks!');
}

/**
 * Theme configuration class
 *
 * @access public
 */
class KocujSitemapPluginConfig extends KocujAdminConfig4 {
	/**
	 * Initialize
	 *
	 * @access public
	 * @return void
	 */
	public function init() {
		// execute parent method
		parent::init();
		// declare global
		global $wp_version;
		// add options
		$this->addOption('LinkToMainSite', '1', 'checkbox', __('Display link to main site', 'kocuj-sitemap'));
		if (version_compare($wp_version, '3.0.0', '>=')) {
			$this->addOption('DisplayMenus', '1', 'checkbox', __('Display menus', 'kocuj-sitemap'));
		}
		$this->addOption('DisplayPages', '1', 'checkbox', __('Display pages', 'kocuj-sitemap'));
		$this->addOption('DisplayPosts', '1', 'checkbox', __('Display posts', 'kocuj-sitemap'));
		if (version_compare($wp_version, '3.0.0', '>=')) {
			$def = 'MGP';
		} else {
			$def = 'GP';
		}
		$this->addOption('Order', $def, 'string', __('Order of elements in the sitemap', 'kocuj-sitemap'));
		if (version_compare($wp_version, '3.0.0', '>=')) {
			$this->addOption('Menus', '', 'numeric', __('Menus list', 'kocuj-sitemap'), true, array(
				'allowreorganize'   => true,
				'addonlastnotempty' => true,
				'removeonempty'     => true,
				'addbutton'         => false,
			));
		}
		$this->addOption('UseHTML5', '0', 'checkbox', __('Use HTML 5 `nav` tag', 'kocuj-sitemap'));
		$this->addOption('PoweredBy', '0', 'checkbox', __('Display `powered by` information below sitemap', 'kocuj-sitemap'));
		// set option name
		$this->optionName = 'kocujsitemap_options';
		// add multi-language plugins options
		$multiLangData = KocujSitemapPluginMultiLang::getInstance()->getData();
		if (!empty($multiLangData)) {
			foreach ($multiLangData as $data) {
				$this->addOption($data['admin_id'], '1', 'checkbox', $data['admin_label']);
			}
		}
	}
}

?>
