<?php

/**
 * sitemap.class.php
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
 * Plugin sitemap class
 *
 * @access public
 */
class KocujSitemapPluginSitemap {
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
			self::$instance = new KocujSitemapPluginSitemap();
		}
		// exit
		return self::$instance;
	}

	/**
	 * Add posts from category to sitemap
	 *
	 * @access private
	 * @param int $parentId Category parent id
	 * @param bool &$first It is first position in list (true) or not (false)
	 * @param string $locale Language locale - default: empty
	 * @return string Sitemap string
	 */
	private function addSitemapPostsFromCategory($parentId, &$first, $locale = '') {
		// initialize
		$output = '';
		// show start of list
		$output .= '<ul>';
		// get posts
		if (!empty($parentId)) {
			KocujSitemapPluginMultiLang::getInstance()->beforeGetPosts($locale);
			$posts = KocujSitemapPluginInternalCacheInterface::getClass()->get_posts(array(
				'category'    => $parentId,
				'orderby'     => 'post_date',
				'order'       => 'DESC',
				'post_type'   => 'post',
				'post_status' => 'publish',
				'numberposts' => -1,
			));
			KocujSitemapPluginMultiLang::getInstance()->afterGetPosts($locale);
			if (!empty($posts)) {
				foreach ($posts as $post) {
					KocujSitemapPluginMultiLang::getInstance()->beforeGetPostItem($post->ID, $locale);
					$output .= '<li>';
					$output .= '<a href="'.esc_url(KocujSitemapPluginMultiLang::getInstance()->getTranslatedPostURL(get_permalink($post->ID), $post->ID, $locale)).'">'.
						apply_filters('kocujsitemap_linktitle', KocujSitemapPluginMultiLang::getInstance()->getTranslatedPostTitle($post->post_title, $post->ID, $locale), $post->ID, 'post', $locale).'</a>';
					$output .= '</li>';
					KocujSitemapPluginMultiLang::getInstance()->afterGetPostItem($post->ID, $locale);
				}
			}
		}
		// get categories
		KocujSitemapPluginMultiLang::getInstance()->beforeGetCategories($locale);
		$categories = get_categories(array(
			'type'       => 'post',
			'parent'     => $parentId,
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => 1,
			'taxonomy'   => 'category',
		));
		KocujSitemapPluginMultiLang::getInstance()->afterGetCategories($locale);
		if (!empty($categories)) {
			foreach ($categories as $category) {
				$classText = '';
				$first_class = apply_filters('kocujsitemap_firstclass', '');
				if ((empty($parentId)) && (!empty($first))) {
					$add = '';
					if (!empty($first_class)) {
						$add = ' '.$first_class;
					}
					$classText = ' class="kocujsitemapfirst'.$add.'"';
					$first = false;
				}
				KocujSitemapPluginMultiLang::getInstance()->beforeGetCategoryItem($category->cat_ID, $locale);
				$output .= '<li'.$classText.'>';
				$output .= '<a href="'.esc_url(KocujSitemapPluginMultiLang::getInstance()->getTranslatedCategoryURL(get_category_link($category->cat_ID), $category->cat_ID, $locale)).'">'.
					apply_filters('kocujsitemap_linktitle', KocujSitemapPluginMultiLang::getInstance()->getTranslatedCategoryTitle($category->name, $category->cat_ID, $locale), $category->cat_ID, 'category', $locale).'</a>';
				$output .= $this->addSitemapPostsFromCategory($category->cat_ID, $first, $locale);
				$output .= '</li>';
				KocujSitemapPluginMultiLang::getInstance()->afterGetCategoryItem($category->cat_ID, $locale);
			}
		}
		// show end of list
		$output .= '</ul>';
		// exit
		return $output;
	}

	/**
	 * Add pages from parent to sitemap
	 *
	 * @access private
	 * @param int $parentId Page parent id
	 * @param bool &$first It is first position in list (true) or not (false)
	 * @param string $locale Language locale - default: empty
	 * @return string Sitemap string
	 */
	private function addSitemapPagesFromParent($parentId, &$first, $locale = '') {
		// initialize
		$output = '';
		// show start of list
		if (empty($parentId)) {
			$output .= '<ul>';
		}
		// get pages
		KocujSitemapPluginMultiLang::getInstance()->beforeGetPages($locale);
		$pages = KocujSitemapPluginInternalCacheInterface::getClass()->get_pages(array(
			'parent'       => $parentId,
			'sort_column'  => 'menu_order',
			'sord_order'   => 'ASC',
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'hierarchical' => 0,
			'number'       => '',
		));
		KocujSitemapPluginMultiLang::getInstance()->afterGetPages($locale);
		if (!empty($pages)) {
			if (!empty($parentId)) {
				$output .= '<ul>';
			}
			foreach ($pages as $page) {
				KocujSitemapPluginMultiLang::getInstance()->beforeGetPageItem($page->ID, $locale);
				$output .= '<li>';
				$output .= '<a href="'.esc_url(KocujSitemapPluginMultiLang::getInstance()->getTranslatedPageURL(get_permalink($page->ID), $page->ID, $locale)).'">'.
					apply_filters('kocujsitemap_linktitle', KocujSitemapPluginMultiLang::getInstance()->getTranslatedPageTitle($page->post_title, $page->ID, $locale), $page->ID, 'page', $locale).'</a>';
				$output .= $this->addSitemapPagesFromParent($page->ID, $first, $locale);
				$output .= '</li>';
				KocujSitemapPluginMultiLang::getInstance()->afterGetPageItem($page->ID, $locale);
			}
			if (!empty($parentId)) {
				$output .= '</ul>';
			}
		}
		// show end of list
		if (empty($parentId)) {
			$output .= '</ul>';
		}
		// exit
		return $output;
	}

	/**
	 * Add pages to sitemap
	 *
	 * @access private
	 * @param string $text Input text
	 * @param bool &$first It is first position in list (true) or not (false)
	 * @param string $locale Language locale - default: empty
	 * @return string Output text
	 */
	private function addPages($text, &$first, $locale = '') {
		// declare global
		global $classKocujSitemapAdmin;
		// add pages to sitemap
		$value = $classKocujSitemapAdmin->getConfigClass()->getOption('DisplayPages');
		if (!empty($value)) {
			$text .= $this->addSitemapPagesFromParent(0, $first, $locale);
		}
		// exit
		return $text;
	}

	/**
	 * Add posts to sitemap
	 *
	 * @access private
	 * @param string $text Input text
	 * @param bool &$first It is first position in list (true) or not (false)
	 * @param string $locale Language locale - default: empty
	 * @return string Output text
	 */
	private function addPosts($text, &$first, $locale = '') {
		// declare global
		global $classKocujSitemapAdmin;
		// add posts to sitemap
		$value = $classKocujSitemapAdmin->getConfigClass()->getOption('DisplayPosts');
		if (!empty($value)) {
			$text .= $this->addSitemapPostsFromCategory(0, $first, $locale);
		}
		// exit
		return $text;
	}

	/**
	 * Add menus to sitemap
	 *
	 * @access private
	 * @param string $text Input text
	 * @param bool &$first It is first position in list (true) or not (false)
	 * @param string $locale Language locale - default: empty
	 * @return string Output text
	 */
	private function addMenus($text, &$first, $locale = '') {
		// add menus to sitemap
		global $wp_version;
		if (version_compare($wp_version, '3.0.0', '>=')) {
			// declare global
			global $classKocujSitemapAdmin;
			// add menus to sitemap
			$value = $classKocujSitemapAdmin->getConfigClass()->getOption('DisplayMenus');
			if (!empty($value)) {
				$menus = $classKocujSitemapAdmin->getConfigClass()->getOption('Menus');
				if (empty($menus)) {
					$menus = apply_filters('kocujsitemap_defaultmenus', array());
				}
				if (!empty($menus)) {
					foreach ($menus as $menu) {
						$exists = wp_get_nav_menu_object($menu);
						if (!empty($exists)) {
							$walker = new KocujSitemapPluginMenu($first, $locale);
							KocujSitemapPluginMultiLang::getInstance()->beforeGetMenu($locale);
							$text .= wp_nav_menu(array(
								'menu'           => $menu,
								'menu_class'     => 'kocujsitemap-menu',
								'menu_id'        => 'kocujsitemap-menu',
								'theme_location' => '',
								'container'      => false,
								'echo'           => false,
								'fallback_cb'    => false,
								'walker'         => $walker,
							));
							KocujSitemapPluginMultiLang::getInstance()->afterGetMenu($locale);
							$first = $walker->getFirst();
						}
					}
				}
			}
		}
		// exit
		return $text;
	}

	/**
	 * Create sitemap
	 *
	 * @access public
	 * @param string $locale Language locale - default: empty
	 * @return array Sitemap data
	 */
	public function createSitemap($locale = '') {
		// declare global
		global $classKocujSitemapAdmin;
		// prepare locale
		if (empty($locale)) {
			$locale = get_locale();
		}
		// initialize
		$output = '';
		$first = true;
		$titlepos = -1;
		// delete WordPress cache
		global $wp_object_cache;
		$wpCache = $wp_object_cache;
		wp_cache_flush();
		// show homepage link
		$value = $classKocujSitemapAdmin->getConfigClass()->getOption('LinkToMainSite');
		if (!empty($value)) {
			$classText = '';
			$first_class = apply_filters('kocujsitemap_firstclass', '');
			if (!empty($first)) {
				$add = '';
				if (!empty($first_class)) {
					$add = ' '.$first_class;
				}
				$classText = ' class="kocujsitemapfirst'.$add.'"';
				$first = false;
			}
			KocujSitemapPluginMultiLang::getInstance()->beforeGetHomeURL($locale);
			$output .= '<ul><li'.$classText.'><a href="'.esc_url(KocujSitemapPluginMultiLang::getInstance()->getTranslatedHomeURL($locale)).'">';
			KocujSitemapPluginMultiLang::getInstance()->afterGetHomeURL($locale);
			$titlepos = strlen($output);
			$output .= '</a></li></ul>';
		}
		// get elements
		$order = $classKocujSitemapAdmin->getConfigClass()->getOption('Order');
		if (strlen($order) > 0) {
			for ($z=0; $z<strlen($order); $z++) {
				switch ($order[$z]) {
					case 'G':
						$output = $this->addPages($output, $first, $locale);
					break;
					case 'M':
						$output = $this->addMenus($output, $first, $locale);
					break;
					case 'P':
						$output = $this->addPosts($output, $first, $locale);
					break;
				}
			}
		}
		// integrate lists
		$output = preg_replace('/<\/([u|U])([l|L])><([u|U])([l|L])(.*?)>/s', '', $output);
		// remove EOL
		$output = str_replace(array("\r\n", "\n", "\r"), '', $output);
		// prepare array
		$array = array(
			'output'   => $output,
			'titlepos' => $titlepos,
		);
		// return WordPress cache
		$wp_object_cache = $wpCache;
		// exit
		return $array;
	}

	/**
	 * Sitemap shortcode
	 *
	 * @access public
	 * @param array $args Arguments
	 * @return string Parsed output
	 */
	public function shortcodeSitemap($args) {
		// get arguments
		KocujSitemapPluginMultiLang::getInstance()->beforeGetBlogName();
		$default_title = apply_filters('kocujsitemap_defaulttitle', KocujSitemapPluginMultiLang::getInstance()->getTranslatedBlogName(), get_locale());
		KocujSitemapPluginMultiLang::getInstance()->afterGetBlogName();
		$default_class = apply_filters('kocujsitemap_defaultclass', '');
		extract(shortcode_atts(array(
			'title' => $default_title,
			'class' => $default_class,
		), $args));
		// exit
		return $this->getSitemap($title, $class);
	}

	/**
	 * Get sitemap to display
	 *
	 * @access public
	 * @param string $title Sitemap title - default: empty
	 * @param string $class Sitemap class - default: empty
	 * @return string Sitemap to display
	 */
	public function getSitemap($title = '', $class = '') {
		// declare global
		global $classKocujSitemapAdmin;
		// get arguments
		if (empty($title)) {
			KocujSitemapPluginMultiLang::getInstance()->beforeGetBlogName();
			$title = apply_filters('kocujsitemap_defaulttitle', KocujSitemapPluginMultiLang::getInstance()->getTranslatedBlogName(), get_locale());
			KocujSitemapPluginMultiLang::getInstance()->afterGetBlogName();
		}
		if (empty($class)) {
			$class = apply_filters('kocujsitemap_defaultclass', '');
		}
		$title = apply_filters('kocujsitemap_linktitle', $title, 0, 'home', get_locale());
		// initialize
		$output = '';
		// load cache
		if (!KocujSitemapPluginCache::getInstance()->loadCache($title, $output, get_locale())) {
			KocujSitemapPluginCache::getInstance()->createCache();
			if (!KocujSitemapPluginCache::getInstance()->loadCache($title, $output, get_locale())) {
				return '';
			}
		}
		// optionally set footer
		$footer = '';
		$value = $classKocujSitemapAdmin->getConfigClass()->getOption('PoweredBy');
		if (!empty($value)) {
			$footer = '<div class="kocujsitemapfooter">'.sprintf(__('Powered by %s plugin', 'kocuj-sitemap'), '<a href="http://kocujsitemap.wpplugin.kocuj.pl/" rel="external">Kocuj Sitemap</a>').'</div>';
		}
		// show begin and end
		if (!empty($output)) {
			$classText = '';
			if (!empty($class)) {
				$classText = ' '.$class;
			}
			$html5 = $classKocujSitemapAdmin->getConfigClass()->getOption('UseHTML5');
			if (!empty($html5)) {
				$tagBegin = KocujSitemapPluginHTML5::getInstance()->getTagNavBegin('', 'kocujsitemap'.$classText);
				$tagEnd = KocujSitemapPluginHTML5::getInstance()->getTagNavEnd();
			} else {
				$tagBegin = '<div class="kocujsitemap'.$classText.'">';
				$tagEnd = '</div>';
			}
			$output = $tagBegin.$output.$footer.$tagEnd;
		}
		// exit
		return $output;
	}
}

?>