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
define('DB_NAME', 'wordpress830');

/** MySQL database username */
define('DB_USER', 'wordpressuser218');

/** MySQL database password */
define('DB_PASSWORD', ']_]cKqFcNIEI');

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
define('AUTH_KEY',         '[8mD>[^;7|MxWF_p^4:G~Qx1)>d:EX,qH)GX*_EmKJr_zzrS04G+V+P.|]GXu=HH');
define('SECURE_AUTH_KEY',  '@VN8| 43^H~}MOaK|(2RSb`=?X_LuQ[eBH/vl*5+6QKQZWSy^6z(VR14S/D0)Rx@');
define('LOGGED_IN_KEY',    'tIw%Kmb3vwv9j?pBlqp}z)GVO`c,GkE<S3j@6E+,!=?<QmYmI[W`-S(1(hUA}l9C');
define('NONCE_KEY',        '?ZjV+zDS_f+2=; Go#UH3bR4w6::(xX=g+|-QN>782EocS]BDtqxrudSbcNF/(f>');
define('AUTH_SALT',        '];%i|zm=X >a)q%d#|AX,Wn_b.-Vq9+T.FXlMHAm?&Vi%v.1)!Z<PP{z5XyHPQ~T');
define('SECURE_AUTH_SALT', 'qA=SkhZ?M^u~lPl3:!x i.Z3xX6aBM/+#Rbmu?>-nS#[hA]ej=_3zkQ?u+Ngums ');
define('LOGGED_IN_SALT',   'fc9q4rB|Ee,QRh3v5(caBqG=h/joL~6p?o8(J~%;y Jsb6VtP6@1@*XLlf3-K~g9');
define('NONCE_SALT',       '+O+t|1JcBM[U,y0iMU8quoC_R?&/Xfe%X}j|#:P-gUS=r!Y;S>JS*=+~woKeJ,q<');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
