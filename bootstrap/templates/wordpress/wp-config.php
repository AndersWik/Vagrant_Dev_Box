<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Sa%VGu^Q<7cVKd^DcDC<B)}E(WUV@PAp.p^lj4nvhT=XbdA4M%A|mXg)e<K>w*..');
define('SECURE_AUTH_KEY',  '0aTtf4d;Qefz>XH,c#09+,,w-z<ZR4k6?Rlu)u0f&J^W}i7Bp[%b)Rf$ ~s/:(BK');
define('LOGGED_IN_KEY',    'FR?q|gw$t?U6PlS%(a_F~t;W8qe5&=y<vwkF4xnkJfQG 7&^q#60vCnrW=6s<Sy:');
define('NONCE_KEY',        '!7i:V~#6v@99)r)nC]<epn!|&On}.<2u,Dbmf<e>%[F{CTn(>?AY+RV!=!5~|^QM');
define('AUTH_SALT',        '#o{CgaN|)t9kj-)Oex<+L$&}rU[J*=Z)hon^<[H#5ctiisNXYdSle%|2&Ir+$;Qt');
define('SECURE_AUTH_SALT', 'N,$Tm8/AI>BC&IY~,$=iNB_1qDSg1J1!n*)S[5Tr9#j-e}HLR]L(/BCQ4=ft%)^6');
define('LOGGED_IN_SALT',   'obpV@|$ E9{Z sbeM2J*5H ~*25nWgPW7RobX?yHjc~>Fj5wu12%ppf7RQlt& .Y');
define('NONCE_SALT',       '#)e*)R>{E|0dI:)O(9cU(IO}iXAOXdt(B+A|g.]p,6oFI..Ibm<job?_l-Yjb?3j');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
