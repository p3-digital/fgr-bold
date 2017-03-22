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
define('DB_NAME', 'bold');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

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
define('AUTH_KEY',         ';Z0DHf+xJNpUBBVmmuH2k(rSEVyT.|/$&sdyv!b[^23UQT42kLbkoOG)*Ve_eSD{');
define('SECURE_AUTH_KEY',  'Z;@UrCV];5>]@If,O{x@[>vbGQ4s-KJ<`jK7o FS5T|a_=kEPnJ mJlHU=0rf!Nq');
define('LOGGED_IN_KEY',    'D=mZ!M]CF1,d?T`0C2n/i`I_h(rwM32VZ+:VRWAJv|1V4:B #o|;~7FZKeC2{~r0');
define('NONCE_KEY',        'Q&nAz#Q{^7+=b~fu<O|8WezI:0<e9-;}x8{hF8U2dI%;,0cCaztS%Yr=WmI&dX6i');
define('AUTH_SALT',        '`QY/loo3L4xji42ZdGfuR-rjy.M#.tlWV> 4y lHg3tXYj!+Qwh<D%e~x7}bb1J}');
define('SECURE_AUTH_SALT', '}o5Def)gBNmcZa}Spyd_SHuYix1E.x,=nHMU^cGDo]-CGO#THy$^LX%wssd4]3>9');
define('LOGGED_IN_SALT',   'V~j[LA)&<5Jqv]O!q%]bvJUSGDc&=K}Pd(Zk;_}7nutgauvu?v%1E$&n5jtOo(tT');
define('NONCE_SALT',       '@%HxY~R-E;2:ao)7Y$qRqnA9[XR,@>*/!pGwY&l2#_F0A>eL+HY0p~ZYZH-&4t0z');

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
