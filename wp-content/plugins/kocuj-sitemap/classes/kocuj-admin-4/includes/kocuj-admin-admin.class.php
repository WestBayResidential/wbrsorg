<?php

/**
 * kocuj-admin-admin.class.php
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
if (!class_exists('KocujAdminEnumLicensePlace4')) {
	/**
	 * Enumeration of places for display license when there is requirement for confirmation - version 4
	 *
	 * @access public
	 */
	final class KocujAdminEnumLicensePlace4 {
		/**
		 * Empty constructor for blocking of creating an instance of this class
		 *
		 * @access private
		 * @var void
		 */
		private function __construct() {}

		/**
		 * License will be not displayed anywhere
		 *
		 */
		const NONE = 0;

		/**
		 * License will be displayed everywhere
		 *
		 */
		const ALL = 1;

		/**
		 * License will be displayed on plugins page
		 *
		 */
		const PLUGINS = 2;

		/**
		 * License will be displayed on themes page
		 *
		 */
		const THEMES = 3;
	}
}

// check if class not exists
if (!class_exists('KocujAdminEnumAppType4')) {
	/**
	 * Enumeration of type of application using admin class - version 4
	 *
	 * @access public
	 */
	final class KocujAdminEnumAppType4 {
		/**
		 * Empty constructor for blocking of creating an instance of this class
		 *
		 * @access private
		 * @var void
		 */
		private function __construct() {}

		/**
		 * It is plugin
		 *
		 */
		const PLUGIN = 0;

		/**
		 * It is theme
		 *
		 */
		const THEME = 1;
	}
}

// check if class not exists
if (!class_exists('KocujAdminEnumThanksPlaces4')) {
	/**
	 * Enumeration of place for thanks information - version 4
	 *
	 * @access public
	 */
	final class KocujAdminEnumThanksPlaces4 {
		/**
		 * Empty constructor for blocking of creating an instance of this class
		 *
		 * @access private
		 * @var void
		 */
		private function __construct() {}

		/**
		 * Thanks information will be displayed everywhere in administration panel
		 *
		 */
		const ALL = 0;

		/**
		 * Thanks information will be displayed only on administration pages for this project
		 *
		 */
		const PROJECT = 1;
	}
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
		 * Class version
		 *
		 * @access private
		 * @var int
		 */
		private $version = 3;

		/**
		 * Directory for files for Kocuj Admin
		 *
		 * @access private
		 * @var string
		 */
		private $directory = 'kocuj-admin-4';

		/**
		 * Random value used for unique simulated methods names
		 *
		 * @access private
		 * @var int
		 */
		private $random = 0;

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
		 * Main file full path
		 *
		 * @access private
		 * @var string
		 */
		private $mainFile = '';

		/**
		 * Plugin version
		 *
		 * @access private
		 * @var string
		 */
		private $pluginVersion = '';

		/**
		 * Controllers list
		 *
		 * @access private
		 * @var array
		 */
		private $controller = array();

		/**
		 * Input helpers list
		 *
		 * @access private
		 * @var array
		 */
		private $inputHelper = array();

		/**
		 * Block helpers id list
		 *
		 * @access private
		 * @var array
		 */
		private $blockHelperId = array();

		/**
		 * Settings menus list
		 *
		 * @access private
		 * @var array
		 */
		private $settingsMenu = array();

		/**
		 * Settings menus containers list
		 *
		 * @access private
		 * @var array
		 */
		private $settingsMenuContainer = array();

		/**
		 * Theme menus list
		 *
		 * @access private
		 * @var array
		 */
		private $themeMenu = array();

		/**
		 * Theme menus containers list
		 *
		 * @access private
		 * @var array
		 */
		private $themeMenuContainer = array();

		/**
		 * Meta boxes containers list
		 *
		 * @access private
		 * @var array
		 */
		private $metaBox = array();

		/**
		 * Qucik tags for HTML editor list
		 *
		 * @access private
		 * @var array
		 */
		private $quickTag = array();

		/**
		 * Plugins JavaScript main and language files for TinyMCE editor
		 *
		 * @access private
		 * @var array
		 */
		private $mcePluginJS = array();

		/**
		 * Buttons for TinyMCE editor
		 *
		 * @access private
		 * @var array
		 */
		private $mceButton = array();

		/**
		 * Page parameters names list
		 *
		 * @access private
		 * @var array
		 */
		private $pageNames = array();

		/**
		 * Form started (true) or not (false)
		 *
		 * @access private
		 * @var bool
		 */
		private $formStarted = false;

		/**
		 * Tabs containers list
		 *
		 * @access private
		 * @var array
		 */
		private $tabsContainers = array();

		/**
		 * Tabs list
		 *
		 * @access private
		 * @var array
		 */
		private $tabs = array();

		/**
		 * Tabs container started (true) or not (false)
		 *
		 * @access private
		 * @var bool
		 */
		private $tabsContainerStarted = false;

		/**
		 * Tab started (true) or not (false)
		 *
		 * @access private
		 * @var bool
		 */
		private $tabStarted = false;

		/**
		 * Table started (true) or not (false)
		 *
		 * @access private
		 * @var bool
		 */
		private $tableStarted = false;

		/**
		 * Random value used for license
		 *
		 * @access private
		 * @var int
		 */
		private $licenseRandom = 0;

		/**
		 * Random value used for thanks script
		 *
		 * @access private
		 * @var int
		 */
		private $thanksRandom = 0;

		/**
		 * Application type - plugin or theme
		 *
		 * @access protected
		 * @var int
		 */
		protected $appType = KocujAdminEnumAppType4::PLUGIN;

		/**
		 * Minimal full supported WordPress version
		 *
		 * @access protected
		 * @var string
		 */
		protected $minimalFullSupportedVersion = '';

		/**
		 * Text for display a minimal full supported WordPress version
		 *
		 * @access protected
		 * @var string
		 */
		protected $minimalFullSupportedVersionDisplay = '';

		/**
		 * Plugin activation hook callback
		 *
		 * @access protected
		 * @var string
		 */
		protected $pluginActivationHook = '';

		/**
		 * Plugin deactivation hook callback
		 *
		 * @access protected
		 * @var string
		 */
		protected $pluginDeactivationHook = '';
		/**
		 * Plugin update callback
		 *
		 * @access protected
		 * @var string
		 */
		protected $pluginUpdateCallback = '';

		/**
		 * Title for settings page in administration panel
		 *
		 * @access protected
		 * @var string
		 */
		protected $title = '';

		/**
		 * Full title
		 *
		 * @access protected
		 * @var string
		 */
		protected $fullTitle = '';

		/**
		 * Internal name
		 *
		 * @access protected
		 * @var string
		 */
		protected $internalName = '';

		/**
		 * Form name for settings page in administration panel
		 *
		 * @access protected
		 * @var string
		 */
		protected $formName = '';

		/**
		 * Nonce action
		 *
		 * @access protected
		 * @var string
		 */
		protected $nonceAction = '';

		/**
		 * License option name
		 *
		 * @access protected
		 * @var string
		 */
		protected $licenseOption = '';

		/**
		 * License URL
		 *
		 * @access protected
		 * @var string
		 */
		protected $licenseURL = '';

		/**
		 * License directory
		 *
		 * @access protected
		 * @var string
		 */
		protected $licenseDir = '';

		/**
		 * Force license confirmation on some pages or anywhere; it should have values based on KocujAdminEnumLicensePlace4 class
		 *
		 * @access protected
		 * @var int
		 */
		protected $licenseForce = KocujAdminEnumLicensePlace4::NONE;

		/**
		 * Thanks option name
		 *
		 * @access protected
		 * @var string
		 */
		protected $thanksOption = '';

		/**
		 * Thanks websites
		 *
		 * @access protected
		 * @var array
		 */
		protected $thanksWebsites = array();

		/**
		 * Delay with days between installation and first show thanks information
		 *
		 * @access protected
		 * @var array
		 */
		protected $thanksDaysDelay = 0;

		/**
		 * Display thanks information everywhere or only on project pages; it should have values based on KocujAdminEnumThanksPlaces4 class
		 *
		 * @access protected
		 * @var int
		 */
		protected $thanksPlace = KocujAdminEnumThanksPlaces4::PROJECT;

		/**
		 * CSS URL
		 *
		 * @access protected
		 * @var string
		 */
		protected $cssURL = '';

		/**
		 * JavaScript URL
		 *
		 * @access protected
		 * @var string
		 */
		protected $javascriptURL = '';

		/**
		 * JavaScript TinyMCE plugins URL
		 *
		 * @access protected
		 * @var string
		 */
		protected $javascriptTinyMCEPluginsURL = '';

		/**
		 * TinyMCE plugins language directories
		 *
		 * @access protected
		 * @var string
		 */
		protected $phpTinyMCEPluginsLangDir = '';

		/**
		 * Images directory
		 *
		 * @access protected
		 * @var string
		 */
		protected $imagesDir = '';

		/**
		 * Images URL
		 *
		 * @access protected
		 * @var string
		 */
		protected $imagesURL = '';

		/**
		 * Icon for menu option and settings page in administration panel
		 *
		 * @access protected
		 * @var string
		 */
		protected $adminIcon = '';

		/**
		 * Image for about page in administration panel
		 *
		 * @access protected
		 * @var string
		 */
		protected $aboutImage = '';

		/**
		 * Image for up arrow
		 *
		 * @access protected
		 * @var string
		 */
		protected $arrowUpImage = '';

		/**
		 * Width of image for up arrow
		 *
		 * @access protected
		 * @var int
		 */
		protected $arrowUpImageWidth = 0;

		/**
		 * Heighr of image for up arrow
		 *
		 * @access protected
		 * @var int
		 */
		protected $arrowUpImageHeight = 0;

		/**
		 * Image for down arrow
		 *
		 * @access protected
		 * @var string
		 */
		protected $arrowDownImage = '';

		/**
		 * Width of image for down arrow
		 *
		 * @access protected
		 * @var int
		 */
		protected $arrowDownImageWidth = 0;

		/**
		 * Heighr of image for down arrow
		 *
		 * @access protected
		 * @var int
		 */
		protected $arrowDownImageHeight = 0;

		/**
		 * Image for close button
		 *
		 * @access protected
		 * @var string
		 */
		protected $closeImage = '';

		/**
		 * Width of image for close button
		 *
		 * @access protected
		 * @var int
		 */
		protected $closeImageWidth = 0;

		/**
		 * Height of image for close button
		 *
		 * @access protected
		 * @var int
		 */
		protected $closeImageHeight = 0;

		/**
		 * Thanks script API login
		 *
		 * @access protected
		 * @var string
		 */
		protected $thanksAPILogin = '';

		/**
		 * Thanks script API password
		 *
		 * @access protected
		 * @var string
		 */
		protected $thanksAPIPassword = '';

		/**
		 * Constructor
		 *
		 * @access public
		 * @param object $configClass KocujAdminConfig4 class object
		 * @param string $languageDir Directory with language data
		 * @param string $mainFile Main file full path
		 * @param string $pluginVersion Plugin version - default: empty
		 * @return void
		 */
		public function __construct($configClass, $languageDir, $mainFile, $pluginVersion = '') {
			// set random value
			$this->random = time().rand(1111, 9999);
			// set license timestamp
			$this->licenseRandom = time().rand(1111, 9999);
			// set thanks script timestamp
			$this->thanksRandom = time().rand(1111, 9999);
			// set config class
			if (!is_a($configClass, 'KocujAdminConfig4')) {
				wp_die('Critical error: Kocuj Admin config class error!');
			}
			$this->configClass = $configClass;
			// set language directory
			$this->languageDir = $languageDir;
			// set main file
			$this->mainFile = $mainFile;
			// set plugin version
			$this->pluginVersion = $pluginVersion;
			// set initialize actions
			global $wp_version;
			if (version_compare($wp_version, '3.0.0', '>=')) {
				add_action('after_setup_theme', array($this, 'loadLanguage'), 1);
			} else {
				add_action('plugins_loaded', array($this, 'loadLanguage'), 1);
			}
			add_action('init', array($this, 'init'), 1);
			add_action('admin_menu', array($this, 'initAfter'), 1);
			// register plugin activation hook
			if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
				register_activation_hook($this->mainFile, array($this, 'activatePlugin'));
			}
		}

		/**
		 * Get class version
		 *
		 * @access public
		 * @return int Class version
		 */
		public function getVersion() {
			// get class version
			return $this->version;
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
		 * Get random value used for unique simulated methods names
		 *
		 * @access public
		 * @return int Random value used for unique simulated methods names
		 */
		public function getRandom() {
			// get random value used for unique simulated methods names
			return $this->random;
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
		 * Get main file full path
		 *
		 * @access public
		 * @return string Main file full path
		 */
		public function getMainFile() {
			// get main file full path
			return $this->mainFile;
		}

		/**
		 * Get plugin version
		 *
		 * @access public
		 * @return string Plugin version
		 */
		public function getPluginVersion() {
			// get plugin version
			return $this->mainFile;
		}

		/**
		 * Get form started (true) or not (false)
		 *
		 * @access public
		 * @return bool Form started (true) or not (false)
		 */
		public function getFormStarted() {
			// get form started (true) or not (false)
			return $this->formStarted;
		}

		/**
		 * Get tabs container started (true) or not (false)
		 *
		 * @access public
		 * @return bool Tabs container started (true) or not (false)
		 */
		public function getTabsContainerStarted() {
			// get tabs container started (true) or not (false)
			return $this->tabsContainerStarted;
		}

		/**
		 * Get tab started (true) or not (false)
		 *
		 * @access public
		 * @return bool Tab started (true) or not (false)
		 */
		public function getTabStarted() {
			// get tab started (true) or not (false)
			return $this->tabStarted;
		}

		/**
		 * Get table started (true) or not (false)
		 *
		 * @access public
		 * @return bool Table started (true) or not (false)
		 */
		public function getTableStarted() {
			// get table started (true) or not (false)
			return $this->tableStarted;
		}

		/**
		 * Get random value used for license
		 *
		 * @access public
		 * @return int Random value used for license
		 */
		public function getLicenseRandom() {
			// get random value used for license
			return $this->licenseRandom;
		}

		/**
		 * Get random value used for thanks script
		 *
		 * @access public
		 * @return int Random value used for thanks script
		 */
		public function getThanksRandom() {
			// get random value used for thanks script
			return $this->thanksRandom;
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

		/**
		 * Initialize
		 *
		 * @access public
		 * @return void
		 */
		public function init() {
			// add controllers
			$this->controller['save'] = array(array($this, 'controllerSave'), __('Settings saved.', 'kocujadmin4'));
			$this->controller['reset'] = array(array($this, 'controllerReset'), __('Settings reset.', 'kocujadmin4'));
			$this->controller['uninstall'] = array(array($this, 'controllerUninstall'), __('Settings has been uninstalled.', 'kocujadmin4'));
			// add input helpers
			$this->inputHelper['hidden'] = array(array($this, 'inputHelperHidden'), null);
			$this->inputHelper['text'] = array(array($this, 'inputHelperText'), null);
			$this->inputHelper['textarea'] = array(array($this, 'inputHelperTextarea'), null);
			$this->inputHelper['checkbox'] = array(array($this, 'inputHelperCheckbox'), null);
			$this->inputHelper['select'] = array(array($this, 'inputHelperSelect'), null);
			$this->inputHelper['select_end'] = array(array($this, 'inputHelperSelectEnd'), null);
			$this->inputHelper['option'] = array(array($this, 'inputHelperOption'), null);
			global $wp_version;
			if (version_compare($wp_version, '3.0.0', '>=')) {
				$this->inputHelper['selectmenu'] = array(array($this, 'inputHelperSelectmenu'), array($this, 'checkBlockHelperLoopSelectmenu'));
			}
			$this->inputHelper['submit'] = array(array($this, 'inputHelperSubmit'), null);
			$this->inputHelper['reset'] = array(array($this, 'inputHelperReset'), null);
			$this->inputHelper['uninstall'] = array(array($this, 'inputHelperUninstall'), null);
			// add admin header
			add_action('admin_head', array($this, 'addHeader'));
			// add admin menu
			add_action('admin_menu', array($this, 'pageController'));
			// add meta boxes
			add_action('add_meta_boxes', array($this, 'filterAddMetaBox'), $this->calculateNewPriority('add_meta_boxes'));
			add_action('save_post', array($this, 'filterSaveMetaBox'), $this->calculateNewPriority('save_post'));
			// add quick tags
			if (version_compare($wp_version, '3.3.0', '>=')) {
				add_action('admin_print_footer_scripts', array($this, 'actionQuickTags'), $this->calculateNewPriority('admin_print_footer_scripts'));
			}
			// add TinyMCE plugins and buttons
			add_filter('mce_external_plugins', array($this, 'filterRegisterMCEPlugins'), $this->calculateNewPriority('mce_external_plugins'));
			add_filter('mce_external_languages', array($this, 'filterRegisterMCEPluginsLang'), $this->calculateNewPriority('mce_external_languages'));
			add_filter('mce_buttons', array($this, 'filterRegisterMCEButtons'), $this->calculateNewPriority('mce_buttons'));
			// add administration panel informations
			add_action('admin_notices', array($this, 'actionDisplayThanks'), $this->calculateNewPriority('admin_notices'));
		}

		/**
		 * Initialize - phase 2
		 *
		 * @access public
		 * @return void
		 */
		public function initAfter() {
			// check and correct settings
			if (($this->appType != KocujAdminEnumAppType4::PLUGIN) && ($this->appType != KocujAdminEnumAppType4::THEME)) {
				$this->appType = KocujAdminEnumAppType4::PLUGIN;
			}
			if (empty($this->internalName)) {
				$this->internalName = get_class($this);
			}
			if (empty($this->formName)) {
				$this->formName = $this->internalName;
			}
			if (empty($this->nonceAction)) {
				$this->nonceAction = 'kocujadmin4';
			}
			if (empty($this->licenseDir)) {
				if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
					$this->licenseDir = realpath(dirname(__FILE__).'/../../../');
				} else {
					$this->licenseDir = get_template_directory();
				}
			}
			if (empty($this->licenseURL)) {
				if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
					$this->licenseURL = plugin_dir_url(realpath(dirname(__FILE__).'/../../'));
				} else {
					$this->licenseURL = get_template_directory_uri();
				}
			}
			if (empty($this->licenseOption)) {
				$this->licenseOption = '';
				$this->licenseURL = '';
				$this->licenseDir = '';
			}
			if (empty($this->cssURL)) {
				if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
					$this->cssURL = plugin_dir_url(realpath(dirname(__FILE__).'/../../')).'css';
				} else {
					$this->cssURL = get_template_directory_uri().'/css';
				}
			}
			if (empty($this->javascriptURL)) {
				if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
					$this->javascriptURL = plugin_dir_url(realpath(dirname(__FILE__).'/../../')).'js';
				} else {
					$this->javascriptURL = get_template_directory_uri().'/js';
				}
			}
			if (empty($this->javascriptTinyMCEPluginsURL)) {
				if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
					$this->javascriptTinyMCEPluginsURL = plugin_dir_url(realpath(dirname(__FILE__).'/../../')).'js/tinymce';
				} else {
					$this->javascriptTinyMCEPluginsURL = get_template_directory_uri().'/js/tinymce';
				}
			}
			if (empty($this->phpTinyMCEPluginsLangDir)) {
				if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
					$this->phpTinyMCEPluginsLangDir = realpath(dirname(__FILE__).'/../../../').'/php/tinymce';
				} else {
					$this->phpTinyMCEPluginsLangDir = get_template_directory().'/php/tinymce';
				}
			}
			if (empty($this->imagesDir)) {
				if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
					$this->imagesDir = realpath(dirname(__FILE__).'/../../../').'/images';
				} else {
					$this->imagesDir = get_template_directory().'/images';
				}
			}
			if (empty($this->imagesURL)) {
				if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
					$this->imagesURL = plugin_dir_url(realpath(dirname(__FILE__).'/../../')).'images';
				} else {
					$this->imagesURL = get_template_directory_uri().'/images';
				}
			}
			if ((empty($this->thanksAPILogin)) || (empty($this->thanksAPIPassword)) || (empty($this->thanksOption)) || (empty($this->thanksWebsites))) {
				$this->thanksAPILogin = '';
				$this->thanksAPIPassword = '';
				$this->thanksOption = '';
				$this->thanksWebsites = array();
			}
			// prepare thanks start date
			if ((!empty($this->thanksOption)) && ($this->thanksDaysDelay > 0)) {
				$startDate = get_option($this->thanksOption.'_date');
				if (empty($startDate)) {
					$startDate = date('Y-m-d');
					add_option($this->thanksOption.'_date', $startDate, '', 'no');
				}
			}
			// get license filename
			if (!empty($this->licenseOption)) {
				$licenseFilename = 'license.txt';
				$language = get_locale();
				if (empty($language)) {
					$language = 'en_US';
				}
				if (file_exists($this->licenseDir.'/license-'.$language.'.txt')) {
					$licenseFilename = 'license-'.$language.'.txt';
				}
			}
			// check if display license
			if ((!empty($this->licenseOption)) && (isset($_GET['kocujadmin4license'])) && ($_GET['kocujadmin4license'] == $this->internalName)) {
				// display license
				$license = file($this->licenseDir.'/'.$licenseFilename);
				if (!empty($license)) {
					foreach ($license as $line) {
						$st = trim($line);
						if ((strlen($st) > 1) && (substr($st, 0, 2) == '--')) {
							echo '<hr /><br />';
						} else {
							if (((strlen($st) > 6) && (substr($st, 0, 7) == 'http://')) || ((strlen($st) > 7) && (substr($st, 0, 8) == 'https://'))) {
								echo '<a href="'.$st.'" rel="external">'.$st.'</a><br />';
							} else {
								$upper = mb_convert_case($st, MB_CASE_UPPER, 'UTF-8');
								if ($st == $upper) {
									echo '<strong>'.$st.'</strong><br />';
								} else {
									echo $st.'<br />';
								}
							}
						}
					}
					exit();
				}
			}
			// check if license accept license
			if ((!empty($this->licenseOption)) && (isset($_GET['kocujadmin4licenseconfirm'])) && ($_GET['kocujadmin4licenseconfirm'] == $this->internalName)) {
				// accept license
				add_option($this->licenseOption, 1, '', 'no');
				exit();
			}
			// check if display more information about thanks
			if ((isset($_GET['kocujadmin4thanks'])) && ($_GET['kocujadmin4thanks'] == $this->internalName)) {
				// display more information about thanks
				echo sprintf(__('If you want to thanks the author, please allow to send an information about your website address to him. This information will be used only for statistical purposes and for adding public information about your website on the following websites: %s. Please, keep in mind, that this information can be used in future on another websites which will belong to author - but always for statistical and information purposes.<br /><br />Please, support this project by doing this - it is for free, so it is the best way to thanks the author for his contribution.<br /><br />Only the following information about your website will be send to author:<ul><li>website address (URL);</li><li>website title;</li><li>website description.</li></ul>No other information will be send.<br /><br />These information will not be send anywhere else, only to author, and it will be saved in database belonging to author only.', 'kocujadmin4'), $this->getThanksWebsitesText());
				exit();
			}
			// check if send thanks data
			if ((!empty($this->thanksOption)) && (isset($_GET['kocujadmin4thanksconfirm'])) && ($_GET['kocujadmin4thanksconfirm'] == $this->internalName)) {
				// accept thanks
				update_option($this->thanksOption, 'send', '', 'no');
				exit();
			}
			// check if cancel sending thanks data
			if ((!empty($this->thanksOption)) && (isset($_GET['kocujadmin4thankscancel'])) && ($_GET['kocujadmin4thankscancel'] == $this->internalName)) {
				// cancel thanks
				add_option($this->thanksOption, 'cancel', '', 'no');
				exit();
			}
			// add styles and scripts
			if ($this->checkPagePermission()) {
				wp_enqueue_style('kocujadmin4-jquery-ui', $this->cssURL.'/'.$this->directory.'/jquery-ui/jquery-ui.css', array(), '1');
				wp_enqueue_script('jquery-ui-core');
				wp_enqueue_script('jquery-ui-tabs');
			}
			if (($this->checkLicenseDisplay()) || ($this->checkPagePermission()) || ($this->checkThanksScripts())) {
				wp_enqueue_script('kocujadmin4-modal', $this->javascriptURL.'/kocuj-admin-4/modal.js', array('jquery'), '4');
			}
			if ($this->checkThanksScripts()) {
				wp_enqueue_script('kocujadmin4-thanks', $this->javascriptURL.'/kocuj-admin-4/thanks.js', array('kocujadmin4-modal'), '4');
				if (function_exists('network_admin_url')) {
					$adminurl = network_admin_url('index.php');
				} else {
					$adminurl = admin_url('index.php');
				}
				if (function_exists('get_home_url')) {
					$homeurl = get_home_url();
				} else {
					$homeurl = get_bloginfo('home');
				}
				wp_localize_script('kocujadmin4-thanks', 'kocujAdmin4ThanksSettings', array(
					'apiUrl'                     => 'http://api.kocuj.pl/',
					'apiLogin'                   => $this->thanksAPILogin,
					'apiPassword'                => $this->thanksAPIPassword,
					'websiteURL'                 => $homeurl,
					'websiteTitle'               => get_bloginfo('name'),
					'websiteDescription'         => get_bloginfo('description'),
					'loadingImageURL'            => $this->imagesURL.'/kocuj-admin-4/loading.gif',
					'adminURL'                   => $adminurl,
					'textSending'                => __('Sending information about your website address, please wait...', 'kocujadmin4'),
					'textInformationAlreadySent' => __('You have already send information about your website address. Thank you.', 'kocujadmin4'),
					'textCorrect'                => __('Thank you for sending information about your website address to author.', 'kocujadmin4'),
					'textErrorTryAgain'          => __('There was an error during sending information about your website address to author. There will be another attempt to do this in a few seconds.', 'kocujadmin4'),
					'textError'                  => __('There was an error during sending information about your website address to author. Please try again later.', 'kocujadmin4'),
					'textMoreTitle'              => __('More information about sending your website address', 'kocujadmin4'),
					'textLoading'                => __('Loading, please wait', 'kocujadmin4'),
					'textLoadingError'           => __('Loading error! Please, check your internet connection and refresh page to try again.', 'kocujadmin4'),
				));
			}
			if (($this->checkLicenseDisplay()) || ($this->checkPagePermission())) {
				wp_enqueue_script('kocujadmin4-license', $this->javascriptURL.'/kocuj-admin-4/license.js', array('kocujadmin4-modal'), '4');
				if (function_exists('network_admin_url')) {
					$adminurl = network_admin_url('index.php');
				} else {
					$adminurl = admin_url('index.php');
				}
				wp_localize_script('kocujadmin4-license', 'kocujAdmin4LicenseSettings', array(
					'adminURL'         => $adminurl,
					'textLoading'      => __('Loading, please wait', 'kocujadmin4'),
					'textLoadingError' => __('Loading error! Please, check your internet connection and refresh page to try again.', 'kocujadmin4'),
					'textLicense'      => __('License', 'kocujadmin4'),
					'textAccept'       => __('Click here to accept this license', 'kocujadmin4'),
					'textCancel'       => __('If you do not agree with it, please remove all related files; then you can refresh page to continue', 'kocujadmin4'),
				));
			}
			// register plugin deactivation hook
			if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
				register_deactivation_hook($this->mainFile, array($this, 'deactivatePlugin'));
			}
			// check version - if it is old call plugin update
			if (($this->appType == KocujAdminEnumAppType4::PLUGIN) && (!empty($this->pluginVersion))) {
				$dbVersion = get_option($this->internalName.'_version', '');
				if ($this->pluginVersion > $dbVersion) {
					$this->updatePlugin();
				}
			}
		}

		/**
		 * Call handler
		 *
		 * @access public
		 * @param string $name Method name
		 * @param array $argument Method arguments
		 * @return void
		 */
		public function __call($name, $arguments) {
			// call handler
			$this->callHandler($name, $arguments);
		}

		/**
		 * Call handler helper method
		 *
		 * @access protected
		 * @param string $name Method name
		 * @param array $argument Method arguments
		 * @return void
		 */
		protected function callHandler($name, $arguments) {
			// get method name
			$div = explode('_', $name);
			if (count($div) > 2) {
				$div0 = $div[0];
				$div1 = $div;
				unset($div1[0]);
				$divend = implode('_', $div1);
				$div = array();
				$div[0] = $div0;
				$div[1] = $divend;
			}
			// methods for menus
			if ((count($div) == 2) && (($div[0] == 'settingsMenu'.$this->random) || ($div[0] == 'themeMenu'.$this->random))) {
				// get method for this menu option
				if ($div[0] == 'settingsMenu'.$this->random) {
					$function = $this->settingsMenu[$this->settingsMenuContainer[$div[1]]][3];
					$permission = $this->settingsMenu[$this->settingsMenuContainer[$div[1]]][1];
				} else {
					$function = $this->themeMenu[$this->themeMenuContainer[$div[1]]][3];
					$permission = $this->themeMenu[$this->themeMenuContainer[$div[1]]][1];
				}
				// check permission
				if (!current_user_can($permission)) {
					_e('You have no permission to view this site.', 'kocujadmin4');
				} else {
					// processing output
					$this->processOutput();
					// show header
					?>
						<div class="wrap">
					<?php if (!empty($this->adminIcon)) : ?>
						<div class="icon32 kocujadmin4-icon">
					<?php else : ?>
						<div id="icon-themes" class="icon32">
					<?php endif; ?>
						<br /></div>
						<?php if (!empty($this->title)) : ?>
							<h2><?php echo $this->title; ?></h2>
						<?php endif; ?>
					<?php
					// execute method
					call_user_func(array($this, $function));
					// show footer
					?>
						</div>
					<?php
				}
			}
			// methods for meta boxes
			if ((count($div) == 2) && ($div[0] == 'metaBox'.$this->random) && (count($arguments) > 0)) {
				$this->showMetaBox($div[1], $arguments[0]);
			}
		}

		/**
		 * Plugin activation or update
		 *
		 * @access private
		 * @param bool $update Plugin update (true) or activation (false) - default: false
		 * @return void
		 */
		private function activateOrUpdatePlugin($update = false) {
			// optionally delete thanks start date
			if ((!empty($this->thanksOption)) && ($this->thanksDaysDelay > 0)) {
				delete_option($this->thanksOption.'_date');
			}
			// call plugin activation hook callback
			if ((empty($update)) && (!empty($this->pluginActivationHook))) {
				eval($this->pluginActivationHook.'();');
			}
			// call plugin update callback
			if ((!empty($update)) && (!empty($this->pluginUpdateCallback))) {
				eval($this->pluginUpdateCallback.'();');
			}
			// update version information
			if (!empty($this->pluginVersion)) {
				$dbVersion = get_option($this->internalName.'_version', '');
				if (!empty($dbVersion)) {
					update_option($this->internalName.'_version', $this->pluginVersion);
				} else {
					add_option($this->internalName.'_version', $this->pluginVersion, '', 'no');
				}
			}
		}

		/**
		 * Plugin activation hook
		 *
		 * @access public
		 * @return void
		 */
		public function activatePlugin() {
			// activate plugin
			$this->activateOrUpdatePlugin(false);
		}

		/**
		 * Plugin update
		 *
		 * @access public
		 * @return void
		 */
		public function updatePlugin() {
			// update plugin
			$this->activateOrUpdatePlugin(true);
		}

		/**
		 * Plugin deactivation hook
		 *
		 * @access public
		 * @return void
		 */
		public function deactivatePlugin() {
			// optionally delete thanks start date
			if ((!empty($this->thanksOption)) && ($this->thanksDaysDelay > 0)) {
				delete_option($this->thanksOption.'_date');
			}
			// call plugin deactivation hook callback
			if (!empty($this->pluginDeactivationHook)) {
				eval($this->pluginDeactivationHook.'();');
			}
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
		 * Get license HTML
		 *
		 * @access public
		 * @return string License HTML URL
		 */
		public function getLicenseHTML() {
			// get URL
			$adminurl = '';
			if (function_exists('network_admin_url')) {
				$adminurl = network_admin_url('index.php?kocujadmin4license='.$this->internalName);
			} else {
				$adminurl = admin_url('index.php?kocujadmin4license='.$this->internalName);
			}
			// get license HTML URL
			return $adminurl;
		}

		/**
		 * Get license script
		 *
		 * @access public
		 * @param bool $acceptButton Show license accept button (true) or not (false)
		 * @return string License script
		 */
		public function getLicenseScript($acceptButton) {
			// get license script
			if (!empty($acceptButton)) {
				$st = '1';
			} else {
				$st = '0';
			}
			return 'kocujAdmin4License.showLicense('.$st.', \''.$this->licenseRandom.'\')';
		}

		/**
		 * Get license link
		 *
		 * @access public
		 * @param bool $acceptButton Show license accept button (true) or not (false)
		 * @param string $text Link text
		 * @return string License link
		 */
		public function getLicenseLink($acceptButton, $text) {
			// get license link
			$output = '<a href="#" id="kocujadmin4_licenselink_'.$this->licenseRandom.'">';
			$output .= $text;
			$output .= '</a>';
			$output .= '<script type="text/javascript">'."\n";
			$output .= '/* <![CDATA[ */'."\n";
			$output .= '(function($) {'."\n";
			$output .= '$(document).ready(function() {'."\n";
			$output .= '$("#kocujadmin4_licenselink_'.$this->licenseRandom.'").attr("href", "javascript:void(0);");'."\n";
			$output .= '$("#kocujadmin4_licenselink_'.$this->licenseRandom.'").click(function() {'."\n";
			$output .= $this->getLicenseScript(false)."\n";
			$output .= '});'."\n";
			$output .= '});'."\n";
			$output .= '}(jQuery));'."\n";
			$output .= '/* ]]> */'."\n";
			$output .= '</script>'."\n";
			// exit
			return $output;
		}

		/**
		 * Show about page
		 *
		 * @access public
		 * @param string $title Page title
		 * @param string $about About what is that page
		 * @param string $license License name
		 * @param string $author Author name
		 * @param array $parameters Additional parameters
		 * @return void
		 */
		public function showAboutPage($title, $about, $license, $author, $parameters = array()) {
			// prepare information
			$authorString = $author;
			$authorWWW = '';
			$authorFacebook = '';
			$translation = '';
			$bugsContact = '';
			if ((isset($parameters['email'])) && (!empty($parameters['email']))) {
				$authorString .= ' &lt;<a href="mailto:'.$parameters['email'].'">'.$parameters['email'].'</a>&gt;';
			}
			if ((isset($parameters['www'])) && (!empty($parameters['www']))) {
				if (is_array($parameters['www'])) {
					$authorWWW = '';
					foreach ($parameters['www'] as $www) {
						$authorWWW .= '<br /><a href="'.$www.'" rel="external">'.$www.'</a>';
					}
				} else {
					$authorWWW = '<br /><a href="'.$parameters['www'].'" rel="external">'.$parameters['www'].'</a>';
				}
			}
			if ((isset($parameters['facebook'])) && (!empty($parameters['facebook']))) {
				if ($this->appType == KocujAdminEnumAppType4::PLUGIN) {
					$authorFacebook = '<br />'.__('Support this plugin by becoming a fan on Facebook', 'kocujadmin4').': <a href="'.$parameters['facebook'].'" rel="external">'.$parameters['facebook'].'</a>';
				} else {
					$authorFacebook = '<br />'.__('Support this theme by becoming a fan on Facebook', 'kocujadmin4').': <a href="'.$parameters['facebook'].'" rel="external">'.$parameters['facebook'].'</a>';
				}
			}
			if ((isset($parameters['translationauthors'])) && (!empty($parameters['translationauthors']) && ($parameters['translationauthors'] != 'TRANSLATION_AUTHORS'))) {
				$translation = '<br /><br />'.__('Translated by', 'kocujadmin4').': '.$parameters['translationauthors'];
			}
			if ((isset($parameters['bugsmail'])) && (!empty($parameters['bugsmail']))) {
				$bugsContact = '<br /><br />'.__('Information about bugs and proposal of a new functionality please send to', 'kocujadmin4').': <a href="mailto:'.$parameters['bugsmail'].'">'.$parameters['bugsmail'].'</a>';
			}
			// show about page
			?>
				<div class="bordertitle">
					<h3><?php echo $title; ?></h3>
					<?php if (!empty($this->aboutImage)) : ?>
						<div class="kocujadmin4-about-image"></div>
					<?php endif; ?>
					<?php $this->showTableStart('about', false); ?>
						<?php
							$info = '<strong>'.$about.'</strong>
								<br /><br />
								'.__('Author', 'kocujadmin4').': '.$authorString.'
								'.$authorWWW.'
								'.$authorFacebook.'
								'.$translation.'
								<br /><br />
								'.sprintf(__('This is licensed under %s license', 'kocujadmin4'), $this->getLicenseLink(false, $license)).'
								'.$bugsContact;
							if ((isset($parameters['additional'])) && (!empty($parameters['additional']))) {
								$info .= '<br /><br />'.$parameters['additional'];
							}
							if ($this->checkThanks(true)) {
								$info .= '<br /><br /><hr />
										<div id="kocujadmin4aboutthanksdiv">
										<br />
										<div id="kocujadmin4aboutthanksinfodiv">'.sprintf(__('If you want to thanks author, please agree to send information about your website address by clicking on the button below. Click %shere%s to see more information about this procedure.', 'kocujadmin4'), '<a id="kocujadmin4aboutthanksmore" href="#">', '</a>').'</div>
										<input type="button" class="button" value="'.__('Send information about this website address to author', 'kocujadmin4').'" id="kocujadmin4aboutthanksconfirm" />
										<div id="kocujadmin4aboutthankstextdiv" style="display: none;">&nbsp;</div>
									</div>
								';
							}
							$this->blockHelper('', 'statictext', $info);
						?>
					<?php $this->showTableEnd(); ?>
				</div>
			<?php
		}

		/**
		 * Check if thanks should be displayed
		 *
		 * @access private
		 * @param bool $inAbout Information about thanks in about screen (true) or not (false) - default: false
		 * @return bool Thanks should be displayed (true) or not (false)
		 */
		private function checkThanks($inAbout = false) {
			// check if thanks are supported
			if (empty($this->thanksOption)) {
				return false;
			}
			// check page permission
			if (($this->checkPagePermission()) || ((!$this->checkPagePermission()) && ($this->thanksPlace == KocujAdminEnumThanksPlaces4::ALL) && (empty($inAbout)))) {
				// check thanks option
				$option = get_option($this->thanksOption);
				if (!empty($option)) {
					if (empty($inAbout)) {
						return false;
					} else {
						if ($option == 'send') {
							return false;
						}
					}
				}
				// check if it is time fo show thanks
				if ((empty($inAbout)) && ($this->thanksDaysDelay > 0)) {
					$startDate = get_option($this->thanksOption.'_date');
					$date1 = strtotime($startDate.' 00:00:00');
					$date2 = strtotime(date('Y-m-d').' 23:59:59');
					$days = (int)(($date2-$date1)/86400);
					if ($days >= $this->thanksDaysDelay) {
						return true;
					} else {
						return false;
					}
				}
				// exit
				return true;
			}
			// exit
			return false;
		}

		/**
		 * Check if thanks scripts should be displayed
		 *
		 * @access private
		 * @return bool Thanks scripts should be displayed (true) or not (false)
		 */
		private function checkThanksScripts() {
			// check if thanks are supported
			if (empty($this->thanksOption)) {
				return false;
			}
			// check page permission
			if ($this->checkPagePermission()) {
				return true;
			}
			// check thanks information
			return $this->checkThanks();
		}

		/**
		 * Get text with websites where thanks information will be used
		 *
		 * @access private
		 * @return string Text with websites
		 */
		private function getThanksWebsitesText() {
			// initialize
			$output = 'kocuj.pl';
			// get other websites
			if (!empty($this->thanksWebsites)) {
				$loopCount = count($this->thanksWebsites);
				for ($z=0; $z<$loopCount; $z++) {
					if ($z < $loopCount-1) {
						$output .= ', ';
					} else {
						$output .= ' '.__('and', 'kocujadmin4').' ';
					}
					$output .= $this->thanksWebsites[$z];
				}
			}
			// exit
			return $output;
		}

		/**
		 * Get minimal full supported version
		 *
		 * @access private
		 * @param string &$text Output text with minimal full supported version to display
		 * @return int Minimal full supported version
		 */
		private function getMinimalFullSupportedVersion(&$text) {
			// check if version should be bigger
			if (((!empty($this->quickTag)) || (!empty($this->mcePluginJS)) || (!empty($this->mceButton))) && (!empty($this->minimalFullSupportedVersion)) && (version_compare($this->minimalFullSupportedVersion, '3.5.0', '<'))) {
				$this->minimalFullSupportedVersion = '3.5.0';
			}
			// optionally remove last number for displaying minimal version
			if (!empty($this->minimalFullSupportedVersion)) {
				$div = explode('.', $this->minimalFullSupportedVersion);
				if (count($div) == 3) {
					unset($div[2]);
					$this->minimalFullSupportedVersionDisplay = implode('.', $div);
				}
			}
			// set output text
			$text = $this->minimalFullSupportedVersionDisplay;
			// exit
			return $this->minimalFullSupportedVersion;
		}

		/**
		 * Add controller
		 *
		 * @access protected
		 * @param string $name Controller name
		 * @param string $function Callback method name - must be in this or child class
		 * @param string $text Text to display after executing controller
		 * @return void
		 */
		protected function addController($name, $function, $text) {
			// add controller
			$this->controller[$name] = array(array($this, $function), $text);
		}

		/**
		 * Add input helper
		 *
		 * @access protected
		 * @param string $type Input helper type
		 * @param string $function Callback method name - must be in this or child class
		 * @param string $checkBlockHelperFunction Callback method name for checking block helper loop - must be in this or child class - default: null
		 * @return void
		 */
		protected function addInputHelper($type, $function, $checkBlockHelperLoopFunction = null) {
			// prepare callbacks
			if (!empty($checkBlockHelperLoopFunction)) {
				$checkBlockHelperLoopFunctionCallback = array($this, $checkBlockHelperLoopFunction);
			} else {
				$checkBlockHelperLoopFunctionCallback = null;
			}
			// add input helper
			$this->inputHelper[$type] = array(array($this, $function), $checkBlockHelperLoopFunctionCallback);
		}

		/**
		 * Add quick tag for HTML editor
		 *
		 * @access protected
		 * @param string $name Button name
		 * @param string $display Button HTML value
		 * @param string $arg1 Tag begin
		 * @param string $arg2 Tag end
		 * @param string $accessKey Button access key
		 * @param string $title Button title
		 * @param int $priority Priority
		 * @return void
		 */
		protected function addQuickTag($name, $display, $arg1, $arg2, $accessKey, $title, $priority = null) {
			// add quick tag for HTML editor
			$this->quickTag[$name] = array($display, $arg1, $arg2, $accessKey, $title, $priority);
		}

		/**
		 * Add TinyMCE editor plugin JavaScript file
		 *
		 * @access protected
		 * @param string $filename Plugin filename
		 * @param string $filenameLang Filename with plugin translations - default: empty
		 * @return void
		 */
		protected function addMCEPluginJS($filename, $filenameLang = '') {
			// add TinyMCE editor plugin JavaScript file
			$this->mcePluginJS[] = array($filename, $filenameLang);
		}

		/**
		 * Add TinyMCE editor buttons
		 *
		 * @access protected
		 * @param string $name Button name
		 * @return void
		 */
		protected function addMCEButton($name) {
			// add TinyMCE editor buttons
			$this->mceButton[] = $name;
		}

		/**
		 * Add settings menu
		 *
		 * @access protected
		 * @param string $title Menu title
		 * @param string $capability Capabilities required for access to this menu
		 * @param string $id Menu id
		 * @param string $function Callback function or method name - can be global function or method from any class
		 * @param string $parentId Parent menu id - default: empty
		 * @param string $icon Menu icon - only for parent menu - default: empty
		 * @return void
		 */
		protected function addSettingsMenu($title, $capability, $id, $function, $parentId = '', $icon = '') {
			// add settings menu
			$this->settingsMenu[] = array($title, $capability, $id, $function, $parentId, $icon);
			$this->addPageName($id);
		}

		/**
		 * Add theme menu
		 *
		 * @access protected
		 * @param string $title Menu title
		 * @param string $capability Capabilities required for access to this menu
		 * @param string $id Menu id
		 * @param string $function Callback function or method name - can be global function or method from any class
		 * @return void
		 */
		protected function addThemeMenu($title, $capability, $id, $function) {
			// add theme menu
			$this->themeMenu[] = array($title, $capability, $id, $function);
			$this->addPageName($id);
		}

		/**
		 * Add meta box
		 *
		 * @access protected
		 * @param string $id Meta box id
		 * @param string $title Meta box title
		 * @param array $places Places with this meta box, for example, "post" or "page"
		 * @param string $context Part of page with meta box, for example, "normal"
		 * @param string $priority Priority of meta box, for example, "default"
		 * @param string $functionShow Callback method name for show meta box - must be in this or child class
		 * @param string $functionUpdate Callback method name for update meta box - must be in this or child class
		 * @param array $metaKeys Meta keys to update - default: empty
		 * @param array $metaKeysCheckbox Meta keys with checkbox value to update - default: empty
		 * @return void
		 */
		protected function addMetaBox($id, $title, $places, $context, $priority, $functionShow, $functionUpdate, $metaKeys = array(),
			$metaKeysCheckbox = array()) {
			// add meta box
			$this->metaBox[] = array($id, $title, $places, $context, $priority, $id.'_'.md5($id), array($this, $functionShow),
				array($this, $functionUpdate), $metaKeys, $metaKeysCheckbox);
		}

		/**
		 * Add page name
		 *
		 * @access protected
		 * @param string $name Page name
		 * @return void
		 */
		protected function addPageName($name) {
			// add page name
			if (array_search($name, $this->pageNames) === false) {
				$this->pageNames[] = $name;
			}
		}

		/**
		 * Register tabs container
		 *
		 * @access protected
		 * @param string $name Container name
		 * @param int &$containerId Return container id
		 * @return bool Status - true or false
		 */
		protected function registerTabsContainer($name, &$containerId) {
			// check if container with the selected name does not exists
			if (array_search($name, $this->tabsContainers) !== false) {
				return false;
			}
			// add container
			$pos = count($this->tabsContainers);
			$this->tabsContainers[$pos] = $name;
			// show initialization script
			?>
				<script type="text/javascript">
				/* <![CDATA[ */
					(function($) {
						$(function() {
							$("#<?php echo $name; ?>_tabs").tabs();
						});
					}(jQuery));
				/* ]]> */
				</script>
			<?php
			// set container id
			$containerId = $pos;
			// exit
			return true;
		}

		/**
		 * Register tab
		 *
		 * @access protected
		 * @param int $containerId Container id
		 * @param string $title Tab title
		 * @param int &$tabId Return tab id
		 * @return bool Status - true or false
		 */
		protected function registerTab($containerId, $title, &$tabId) {
			// check if container exists
			if ((!isset($this->tabsContainers[$containerId])) || (empty($title))) {
				return false;
			}
			// add tab
			$pos = count($this->tabs);
			$this->tabs[$pos] = array();
			$this->tabs[$pos]['CONTAINERID'] = $containerId;
			$this->tabs[$pos]['TITLE'] = $title;
			// set tab id
			$tabId = $pos;
			// exit
			return true;
		}

		/**
		 * Show form start
		 *
		 * @access protected
		 * @return bool Status - true or false
		 */
		protected function showFormStart() {
			// show form start
			echo '<form method="post" action="#" name="'.$this->formName.'" id="'.$this->formName.'">';
			// set nonce
			wp_nonce_field($this->nonceAction, $this->formName.'_'.md5($this->formName));
			// set form to start
			$this->formStarted = true;
			// exit
			return true;
		}

		/**
		 * Show form end
		 *
		 * @access protected
		 * @return bool Status - true or false
		 */
		protected function showFormEnd() {
			// check if form has started
			if (empty($this->formStarted)) {
				return false;
			}
			// show form end
			echo '</form>';
			// set form to end
			$this->formStarted = false;
			// exit
			return true;
		}

		/**
		 * Show tabs container start
		 *
		 * @access protected
		 * @param int $containerId Container id
		 * @return bool Status - true or false
		 */
		protected function showTabsContainerStart($containerId) {
			// check if container exists
			if (!isset($this->tabsContainers[$containerId])) {
				return false;
			}
			// show container start
			echo '<div id="'.$this->tabsContainers[$containerId].'_tabs">';
			// show tabs
			$ul = false;
			if (!empty($this->tabs)) {
				foreach ($this->tabs as $key => $tab) {
					if ($tab['CONTAINERID'] == $containerId) {
						if (empty($ul)) {
							echo '<ul>';
							$ul = true;
						}
						echo '<li><a href="#'.$this->tabsContainers[$containerId].'-'.$key.'">'.$tab['TITLE'].'</a></li>';
					}
				}
			}
			if (!empty($ul)) {
				echo '</ul>';
			}
			// set tabs container to start
			$this->tabsContainerStarted = true;
			// exit
			return true;
		}

		/**
		 * Show tabs container end
		 *
		 * @access protected
		 * @return bool Status - true or false
		 */
		protected function showTabsContainerEnd() {
			// check if container has started
			if (empty($this->tabsContainerStarted)) {
				return false;
			}
			// show container end
			echo '</div>';
			// set tabs container to end
			$this->tabsContainerStarted = false;
			// exit
			return true;
		}

		/**
		 * Show tab start
		 *
		 * @access protected
		 * @param int $tabId Tab id
		 * @return bool Status - true or false
		 */
		protected function showTabStart($tabId) {
			// check if tab exists
			if (!isset($this->tabs[$tabId])) {
				return false;
			}
			// check if tab has not started
			if (!empty($this->tabStarted)) {
				return false;
			}
			// show tab start
			echo '<div id="'.$this->tabsContainers[$this->tabs[$tabId]['CONTAINERID']].'-'.$tabId.'">';
			// set tab to start
			$this->tabStarted = true;
			// exit
			return true;
		}

		/**
		 * Show tab end
		 *
		 * @access protected
		 * @return bool Status - true or false
		 */
		protected function showTabEnd() {
			// check if tab has started
			if (empty($this->tabStarted)) {
				return false;
			}
			// show tab end
			echo '</div>';
			// set tab to end
			$this->tabStarted = false;
			// exit
			return true;
		}

		/**
		 * Show table start
		 *
		 * @access protected
		 * @param string $id Table id
		 * @param bool $showMinimalFullSupportedVersionInfo Show if WordPress version is lower than minimal full supported version (true) or not (false)
		 * @return bool Status - true or false
		 */
		protected function showTableStart($id, $showMinimalFullSupportedVersionInfo = true) {
			// check if table has not started
			if (!empty($this->tableStarted)) {
				return false;
			}
			// show table start
			if (empty($id)) {
				$id = time().rand(1111, 9999);
			}
			echo '<table id="admin_form_'.$id.'" class="form-table kocujadmin4-form-table"><tbody>';
			echo '<tr style="height: 1px;">';
			echo '<td class="kocujadmin4-label" style="width: 300px; height: 1px; line-height: 1px; margin: 0px; padding: 0px;">&nbsp;</td>';
			echo '<td class="kocujadmin4-content" style="height: 1px; line-height: 1px; margin: 0px; padding: 0px;">&nbsp;</td>';
			echo '</tr>';
			// optionally show information about not fully supported version
			global $wp_version;
			$minimalVersion = $this->getMinimalFullSupportedVersion($versionDisplay);
			if ((!empty($showMinimalFullSupportedVersionInfo)) && (!empty($minimalVersion)) &&
				(version_compare($wp_version, $minimalVersion, '<'))) {
				$this->blockHelper('', 'statictext', sprintf('<em>'.__('You are using WordPress version below %s. Some options are hidden and some functionality is not available. It will be activated when you will update WordPress to - at least - %s version.', 'kocujadmin4').'</em><br /><br /><hr />', $versionDisplay, $versionDisplay));
			}
			// set tab to end
			$this->tableStarted = true;
			// exit
			return true;
		}

		/**
		 * Show table end
		 *
		 * @access protected
		 * @return bool Status - true or false
		 */
		protected function showTableEnd() {
			// check if table has started
			if (empty($this->tableStarted)) {
				return false;
			}
			// show table start
			echo '</tbody></table>';
			// set tab to end
			$this->tableStarted = false;
			// exit
			return true;
		}

		/**
		 * Get $_SERVER['SCRIPT_URL'] or guess it if there is any
		 *
		 * @access private
		 * @return string Script URL
		 */
		private function getScriptURL() {
			// initialize
			$scriptURL = '';
			$update = false;
			// get script URL
			if ((isset($_SERVER['SCRIPT_URL'])) && (!empty($_SERVER['SCRIPT_URL']))) {
				$scriptURL = $_SERVER['SCRIPT_URL'];
			} else {
				if ((isset($_SERVER['REDIRECT_URL'])) && (!empty($_SERVER['REDIRECT_URL']))) {
					$scriptURL = $_SERVER['REDIRECT_URL'];
					$update = true;
				} else {
					if ((isset($_SERVER['REQUEST_URI'])) && (!empty($_SERVER['REQUEST_URI']))) {
						$path = parse_url($_SERVER['REQUEST_URI']);
						$scriptURL = $path['path'];
						$update = true;
					}
				}
			}
			// save script URL value
			if (!empty($update)) {
				$_SERVER['SCRIPT_URL'] = $scriptURL;
			}
			// exit
			return $scriptURL;
		}

		/**
		 * Check if this page has permission
		 *
		 * @access private
		 * @return bool Permission (true) or not (false)
		 */
		private function checkPagePermission() {
			// check page
			if ((isset($_GET['page'])) && (!empty($this->pageNames))) {
				foreach ($this->pageNames as $pageName) {
					if (substr($_GET['page'], strlen($_GET['page'])-strlen($pageName), strlen($pageName)) == $pageName) {
						return true;
					}
				}
			}
			// exit
			return false;
		}

		/**
		 * Check if license should be displayed
		 *
		 * @access private
		 * @return bool License should be displayed (true) or not (false)
		 */
		private function checkLicenseDisplay() {
			// check if license exists
			if (empty($this->licenseOption)) {
				return false;
			}
			// check if license should be displayed
			if ($this->licenseForce != KocujAdminEnumLicensePlace4::NONE) {
				$display = true;
				if ($this->licenseForce != KocujAdminEnumLicensePlace4::ALL) {
					$url = $this->getScriptURL();
					if (empty($url)) {
						return false;
					} else {
						$div = explode('/', $url);
						if (count($div) == 0) {
							return false;
						} else {
							$url = $div[count($div)-1];
							$display = false;
							if (($this->licenseForce == KocujAdminEnumLicensePlace4::PLUGINS) && ($url == 'plugins.php')) {
								$display = true;
							}
							if (($this->licenseForce == KocujAdminEnumLicensePlace4::THEMES) && ($url == 'themes.php') &&
								(((!isset($_GET)) || (empty($_GET))))) {
								$display = true;
							}
							if ($this->checkPagePermission()) {
								$display = true;
							}
						}
					}
				}
				if (!empty($display)) {
					$option = get_option($this->licenseOption);
					if (empty($option)) {
						return true;
					}
				}
			}
			// exit
			return false;
		}

		/**
		 * Get input helper
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $type Field type
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tooltip Tooltip text - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function getInputHelper($var, $type, $description = '', $value = '', $selected = '', $checked = false, $tooltip = '',
			$isArray = false, $eventOnChange = '') {
			// check parameters
			if (!isset($this->inputHelper[$type])) {
				return '';
			}
			// initialize
			$output = '';
			// optionally divide tooltip
			if (!empty($tooltip)) {
				$tooltip = str_replace('"', '`', $tooltip);
			}
			// show input field
			$tip = '';
			if (!empty($tooltip)) {
				$tip = 'title="'.$tooltip.'"';
			}
			$output .= "\n";
			// call method
			$output .= call_user_func_array($this->inputHelper[$type][0], array($var, $description, $value, $selected, $checked, $tip, $isArray, $eventOnChange));
			// exit
			return $output;
		}

		/**
		 * Show input helper
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $type Field type
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tooltip Tooltip text - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return void
		 */
		public function inputHelper($var, $type, $description = '', $value = '', $selected = '', $checked = false, $tooltip = '',
			$isArray = false, $eventOnChange = '') {
			// show input helper
			echo $this->getInputHelper($var, $type, $description, $value, $selected, $checked, $tooltip, $isArray, $eventOnChange);
		}

		/**
		 * Get input helper - hidden
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperHidden($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// prepare onChange event
			$change = '';
			if (!empty($eventOnChange)) {
				$change = 'onchange="'.$eventOnChange.'"';
			}
			// prepare id
			$idst = ' id="'.$var.'"';
			if (strpos($var, '[]') !== false) {
				$idst = '';
			}
			// get input helper
			return '<input name="'.$var.'"'.$idst.' type="hidden" value="'.$value.'" '.$change.' />';
		}

		/**
		 * Get input helper - text
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperText($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// prepare onChange event
			$change = '';
			if (!empty($eventOnChange)) {
				$change = 'onchange="'.$eventOnChange.'"';
			}
			// prepare id
			$idst = ' id="'.$var.'"';
			if (strpos($var, '[]') !== false) {
				$idst = '';
			}
			// get input helper
			return '<input name="'.$var.'"'.$idst.' type="text" value="'.htmlspecialchars($value).'" style="width: 300px;" '.$tip.' '.$change.' />';
		}

		/**
		 * Get input helper - textarea
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperTextarea($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// prepare onChange event
			$change = '';
			if (!empty($eventOnChange)) {
				$change = 'onchange="'.$eventOnChange.'"';
			}
			// prepare id
			$idst = ' id="'.$var.'"';
			if (strpos($var, '[]') !== false) {
				$idst = '';
			}
			// get input helper
			return '<textarea name="'.$var.'"'.$idst.' rows="15" cols="" style="width: 300px; resize: none;" '.$tip.' '.$change.'>'.htmlspecialchars($value).'</textarea>';
		}

		/**
		 * Get input helper - checkbox
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperCheckbox($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// prepare onChange event
			$change = '';
			if (!empty($eventOnChange)) {
				$change = 'onchange="'.$eventOnChange.'"';
			}
			// prepare checked
			$extra = '';
			if (!empty($checked)) {
				$extra = 'checked="checked"';
			}
			// prepare id
			$idst = ' id="'.$var.'"';
			if (strpos($var, '[]') !== false) {
				$idst = '';
			}
			// get input helper
			return '<input name="'.$var.'"'.$idst.' type="checkbox" value="'.$value.'" style="border-width: 0px;" '.$extra.' '.$tip.' '.$change.' />';
		}

		/**
		 * Get input helper - select
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperSelect($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// prepare onChange event
			$change = '';
			if (!empty($eventOnChange)) {
				$change = 'onchange="'.$eventOnChange.'"';
			}
			// prepare id
			$idst = ' id="'.$var.'"';
			if (strpos($var, '[]') !== false) {
				$idst = '';
			}
			// get input helper
			return '<select name="'.$var.'"'.$idst.' style="width: 300px;" '.$tip.' '.$change.' >';
		}

		/**
		 * Get input helper - select_end
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperSelectEnd($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// get input helper
			return '</select>';
		}

		/**
		 * Get input helper - option
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperOption($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// get input helper
			$extra = '';
			if ($selected == $value) {
				$extra = 'selected="selected"';
			}
			return '<option value="'.htmlspecialchars($value).'" '.$extra.' >'.$description.'</option>';
		}

		/**
		 * Get input helper - selectmenu
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperSelectmenu($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// get menus
			$menus = get_terms('nav_menu');
			// get input helper
			$output = $this->inputHelperSelect($var, $description, $value, $selected, $checked, $tip, false, $eventOnChange);
			if (!empty($isArray)) {
				$output .= $this->inputHelperOption($var, '----', '', $selected, $checked, $tip, false, $eventOnChange);
			}
			if (!empty($menus)) {
				foreach ($menus as $menu) {
					$output .= $this->inputHelperOption($var, $menu->name, $menu->term_id, $selected, $checked, $tip, false, $eventOnChange);
				}
			}
			$output .= $this->inputHelperSelectEnd($var, $description, $value, $selected, $checked, $tip, false, $eventOnChange);
			// exit
			return $output;
		}

		/**
		 * Get input helper - submit
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperSubmit($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// get input helper
			$output = '<input name="'.$var.'" id="'.$var.'" type="button" class="button-primary" value="'.$value.'" '.$tip.' />';
			$output .= '<script type="text/javascript">'."\n";
			$output .= '/* <![CDATA[ */'."\n";
			$output .= '(function($) {'."\n";
			$output .= '$(document).ready(function() {'."\n";
			$output .= '$("#'.$var.'").attr("href", "javascript:void(0);");'."\n";
			$output .= '$("#'.$var.'").click(function() {'."\n";
			$output .= '$("#action").val("save");'."\n";
			$output .= '$("#'.$this->formName.'").submit();'."\n";
			$output .= '});'."\n";
			$output .= '});'."\n";
			$output .= '}(jQuery));'."\n";
			$output .= '/* ]]> */'."\n";
			$output .= '</script>'."\n";
			// exit
			return $output;
		}

		/**
		 * Get input helper - reset
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperReset($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// get input helper
			$output = '<input name="'.$var.'" id="'.$var.'" type="button" class="button" value="'.$value.'" '.$tip.' />';
			$output .= '<script type="text/javascript">'."\n";
			$output .= '/* <![CDATA[ */'."\n";
			$output .= '(function($) {'."\n";
			$output .= '$(document).ready(function() {'."\n";
			$output .= '$("#'.$var.'").attr("href", "javascript:void(0);");'."\n";
			$output .= '$("#'.$var.'").click(function() {'."\n";
			$output .= 'if (confirm(\''.__('Are you sure do you want to restore default settings?', 'kocujadmin4').'\')) {'."\n";
			$output .= '$("#action").val("reset");'."\n";
			$output .= '$("#'.$this->formName.'").submit();'."\n";
			$output .= '}'."\n";
			$output .= '});'."\n";
			$output .= '});'."\n";
			$output .= '}(jQuery));'."\n";
			$output .= '/* ]]> */'."\n";
			$output .= '</script>'."\n";
			// exit
			return $output;
		}

		/**
		 * Get input helper - uninstall
		 *
		 * @access public
		 * @param string $var Field name
		 * @param string $description Field description - default: empty
		 * @param string $value Field value - default: empty
		 * @param string $selected Selected field - default: empty
		 * @param bool $checked Checked field - default: false
		 * @param string $tip Event for mouseover displaying tooltip - default: empty
		 * @param bool $isArray Option is array - default: false
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string Input helper
		 */
		public function inputHelperUninstall($var, $description = '', $value = '', $selected = '', $checked = false, $tip = '',
			$isArray = false, $eventOnChange = '') {
			// get input helper
			$output = '<input name="'.$var.'" id="'.$var.'" type="button" class="button" value="'.$value.'" '.$tip.' />';
			$output .= '<script type="text/javascript">'."\n";
			$output .= '/* <![CDATA[ */'."\n";
			$output .= '(function($) {'."\n";
			$output .= '$(document).ready(function() {'."\n";
			$output .= '$("#'.$var.'").attr("href", "javascript:void(0);");'."\n";
			$output .= '$("#'.$var.'").click(function() {'."\n";
			$output .= 'if (confirm(\''.__('Are you sure do you want to uninstall settings?', 'kocujadmin4').'\')) {'."\n";
			$output .= '$("#action").val("uninstall");'."\n";
			$output .= '$("#'.$this->formName.'").submit();'."\n";
			$output .= '}'."\n";
			$output .= '});'."\n";
			$output .= '});'."\n";
			$output .= '}(jQuery));'."\n";
			$output .= '/* ]]> */'."\n";
			$output .= '</script>'."\n";
			// exit
			return $output;
		}

		/**
		 * Check block helper loop
		 *
		 * @access public
		 * @param any $value Option value
		 * @param int $position Position in loop
		 * @param int $loopCount Loop count
		 * @return bool Allow to display in loop (true) or not (false)
		 */
		public function checkBlockHelperLoopSelectmenu($value, $position, $loopCount) {
			// check if it is not empty position
			if ((function_exists('wp_get_nav_menu_object')) && (!wp_get_nav_menu_object($value)) && ($position < $loopCount-1)) {
				return false;
			}
			// exit
			return true;
		}

		/**
		 * Get block helper
		 *
		 * @access public
		 * @param string $id Configuration id
		 * @param string $type Field type
		 * @param string $tooltip Tooltip text or, if $type is "statictext", text to show - default: empty
		 * @param array $options Options for select - default: empty arraz
		 * @param string $additionalLabel Additional label text - default: empty
		 * @param string $additional Additional text - default: empty
		 * @param bool $showLabel Show label (true) or not (false) - default: true
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return string
		 */
		public function getBlockHelper($id, $type, $tooltip = '', $options = array(), $additionalLabel = '', $additional = '', $showLabel = true,
			$eventOnChange = '') {
			// initialize
			$output = '';
			// check if type exists
			if (($type != 'submittext') && ($type != 'statictext') && (!isset($this->inputHelper[$type]))) {
				return '';
			}
			// get configuration value
			$value = $this->configClass->getOption($id);
			// prepare values
			$array = $this->configClass->checkOptionArray($id);
			$arrayText = '';
			if (empty($array)) {
				$tmp = $value;
				$value = array();
				$value[0] = $tmp;
			} else {
				$arrayText = '[]';
				$value[count($value)] = '';
			}
			// get images sizes
			if (($this->configClass->checkOptionArrayReorganized($id)) && (!empty($this->arrowUpImage)) && (!empty($this->arrowDownImage))) {
				if ((empty($this->arrowUpImageWidth)) && (empty($this->arrowUpImageHeight))) {
					$size = getimagesize($this->imagesDir.'/'.$this->arrowUpImage);
					if (!empty($size)) {
						$this->arrowUpImageWidth = $size[0];
						$this->arrowUpImageHeight = $size[1];
					}
				}
				if ((empty($this->arrowDownImageWidth)) && (empty($this->arrowDownImageHeight))) {
					$size = getimagesize($this->imagesDir.'/'.$this->arrowDownImage);
					if (!empty($size)) {
						$this->arrowDownImageWidth = $size[0];
						$this->arrowDownImageHeight = $size[1];
					}
				}
			}
			if (!empty($this->closeImage)) {
				if ((empty($this->closeImageWidth)) && (empty($this->closeImageHeight))) {
					$size = getimagesize($this->imagesDir.'/'.$this->closeImage);
					if (!empty($size)) {
						$this->closeImageWidth = $size[0];
						$this->closeImageHeight = $size[1];
					}
				}
			}
			// show block
			$labelDisplayed = false;
			$orderString = '';
			$label = '';
			$loopCount = count($value);
			for ($z=0; $z<$loopCount; $z++) {
				// check if display this position
				if ((!empty($this->inputHelper[$type][1])) && (isset($value[$z]))) {
					$check = call_user_func_array($this->inputHelper[$type][1], array($value[$z], $z, $loopCount));
				} else {
					$check = true;
				}
				if (!empty($check)) {
					// prepare values
					$checked = false;
					$selected = '';
					if ($type == 'checkbox') {
						$checked = $value[$z];
						$value[$z] = '1';
					}
					if (($type == 'select') || ($type == 'selectmenu')) {
						$checked = '';
						if (isset($value[$z])) {
							$selected = $value[$z];
						} else {
							$selected = '';
						}
					}
					$labeladd = '';
					if (!empty($additionalLabel)) {
						$labeladd = '<br />'.$additionalLabel;
					}
					// prepare block id
					$blockId = 0;
					if (isset($this->blockHelperId[$id])) {
						$this->blockHelperId[$id]++;
						$blockId = $this->blockHelperId[$id];
					}
					$blockIdNr = $blockId;
					if (!empty($blockId)) {
						$blockId = $id.'_'.$blockId;
					} else {
						$blockId = $id;
					}
					if (!isset($this->blockHelperId[$id])) {
						$this->blockHelperId[$id] = 0;
					}
					// get block
					if (($type == 'statictext') || ($type == 'submittext')) {
						$output .= '<tr id="kocujadmin4_field_'.$blockId.'">';
						$st = '';
						if ($type == 'statictext') {
							$st = ' static';
						}
						if ($type == 'submittext') {
							$st = ' submit';
						}
						$output .= '<td class="kocujadmin4-'.$type.$st.'" colspan="2">';
						$output .= $tooltip;
						$output .= '</td>';
						$output .= '</tr>';
					} else {
						$output .= '<tr id="kocujadmin4_field_'.$blockId.'">';
						$output .= '<td class="kocujadmin4-label" id="kocujadmin4_field_label_'.$blockId.'">';
						if ((!empty($showLabel)) && (!$labelDisplayed)) {
							if (empty($arrayText)) {
								$output .= '<label for="set_'.$id.'">';
							}
							$label = $this->configClass->getOptionLabel($id).$labeladd;
							$output .= $label;
							if (empty($arrayText)) {
								$output .= '</label>';
							}
							$labelDisplayed = true;
						} else {
							$output .= '&nbsp;';
						}
						$output .= '</td>';
						$output .= '<td class="kocujadmin4-content">';
						$fragment = '';
						if (isset($value[$z])) {
							$fragmentValue = $value[$z];
						} else {
							$fragmentValue = '';
						}
						$fragment .= $this->getInputHelper('set_'.$id.$arrayText, $type, '', $fragmentValue, $selected, $checked, $tooltip, $array,
							$eventOnChange);
						if ($type == 'select') {
							if (!empty($array)) {
								$fragment .= $this->getInputHelper('set_'.$id.$arrayText, 'option', '', '', '', false, '', false, $eventOnChange);
							}
							if (!empty($options)) {
								foreach ($options as $key => $option) {
									$fragment .= $this->getInputHelper('set_'.$id.$arrayText, 'option', $option, $key, $value[$z], false, '', false,
										$eventOnChange);
								}
							}
							$fragment .= $this->getInputHelper('set_'.$id.$arrayText, 'select_end', '', '', '', false, '', false, $eventOnChange);
						}
						if ((!empty($array)) && (!empty($this->closeImage))) {
							$leftbutton = 0;
							if (($this->configClass->checkOptionArrayReorganized($id)) && (!empty($this->arrowUpImage)) && (!empty($this->arrowDownImage))) {
								$fragment .= '<img src="'.esc_url($this->imagesURL.'/'.$this->arrowUpImage).'" alt="" id="kocujadmin4fragmentarrowup_##%%ARROW_ID%%##" style="position: absolute; margin-top: '.(12-($this->arrowUpImageWidth/2)).'px; margin-left: 2px; cursor: pointer;" />';
								$fragment .= '<img src="'.esc_url($this->imagesURL.'/'.$this->arrowDownImage).'" alt="" id="kocujadmin4fragmentarrowdown_##%%ARROW_ID%%##" style="position: absolute; margin-top: '.(12-($this->arrowDownImageWidth/2)).'px; margin-left: '.(2+$this->arrowUpImageWidth+2).'px; cursor: pointer;" />';
								$leftbutton = 2+$this->arrowUpImageWidth+2+$this->arrowDownImageWidth;
							}
							$fragment .= '<img src="'.esc_url($this->imagesURL.'/'.$this->closeImage).'" alt="" id="kocujadmin4fragmentclose_##%%CLOSE_ID%%##" style="position: absolute; margin-top: '.(12-($this->closeImageWidth/2)).'px; margin-left: '.(2+$leftbutton).'px; cursor: pointer;" />';
							$output .= str_replace('##%%CLOSE_ID%%##', $blockId, str_replace('##%%ARROW_ID%%##', $blockId, $fragment));
						} else {
							$output .= $fragment;
						}
						$lastFragmentNr = 0;
						$additionalDiv = '';
						if ($z == $loopCount-1) {
							$lastFragmentNr = $blockIdNr;
							if (!empty($additional)) {
								$additionalDiv = '<div id="kocujadmin4-additional-'.$id.'">'.$additional.'</div>';
								$output .= $additionalDiv;
							}
						}
						if ($z > 0) {
							$orderString .= ',';
						}
						$orderString .= '"'.$z.'"';
						if ((!empty($array)) && ($z == $loopCount-1)) {
							$output .= '<script type="text/javascript">'."\n";
							$output .= '/* <![CDATA[ */'."\n";
							$output .= '(function($) {'."\n";
							$output .= '$(document).ready(function() {'."\n";
							$output .= 'var kocujadmin4label_'.$id.' = \''.str_replace(array("\r\n", "\n", "\r"), '', str_replace('\'', '\\\'', $label)).'\';'."\n";
							$output .= 'var kocujadmin4fragment_'.$id.' = \''.str_replace(array("\r\n", "\n", "\r"), '', str_replace('\'', '\\\'', $fragment)).'\';'."\n";
							$output .= 'var kocujadmin4fragmenttrprefix_'.$id.' = \'kocujadmin4_field_'.$id.'\';'."\n";
							$output .= 'var kocujadmin4lastfragmenttrnr_'.$id.' = \''.$lastFragmentNr.'\';'."\n";
							if (!empty($additionalDiv)) {
								$output .= 'var kocujadmin4additionaldiv_'.$id.' = \''.str_replace(array("\r\n", "\n", "\r"), '', str_replace('\'', '\\\'', $additionalDiv)).'\';'."\n";
							}
							$output .= 'var kocujadmin4fragmentsorder_'.$id.' = new Array('.$orderString.');'."\n";
							$output .= 'function kocujadmin4_get_id_string_'.$id.'(id) {'."\n";
							$output .= 'var id = parseInt(id);'."\n";
							$output .= 'var idst = \'_\' + id;'."\n";
							$output .= 'if (id == 0) {'."\n";
							$output .= 'idst = \'\';'."\n";
							$output .= '}'."\n";
							$output .= 'return idst;'."\n";
							$output .= '}'."\n";
							$output .= 'function kocujadmin4_find_id_in_order_'.$id.'(id) {'."\n";
							$output .= 'var id = parseInt(id);'."\n";
							$output .= 'if (kocujadmin4fragmentsorder_'.$id.'.length > 0) {'."\n";
							$output .= 'for (var z=0; z<kocujadmin4fragmentsorder_'.$id.'.length; z++) {'."\n";
							$output .= 'if (parseInt(kocujadmin4fragmentsorder_'.$id.'[z]) == id) {'."\n";
							$output .= 'return z;'."\n";
							$output .= '}'."\n";
							$output .= '}'."\n";
							$output .= '}'."\n";
							$output .= 'return -1;'."\n";
							$output .= '}'."\n";
							$output .= 'function kocujadmin4_event_change_add_without_val_check_'.$id.'(event) {'."\n";
							$output .= 'kocujadmin4lastfragmenttrnr_'.$id.' = parseInt(kocujadmin4lastfragmenttrnr_'.$id.')+1;'."\n";
							$output .= 'kocujadmin4fragmentsorder_'.$id.'[kocujadmin4fragmentsorder_'.$id.'.length] = parseInt(kocujadmin4lastfragmenttrnr_'.$id.');'."\n";
							$output .= 'kocujadmin4_set_remove_events_'.$id.'();'."\n";
							if (!empty($additionalDiv)) {
								$output .= '$(\'div#kocujadmin4-additional-'.$id.'\').remove();'."\n";
							}
							if (($this->configClass->checkOptionArrayReorganized($id)) && (!empty($this->arrowUpImage)) && (!empty($this->arrowDownImage))) {
								$output .= '$(\'#kocujadmin4_empty_field_'.$id.'\').before(\'<tr id="\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.') + \'"><td class="kocujadmin4-label" id="kocujadmin4_field_label_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.') + \'">&nbsp;</td><td class="kocujadmin4-content">\' + kocujadmin4fragment_'.$id.'.replace(\'##%%ARROW_ID%%##\', \''.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.')).replace(\'##%%ARROW_ID%%##\', \''.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.')).replace(\'##%%CLOSE_ID%%##\', \''.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.')) + \''.$additionalDiv.'</td></tr>\');'."\n";
								$output .= 'kocujadmin4_set_arrows_'.$id.'();'."\n";
							} else {
								$output .= '$(\'#kocujadmin4_empty_field_'.$id.'\').before(\'<tr id="\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.') + \'"><td class="kocujadmin4-label" id="kocujadmin4_field_label_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.') + \'">&nbsp;</td><td class="kocujadmin4-content">\' + kocujadmin4fragment_'.$id.'.replace(\'##%%CLOSE_ID%%##\', \''.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.')) + \''.$additionalDiv.'</td></tr>\');'."\n";
							}
							if (!empty($this->closeImage)) {
								$output .= 'kocujadmin4_set_close_'.$id.'();'."\n";
							}
							$output .= 'if (parseInt(kocujadmin4lastfragmenttrnr_'.$id.')-1 >= 0) {'."\n";
							$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.'-1) + \' [name="set_'.$id.'[]"]\').unbind(\'change.kocujadmin4fragment\');'."\n";
							$output .= '}'."\n";
							if ($this->configClass->checkOptionArrayAddOnLastNotEmpty($id)) {
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.') + \' [name="set_'.$id.'[]"]\').bind(\'change.kocujadmin4fragment\', kocujadmin4_event_change_add_'.$id.');'."\n";
							}
							$output .= '}'."\n";
							if ($this->configClass->checkOptionArrayAddOnLastNotEmpty($id)) {
								$output .= 'function kocujadmin4_event_change_add_'.$id.'(event) {'."\n";
								$output .= 'if ($(this).val() != \'\') {'."\n";
								$output .= 'kocujadmin4_event_change_add_without_val_check_'.$id.'(event);'."\n";
								$output .= '}'."\n";
								$output .= '}'."\n";
							}
							$output .= 'function kocujadmin4_event_change_remove_without_val_check_'.$id.'(event) {'."\n";
							$output .= 'var id = parseInt(event.data.id)'."\n";
							$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(id)).remove();'."\n";
							$output .= 'var orderpos = parseInt(kocujadmin4_find_id_in_order_'.$id.'(id));'."\n";
							$output .= 'if (orderpos == 0) {'."\n";
							$output .= 'var newid = parseInt(kocujadmin4fragmentsorder_'.$id.'[1]);'."\n";
							$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(newid) + \' #kocujadmin4_field_label_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(newid)).html(kocujadmin4label_'.$id.');'."\n";
							$output .= '}'."\n";
							$output .= 'kocujadmin4fragmentsorder_'.$id.'.splice(orderpos, 1);'."\n";
							if (($this->configClass->checkOptionArrayReorganized($id)) && (!empty($this->arrowUpImage)) && (!empty($this->arrowDownImage))) {
								$output .= 'kocujadmin4_set_arrows_'.$id.'();'."\n";
							}
							if (!empty($this->closeImage)) {
								$output .= 'kocujadmin4_set_close_'.$id.'();'."\n";
							}
							$output .= '}'."\n";
							if ($this->configClass->checkOptionArrayRemoveOnEmpty($id)) {
								$output .= 'function kocujadmin4_event_change_remove_'.$id.'(event) {'."\n";
								$output .= 'if ($(this).val() == \'\') {'."\n";
								$output .= 'kocujadmin4_event_change_remove_without_val_check_'.$id.'(event);'."\n";
								$output .= '}'."\n";
								$output .= '}'."\n";
							}
							$output .= 'function kocujadmin4_set_remove_events_'.$id.'() {'."\n";
							$output .= 'if (parseInt(kocujadmin4lastfragmenttrnr_'.$id.') >= 1) {'."\n";
							$output .= 'for (var z=0; z<parseInt(kocujadmin4lastfragmenttrnr_'.$id.'); z++) {'."\n";
							$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(z) + \' [name="set_'.$id.'[]"]\').unbind(\'change.kocujadmin4fragmentremove\');'."\n";
							if ($this->configClass->checkOptionArrayRemoveOnEmpty($id)) {
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(z) + \' [name="set_'.$id.'[]"]\').bind(\'change.kocujadmin4fragmentremove\', {id: z}, kocujadmin4_event_change_remove_'.$id.');'."\n";
							}
							$output .= '}'."\n";
							$output .= '}'."\n";
							$output .= '}'."\n";
							if (!empty($this->closeImage)) {
								$output .= 'function kocujadmin4_set_close_'.$id.'() {'."\n";
								$output .= 'if (kocujadmin4fragmentsorder_'.$id.'.length > 1) {'."\n";
								$output .= 'for (var z=0; z<kocujadmin4fragmentsorder_'.$id.'.length-1; z++) {'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentclose_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).unbind(\'click.kocujadmin4close\');'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentclose_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).bind(\'click.kocujadmin4close\', {id: kocujadmin4fragmentsorder_'.$id.'[z]}, kocujadmin4_event_change_remove_without_val_check_'.$id.');'."\n";
								$output .= '}'."\n";
								$output .= 'for (var z=0; z<kocujadmin4fragmentsorder_'.$id.'.length-1; z++) {'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentclose_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).css(\'display\', \'inline\');'."\n";
								$output .= '}'."\n";
								$output .= '}'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.') + \' #kocujadmin4fragmentclose_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.')).hide();'."\n";
								$output .= '}'."\n";
							}
							if (($this->configClass->checkOptionArrayReorganized($id)) && (!empty($this->arrowUpImage)) && (!empty($this->arrowDownImage))) {
								$output .= 'function kocujadmin4_event_arrow_up_click_'.$id.'(event) {'."\n";
								$output .= 'var id = parseInt(event.data.id)'."\n";
								$output .= 'var fromid = parseInt(kocujadmin4fragmentsorder_'.$id.'[id])'."\n";
								$output .= 'var toid = parseInt(kocujadmin4fragmentsorder_'.$id.'[id-1])'."\n";
								$output .= 'if (parseInt(id-1) == 0) {'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(fromid) + \' #kocujadmin4_field_label_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(fromid)).html(kocujadmin4label_'.$id.');'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(toid) + \' #kocujadmin4_field_label_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(toid)).html(\'&nbsp;\');'."\n";
								$output .= '}'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(fromid)).insertBefore(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(toid));'."\n";
								$output .= 'var tmp = kocujadmin4fragmentsorder_'.$id.'[id];'."\n";
								$output .= 'kocujadmin4fragmentsorder_'.$id.'[id] = kocujadmin4fragmentsorder_'.$id.'[id-1];'."\n";
								$output .= 'kocujadmin4fragmentsorder_'.$id.'[id-1] = tmp;'."\n";
								$output .= 'kocujadmin4_set_arrows_'.$id.'();'."\n";
								if (!empty($this->closeImage)) {
									$output .= 'kocujadmin4_set_close_'.$id.'();'."\n";
								}
								$output .= '}'."\n";
								$output .= 'function kocujadmin4_event_arrow_down_click_'.$id.'(event) {'."\n";
								$output .= 'var id = parseInt(event.data.id)'."\n";
								$output .= 'var fromid = parseInt(kocujadmin4fragmentsorder_'.$id.'[id])'."\n";
								$output .= 'var toid = parseInt(kocujadmin4fragmentsorder_'.$id.'[id+1])'."\n";
								$output .= 'if (parseInt(id) == 0) {'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(fromid) + \' #kocujadmin4_field_label_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(fromid)).html(\'&nbsp;\');'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(toid) + \' #kocujadmin4_field_label_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(toid)).html(kocujadmin4label_'.$id.');'."\n";
								$output .= '}'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(fromid)).insertAfter(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(toid));'."\n";
								$output .= 'var tmp = kocujadmin4fragmentsorder_'.$id.'[id];'."\n";
								$output .= 'kocujadmin4fragmentsorder_'.$id.'[id] = kocujadmin4fragmentsorder_'.$id.'[id+1];'."\n";
								$output .= 'kocujadmin4fragmentsorder_'.$id.'[id+1] = tmp;'."\n";
								$output .= 'kocujadmin4_set_arrows_'.$id.'();'."\n";
								if (!empty($this->closeImage)) {
									$output .= 'kocujadmin4_set_close_'.$id.'();'."\n";
								}
								$output .= '}'."\n";
								$output .= 'function kocujadmin4_set_arrows_'.$id.'() {'."\n";
								$output .= 'for (var z=0; z<kocujadmin4fragmentsorder_'.$id.'.length-1; z++) {'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowup_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).unbind(\'click.kocujadmin4arrowup\');'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowdown_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).unbind(\'click.kocujadmin4arrowdown\');'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowup_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).bind(\'click.kocujadmin4arrowup\', {id: z}, kocujadmin4_event_arrow_up_click_'.$id.');'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowdown_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).bind(\'click.kocujadmin4arrowdown\', {id: z}, kocujadmin4_event_arrow_down_click_'.$id.');'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowup_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).css(\'display\', \'inline\');'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowdown_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).css(\'display\', \'inline\');'."\n";
								$output .= 'if (z == 0) {'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowup_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).hide();'."\n";
								$output .= '} else {'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowup_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).css(\'display\', \'inline\');'."\n";
								$output .= '}'."\n";
								$output .= 'if (z == kocujadmin4fragmentsorder_'.$id.'.length-2) {'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowdown_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).hide();'."\n";
								$output .= '} else {'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z]) + \' #kocujadmin4fragmentarrowdown_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4fragmentsorder_'.$id.'[z])).css(\'display\', \'inline\');'."\n";
								$output .= '}'."\n";
								$output .= '}'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.') + \' #kocujadmin4fragmentarrowup_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.')).hide();'."\n";
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.') + \' #kocujadmin4fragmentarrowdown_'.$id.'\' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.')).hide();'."\n";
								$output .= '}'."\n";
								$output .= 'kocujadmin4_set_arrows_'.$id.'();'."\n";
							}
							if (!empty($this->closeImage)) {
								$output .= 'kocujadmin4_set_close_'.$id.'();'."\n";
							}
							$output .= 'kocujadmin4_set_remove_events_'.$id.'();'."\n";
							if ($this->configClass->checkOptionArrayAddOnLastNotEmpty($id)) {
								$output .= '$(\'#\' + kocujadmin4fragmenttrprefix_'.$id.' + kocujadmin4_get_id_string_'.$id.'(kocujadmin4lastfragmenttrnr_'.$id.') + \' [name="set_'.$id.'[]"]\').bind(\'change.kocujadmin4fragment\', kocujadmin4_event_change_add_'.$id.');'."\n";
							}
							if ($this->configClass->checkOptionArrayAddButton($id)) {
								$output .= '$(\'#kocujadmin4_addbutton_field_'.$id.' #kocujadmin4fragmentadd_'.$id.'\').bind(\'click.kocujadmin4add\', kocujadmin4_event_change_add_without_val_check_'.$id.');'."\n";
							}
							$output .= '});'."\n";
							$output .= '}(jQuery));'."\n";
							$output .= '/* ]]> */'."\n";
							$output .= '</script>'."\n";
						}
						$output .= '</td>';
						$output .= '</tr>';
					}
				}
			}
			// optionally add empty element
			if (!empty($array)) {
				$output .= '<tr id="kocujadmin4_empty_field_'.$id.'" style="display: none;">';
				$output .= '<td colspan="2">';
				$output .= '</td>';
				$output .= '</tr>';
			}
			// optionally add adding button
			if ((!empty($array)) && ($this->configClass->checkOptionArrayAddButton($id))) {
				$output .= '<tr id="kocujadmin4_addbutton_field_'.$id.'">';
				$output .= '<td class="kocujadmin4-label">';
				$output .= '&nbsp;';
				$output .= '</td>';
				$output .= '<td class="kocujadmin4-content">';
				$output .= '<input id="kocujadmin4fragmentadd_'.$id.'" type="button" class="button" value="'.__('add new element', 'kocujadmin4').'" />';
				$output .= '</td>';
				$output .= '</tr>';
			}
			// exit
			return $output;
		}

		/**
		 * Show block helper
		 *
		 * @access public
		 * @param string $id Configuration id
		 * @param string $type Field type
		 * @param string $tooltip Tooltip text - default: empty
		 * @param array $options Options for select - default: empty arraz
		 * @param string $additionalLabel Additional label text - default: empty
		 * @param string $additional Additional text - default: empty
		 * @param bool $showLabel Show label (true) or not (false) - default: true
		 * @param string $eventOnChange Event onChange - default: empty
		 * @return void
		 */
		public function blockHelper($id, $type, $tooltip = '', $options = array(), $additionalLabel = '', $additional = '', $showLabel = true,
			$eventOnChange = '') {
			// show block helper
			echo $this->getBlockHelper($id, $type, $tooltip, $options, $additionalLabel, $additional, $showLabel, $eventOnChange);
		}

		/**
		 * Add settings menu container
		 *
		 * @access private
		 * @param string $value Value
		 * @return int Position
		 */
		private function addSettingsMenuContainer($value) {
			// check if there is this value already
			$loopCount = count($this->settingsMenuContainer);
			for ($z=0; $z<$loopCount; $z++) {
				if ($this->settingsMenu[$this->settingsMenuContainer[$z]][3] == $this->settingsMenu[$value][3]) {
					return $z;
				}
			}
			// add new information
			$pos = count($this->settingsMenuContainer);
			$this->settingsMenuContainer[$pos] = $value;
			// exit
			return $pos;
		}

		/**
		 * Add theme menu container
		 *
		 * @access private
		 * @param string $value Value
		 * @return int Position
		 */
		private function addThemeMenuContainer($value) {
			// check if there is this value already
			$loopCount = count($this->themeMenuContainer);
			for ($z=0; $z<$loopCount; $z++) {
				if ($this->themeMenu[$this->themeMenuContainer[$z]][3] == $this->themeMenu[$value][3]) {
					return $z;
				}
			}
			// add new information
			$pos = count($this->themeMenuContainer);
			$this->themeMenuContainer[$pos] = $value;
			// exit
			return $pos;
		}

		/**
		 * Add header
		 *
		 * @access public
		 * @return void
		 */
		public function addHeader() {
			// optionally add script to open all external links in a new window
			if ($this->checkPagePermission()) {
				?>
					<script type="text/javascript">
					/* <![CDATA[ */
						(function($) {
							$(document).ready(function() {
								$('a[rel=external]').attr('target', '_blank');
							});
						}(jQuery));
					/* ]]> */
					</script>
				<?php
			}
			// optionally show thanks script settings
			if ($this->checkThanksScripts()) {
				?>
					<!--[if lte IE 7]>
					<script type="text/javascript">
					/* <![CDATA[ */
						kocujAdmin4Thanks.setIEOld();
					/* ]]> */
					</script>
					<![endif]-->
					<script type="text/javascript">
					/* <![CDATA[ */
						kocujAdmin4Thanks.setInternalName('<?php echo $this->internalName; ?>', '<?php echo $this->thanksRandom; ?>');
						(function($) {
							$(document).ready(function() {
								kocujAdmin4Thanks.setForm('<?php echo $this->thanksRandom; ?>');
							});
						}(jQuery));
					/* ]]> */
					</script>
				<?php
			}
			// show optional license window
			if ((!empty($this->licenseURL)) && (!empty($this->licenseDir)))  {
				// check if license should be displayed
				$showLicense = $this->checkLicenseDisplay();
				// optionally set license scripts
				if ((!empty($showLicense)) || ($this->checkPagePermission())) {
					?>
						<script type="text/javascript">
						/* <![CDATA[ */
							kocujAdmin4License.setURL('<?php echo $this->getLicenseHTML(); ?>', '<?php echo $this->licenseRandom; ?>');
							<?php
								$fullTitleTmp = ': '.$this->fullTitle;
								if (empty($this->fullTitle)) {
									$fullTitleTmp = '';
								}
							?>
							<?php if ($this->appType == KocujAdminEnumAppType4::PLUGIN) : ?>
								kocujAdmin4License.setName('<?php echo str_replace('\'', '\\\'', __('License for plugin', 'kocujadmin4').$fullTitleTmp); ?>', '<?php echo $this->licenseRandom; ?>');
							<?php else : ?>
								kocujAdmin4License.setName('<?php echo str_replace('\'', '\\\'', __('License fot theme', 'kocujadmin4').$fullTitleTmp); ?>', '<?php echo $this->licenseRandom; ?>');
							<?php endif; ?>
							kocujAdmin4License.setInternalName('<?php echo $this->internalName; ?>', '<?php echo $this->licenseRandom; ?>');
						/* ]]> */
						</script>
					<?php
				}
				// optionally show license
				if (!empty($showLicense)) {
					?>
						<script type="text/javascript">
						/* <![CDATA[ */
							(function($) {
								$(document).ready(function() {
									<?php echo $this->getLicenseScript(true); ?>
								});
							}(jQuery));
						/* ]]> */
						</script>
					<?php
				}
			}
			// show style
			if ($this->checkPagePermission()) {
				?>
				<style type="text/css" media="all">
				<!--
					.kocujadmin4-form-table {
						width: 100%;
					}

					.kocujadmin4-label,
					.kocujadmin4-label label {
						text-align: left;
						vertical-align: top;
						width: 300px;
						margin: 0px;
						padding: 0px;
					}

					.kocujadmin4-content {
						text-align: left;
						vertical-align: top;
						margin: 0px;
						padding: 0px;
					}

					<?php if (!empty($this->adminIcon)) : ?>
						.kocujadmin4-icon {
							background: transparent url('<?php echo $this->imagesURL.'/'.$this->adminIcon; ?>') no-repeat left top;
						}
					<?php endif; ?>

					<?php
						if (!empty($this->aboutImage)) {
							$size = getimagesize($this->imagesDir.'/'.$this->aboutImage);
							if (empty($size)) {
								$size = array();
								$size[0] = 0;
								$size[1] = 0;
							}
							?>
								.kocujadmin4-about-image {
									background: transparent url('<?php echo $this->imagesURL.'/'.$this->aboutImage; ?>') no-repeat left top;
									width: <?php echo $size[0]; ?>px;
									height: <?php echo $size[1]; ?>px;
								}
							<?php
						}
					?>
				-->
				</style>
				<?php
			}
		}

		/**
		 * Page controller
		 *
		 * @access public
		 * @return void
		 */
		public function pageController() {
			// change options
			if (($this->checkPagePermission()) && (isset($_REQUEST['action']))) {
				if (isset($this->controller[$_REQUEST['action']][0])) {
					if ((isset($_POST[$this->formName.'_'.md5($this->formName)])) && (wp_verify_nonce($_POST[$this->formName.'_'.md5($this->formName)], $this->nonceAction))) {
						$errors = call_user_func($this->controller[$_REQUEST['action']][0]);
					} else {
						$errors = __('Unknown form error.', 'kocujadmin4');
					}
					if (isset($_GET['page'])) {
						$page = $_GET['page'];
					} else {
						$page = '';
					}
					$url = $this->getScriptURL();
					$div = explode('?', $url);
					if (count($div) > 0) {
						$url = $div[0];
					}
					header('Location: '.$url.'?page='.urlencode($page).'&'.urlencode($_REQUEST['action']).'=true&errors='.urlencode($errors));
					exit();
				} else {
					_e('Wrong parameters.', 'kocujadmin4');
				}
			}
			// add settings menu
			if (($this->appType == KocujAdminEnumAppType4::PLUGIN) && (!empty($this->settingsMenu))) {
				foreach ($this->settingsMenu as $key => $menu) {
					if (empty($menu[4])) {
						$pos = $this->addSettingsMenuContainer($key);
						add_menu_page($menu[0], $menu[0], $menu[1], $menu[2], array($this, 'settingsMenu'.$this->random.'_'.$pos), $menu[5]);
					}
				}
				foreach ($this->settingsMenu as $key => $menu) {
					if (!empty($menu[4])) {
						$pos = $this->addSettingsMenuContainer($key);
						add_submenu_page($menu[4], $menu[0], $menu[0], $menu[1], $menu[2], array($this, 'settingsMenu'.$this->random.'_'.$pos));
					}
				}
			}
			// add theme menu
			if (($this->appType == KocujAdminEnumAppType4::THEME) && (!empty($this->themeMenu))) {
				foreach ($this->themeMenu as $key => $menu) {
					$pos = $this->addThemeMenuContainer($key);
					add_theme_page($menu[0], $menu[0], $menu[1], $menu[2], array($this, 'themeMenu'.$this->random.'_'.$pos));
				}
			}
		}

		/**
		 * Save controller
		 *
		 * @access public
		 * @return string Output statuc
		 */
		public function controllerSave() {
			// save options
			$errors = $this->configClass->updateOptions();
			// exit
			return $errors;
		}

		/**
		 * Reset controller
		 *
		 * @access public
		 * @return string Output statuc
		 */
		public function controllerReset() {
			// reset options
			$this->configClass->deleteOptions();
			// exit
			return '';
		}

		/**
		 * Uninstall controller
		 *
		 * @access public
		 * @return string Output statuc
		 */
		public function controllerUninstall() {
			// uninstall
			$this->configClass->uninstallOptions();
			// exit
			return '';
		}

		/**
		 * Processing output
		 *
		 * @access protected
		 * @return void
		 */
		protected function processOutput() {
			// process output
			if ($this->checkPagePermission()) {
				// get errors text
				$errors = '';
				if ((isset($_REQUEST['errors'])) && ($_REQUEST['errors'])) {
					$errors = $_REQUEST['errors'];
				}
				// show save message
				if (!empty($this->controller)) {
					foreach ($this->controller as $key => $controller) {
						if ((isset($_REQUEST[$key])) && ($_REQUEST[$key]) && (isset($this->controller[$key][1])) &&
							(!empty($this->controller[$key][1]))) {
							echo '<div id="message" class="updated fade"><p><strong>',$this->controller[$key][1],'</strong></p></div>';
						}
					}
				}
				if ((isset($_REQUEST['uninstall'])) && ($_REQUEST['uninstall'])) {
					return;
				}
				// optionally show errors
				if (!empty($errors)) {
					echo '<div id="error" class="error fade"><p>',__('There were some errors. Options with these problems have not been saved.', 'kocujadmin4'),'</p><p>',stripslashes($errors),'</p></div>';
				}
			}
		}

		/**
		 * Display thanks information
		 *
		 * @access public
		 * @return void
		 */
		public function actionDisplayThanks() {
			// optionally show box for sending thanks
			if ($this->checkThanks()) {
				if ((!$this->checkPagePermission()) && ($this->thanksPlace == KocujAdminEnumThanksPlaces4::ALL)) {
					?>
						<div id="kocujadmin4thanksmini" class="updated fade">
							<div id="kocujadmin4thanksminitextdiv">
								<p>
									<?php if (!empty($this->fullTitle)) : ?>
										<?php if ($this->appType == KocujAdminEnumAppType4::PLUGIN) : ?>
											<?php echo sprintf(__('Thank you for using plugin %s.', 'kocujadmin4'), $this->fullTitle); ?>
										<?php else : ?>
											<?php echo sprintf(__('Thank you for using theme %s.', 'kocujadmin4'), $this->fullTitle); ?>
										<?php endif; ?>
									<?php else : ?>
										<?php if ($this->appType == KocujAdminEnumAppType4::PLUGIN) : ?>
											<?php echo __('Thank you for using this plugin.', 'kocujadmin4'); ?>
										<?php else : ?>
											<?php echo __('Thank you for using this theme.', 'kocujadmin4'); ?>
										<?php endif; ?>
									<?php endif; ?>
									<?php echo ' '.__('If you want to thanks the author, please allow to send some information to him.', 'kocujadmin4').' '; ?>
									<a href="#" id="kocujadmin4thanksminimore"><?php _e('See more about it', 'kocujadmin4'); ?></a> <?php _e('or', 'kocujadmin4'); ?> <a href="#" id="kocujadmin4thanksminiclose"><?php _e('close this information', 'kocujadmin4'); ?></a>
								</p>
							</div>
						</div>
					<?php
				}
				if (($this->checkPagePermission()) || ($this->thanksPlace == KocujAdminEnumThanksPlaces4::ALL)) {
					$additional = '';
					if (!$this->checkPagePermission()) {
						$additional = ' style="display: none;"';
					}
					?>
						<div id="kocujadmin4thanks" class="updated fade"<?php echo $additional; ?>>
							<div id="kocujadmin4thankstextdiv">
								<?php if (!empty($this->fullTitle)) : ?>
									<?php if ($this->appType == KocujAdminEnumAppType4::PLUGIN) : ?>
										<p><?php echo sprintf(__('Thank you for using plugin %s.', 'kocujadmin4'), $this->fullTitle); ?></p>
									<?php else : ?>
										<p><?php echo sprintf(__('Thank you for using theme %s.', 'kocujadmin4'), $this->fullTitle); ?></p>
									<?php endif; ?>
								<?php else : ?>
									<?php if ($this->appType == KocujAdminEnumAppType4::PLUGIN) : ?>
										<p><?php echo __('Thank you for using this plugin.', 'kocujadmin4'); ?></p>
									<?php else : ?>
										<p><?php echo __('Thank you for using this theme.', 'kocujadmin4'); ?></p>
									<?php endif; ?>
								<?php endif; ?>
								<p><?php echo sprintf(__('If you want to thanks the author, please allow to send information about your website address. This will be used for statistical purposes and for adding public information about your website on the following websites: %s. Please, support this project by doing this - it is for free, so it is the best way to thanks the author for his contribution.', 'kocujadmin4'), $this->getThanksWebsitesText()); ?></p>
							</div>
							<div id="kocujadmin4thanksmorediv">
								<p><a href="#" id="kocujadmin4thanksmore"><?php _e('Show more information', 'kocujadmin4'); ?></a></p>
							</div>
							<div id="kocujadmin4thanksemptydiv">
								<p>&nbsp;</p>
							</div>
							<div id="kocujadmin4thanksoptionsdiv">
								<p><strong><a href="#" id="kocujadmin4thanksconfirm"><?php _e('Yes, I agree to thanks author by sending the described information to him', 'kocujadmin4'); ?></a></strong></p>
								<p><a href="#" id="kocujadmin4thankscancel"><?php _e('No, I do not agree to do this (this information will never show again)', 'kocujadmin4'); ?></a></p>
							</div>
						</div>
					<?php
				}
			}
		}

		/**
		 * Add meta boxes
		 *
		 * @access public
		 * @return void
		 */
		public function filterAddMetaBox() {
			// add meta boxes
			if (!empty($this->metaBox)) {
				foreach ($this->metaBox as $key => $metaBox) {
					foreach ($metaBox[2] as $place) {
						add_meta_box($metaBox[0], $metaBox[1], array($this, 'metaBox'.$this->random.'_'.$key), $place, $metaBox[3], $metaBox[4]);
					}
				}
			}
		}

		/**
		 * Show meta box
		 *
		 * @access private
		 * @param int $pos Position in metaBox array
		 * @param object $post Post
		 * @return void
		 */
		private function showMetaBox($pos, $post) {
			// get meta box data
			$data = $this->metaBox[$pos];
			// get post or page id
			if (isset($post->ID)) {
				$id = $post->ID;
			} else {
				return;
			}
			// add hidden security field
			wp_nonce_field($this->nonceAction, $data[5]);
			// show meta box
			call_user_func_array($data[6], array($id, $post));
		}

		/**
		 * Update meta box
		 *
		 * @access private
		 * @param int $id Post id
		 * @param string $metaKey Meta key
		 * @param bool $checkbox It is checkbox (true) or not (false)
		 * @return void
		 */
		private function updateMetaBox($id, $metaKey, $checkbox) {
			// get new value
			if (isset($_POST[$metaKey])) {
				$newValue = $_POST[$metaKey];
			} else {
				$newValue = '';
			}
			if (!empty($checkbox)) {
				if (empty($newValue)) {
					$newValue = '0';
				} else {
					$newValue = '1';
				}
			}
			// add or update
			$value = ThemeInternalCacheInterface::getClass()->get_post_meta($id, '_'.$metaKey, false);
			if (count($value) > 0) {
				update_post_meta($id, '_'.$metaKey, $newValue);
			} else {
				add_post_meta($id, '_'.$metaKey, $newValue);
			}
		}

		/**
		 * Saving of meta box
		 *
		 * @access public
		 * @return void
		 */
		public function filterSaveMetaBox() {
			// declare globals
			global $post;
			// get post id
			if (isset($post->ID)) {
				$id = $post->ID;
			} else {
				return;
			}
			// check if not autosave
			if ((defined('DOING_AUTOSAVE')) && (DOING_AUTOSAVE)) {
				return;
			}
			// loop
			if (!empty($this->metaBox)) {
				foreach ($this->metaBox as $metaBox) {
					// check security
					if ((isset($_POST[$metaBox[5]])) && (wp_verify_nonce($_POST[$metaBox[5]], $this->nonceAction)) &&
						(isset($_POST['post_type'])) && (array_search($_POST['post_type'], $metaBox[2]) !== false)) {
						// check permissions
						$ok = true;
						foreach ($metaBox[2] as $place) {
							$type = 'edit_page';
							if ($place == 'post') {
								$type == 'edit_post';
							}
							if (!current_user_can($type, $id)) {
								$ok = false;
								break;
							}
						}
						if (!empty($ok)) {
							// callback function for update post meta
							call_user_func_array($metaBox[7], array($id));
							// update post meta
							foreach ($metaBox[8] as $metaKey) {
								$this->updateMetaBox($id, $metaKey, false);
							}
							// update post meta with checkbox
							foreach ($metaBox[9] as $metaKey) {
								$this->updateMetaBox($id, $metaKey, true);
							}
						}
					}
				}
			}
		}

		/**
		 * Quick tags
		 *
		 * @access public
		 * @return void
		 */
		public function actionQuickTags() {
			// check if there is some quick tag
			if (empty($this->quickTag)) {
				return;
			}
			// check if script exists
			if (wp_script_is('quicktags')) {
				?>
					<script type="text/javascript">
					/* <![CDATA[ */
						<?php
							foreach ($this->quickTag as $key => $val) {
								?>
									QTags.addButton('<?php echo $key; ?>', '<?php echo $val[0]; ?>', '<?php echo $val[1]; ?>', '<?php echo $val[2]; ?>', '<?php echo $val[3]; ?>', '<?php echo $val[4]; ?>', '<?php echo $val[5]; ?>');
								<?php
							}
						?>
					/* ]]> */
					</script>
				<?php
			}
		}

		/**
		 * Register TinyMCE plugins
		 *
		 * @access public
		 * @param array $plugins Plugins
		 * @return array Plugins
		 */
		public function filterRegisterMCEPlugins($plugins) {
			// add TinyMCE plugins
			if (!empty($this->mcePluginJS)) {
				for ($z=0; $z<count($this->mcePluginJS); $z++) {
					if ($z == 0) {
						$key = $this->internalName;
					} else {
						$key = $this->internalName.'_'.$z;
					}
					$plugins[$key] = $this->javascriptTinyMCEPluginsURL.'/'.$this->mcePluginJS[$z][0];
				}
			}
			// exit
			return $plugins;
		}

		/**
		 * Register TinyMCE plugins languages
		 *
		 * @access public
		 * @param array $lang Language files
		 * @return array Language files
		 */
		public function filterRegisterMCEPluginsLang($lang) {
			// add TinyMCE plugins languages
			if (!empty($this->mcePluginJS)) {
				for ($z=0; $z<count($this->mcePluginJS); $z++) {
					if (!empty($this->mcePluginJS[$z][1])) {
						$lang[] = $this->phpTinyMCEPluginsLangDir.'/'.$this->mcePluginJS[$z][1];
					}
				}
			}
			// exit
			return $lang;
		}

		/**
		 * Register TinyMCE buttons
		 *
		 * @access public
		 * @param array $buttons Buttons
		 * @return array Buttons
		 */
		public function filterRegisterMCEButtons($buttons) {
			// add TinyMCE buttons
			if (!empty($this->mceButton)) {
				foreach ($this->mceButton as $button) {
					$buttons[] = $button;
				}
			}
			// exit
			return $buttons;
		}
	}
}

?>
