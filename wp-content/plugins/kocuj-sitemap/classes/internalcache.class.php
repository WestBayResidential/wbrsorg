<?php

/**
 * internalcache.class.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @copyright Copyright (c) 2013 Dominik Kocuj
 * @package kocuj_internalcache
 */

// security
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)) {
	die ('Please do not load this page directly. Thanks!');
}

/**
 * Internal cache - version 1
 *
 * @access public
 */
if (!class_exists('KocujInternalCache1')) {
	class KocujInternalCache1 {
		/**
		 * Cache data
		 *
		 * @access private
		 * @var array
		 */
		private $cache = array();

		/**
		 * Cache function
		 *
		 * @access private
		 * @param string $function Function name
		 * @param bool $returnValue Function returns value (true) or not (false) - default: true
		 * @return any
		 */
		private function getFromCache($function, $returnValue = true) {
			// get parameters
			$pars = array();
			$count = func_num_args()-2;
			if ($count > 0) {
				for ($z=0; $z<$count; $z++) {
					$pars[] = func_get_arg($z+2);
				}
			}
			// optionally get data from cache
			$found = false;
			$output = '';
			if (!empty($this->cache)) {
				foreach ($this->cache as $cache) {
					if (($cache['FUNCTION'] == $function) && (serialize($cache['PARAMETERS']) == serialize($pars))) {
						$found = true;
						if (!empty($returnValue)) {
							$output = $cache['OUTPUT'];
						}
						break;
					}
				}
			}
			// optionally execute function and add to cache
			if (empty($found)) {
				if (!empty($returnValue)) {
					$output = call_user_func_array($function, $pars);
				} else {
					call_user_func_array($function, $pars);
				}
				$pos = count($this->cache);
				$this->cache[$pos] = array();
				$this->cache[$pos]['FUNCTION'] = $function;
				$this->cache[$pos]['PARAMETERS'] = $pars;
				if (!empty($returnValue)) {
					$this->cache[$pos]['OUTPUT'] = $output;
				} else {
					$this->cache[$pos]['OUTPUT'] = '';
				}
			}
			// exit
			if (!empty($returnValue)) {
				return $output;
			}
		}

		/**
		 * Cache: get_post_meta
		 *
		 * @access public
		 * @param int $post_id
		 * @param string $key
		 * @param bool $single
		 * @return any Output for get_post_meta
		 */
		public function get_post_meta($post_id, $key = '', $single = false) {
			// execute function
			$value = $this->getFromCache('get_post_meta', true, $post_id, $key, $single);
			// exit
			return $value;
		}

		/**
		 * Cache: get_theme_root
		 *
		 * @access public
		 * @return string Output for get_theme_root
		 */
		public function get_theme_root() {
			// execute function
			$value = $this->getFromCache('get_theme_root', true);
			// exit
			return $value;
		}

		/**
		 * Cache: get_template
		 *
		 * @access public
		 * @return string Output for get_template
		 */
		public function get_template() {
			// execute function
			$value = $this->getFromCache('get_template', true);
			// exit
			return $value;
		}

		/**
		 * Cache: get_template_directory
		 *
		 * @access public
		 * @return string Output for get_template_directory
		 */
		public function get_template_directory() {
			// execute function
			$value = $this->getFromCache('get_template_directory', true);
			// exit
			return $value;
		}

		/**
		 * Cache: get_template_directory_uri
		 *
		 * @access public
		 * @return string Output for get_template_directory_uri
		 */
		public function get_template_directory_uri() {
			// execute function
			$value = $this->getFromCache('get_template_directory_uri', true);
			// exit
			return $value;
		}

		/**
		 * Cache: home_url
		 *
		 * @access public
		 * @param string $path
		 * @param string $scheme
		 * @return string Output for home_url
		 */
		public function home_url($path = '', $scheme = null) {
			// execute function
			$value = $this->getFromCache('home_url', true, $path, $scheme);
			// exit
			return $value;
		}

		/**
		 * Cache: get_home_url
		 *
		 * @access public
		 * @param int $blog_id
		 * @param string $path
		 * @param string $scheme
		 * @return string Output for get_home_url
		 */
		public function get_home_url($blog_id = null, $path = '', $scheme = null) {
			// execute function
			$value = $this->getFromCache('get_home_url', true, $blog_id, $path, $scheme);
			// exit
			return $value;
		}

		/**
		 * Cache: get_pages
		 *
		 * @access public
		 * @param array $args
		 * @return array Output for get_pages
		 */
		public function get_pages($args) {
			// execute function
			$value = $this->getFromCache('get_pages', true, $args);
			// exit
			return $value;
		}

		/**
		 * Cache: get_page
		 *
		 * @access public
		 * @param int $page_id
		 * @param string $output
		 * @param string $filter
		 * @return string Output for get_page
		 */
		public function get_page($page_id, $output = OBJECT, $filter = 'raw') {
			// execute function
			$value = $this->getFromCache('get_page', true, $page_id, $output, $filter);
			// exit
			return $value;
		}

		/**
		 * Cache: get_posts
		 *
		 * @access public
		 * @param array $args
		 * @return array Output for get_posts
		 */
		public function get_posts($args) {
			// execute function
			$value = $this->getFromCache('get_posts', true, $args);
			// exit
			return $value;
		}

		/**
		 * Cache: get_post
		 *
		 * @access public
		 * @param int $post_id
		 * @param string $output
		 * @return string Output for get_post
		 */
		public function get_post($post_id, $output = OBJECT) {
			// execute function
			$value = $this->getFromCache('get_post', true, $post_id, $output);
			// exit
			return $value;
		}

		/**
		 * Cache: get_bloginfo
		 *
		 * @access public
		 * @param string $show
		 * @param string $filter
		 * @return string Output for get_bloginfo
		 */
		public function get_bloginfo($show = 'name', $filter = 'raw') {
			// execute function
			$value = $this->getFromCache('get_bloginfo', true, $show, $filter);
			// exit
			return $value;
		}

		/**
		 * Cache: bloginfo
		 *
		 * @access public
		 * @param string $show
		 * @return string Output for bloginfo
		 */
		public function bloginfo($show = 'name') {
			// execute function
			$value = $this->getFromCache('bloginfo', true, $show);
			// exit
			return $value;
		}
	}
}

?>