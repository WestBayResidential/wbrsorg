<?php

/**
 * kocuj-admin-config.class.php
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
if (!class_exists('KocujAdminConfig4')) {
	/**
	 * Configuration class - version 4
	 *
	 * @access public
	 */
	class KocujAdminConfig4 {
		/**
		 * Directory for files for Kocuj Admin
		 *
		 * @access private
		 * @var string
		 */
		private $directory = 'kocuj-admin-4';

		/**
		 * Options
		 *
		 * @access private
		 * @var array
		 */
		private $options = array();

		/**
		 * Option types
		 *
		 * @access private
		 * @var array
		 */
		private $types = array();

		/**
		 * Last error
		 *
		 * @access private
		 * @var string
		 */
		private $lastError = '';

		/**
		 * Option name
		 *
		 * @access protected
		 * @var string
		 */
		protected $optionName = '';

		/**
		 * Constructor
		 *
		 * @access public
		 * @return void
		 */
		public function __construct() {
			// set initialize action
			add_action('init', array($this, 'init'), 1);
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
		 * Get last error
		 *
		 * @access public
		 * @return string Last error
		 */
		public function getLastError() {
			// get last error
			return $this->lastError;
		}

		/**
		 * Get option name
		 *
		 * @access public
		 * @return string Option name
		 */
		public function getOptionName() {
			// get option name
			return $this->optionName;
		}

		/**
		 * Initialize
		 *
		 * @access public
		 * @return void
		 */
		public function init() {
			// add option types
			$this->types['string'] = array(array($this, 'typeString'), array($this, 'typeUpdateString'), array($this, 'typeGetString'));
			$this->types['checkbox'] = array(array($this, 'typeCheckbox'), array($this, 'typeUpdateCheckbox'), array($this, 'typeGetCheckbox'));
			$this->types['numeric'] = array(array($this, 'typeNumeric'), array($this, 'typeUpdateNumeric'), array($this, 'typeGetNumeric'));
			$this->types['post'] = array(array($this, 'typePost'), array($this, 'typeUpdatePost'), array($this, 'typeGetPost'));
			$this->types['page'] = array(array($this, 'typePage'), array($this, 'typeUpdatePage'), array($this, 'typeGetPage'));
			$this->types['date'] = array(array($this, 'typeDate'), array($this, 'typeUpdateDate'), array($this, 'typeGetDate'));
			$this->types['time'] = array(array($this, 'typeTime'), array($this, 'typeUpdateTime'), array($this, 'typeGetTime'));
			$this->types['datetime'] = array(array($this, 'typeDatetime'), array($this, 'typeUpdateDatetime'), array($this, 'typeGetDatetime'));
		}

		/**
		 * Add option
		 *
		 * @access public
		 * @param string $id Option id
		 * @param string $defaultValue Default option value
		 * @param string $type Option type
		 * @param string $label Option label
		 * @param bool $isArray Option is array of values (true) or not (false) - default: false
		 * @param bool $arrayOptions Options for array if $isArray=true - default: empty
		 * @return void
		 */
		public function addOption($id, $defaultValue, $type, $label, $isArray = false, $arrayOptions = array()) {
			// add option
			$this->options[$id] = array('set_'.$id, $defaultValue, $type, $label, $isArray, $arrayOptions);
		}

		/**
		 * Add option type
		 *
		 * @access public
		 * @param string $type Option type
		 * @param string $function Callback method name - default: null
		 * @param string $updateFunction Callback method name for update option - default: null
		 * @param string $getFunction Callback method name for get option - default: null
		 * @return void
		 */
		public function addType($type, $function = null, $updateFunction = null, $getFunction = null) {
			// prepare methods
			if (!empty($function)) {
				$func1 = array($this, $function);
			} else {
				$func1 = null;
			}
			if (!empty($updateFunction)) {
				$func2 = array($this, $updateFunction);
			} else {
				$func2 = null;
			}
			if (!empty($getFunction)) {
				$func3 = array($this, $getFunction);
			} else {
				$func3 = null;
			}
			// add option type
			$this->types[$type] = array($func1, $func2, $func3);
		}

		/**
		 * Check option value
		 *
		 * @access private
		 * @param string $name Option name
		 * @param array $option Option array
		 * @param int|string|bool $value Value to check
		 * @return bool Status - true or false
		 */
		private function checkOption($name, $option, $value) {
			// initialize
			$this->lastError = '';
			$ok = false;
			// check option value
			if (isset($option[2])) {
				if (!empty($this->types[$option[2]][0])) {
					$error = '';
					$ok = call_user_func_array($this->types[$option[2]][0], array($name, $option, $value, &$error));
					if ((empty($ok)) && (!empty($error))) {
						$this->lastError .= $error.'<br />';
					}
				}
			}
			// exit
			return $ok;
		}

		/**
		 * Check option value - string
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param int|string|bool $value Value to check
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeString($name, $option, $value, &$error) {
			// exit
			return true;
		}

		/**
		 * Update option value - string
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param bool &$customOptionCheck Return setting which will set that method has custom option checking (true) or allow to check by checkOption method (false)
		 * @param int|string|bool &$value Returned value
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeUpdateString($name, $option, $inArray, &$customOptionCheck, &$value, &$error) {
			// exit
			return true;
		}

		/**
		 * Get option value - string
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param int|string|bool $value Value
		 * @return int|string|bool Modified value
		 */
		public function typeGetString($name, $option, $inArray, $value) {
			// exit
			return $value;
		}

		/**
		 * Check option value - checkbox
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param int|string|bool $value Value to check
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeCheckbox($name, $option, $value, &$error) {
			// check value
			$ok = false;
			if (empty($value)) {
				$value = 0;
			}
			if ((is_numeric($value)) && (($value == 0) || ($value == 1))) {
				$ok = true;
			}
			if (empty($ok)) {
				$error = '"'.$option[4].'" '.__('should be on or off', 'kocujadmin4');
			}
			// exit
			return $ok;
		}

		/**
		 * Update option value - checkbox
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param bool &$customOptionCheck Return setting which will set that method has custom option checking (true) or allow to check by checkOption method (false)
		 * @param int|string|bool &$value Returned value
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeUpdateCheckbox($name, $option, $inArray, &$customOptionCheck, &$value, &$error) {
			// update checkbox
			if (empty($value)) {
				$value = 0;
			}
			// exit
			return true;
		}

		/**
		 * Get option value - checkbox
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param int|string|bool $value Value
		 * @return int|string|bool Modified value
		 */
		public function typeGetCheckbox($name, $option, $inArray, $value) {
			// exit
			return $value;
		}

		/**
		 * Check option value - numeric
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param int|string|bool $value Value to check
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeNumeric($name, $option, $value, &$error) {
			// check value
			$ok = false;
			if (empty($value)) {
				$ok = true;
			}
			if (is_numeric($value)) {
				$ok = true;
			}
			if (empty($ok)) {
				$error = '"'.$option[4].'" '.__('should be numeric', 'kocujadmin4');
			}
			// exit
			return $ok;
		}

		/**
		 * Update option value - numeric
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param bool &$customOptionCheck Return setting which will set that method has custom option checking (true) or allow to check by checkOption method (false)
		 * @param int|string|bool &$value Returned value
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeUpdateNumeric($name, $option, $inArray, &$customOptionCheck, &$value, &$error) {
			// exit
			return true;
		}

		/**
		 * Get option value - numeric
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param int|string|bool $value Value
		 * @return int|string|bool Modified value
		 */
		public function typeGetNumeric($name, $option, $inArray, $value) {
			// exit
			return $value;
		}

		/**
		 * Check option value - post
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param int|string|bool $value Value to check
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typePost($name, $option, $value, &$error) {
			// check value
			$ok = false;
			if ((is_numeric($value)) && (get_permalink($value))) {
				$ok = true;
			}
			if (empty($value)) {
				$ok = true;
			}
			if (empty($ok)) {
				$error = '"'.$option[4].'" '.__('must be numeric and should be already existing post', 'kocujadmin4');
			}
			// exit
			return $ok;
		}

		/**
		 * Update option value - post
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param bool &$customOptionCheck Return setting which will set that method has custom option checking (true) or allow to check by checkOption method (false)
		 * @param int|string|bool &$value Returned value
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeUpdatePost($name, $option, $inArray, &$customOptionCheck, &$value, &$error) {
			// exit
			return true;
		}

		/**
		 * Get option value - post
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param int|string|bool $value Value
		 * @return int|string|bool Modified value
		 */
		public function typeGetPost($name, $option, $inArray, $value) {
			// exit
			return $value;
		}

		/**
		 * Check option value - page
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param int|string|bool $value Value to check
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typePage($name, $option, $value, &$error) {
			// check value
			$ok = false;
			if ((is_numeric($value)) && (get_permalink($value))) {
				$ok = true;
			}
			if (empty($value)) {
				$ok = true;
			}
			if (($option[2] == 'page') && (!empty($ok)) && (!is_page($value))) {
				$ok = false;
			}
			if (empty($ok)) {
				$error = '"'.$option[4].'" '.__('must be numeric and should be already existing page', 'kocujadmin4');
			}
			// exit
			return $ok;
		}

		/**
		 * Update option value - page
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param bool &$customOptionCheck Return setting which will set that method has custom option checking (true) or allow to check by checkOption method (false)
		 * @param int|string|bool &$value Returned value
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeUpdatePage($name, $option, $inArray, &$customOptionCheck, &$value, &$error) {
			// exit
			return true;
		}

		/**
		 * Get option value - page
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param int|string|bool $value Value
		 * @return int|string|bool Modified value
		 */
		public function typeGetPage($name, $option, $inArray, $value) {
			// exit
			return $value;
		}

		/**
		 * Check option value - date
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param int|string|bool $value Value to check
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeDate($name, $option, $value, &$error) {
			// check value
			$ok = preg_match('/^[0-9][0-9][0-9][0-9]\-[0-9][0-9]\-[0-9][0-9]$/s', trim($value));
			if (empty($value)) {
				$ok = true;
			}
			if (empty($ok)) {
				$error = '"'.$option[4].'" '.__('must be in format "yy-mm-dd"', 'kocujadmin4');
			}
			// exit
			return $ok;
		}

		/**
		 * Update option value - date
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param bool &$customOptionCheck Return setting which will set that method has custom option checking (true) or allow to check by checkOption method (false)
		 * @param int|string|bool &$value Returned value
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeUpdateDate($name, $option, $inArray, &$customOptionCheck, &$value, &$error) {
			// trim value
			$value = trim($value);
			// exit
			return true;
		}

		/**
		 * Get option value - date
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param int|string|bool $value Value
		 * @return int|string|bool Modified value
		 */
		public function typeGetDate($name, $option, $inArray, $value) {
			// exit
			return $value;
		}

		/**
		 * Check option value - time
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param int|string|bool $value Value to check
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeTime($name, $option, $value, &$error) {
			// check value
			$ok = preg_match('/^[0-9][0-9]:[0-9][0-9]$/s', trim($value));
			if (empty($value)) {
				$ok = true;
			}
			if (empty($ok)) {
				$error = '"'.$option[4].'" '.__('must be in format "hh:ii"', 'kocujadmin4');
			}
			// exit
			return $ok;
		}

		/**
		 * Update option value - time
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param bool &$customOptionCheck Return setting which will set that method has custom option checking (true) or allow to check by checkOption method (false)
		 * @param int|string|bool &$value Returned value
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeUpdateTime($name, $option, $inArray, &$customOptionCheck, &$value, &$error) {
			// trim value
			$value = trim($value);
			// exit
			return true;
		}

		/**
		 * Get option value - time
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param int|string|bool $value Value
		 * @return int|string|bool Modified value
		 */
		public function typeGetTime($name, $option, $inArray, $value) {
			// exit
			return $value;
		}

		/**
		 * Check option value - datetime
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param int|string|bool $value Value to check
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeDatetime($name, $option, $value, &$error) {
			// check value
			$ok = preg_match('/^[0-9][0-9][0-9][0-9]\-[0-9][0-9]\-[0-9][0-9] [0-9][0-9]:[0-9][0-9]$/s', trim($value));
			if (empty($value)) {
				$ok = true;
			}
			if (empty($ok)) {
				$error = '"'.$option[4].'" '.__('must be in format "yy-mm-dd hh:ii"', 'kocujadmin4');
			}
			// exit
			return $ok;
		}

		/**
		 * Update option value - datetime
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param bool &$customOptionCheck Return setting which will set that method has custom option checking (true) or allow to check by checkOption method (false)
		 * @param int|string|bool &$value Returned value
		 * @param string &$error Returned error text
		 * @return bool Status - true or false
		 */
		public function typeUpdateDatetime($name, $option, $inArray, &$customOptionCheck, &$value, &$error) {
			// trim value
			$value = trim($value);
			// exit
			return true;
		}

		/**
		 * Get option value - datetime
		 *
		 * @access public
		 * @param string $name Option name
		 * @param array $option Option settings
		 * @param bool $inArray This option is in array of options (true) or not (false)
		 * @param int|string|bool $value Value
		 * @return int|string|bool Modified value
		 */
		public function typeGetDatetime($name, $option, $inArray, $value) {
			// exit
			return $value;
		}

		/**
		 * Update options
		 *
		 * @access public
		 * @return string Output information
		 */
		public function updateOptions() {
			// check option name
			if (empty($this->optionName)) {
				return '';
			}
			// initialize output
			$output = '';
			// update options
			$array = get_option($this->optionName);
			$array = maybe_unserialize($array);
			if (empty($array)) {
				$array = array();
			}
			if (count($this->options) > 0) {
				foreach ($this->options as $key => $val) {
					$value = '';
					if (isset($_REQUEST[$val[0]])) {
						$value = $_REQUEST[$val[0]];
					}
					$ok = true;
					$customOptionCheck = false;
					if (!empty($val[4])) {
						$lastError = '';
						foreach ($value as $key2 => $row) {
							if (empty($row)) {
								unset($value[$key2]);
							} else {
								$customOptionCheck = false;
								$error = '';
								if (!empty($this->types[$val[2]][1])) {
									$ok2 = call_user_func_array($this->types[$val[2]][1], array($key, $val, true, &$customOptionCheck, &$row, &$error));
								} else {
									$ok2 = true;
								}
								$value[$key2] = $row;
								if ((empty($ok)) && (!empty($error))) {
									$this->lastError = $error;
								}
								if (empty($customOptionCheck)) {
									$ok2 = $this->checkOption($key, $val, $row);
								}
								if (empty($ok2)) {
									if (empty($lastError)) {
										$lastError = $this->lastError;
									}
									$ok = false;
								}
							}
						}
						$array2 = array();
						foreach ($value as $key2 => $row) {
							$array2[] = $row;
						}
						$value = $array2;
						$this->lastError = $lastError;
					} else {
						$customOptionCheck = false;
						$error = '';
						if (!empty($this->types[$val[2]][1])) {
							$ok = call_user_func_array($this->types[$val[2]][1], array($key, $val, false, &$customOptionCheck, &$value, &$error));
						} else {
							$ok = true;
						}
						if ((empty($ok)) && (!empty($error))) {
							$this->lastError = $error;
						}
					}
					if ((empty($val[4])) && (empty($customOptionCheck))) {
						$ok = $this->checkOption($key, $val, $value);
					}
					if (!empty($ok)) {
						$array[$key] = $value;
					} else {
						$output .= $this->lastError;
					}
				}
			}
			update_option($this->optionName, maybe_serialize($array));
			// exit
			return $output;
		}

		/**
		 * Delete options and restore to default values
		 *
		 * @access public
		 * @return void
		 */
		public function deleteOptions() {
			// check option name
			if (empty($this->optionName)) {
				return;
			}
			// delete options
			$array = get_option($this->optionName);
			$array = maybe_unserialize($array);
			if (empty($array)) {
				$array = array();
			}
			if (!empty($this->options)) {
				foreach ($this->options as $key => $val) {
					$array[$key] = '';
					if (!empty($val[4])) {
						$array[$key] = array();
					} else {
						$array[$key] = $val[1];
					}
				}
			}
			update_option($this->optionName, maybe_serialize($array));
		}

		/**
		 * Get option value
		 *
		 * @access public
		 * @param string $name Option name
		 * @return int|string|bool|array Option value
		 */
		public function getOption($name) {
			// check option name
			if (empty($this->optionName)) {
				return false;
			}
			// initialize
			$value = '';
			// get option value
			$array = get_option($this->optionName);
			if ((!is_array($array)) && ($array !== false)) {
				$array = maybe_unserialize($array);
				if (!is_array($array)) {
					$array = maybe_unserialize($array);
				}
			}
			if (empty($array)) {
				$array = array();
			}
			// check if option is empty
			$value = false;
			if (!isset($array[$name])) {
				if (isset($this->options[$name][1])) {
					if (!empty($this->options[$name][4])) {
						$value = false;
					} else {
						$value = $this->options[$name][1];
					}
				}
			} else {
				$value = $array[$name];
			}
			if (!empty($this->options[$name][4])) {
				if (!empty($value)) {
					foreach ($value as $onekey => $onevalue) {
						$ok = $this->checkOption($name, $this->options[$name], $onevalue);
						if (empty($ok)) {
							$value = false;
							break;
						} else {
							if (!empty($this->types[$this->options[$name][2]][2])) {
								$value[$onekey] = call_user_func_array($this->types[$this->options[$name][2]][2], array($name, $this->options[$name], true, $onevalue));
							}
						}
					}
				} else {
					$value = false;
				}
			} else {
				if (isset($this->options[$name])) {
					$ok = $this->checkOption($name, $this->options[$name], $value);
					if (empty($ok)) {
						$value = $this->options[$name][1];
						if (!empty($this->types[$this->options[$name][2]][2])) {
							$value = call_user_func_array($this->types[$this->options[$name][2]][2], array($name, $this->options[$name], false, $value));
						}
					}
				}
			}
			// exit
			return $value;
		}

		/**
		 * Get option default value
		 *
		 * @access public
		 * @param string $name Option name
		 * @return string|int Option default value
		 */
		public function getOptionDefaultValue($name) {
			// get option type
			if (isset($this->options[$name][1])) {
				$value = $this->options[$name][1];
			} else {
				$value = '';
			}
			// exit
			return $value;
		}

		/**
		 * Get option type
		 *
		 * @access public
		 * @param string $name Option name
		 * @return string Option type
		 */
		public function getOptionType($name) {
			// get option type
			if (isset($this->options[$name][2])) {
				$value = $this->options[$name][2];
			} else {
				$value = '';
			}
			// exit
			return $value;
		}

		/**
		 * Get option label
		 *
		 * @access public
		 * @string $name Option name
		 * @return string Option label
		 */
		public function getOptionLabel($name) {
			// get option label
			if (isset($this->options[$name][3])) {
				$value = $this->options[$name][3];
			} else {
				$value = '';
			}
			// exit
			return $value;
		}

		/**
		 * Check if option is array
		 *
		 * @access public
		 * @string $name Option name
		 * @return bool Option is array (true) or not (false)
		 */
		public function checkOptionArray($name) {
			// check if option is array
			if (isset($this->options[$name][4])) {
				$value = $this->options[$name][4];
			} else {
				$value = false;
			}
			// exit
			return $value;
		}

		/**
		 * Check if option array can be reorganized
		 *
		 * @access public
		 * @string $name Option name
		 * @return bool Option array can be reorganized (true) or not (false)
		 */
		public function checkOptionArrayReorganized($name) {
			// check if option array can be reorganized
			if ((isset($this->options[$name][5])) && (is_array($this->options[$name][5])) && (isset($this->options[$name][5]['allowreorganize'])) &&
				(!empty($this->options[$name][5]['allowreorganize']))) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Check if option array should add new position when last element will be set
		 *
		 * @access public
		 * @string $name Option name
		 * @return bool Option array should add new position when last element will be set (true) or not (false)
		 */
		public function checkOptionArrayAddOnLastNotEmpty($name) {
			// check if option array should add new position when last element will be set
			if ((isset($this->options[$name][5])) && (is_array($this->options[$name][5])) && (isset($this->options[$name][5]['addonlastnotempty'])) &&
				(!empty($this->options[$name][5]['addonlastnotempty']))) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Check if option array should remove element if it become empty
		 *
		 * @access public
		 * @string $name Option name
		 * @return bool Option array should remove element if it become empty (true) or not (false)
		 */
		public function checkOptionArrayRemoveOnEmpty($name) {
			// check if option array should remove element if it become empty
			if ((isset($this->options[$name][5])) && (is_array($this->options[$name][5])) && (isset($this->options[$name][5]['removeonempty'])) &&
				(!empty($this->options[$name][5]['removeonempty']))) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Check if option array should have add button
		 *
		 * @access public
		 * @string $name Option name
		 * @return bool Option array should have add button (true) or not (false)
		 */
		public function checkOptionArrayAddButton($name) {
			// check if option array should have add button
			if ((isset($this->options[$name][5])) && (is_array($this->options[$name][5])) && (isset($this->options[$name][5]['addbutton'])) &&
				(!empty($this->options[$name][5]['addbutton']))) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Get all options value
		 *
		 * @access public
		 * @return array Options value
		 */
		public function getAllOptions() {
			// initialize
			$output = array();
			// get all options
			if (!empty($this->options)) {
				foreach ($this->options as $key => $option) {
					$output[$key] = $this->getOption($key);
				}
			}
			// exit
			return $output;
		}

		/**
		 * Uninstall options
		 *
		 * @access public
		 * @return void
		 */
		public function uninstallOptions() {
			// check option name
			if (empty($this->optionName)) {
				return;
			}
			// uninstall options
			delete_option($this->optionName);
		}
	}
}

?>
