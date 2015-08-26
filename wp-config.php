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

define('WP_HOME','http://energysmartresident.tk');
define('WP_SITEURL','http://energysmartresident.tk');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'titanium_wp_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '{e$SZ=_osvZryPqSxAd^iaQ>b5~Kh2LATBK+;z;8 VXko=|-Mq8zkB,ZR0|9}E55');
define('SECURE_AUTH_KEY',  '0;GL,eS7iJ:|<-4RS5jV,A<Wc:kDv22pZc|xVt]tN_s_^:RS|^$x40 JRAGiz?)x');
define('LOGGED_IN_KEY',    '@!z.sn=qCA`@TCcbJ/5?}m|YG|]Xj2D2-q6;jT:czz[(~jXzSx2%9F<&3=jzFCW|');
define('NONCE_KEY',        'A7k`iM.nR<w`IKR|w!KpPu2^yR#qY!fw%MNxOoRXnbRsn(S.t`JDN$:%G||~m&+%');
define('AUTH_SALT',        ',&83<3~h|VU9e3^RlAn%U$F0LQ^X,XP-/`F`(zh/Y+c,ZrL{Z#+}y1Y0fwA<n#;G');
define('SECURE_AUTH_SALT', 'w<t0v;]ki(#O9Z/Sh7r;y+vGE$4v4&QA$IxE0O+uEYmeKXuD/Nfm}`ryif,h o;X');
define('LOGGED_IN_SALT',   '#L5rR&AjR(#C++-.Wa$2V7|VX2J!OS*F@I;iW3a84^^%k%~,4E#%+U^+aV.3Wh{2');
define('NONCE_SALT',       'CLRb.^., uq[u5uo!5D`|PUHi;&(Xz`j>R};*C(i%GaOU-TzoYP58V RL*nv++LH');

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
// Enable WP_DEBUG mode
define('WP_DEBUG', true);

// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

// Disable display of errors and warnings
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors',0);
@ini_set('error_log', dirname(__FILE__) . '/wp-content/debug.log'); /* path to server-writable log file */

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define('SCRIPT_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
