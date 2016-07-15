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
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');
define('DB_HOST', 'mysqlhost');
define('DB_CHARSET', 'utf8mb4');
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

define('AUTH_KEY',         '!n`i|HKe~)#XiCMhDsZN|N^ME=lSE~x,YWo5HFcSt|l_Z|f!]/Bh,z;v96.xW;/~');
define('SECURE_AUTH_KEY',  '(E=vajoY^20UJ!O>#?ak-}8[:wmy!0j;Tfm?2{i%o=GWP+v!?OL$vC(.WTba,g.@');
define('LOGGED_IN_KEY',    'Q2?:AwSy~*R5iQ&Ng#RtiqOOCdg|Z{&y ;!HnTK&7_jG21{?>H:I%DW]Gq-z,Suq');
define('NONCE_KEY',        'YXg7q;s?#|E4AEqep$^kS%LJxfGiJ?+(8J]>G8EgcFad#ygF@#5^2`02hSK]M}i/');
define('AUTH_SALT',        '>`o$h^as[u-&J6[&8q=LFP~kznZG`:$)zHAZI3Ne3=mWY|%<L2b>mtM_:r#e#){E');
define('SECURE_AUTH_SALT', '4Nndn<h|#SefFw6Q$!rqdAd}d[e]bL1QM>@4a_R0alomaO-M^xy2q}~MM =gnuqA');
define('LOGGED_IN_SALT',   'EJ|dOp8-)1R;gs2eTSXxY*=aw@WOK6/&vi;[TSV^(?/BO.Dk;VkP8Jg&Q~N{`(j3');
define('NONCE_SALT',       '>V E$pj]t+H2 iB!z1tHGD@q:]glf5}Kl;O+_8hZA;l5S1JuHg%q-k~f>_u$}7:z');

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
