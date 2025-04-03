<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */


//FTP Credentials
//define('FS_METHOD', 'direct');
	
//define('FORCE_SSL_ADMIN', true);


// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', 'Admin@123#@!$');

/** Database hostname */
define( 'DB_HOST', '10.0.4.124' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[PiK|*IN=urvH.,Kh%(qUp##zFgi;B]mdms*c6)%gz|Zy}=mLXr(Q|__LQSLLHmg' );
define( 'SECURE_AUTH_KEY',  'nTnQHFop4l80AU>$W%ktg6x_)C%}xg`szEDu?77dRI%^Cqyc[0Va?4k^*~`_s@J@' );
define( 'LOGGED_IN_KEY',    ')WC6`l=vfwm=f}ja5`_OdSl5AiHR7b}p$qI`L:9hl=Px8L|:Sh :8I@ie(XJ*epj' );
define( 'NONCE_KEY',        'Ykxmu_c)xPa,8|tQ8R<,B&$dmA%TB;Hi4)OfV$O!ZP2pz2$cqL{7!bSU`xqjO7R7' );
define( 'AUTH_SALT',        'o633f!+0YkG;2.;h~.zzp2aXcxmMu1[<^R~+9phS[mb*)AWx-E*28tDQ;E{c=LV0' );
define( 'SECURE_AUTH_SALT', 'u3[apkEgSAIqkOK@KtH[T{Z~< 1wY@K2!U#W}Vp<`UmarnqU$OubWNcy%|YuyjF2' );
define( 'LOGGED_IN_SALT',   '8bADawlfAfvbyo14{s@C@(q?^j=vv:OOV`v5,d[bMd3s3%6RFf`!}uy5M!n6`,g+' );
define( 'NONCE_SALT',       'ZQKger7=#NXv}X|-p<bqZU`ME1ZAl bV=*#T%JuX9lAx?;:om-Tyup,?0e|Y<dYE' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', TRUE );


//$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";

// Set SITEURL and HOME using a dynamic protocol.
//define('WP_SITEURL', $protocol . '://' . $_SERVER['HTTP_HOST']);
//define('WP_HOME', $protocol . '://' . $_SERVER['HTTP_HOST']);




/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
