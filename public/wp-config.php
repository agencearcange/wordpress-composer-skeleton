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

require __DIR__.'/../vendor/autoload.php';

$parameters = __DIR__. '/../config/parameters.yml';

if (!file_exists($parameters)) {
    throw new \RuntimeException('parameters.yml file is not defined. You need to define variables for configuration.');
}


$config = Symfony\Component\Yaml\Yaml::parseFile($parameters);
$var = $config['parameters'];

define('APP_ENV', $var['app_env'] != false ? $var['app_env'] : 'PROD');


// ** MySQL settings - You can get this info from your web host ** //

/** MySQL database name */
define('DB_NAME', $var['db_name']);
/** MySQL database username */
define('DB_USER', $var['db_user']);
/** MySQL database password */
define('DB_PASSWORD', $var['db_password']);
/** MySQL hostname */
define('DB_HOST', $var['db_host']);


if (APP_ENV === 'DEV') {
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
    define('WP_DEBUG', $var['debug']);
    // Active l'accès direct pour les mise à jour, sans passer par FTP
    define('FS_METHOD', 'direct');
    // Disable file edit
    define('DISALLOW_FILE_EDIT', true);
    // Enable theme and plugin managment (delete)
    define('DISALLOW_FILE_MODS', false);
    // Disable post revisions (not used on dev mod)
    define('WP_POST_REVISIONS', false);

} else {
    define('WP_DEBUG', $var['debug']);
    // Enable direct method for update
    define('FS_METHOD', 'direct');
    // Disable file edit
    define('DISALLOW_FILE_EDIT', true);
    // Disable theme and plugin managment (delete)
    define('DISALLOW_FILE_MODS', true);
    // Enable HTTPS on login page
    define('FORCE_SSL_LOGIN', true);
    // Enable HTTPS on admin dashboard
    define('FORCE_SSL_ADMIN', true);
    // Enable post revisions
    define('WP_POST_REVISIONS', true);
    // Enable minor update
    define('WP_AUTO_UPDATE_CORE', 'minor');
}

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
if (file_exists(__DIR__ . '/salts.php')) {
    require __DIR__ . '/salt.php';
}


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/* That's all, stop editing! Happy blogging. */


/** Absolute path to the WordPress directory. */

$isSsl = filter_var(empty($_SERVER['HTTPS']) ? false : $_SERVER['HTTPS'], FILTER_VALIDATE_BOOLEAN);

define('WP_CONTENT_DIR', __DIR__.'/content');
define('WP_CONTENT_URL', sprintf('%s://%s/content', $isSsl ? 'https' : 'http', $_SERVER['HTTP_HOST']));
define('WP_SITEURL', sprintf('%s://%s/wp', $isSsl ? 'https' : 'http', $_SERVER['HTTP_HOST']));
define('WP_HOME', sprintf('%s://%s', $isSsl ? 'https' : 'http', $_SERVER['HTTP_HOST']));

unset($isSsl);

!defined('ABSPATH') && define('ABSPATH', __DIR__.'/wp/');

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';