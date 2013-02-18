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
define('DB_NAME', 'socialwi_wordpress');

/** MySQL database username */
define('DB_USER', 'socialwi_admin');

/** MySQL database password */
define('DB_PASSWORD', 'Velez12$');

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
define('AUTH_KEY',         'BV]0_k]j~dl^aLJ>6]KOWI,y@+~dO[S{4xJd2QAxolF1FU=p#<&ZCDQ/j|TwU$8q');
define('SECURE_AUTH_KEY',  '43@^Je  KN(8Ah@Is{:1%aXsQuj(&I-P;$<E_@g3:0^-sp4 T`N]+Gp;1~:msAkZ');
define('LOGGED_IN_KEY',    '`7[pJ5F!QKGF!0E|V}0V#KU/3TE&`GRr41|I,+1=`__Gu]nJmSrJeum(QWUqqN|7');
define('NONCE_KEY',        'q>[H!%PafvqxU bcoWMRPX*}QeS.-44xK|e&wwPtIO@=?-+S)ivhG#!Ve^sx*Hpo');
define('AUTH_SALT',        ' {S!x#1]Lb^?VHUE= jk=`F_A9ahe:aXZiF?pODQo{2?H,-Z5P9tST3@I:jCYK&8');
define('SECURE_AUTH_SALT', '?-X+so=y_|U?}/(Bfad] (FLL#+7mm+!aM6A#_-:_(S9RWu4m_/,bF.bH0S]=iT9');
define('LOGGED_IN_SALT',   '!Q#iq33fRS e_34LOMB~;zqicmKlr;24$?y*vgWlo6XKdK^{M7?G^]]S@P^~bHfd');
define('NONCE_SALT',       'YzP8V%1`!-(Oe/er9R_4c(Cvv7=$i)5drR}L;fOv5!$NKfRLS#{i.,o&LNFG@r1q');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
