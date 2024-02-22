<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db-lasunskin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'p]^7=+y0GSqg=&`uzo`^rtHPjD/ld9!xE77D?)gfk4@A7Q-CD!r5cVZT&${qM4Y(' );
define( 'SECURE_AUTH_KEY',  '+dhr|z@Vj,+Z%6%:12j64X(w}Z%*;t2Pbp{t,ia8H{<`A97A]0NHx_es%4j8Cx>n' );
define( 'LOGGED_IN_KEY',    'bHJ>OXgGDb+jW2Wz()04eadwO@!}d]+b@IR;VB!2RjtI~Mgz$*m,d%.#qARCG9=0' );
define( 'NONCE_KEY',        '4bYg>*~=W~=1>,dD;/+UZyC_(5_L4f=#dZ$wyW!B_V3Up#>CC;p{+cP(% <lMc(?' );
define( 'AUTH_SALT',        'p^gb/2Z&hOV~&z6%^h1iO KFU&<am$17B.Q,%yvSIMnIF&f;z.03~9{``f$K?54R' );
define( 'SECURE_AUTH_SALT', 'H(``zaD}Z|gv7o~Zbm<nr@f}kmLQygW#=e*4~!lqc|N@ U`WsM$bE9vDG|f9l&bF' );
define( 'LOGGED_IN_SALT',   '?_McUUr2az)|?o{L.~yd)Nlhqv6wgH(T6adOgqm[c;$?VtJccj$`RL4P8b5CT}mF' );
define( 'NONCE_SALT',       '>u ,vA}]C-R<lWIK?& 11/0]/-as^xAkI29Xh%_VzC/Gy*&~,sl)0 ZwaSLl%wyl' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_lsk_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
