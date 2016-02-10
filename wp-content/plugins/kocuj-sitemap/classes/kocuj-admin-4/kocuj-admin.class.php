<?php

/**
 * kocuj-admin.class.php
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

// load classes
if (is_admin()) {
	include_once dirname(__FILE__).'/includes/kocuj-admin-admin.class.php';
} else {
	include_once dirname(__FILE__).'/includes/kocuj-admin-admin-frontend.class.php';
}
include_once dirname(__FILE__).'/includes/kocuj-admin-config.class.php';

?>