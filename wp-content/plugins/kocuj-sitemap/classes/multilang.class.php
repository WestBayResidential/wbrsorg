<?php

/**
 * multilang.class.php
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
 * Multi-language plugin class
 *
 * @access public
 */
class KocujSitemapPluginMultiLang {
	/**
	 * Singleton instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance = NULL;

	/**
	 * Classes data for multi-languages plugins
	 *
	 * @access private
	 * @var array
	 */
	private $data = array();

	/**
	 * Constructor
	 *
	 * @access private
	 * @return void
	 */
	private function __construct() {
		// set list of all multi-languages plugins classes
		$this->classes = array(
			array(
				'dir'      => KocujSitemapPlugin::getInstance()->getPluginDir().'/classes/multilang/qtranslate.class.php',
				'class'    => 'kocujsitemap_qtranslate',
				'original' => true,
			),
		);
		// get list of additional multi-languages plugins classes
		$additionalMultiLangClasses = apply_filters('kocujsitemap_additionalmultilangphpclasses', array());
		if (!empty($additionalMultiLangClasses)) {
			$ok = true;
			foreach ($additionalMultiLangClasses as $val) {
				if ((!isset($val['dir'])) || (!isset($val['class']))) {
					$ok = false;
				}
			}
			if (!empty($ok)) {
				$this->classes = array_merge($this->classes, $additionalMultiLangClasses);
				foreach ($this->classes as $key => $val) {
					$this->classes[$key]['original'] = false;
				}
			}
		}
		// load all classes
		if (!empty($this->classes)) {
			$methods = array(
				'getInstance',
				'getName',
				'getLanguages',
				'checkPluginAdmin',
				'checkPlugin',
				'beforeGetBlogName',
				'afterGetBlogName',
				'getTranslatedBlogName',
				'beforeGetHomeURL',
				'afterGetHomeURL',
				'getTranslatedHomeURL',
				'beforeGetPages',
				'afterGetPages',
				'beforeGetPageItem',
				'afterGetPageItem',
				'getTranslatedPageURL',
				'getTranslatedPageTitle',
				'beforeGetPosts',
				'afterGetPosts',
				'beforeGetPostItem',
				'afterGetPostItem',
				'getTranslatedPostURL',
				'getTranslatedPostTitle',
				'beforeGetCategories',
				'afterGetCategories',
				'beforeGetCategoryItem',
				'afterGetCategoryItem',
				'getTranslatedCategoryURL',
				'getTranslatedCategoryTitle',
				'beforeGetMenu',
				'afterGetMenu',
				'beforeGetMenuItem',
				'afterGetMenuItem',
				'getTranslatedMenuURL',
				'getTranslatedMenuTitle',
			);
			foreach ($this->classes as $key => $class) {
				$ok = false;
				if (file_exists($class['dir'])) {
					include_once $class['dir'];
					if (class_exists('KocujSitemapPluginMultiLang_'.$class['class'])) {
						$ok = true;
						eval('$instance = KocujSitemapPluginMultiLang_'.$class['class'].'::getInstance();');
						if (empty($class['original'])) {
							foreach ($methods as $method) {
								if (!method_exists($instance, $method)) {
									$ok = false;
									break;
								}
							}
						}
						if (!empty($ok)) {
							$activeAdmin = $instance->checkPluginAdmin();
							if (!empty($activeAdmin)) {
								$name = $instance->getName();
								$active = $instance->checkPlugin();
								$this->data[$key] = array(
									'instance'          => $instance,
									'active'            => $active,
									'admin_id'          => 'MultiLang_'.$class['class'],
									'admin_label'       => sprintf(__('Use %s plugin', 'kocuj-sitemap'), $name),
									'admin_description' => sprintf(__('Use %s plugin (if installed and activated) for multi-language websites; uncheck it only if you have any problems because of this setting', 'kocuj-sitemap'), $name),
								);
							} else {
								$ok = false;
							}
						}
					}
				}
				if (empty($ok)) {
					unset($this->classes[$key]);
				}
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
			self::$instance = new KocujSitemapPluginMultiLang();
		}
		// exit
		return self::$instance;
	}

	/**
	 * Process callback function for each activated plugin
	 *
	 * @access private
	 * @param string $callback Callback function
	 * @param array $parameters Callback parameters
	 * @return any Returned callback data
	 */
	private function processCallback($callback, $parameters = array()) {
		// initialize
		$output = false;
		// check if there are any plugins
		if (!empty($this->data)) {
			// plugins loop
			foreach ($this->data as $data) {
				// check if plugin exists
				if (!empty($data['active'])) {
					// check if plugin is activated in administration panel
					global $classKocujSitemapAdmin;
					$value = $classKocujSitemapAdmin->getConfigClass()->getOption($data['admin_id']);
					if (!empty($value)) {
						// prepare parameters
						$parsString = '';
						if (!empty($parameters)) {
							for ($z=0; $z<count($parameters); $z++) {
								$parameters[$z] = str_replace('\'', '\\\'', $parameters[$z]);
							}
							$parsString = '\''.implode('\',\'', $parameters).'\'';
						}
						// execute callback
						eval('$output = '.$callback.'('.$parsString.');');
					}
				}
			}
		}
		// exit
		return $output;
	}

	/**
	 * Get multi-language plugins data
	 *
	 * @access public
	 * @return array Get multi-language plugins data
	 */
	public function getData() {
		// get multi-language plugins data
		return $this->data;
	}

	/**
	 * Get all languages list
	 *
	 * @access public
	 * @return array Languages list
	 */
	public function getLanguages() {
		// initialize
		$languages = array();
		// check if there are any plugins
		if (!empty($this->data)) {
			// plugins loop
			foreach ($this->data as $data) {
				// check if plugin exists
				if (!empty($data['active'])) {
					// get languages
					$langtmp = $data['instance']->getLanguages();
					if (!empty($langtmp)) {
						foreach ($langtmp as $lang => $val) {
							if (!in_array($lang, $languages)) {
								$languages[] = $lang;
							}
						}
					}
				}
			}
		}
		// optionally set current language
		if (empty($languages)) {
			$languages[] = get_locale();
		}
		// exit
		return $languages;
	}

	/**
	 * Something to do before get blog name
	 *
	 * @access public
	 * @return void
	 */
	public function beforeGetBlogName() {
		// something to do before get blog name
		$this->processCallback('$data[\'instance\']->beforeGetBlogName', array());
	}

	/**
	 * Something to do after get blog name
	 *
	 * @access public
	 * @return void
	 */
	public function afterGetBlogName() {
		// something to do after get blog name
		$this->processCallback('$data[\'instance\']->afterGetBlogName', array());
	}

	/**
	 * Get translated blog name
	 *
	 * @access public
	 * @return string Translated blog name
	 */
	public function getTranslatedBlogName() {
		// get original blog name
		$name = KocujSitemapPluginInternalCacheInterface::getClass()->get_bloginfo('name');
		$origName = $name;
		// get translated blog name
		$name = $this->processCallback('$data[\'instance\']->getTranslatedBlogName', array(
			$origName,
		));
		if (empty($name)) {
			$name = $origName;
		}
		// exit
		return $name;
	}

	/**
	 * Something to do before get home URL
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetHomeURL($locale) {
		// something to do before get home URL
		$this->processCallback('$data[\'instance\']->beforeGetHomeURL', array(
			$locale,
		));
	}

	/**
	 * Something to do after get home URL
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetHomeURL($locale) {
		// something to do after get home URL
		$this->processCallback('$data[\'instance\']->afterGetHomeURL', array(
			$locale,
		));
	}

	/**
	 * Get translated home URL
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return string Translated home URL
	 */
	public function getTranslatedHomeURL($locale) {
		// get original home URL
		if (function_exists('get_home_url')) {
			$url = KocujSitemapPluginInternalCacheInterface::getClass()->get_home_url();
		} else {
			$url = KocujSitemapPluginInternalCacheInterface::getClass()->get_bloginfo('home');
		}
		$origURL = $url;
		// get translated home URL
		$url = $this->processCallback('$data[\'instance\']->getTranslatedHomeURL', array(
			$origURL,
			$locale,
		));
		if (empty($url)) {
			$url = $origURL;
		}
		// exit
		return $url;
	}

	/**
	 * Something to do before get pages
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetPages($locale) {
		// something to do before get pages
		$this->processCallback('$data[\'instance\']->beforeGetPages', array(
			$locale,
		));
	}

	/**
	 * Something to do after get pages
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetPages($locale) {
		// something to do after get pages
		$this->processCallback('$data[\'instance\']->afterGetPages', array(
			$locale,
		));
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
		// something to do before get page item
		$this->processCallback('$data[\'instance\']->beforeGetPageItem', array(
			$pageId,
			$locale,
		));
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
		// something to do after get page item
		$this->processCallback('$data[\'instance\']->afterGetPageItem', array(
			$pageId,
			$locale,
		));
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
		// get original page URL
		$url = $origURL;
		// get translated page URL
		$url = $this->processCallback('$data[\'instance\']->getTranslatedPageURL', array(
			$origURL,
			$pageId,
			$locale,
		));
		if (empty($url)) {
			$url = $origURL;
		}
		// exit
		return $url;
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
		// get original page title
		$title = $origTitle;
		// get translated page URL
		$title = $this->processCallback('$data[\'instance\']->getTranslatedPageTitle', array(
			$origTitle,
			$pageId,
			$locale,
		));
		if (empty($title)) {
			$title = $origTitle;
		}
		// exit
		return $title;
	}

	/**
	 * Something to do before get posts
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetPosts($locale) {
		// something to do before get posts
		$this->processCallback('$data[\'instance\']->beforeGetPosts', array(
			$locale,
		));
	}

	/**
	 * Something to do after get posts
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetPosts($locale) {
		// something to do after get posts
		$this->processCallback('$data[\'instance\']->afterGetPosts', array(
			$locale,
		));
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
		// something to do before get post item
		$this->processCallback('$data[\'instance\']->beforeGetPostItem', array(
			$postId,
			$locale,
		));
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
		// something to do after get post item
		$this->processCallback('$data[\'instance\']->afterGetPostItem', array(
			$postId,
			$locale,
		));
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
		// get original post URL
		$url = $origURL;
		// get translated post URL
		$url = $this->processCallback('$data[\'instance\']->getTranslatedPostURL', array(
			$origURL,
			$postId,
			$locale,
		));
		if (empty($url)) {
			$url = $origURL;
		}
		// exit
		return $url;
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
		// get original post title
		$title = $origTitle;
		// get translated post URL
		$title = $this->processCallback('$data[\'instance\']->getTranslatedPostTitle', array(
			$origTitle,
			$postId,
			$locale,
		));
		if (empty($title)) {
			$title = $origTitle;
		}
		// exit
		return $title;
	}

	/**
	 * Something to do before get categories
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function beforeGetCategories($locale) {
		// something to do before get categories
		$this->processCallback('$data[\'instance\']->beforeGetCategories', array(
			$locale,
		));
	}

	/**
	 * Something to do after get categories
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetCategories($locale) {
		// something to do after get categories
		$this->processCallback('$data[\'instance\']->afterGetCategories', array(
			$locale,
		));
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
		// something to do before get category item
		$this->processCallback('$data[\'instance\']->beforeGetCategoryItem', array(
			$categoryId,
			$locale,
		));
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
		// something to do after get category item
		$this->processCallback('$data[\'instance\']->afterGetCategoryItem', array(
			$categoryId,
			$locale,
		));
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
		// get original category URL
		$url = $origURL;
		// get translated category URL
		$url = $this->processCallback('$data[\'instance\']->getTranslatedCategoryURL', array(
			$origURL,
			$categoryId,
			$locale,
		));
		if (empty($url)) {
			$url = $origURL;
		}
		// exit
		return $url;
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
		// get original category title
		$title = $origTitle;
		// get translated category URL
		$title = $this->processCallback('$data[\'instance\']->getTranslatedCategoryTitle', array(
			$origTitle,
			$categoryId,
			$locale,
		));
		if (empty($title)) {
			$title = $origTitle;
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
		// something to do before get menu
		$this->processCallback('$data[\'instance\']->beforeGetMenu', array(
			$locale,
		));
	}

	/**
	 * Something to do after get menu
	 *
	 * @access public
	 * @param string $locale Language locale
	 * @return void
	 */
	public function afterGetMenu($locale) {
		// something to do after get menu
		$this->processCallback('$data[\'instance\']->afterGetMenu', array(
			$locale,
		));
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
		// something to do before get menu item
		$this->processCallback('$data[\'instance\']->beforeGetMenuItem', array(
			$itemId,
			$locale,
		));
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
		// something to do after get menu item
		$this->processCallback('$data[\'instance\']->afterGetMenuItem', array(
			$itemId,
			$locale,
		));
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
		// get original menu URL
		$url = $origURL;
		// get translated menu URL
		$url = $this->processCallback('$data[\'instance\']->getTranslatedMenuURL', array(
			$origURL,
			$menuId,
			$locale,
		));
		if (empty($url)) {
			$url = $origURL;
		}
		// exit
		return $url;
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
		// get original menu title
		$title = $origTitle;
		// get translated menu URL
		$title = $this->processCallback('$data[\'instance\']->getTranslatedMenuTitle', array(
			$origTitle,
			$menuId,
			$locale,
		));
		if (empty($title)) {
			$title = $origTitle;
		}
		// exit
		return $title;
	}
}

?>