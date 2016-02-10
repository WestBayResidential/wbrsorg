<?php

/**
 * kocuj-admin-admin-frontend.class.php
 *
 * @author Dominik Kocuj <dominik@kocuj.pl>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @copyright Copyright (c) 2013 Dominik Kocuj
 * @package kocuj_admin
 */

// security
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {
	die ('Please do not load this page directly. Thanks!');
}

// check if class not exists
if (!class_exists('KocujAdminAdmin4')) {
	/**
	 * Admin class - version 4
	 *
	 * @access public
	 */
	class KocujAdminAdmin4 {
		/**
		 * Directory for files for Kocuj Admin
		 *
		 * @access private
		 * @var string
		 */
		private $directory = 'kocuj-admin-4';

		/**
		 * KocujAdminConfig4 class object
		 *
		 * @access private
		 * @var object
		 */
		private $configClass = null;

		/**
		 * Language directory
		 *
		 * @access private
		 * @var string
		 */
		private $languageDir = '';

		/**
		 * Constructor
		 *
		 * @access public
		 * @param object $configClass KocujAdminConfig4 class object
		 * @param string $languageDir Directory with language data
		 * @param string $mainFile Main file full path
		 * @return void
		 */
		public function __construct($configClass, $languageDir, $mainFile) {
			// set config class
			if (!is_a($configClass, 'KocujAdminConfig4')) {
				wp_die('Critical error: Kocuj Admin config class error!');
			}
			$this->configClass = $configClass;
			// set language directory
			$this->languageDir = $languageDir;
			// set initialize action
			add_action('after_setup_theme', array($this, 'loadLanguage'), 1);
		}

		/**
		 * Get directory for files for Kocuj Admin
		 *
		 * @access public
		 * @return string Directory for files for Kocuj Admin
		 */
		public function getDirectory() {
			// get directory for files for Kocuj Admin
			return $this->directory;
		}

		/**
		 * Get KocujAdminConfig4 class object
		 *
		 * @access public
		 * @return object KocujAdminConfig4 class object
		 */
		public function getConfigClass() {
			// get KocujAdminConfig4 class object
			return $this->configClass;
		}

		/**
		 * Get language directory
		 *
		 * @access public
		 * @return string Language directory
		 */
		public function getLanguageDir() {
			// get language directory
			return $this->languageDir;
		}

		/**
		 * Load language
		 *
		 * @access public
		 * @return void
		 */
		public function loadLanguage() {
			// load language
			$locale = get_locale();
			$filename = $this->languageDir.'/'.$this->directory.'/kocuj-admin-4_'.$locale.'.mo';
			if (file_exists($filename)) {
				load_textdomain('kocujadmin4', $filename);
			}
		}
	}
}

?>
