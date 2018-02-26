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
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'R(sJ^[#.`jm?)=66@}g@P;Hlt<g8g<@zeE.;0l^a`A%lvMyGQIsMd)ofU(IRDkIn');
define('SECURE_AUTH_KEY',  'i+_3.fF&[up|q{S5a^0(4jLG7CL=(o.A?AzTh%WaYZhp!Q3@9!Kj!|HT|S3PPld]');
define('LOGGED_IN_KEY',    'PE9SR7rcz6s<t5f(Y_M*(9|1|Iw[8cE|n7iNR5N.4u|)uudnf/>-<zSdkNohB&=v');
define('NONCE_KEY',        '>gP!|]tHy#P:%_>q/)O}miDW]q#:J@h3NQYGn: %x)LQUK&fS!Wu]p$N_l6kk~03');
define('AUTH_SALT',        '}`}+Ut(;qlLdDkT5zAlT(qlq6FWmzk-FUgEON9T/3k?!G,dt}ygM^;Wh@}V].muL');
define('SECURE_AUTH_SALT', 'l^q2G9)+Jnz;}S6RqC;co3]W}G26fh[q(,::_~X@5-2$Z^xv9}t:D7W(EPL2<Swr');
define('LOGGED_IN_SALT',   'dzf8%_,OK* O$6o;V/^OKG&Ttz)]7Y!TKw91r!k8!+a7_q5]l0`C=fj-TYd$j!w;');
define('NONCE_SALT',       'c6l,Ja[&xt>G=+WZ7/7H{ScM(Jr`/fqXCUca:6=i]vtlMh3]a2s|wX]h}rLZ:E[j');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
