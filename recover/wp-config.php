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
define('DB_NAME', 'recoverlink');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '_h=8~PW]5C9}4^ZV:O_wgS2#Yh$2b*@:@fuycMAP_IP3*A@9XRu9@L]/1i3N3agC');
define('SECURE_AUTH_KEY',  '!b4m QOa??@hW//}>#mW)R=SYe`K)N-utq$sHS~2U)<j $AG(]s;bZn_N:V~mkWA');
define('LOGGED_IN_KEY',    '7K#98Uo1gy>!L<;6-H<VX4g=C9X+s6wBMF1;+LE>}z?tg:n/9Ar4{`g3Op][9Z!&');
define('NONCE_KEY',        '=qCd1Go%mezsckbbubU_M^# k7#IAS6&YQs/|3kLY@y-q3[jFN&su;B9O9BjpgrY');
define('AUTH_SALT',        'O)*}P-kn4BeJ5+h713BNAs*T5CA@XuuAv0@d^RC?{2)xb%W82UF2Gb/NDaG~&Aw%');
define('SECURE_AUTH_SALT', 'HfB8`id0TWrBiA&VyBp1/9eC1Y=4]nhIUQ5,$?D[}0Q,Oir76916]AIpfz0l0:Y&');
define('LOGGED_IN_SALT',   'Ionc~E1HWCqxphs?FEaaYvahaD6zTeDo-5flmqu&PBa2c6u:o[xG8)k1v8m[T>Xz');
define('NONCE_SALT',       '~Iggs/a)u[Njy_.@*tfv%%}[VwCNyR[(1;TRO{i:Z-Yn^ktjbXPXPe_.3%[&XYnE');

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
/* user defined*/
define('SITE_NAME','ReturnIt');
