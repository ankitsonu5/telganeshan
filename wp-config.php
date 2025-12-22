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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '8#QRcL4bo1rmi@_>o#QDxD1k,-Kj 3hZk~$-}>0S1swQ2gP=1sEKg>fy?;=JQ<bC' );
define( 'SECURE_AUTH_KEY',   'yVQT0Z7rC[V/wbW[kV_5NlH($p`KJS{~vl0*4|n5>fI*3-cm}`LrUB$_7bvqf;1U' );
define( 'LOGGED_IN_KEY',     'u&0wAS*SuukQlN.?E}x%q!`3h7<F@3mHd^L>STb!rn;6lU}y@FYgg+h26?P>Ai2w' );
define( 'NONCE_KEY',         'dOn[M&-P1VDsM<ZU{OmDX,j5sKN-UJf&] &6O2.cH`1i R%sH^uE{L/A&!9-?LV1' );
define( 'AUTH_SALT',         '6qj ^6dcN[`JD(B!brpl1E0GpTUb!!~U^QuXLl]hw29*2N3^$1mg]M*2_u{1C>xi' );
define( 'SECURE_AUTH_SALT',  'fd1`*cH3_B_- 06pV#]&~t?.pU4,FL$z<O0e_.hHGIvy955bj4W&kMX:]pPB/G-W' );
define( 'LOGGED_IN_SALT',    ':Q=RJ`~5eK~|MwHnt]|vC]UP&QLUS9$P|fH2E&)T8htF^WaKgeTE5i,zvSyi[&Q&' );
define( 'NONCE_SALT',        'J`*Iga+>yvfrtyRit;%0Wn%:{>@N5*^7ZQ9Ucka)GLl;:}1yhsPAE8L1)*:s&@TN' );
define( 'WP_CACHE_KEY_SALT', '=SOG<Z]S+LSNK&^PTC@BlE#nKqa[$cnm(xEZ.oQnZ,=;hbu@/gQqVWW`q_EB+j3f' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
