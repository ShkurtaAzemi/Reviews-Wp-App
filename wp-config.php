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

// ** Heroku Postgres settings - from Heroku Environment ** //
$db = parse_url($_ENV["JAWSDB_MARIA_URL"]);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', trim($db["path"],"/"));

/** MySQL database username */
define('DB_USER', $db["user"]);

/** MySQL database password */
define('DB_PASSWORD', $db["pass"]);

/** MySQL hostname */
define('DB_HOST', $db["host"]);

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
define('AUTH_KEY',         '%N8-Hqo,L&Zaf7lX7,~nTr}Z$ap%uSC7-/&9.U ?B4p?.bv(uN8>e-Kk A&=$e8j');
define('SECURE_AUTH_KEY',  ',gjg.YyHKPppK^Wy)N*xDv*HU}@^pB4D+]& gyHGH9YBU[o:i]In`ZUrzbDH--JK');
define('LOGGED_IN_KEY',    '_NBc5A+wd;1G,}N^)Adz?H-|0TzF[Yy6:Ab1j!@.>]SEC<7_}Bn1>T>SS09v6&1M');
define('NONCE_KEY',        'ZPqKQ.:l|5V0GH.Y-@V3t$M-?=[+WfWJb3]*Z-.*qqK9A/KcGXS*{-F<jWBzK7SK');
define('AUTH_SALT',        ':NM@<5W9;tR9R!4N!ak C{@O*W|u2BxW3n;o?vrUaQdB&Ji|t35=rxx)1dOG<j>&');
define('SECURE_AUTH_SALT', 'un*R|+|v$KyP[zp&1pc($_tbcy]R~@kgqn^2-!P|-|.:t}-<w_waCiP[;Cuf5<fV');
define('LOGGED_IN_SALT',   'hbKH+1Z+]Z5r%7R*va6;>&<bd#uyz,itBm= Ru #E} -QCU5X?<vg3&!g0kP- M}');
define('NONCE_SALT',       '.%LSXHn/<9c(u_,-c 18<Qno-;g^-&,%I],n}}fNGs2`m!R1j~>gV0KIHta4IcIj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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