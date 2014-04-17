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

define('DB_NAME', 'eurobalk_wordpress');



/** MySQL database username */

define('DB_USER', 'eurobalk_bloger');



/** MySQL database password */

define('DB_PASSWORD', 'Ca70zDEtQRt2y34rd');



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

define('AUTH_KEY',         '+G?oLfbQ07~?:}Z}+M!e6Fa>@/b<]Vg~27gN~JK7/Ak@fdB7i-G.RT^glqo-<x,X');

define('SECURE_AUTH_KEY',  'L7;^3F_]j0K(=PpK1l|3klxJ3O6|MY|Cy^[Gk^oyqjYW@a~/]`,hB+iociIpT3p-');

define('LOGGED_IN_KEY',    'Q+st,@ Kh<]`w~^-U|fe?N@al~ILs_Hb4b vl]=YUlA4mg9&ZoI3{PW8;w?Z}Y%I');

define('NONCE_KEY',        'c{WWjw+u9/@2-T%8e(-I#+mDl|1x0BH&Bt-8bE_}KY,k|kdAakF!ypkF4n<L]j!A');

define('AUTH_SALT',        'xN6GUI*{@<U*Ge+Hm,p|H*NXFabl;!1!YhN_Rz+|J]/_(Boa>*8/=0ld?zYE3gSZ');

define('SECURE_AUTH_SALT', 'E|n=shWX<m8`wmRk@2#H.[UP+&1JJ)c1C!s(kdO85|{Z/]r!$Ge#ozi8s`^28X@I');

define('LOGGED_IN_SALT',   'xa&]]t+q<!?K|PG^+4@;HC(L(6T|fK:2I,9Zeq130%{xwI$UTuou=n+y]jc|+kl,');

define('NONCE_SALT',       '&NES&QnX2eT;k9HZOC%u!q^L6AV|nx!B_]B~@xr>H(PYz:oIODm+ItUt]-O6#]Yf');



/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each a unique

 * prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'dym_';



/**

 * WordPress Localized Language, defaults to English.

 *

 * Change this to localize WordPress. A corresponding MO file for the chosen

 * language must be installed to wp-content/languages. For example, install

 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German

 * language support.

 */

define('WPLANG', '');



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

