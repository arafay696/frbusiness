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
define('DB_NAME', 'mybusiness');

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
define('AUTH_KEY',         'Zm@fgOhB}b49O:(36w0kk``_dD1LSU7F2bNKd(ADV[KD?,z~c3vdFoiZa28qizTr');
define('SECURE_AUTH_KEY',  'J>!tPwvYDcs%7N-&TC?n|4wZD> X$gAaCIAw:cd}YOj}`=gKaUl)6(h{=<?X9:ld');
define('LOGGED_IN_KEY',    '=:]_T{y_@}K`6]uG7%nR](yM:k`vl3@esD_7hknx+hWuf4HJYtc-($d7-]d>`,In');
define('NONCE_KEY',        'Ja{]I!(Fc2N{MiFKqnG6T8YJvF6e;)nG5s_;3kQ&`m2%+ZJ.mH_mBI-I)q[.)Lhm');
define('AUTH_SALT',        'g(wG},:Z0F(`OUs9}VR&QU^0Xn?i?L3H(k7#HBsg/gRqurbz5KpHo]Eb[mcf]0lX');
define('SECURE_AUTH_SALT', 'OHu_281o9w&crL=!M_CfJ?W=[SmrD=V1~:AJ#t+[0u?l{YxOh28qC*_TXo*]mW<6');
define('LOGGED_IN_SALT',   'FSed)F~f|NqlkId]GjIL:nG>zT}T^0/AQc$cY,sAF]r3yiG[a*o4Qf;$%j HifY,');
define('NONCE_SALT',       '!p~idM#q>2R<pxgJvj@o:rT_)go:aj-}4;4u^DO[P>MYW2jtNuf1)7>_xL1$OV58');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
define('WP_MEMORY_LIMIT', '256M');
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
