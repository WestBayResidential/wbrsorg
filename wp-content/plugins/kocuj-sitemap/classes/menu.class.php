<?php

/**
 * menu.class.php
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
 * Menu sitemap class
 *
 * @access public
 */
if (class_exists('Walker_Nav_Menu')) {
	class KocujSitemapPluginMenu extends Walker_Nav_Menu {
		/**
		 * First
		 *
		 * @access private
		 * @return bool
		 */
		private $first = false;

		/**
		 * Locale
		 *
		 * @access private
		 * @return string
		 */
		private $locale = '';

		/**
		 * Constructor
		 *
		 * @access public
		 * @param bool $first It is first position in list (true) or not (false)
		 * @param string $locale Language locale - default: empty
		 * @return void
		 */
		public function __construct($first, $locale = '') {
			// initialize
			$this->first = $first;
			if (!empty($locale)) {
				$this->locale = $locale;
			} else {
				$this->locale = get_locale();
			}
		}

		/**
		 * Get first status
		 *
		 * @access public
		 * @return bool First status
		 */
		public function getFirst() {
			// exit
			return $this->first;
		}

		/**
		 * Start element
		 *
		 * @access public
		 * @param string &$output Output
		 * @param object $item Item
		 * @param int $depth Depth - default: 0
		 * @param array $args Arguments - default: empty
		 * @param int $id Identifier - default: 0
		 * @return void
		 */
		public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
			// prepare menu item
			$objectid = 0;
			if (isset($item->object_id)) {
				$objectid = $item->object_id;
			}
			$indent = ($depth) ? str_repeat("\t", $depth) : '';
			$value = '';
			$classes = empty($item->classes) ? array() : (array)$item->classes;
			$classText = '';
			if (!empty($this->first)) {
				$first_class = apply_filters('kocujsitemap_firstclass', '');
				$add = '';
				if (!empty($first_class)) {
					$add = ' '.$first_class;
				}
				$classText = ' class="kocujsitemapfirst'.$add.'"';
				$this->first = false;
			}
			KocujSitemapPluginMultiLang::getInstance()->beforeGetMenuItem($item->ID, $this->locale);
			$output .= $indent.'<li'.$value.$classText.'>';
			$attributes  = !empty($item->attr_title) ? ' title="'.esc_attr($item->attr_title).'"' : '';
			$attributes .= !empty($item->target) ? ' target="'.esc_attr($item->target).'"' : '';
			$attributes .= !empty($item->xfn) ? ' rel="'.esc_attr($item->xfn).'"' : '';
			$attributes .= !empty($item->url) ? ' href="'.esc_attr(KocujSitemapPluginMultiLang::getInstance()->getTranslatedMenuURL($item->url, $item->ID, $this->locale)).'"' : '';
			$item_output = $args->before;
			$item_output .= '<a'.$attributes.'>';
			$item_output .= $args->link_before.apply_filters('kocujsitemap_linktitle',
				apply_filters('the_title', KocujSitemapPluginMultiLang::getInstance()->getTranslatedMenuTitle($item->title, $item->ID, $this->locale), $item->ID), $item->ID, 'menu', $this->locale).$args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			KocujSitemapPluginMultiLang::getInstance()->afterGetMenuItem($item->ID, $this->locale);
			// filter output
			$item_output = apply_filters('kocujsitemap_menuelement', $item_output, $item->object_id, $this->locale);
			// set menu filter
			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		}

		/**
		 * End element
		 *
		 * @access public
		 * @param string &$output Output
		 * @param object $item Item
		 * @param int $depth Depth - default: 0
		 * @param array $args Arguments - default: empty
		 * @return void
		 */
		public function end_el(&$output, $item, $depth = 0, $args = array()) {
			// set output
			$output .= "</li>";
		}

		/**
		 * End element level
		 *
		 * @access public
		 * @param string &$output Output
		 * @param int $depth Depth - default: 0
		 * @param array $args Arguments - default: empty
		 * @return void
		 */
		public function end_lvl(&$output, $depth = 0, $args = array()) {
			// set output
			if (substr($output, -22) == '<ul class="sub-menu">') {
				$output = substr($output, 0, strlen($output)-23);
			} else {
				$output .= "</ul>";
			}
		}
	}
} else {
	class KocujSitemapPluginMenu {}
}

?>
