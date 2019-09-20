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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0EjrUMhRg0FX/MIV/yQjttVAypmiHyi+Za7eO7w81ycVZBhDyeCsIZpmFrwWD0iSh7g1W+Dk/hsSqWvMTpo3tA==');
define('SECURE_AUTH_KEY',  'GLL/MZnZoiFBUAURl/bTv/IaiWzXcS7HeFGDqpLhtLTRDDSLYHYq9GTvesX6lIXNJznWVA80XP9jateQI106nw==');
define('LOGGED_IN_KEY',    'yu7b/CyA8W9ECsyGaj4VaMAQWsh3KUapJ3CorAuszXJkF7vfxtcJ9zReT21G2FTuWSUXrG1aJYXdgmdITSvB6Q==');
define('NONCE_KEY',        'qSM7MS5TLfLDWgeftRrrkFfTHKZIFpSK2Cew5F28UGyMbd7oerlBGksfyBaEnkO69KhOjISyn07uYOnUTsRYOw==');
define('AUTH_SALT',        'n+1n66j+kgMAQNaNqw8XvgwjRqu1WH4tGefz/l8dxeGUxGae3/41Imo6DKLCRQxsIY4bNGPRMl9KFbzGKUT2kA==');
define('SECURE_AUTH_SALT', 'hewsS3JhRSFqTMHWd/r5SlWJWk5oFGoCiiQICtq+8HvgolvPNJHq5tH2zldI0H2f4/mQSOovwRy9uAxxLuJv2g==');
define('LOGGED_IN_SALT',   'fkpdtTfDTaO2osl4YVO+FZXqkbmv1d0cLcIYzKOFQ0jlG6e9CPg9xtiyGPOg2P+z4WLVd6S4gADOszOFskA/vA==');
define('NONCE_SALT',       'PNXL4M4UrSocnimoVEWNJxHLk3ET7xcPx716ego3VAXx8Iqj4qzmV/l+Q5xfnB5kf+c82sU4j79FdwZ7pZ311w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
