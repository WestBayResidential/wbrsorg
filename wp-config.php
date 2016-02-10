<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

/** MySQL database username */

/** MySQL database password */

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
define('FS_METHOD', 'direct');
define('AUTH_KEY',         '_eZPw<QPU^pwKh^e<d&UlbX4!b0W%@9#dZQ5MRQHTDd=Hoxr2tf,9@!_qBNE-(3*');
define('SECURE_AUTH_KEY',  ';3[70u-HKamw9^6,a+(PDwQt0C:=U(sPgt@kX^{fT`,TBUk9-GZyw{X8G1gsETgh');
define('LOGGED_IN_KEY',    '<Z:W4d4I{-VrhhPX/||f[x|P+JMVdl.:j/Z0og<YF88xfq(^!|!:QC+<cQ^LkfYi');
define('NONCE_KEY',        '/Fqr^Nz[[CGDW|>t0}RiRd-zW-wrrh]#gS$z:C!21blrU |M:loY--T08RlAtd(t');
define('AUTH_SALT',        ']]6vT@7vl$SV|r K/{~>U?oew)dkz9D;I9wp&A$ws1zY=Z=`6lia0rW>y^:5V_sa');
define('SECURE_AUTH_SALT', '1^EX4292qVUzy[S%~+ILE#N S4@N1rb~]3Q/?qY_bl$4Y +:mlgx4hyJ=~CgbxLe');
define('LOGGED_IN_SALT',   'H)xW-+:?-xJ-|n M]sGkQF5Z9NXhWmpI5V_/#Y;S?EhMQgn-scKZVegq!f{R?$,*');
define('NONCE_SALT',       'whAuao_pPtF9+W[8Q<aKD3k/-J-|&K|i6]DQv2hRyT +m8WU4]H8`E50&~!k;)uN');
define('DB_NAME', 'wordpress');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', 'vpTtA4hE5Y');
require_once(ABSPATH . 'wp-settings.php');
