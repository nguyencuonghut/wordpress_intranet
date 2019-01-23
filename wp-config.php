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
define('DB_NAME', 'wordpress_intranet');

/** MySQL database username */
define('DB_USER', 'wordpress_intranet');

/** MySQL database password */
define('DB_PASSWORD', 'Hongha@123');

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
define('AUTH_KEY',         'lI0QmHC_V^Uads~2[/J!-OQ4<A1kX~/;zgjh#Q^NN0i#{U;<P|/>R|*lB,{*&9S>');
define('SECURE_AUTH_KEY',  '*qyAH]lhDC#i&!t>Y*vjY@V+~R^+f<F/N!S.E[4*]s)QriD v/L?2~#cnzZv^m0M');
define('LOGGED_IN_KEY',    '<xd-}kne.qLR~k3vy4T%]Fpl/Tg1<1Sf&z`%#6HBt@w.sxkWiEd_AXM5bz @U!.j');
define('NONCE_KEY',        'Mkx%[,RgcF_u+_gYq9q+@j5{>FHM$~%O?lcx^#IopTe&c =<~ 8wbU7(>/g)9/f=');
define('AUTH_SALT',        '`8xi1/4Fh2O]SEjC/95cwj[oV|}rvQ@!z:T;vbQvpPM}$eY!I~hJ2F3YJMl8Ay~Q');
define('SECURE_AUTH_SALT', '@A&1q{twfzp/w|>4o(M_lJD~wdtLby)v~-@]@wCPS8R?O7!~CdWtC-@&/}I=+2>1');
define('LOGGED_IN_SALT',   'IW_S:I8kh_=urlV1T@R&1AQ&xpmsKo:1O*kdpygEF<+V.?d>$jC{+>t_;c}$zKpH');
define('NONCE_SALT',       'Zl1pFd8W/X#?>:.PO:9yB_SNNM-+!)?U^O<1?E rNE&tnX<dMQm&0q}wwTQ{~%JI');

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
