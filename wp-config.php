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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'myanimal_woo_commerce' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '*EpA%xS( aVIbb$xE1&A<]4;rff*$DkhkNPwQ:<;|q6oh>l`bvA|._Gtb|2sa3m ' );
define( 'SECURE_AUTH_KEY',  'Nv&J1397,T4+>Z2=pB/{.,uZI+L5:b`*b1LAxy-i,d8#,JLit>=G-GCb:Q<r;B6g' );
define( 'LOGGED_IN_KEY',    'GiLWudb,e_N$/kb7JK5NbFeD&H|f$%P8a3lpJ566jP? UTi]P3#j-blWB26{ifV_' );
define( 'NONCE_KEY',        'kIt^(u+#=TgAue)*+/AQD0c#(-1J$=PuLy4Hx7d)Yz*}XfHpF%MsX%mz;J^wuLf/' );
define( 'AUTH_SALT',        'V7sY;b6/x.QBrbVmL4,}Lr kD&tTo|+f?rR2Q^=a08[t2CADB4=1LsMV3JlM`[!|' );
define( 'SECURE_AUTH_SALT', ',rR.qT**dP}o(ry@E%V+vKnK{n.,pVKOU-*~#Tw=?XoWjAebgd:DZp5 =62q9krM' );
define( 'LOGGED_IN_SALT',   ' al#m/pNZqAOwEO!}T_.uYOkr;smgw+}2x#_/i:Iogpw]K4Qj3#VHX6XM IT2b1N' );
define( 'NONCE_SALT',       '.H4o#=r1SJG+~Jb7l1o+XrE5iDROI-dI8Klk< Tw0%dkT*ERU2xo78oI~xu_*xU:' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
