<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'seadb');

/** MySQL database username */
define('DB_USER', 'wpworker');

/** MySQL database password */
define('DB_PASSWORD', 'w2009rks');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5xlQbX$RI,Lb+x)dB(wy+j6R3>H?LZ,r^|iQ@!HTk,A;+qGA+.IUr/5-ODy]]kR8');
define('SECURE_AUTH_KEY',  ':I=r 1bCWIQfCI>Nw*q1swf!l#QYm!Yubl>Ji`qOik0aD1xgqIrOaJyY3|9yLMx!');
define('LOGGED_IN_KEY',    'L6DzdUw5k|+tL+7=<z-bc<14e;6YpBL yn`O.@+V=?aNzWGsY$jgJ-=xV-SLA1)c');
define('NONCE_KEY',        '=C<YF[oF5&u@7JQ0MK+?2EVvllr|$Bm|{VZ5S!{#L8KTzGR4M@d?8%`[xQk8>mDg');
define('AUTH_SALT',        '}_jubk~qH$KFB3jI1>T5F+^H?Z8zG%a[F#&u4^+N9%FM}#BSfV(e-&~-WS#puY!l');
define('SECURE_AUTH_SALT', 'ibiRumw8+z=+%05Vclj%]B;aslET]ml=8yxrGz*0SV{&cz=Vvj+e*x]+}XfT$&-A');
define('LOGGED_IN_SALT',   '@Aq-/&3RBm0B;-(/-{4:>4Hn|:B%q@[V[1z-FfddCv]KIP|Jw`LRZ~-rE|L+O6a{');
define('NONCE_SALT',       '9qRq--afJ|a(2QUKZ=y4O)kt-77Nj!!l}a. f(q-+]*]+wyq+W6$H-EYWA#j;tpg');
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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

define('WP_CACHE', true);


/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/*define('WPCACHEHOME', __FILE__.'/wp-content/plugins/wp-super-cache/');*/
define('WPCACHEHOME', ABSPATH . '/wp-content/plugins/wp-super-cache/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
