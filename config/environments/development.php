<?php
/**
 * Configuration overrides for WP_ENV === 'development'
 */

use Roots\WPConfig\Config;

Config::define('SAVEQUERIES', true);
Config::define('WP_DEBUG', true);
Config::define('WP_DEBUG_DISPLAY', true);
Config::define('WP_DISABLE_FATAL_ERROR_HANDLER', true);
Config::define('SCRIPT_DEBUG', true);

ini_set('display_errors', '1');

// Enable plugin and theme updates and installation from the admin
Config::define('DISALLOW_FILE_MODS', false);

// HACK for local dev
if (($_SERVER['REMOTE_ADDR'] === '127.0.0.1' || $_SERVER['REMOTE_ADDR'] === '::1') && (!defined( 'WP_CLI') && isset($_SERVER['HTTP_HOST']))) {
    $isSsl = filter_var(empty($_SERVER['HTTPS']) ? false : $_SERVER['HTTPS'], FILTER_VALIDATE_BOOLEAN);

    if (parse_url($_SERVER['REQUEST_URI'])['path'] === "/wp/wp-admin/" || parse_url($_SERVER['REQUEST_URI'])['path'] === "/wp/wp-admin"  ) {
        header('Location: ' . sprintf('%s://%s', $isSsl ? 'https' : 'http', $_SERVER['SERVER_NAME'] . "/wp/wp-admin/index.php"));
        exit();
    }

    unset($isSsl);
}
