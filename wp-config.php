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
define('DB_NAME', 'daft_roasters');
/** MySQL database username */
define('DB_USER', 'daft_usr_test');
/** MySQL database password */
define('DB_PASSWORD', 'qpalzm1029');
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
define('AUTH_KEY',         '4}EU8&gRB/hk}`2I]{->@LNEVBG+}=L}lYR(Vvj<OA}k|;jj<44w)eOaW(^sh&3~');
define('SECURE_AUTH_KEY',  '$!e[D*wOlUu9/w#WniLM( 3,g6$o>K;HW@gcwO]=`}To+GB|,GKu`>r[Yu-GAK=4');
define('LOGGED_IN_KEY',    'y.[Xk&x[Nj4%5x)!_+&bij=hE0zZW:%4v[KF=ScB)zzriB8KIGx$_DujN?@jUV:>');
define('NONCE_KEY',        'z+!dt6rZT_7b!eH74V!{/=9`7hE-Mvz)Y{U1>]BkwVY0tW0YO3QcR.dzfvq1%YY7');
define('AUTH_SALT',        '0N;-fx@P+{rv|4vBKIq@HK9J^j#C`:rBnUN!-h4L4ch m~1r A>r!0rhR_4Z?T$E');
define('SECURE_AUTH_SALT', 'M%o#k.#QQ&xCN}c$t!2E^jZ,0[2p3p{Y:ZJ}$~BA<+w[r_5GrWZP5Nm<P07)<)yo');
define('LOGGED_IN_SALT',   'Fq`re<T|<s;J{0]![+e(BF12o]m5=()It8ullo]vRjH~oVkt@*}*Wo,S1n+[S-OU');
define('NONCE_SALT',       'Te>&[D/WKaFpPTO=?,%X>]u`0qwnVM$Zj2JOe+]S{f|x}l8EJ[}&q^|fc5~sH+~V');
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