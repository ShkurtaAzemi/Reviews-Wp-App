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
$db = parse_url($_ENV["DATABASE_URL"]);

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
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0qJDlmy&+dD`K;Z}<=yZ8Z9rJbz[fTD|EIf7oJ[q&|QUm`39RHc@XpET&)*q8G_M');
define('SECURE_AUTH_KEY',  'gN&|6V9+rnC$v}x|,s8zAQ#r9!tSk+pxmjB77^u92iZQHAZuHXyjx|Ro`Wi,_*)g');
define('LOGGED_IN_KEY',    'uktyN_0_-G+|]S QHPB2B-Ba+ 1k^,CJMIE4Q$|@:#OHXSL)L.gDq|V(!&b1bxGn');
define('NONCE_KEY',        'oN`uL+~|H9({vwmdL!Lk|>e5n)Ytn+^};B1*zFeG_kk-ULfjX>m/veB><7u)|-yv');
define('AUTH_SALT',        'M2cc,6|.1rXUI9>dg}C-Ck5<Zv0c^},MlzK96v=u6I`=7%FMK1+Q|H)ysdmA)SF5');
define('SECURE_AUTH_SALT', 'Dukk.-f(=M[po&w/:hF_c--$,hYjlC5/t|]=C?{yR*2Pgl#Qr;)yVr]r/d&s=j*}');
define('LOGGED_IN_SALT',   '</Wr}i|>cR)K~QgYA,|KvjLH8a:pK g4%8})P[WHm+9{P`y/pzN2xPdYA6vUmi3a');
define('NONCE_SALT',       '_gaPPktbFT(GT65<A<rrqEj,y^P4pA$tf01;a2p|)i(!ROK:n70iax~>S(9(+zX*');

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