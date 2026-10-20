<?php
/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cityscape
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package cityscape
 * @since 1.0.0
 */

define('CITYSCAPE_THEME_ROOT', get_template_directory());
define('CITYSCAPE_THEME_ROOT_URL', get_template_directory_uri());
define('CITYSCAPE_INC', CITYSCAPE_THEME_ROOT . '/inc');
define('CITYSCAPE_THEME_SETTINGS', CITYSCAPE_INC . '/theme-settings');
define('CITYSCAPE_THEME_SETTINGS_IMAGES', CITYSCAPE_THEME_ROOT_URL . '/inc/theme-settings/images');
define('CITYSCAPE_TGMA', CITYSCAPE_INC . '/plugins/tgma');
define('CITYSCAPE_DYNAMIC_STYLESHEETS', CITYSCAPE_INC . '/theme-stylesheets');
define('CITYSCAPE_CSS', CITYSCAPE_THEME_ROOT_URL . '/assets/css');
define('CITYSCAPE_JS', CITYSCAPE_THEME_ROOT_URL . '/assets/js');
define('CITYSCAPE_ASSETS', CITYSCAPE_THEME_ROOT_URL . '/assets');
define('CITYSCAPE_DEV', true);


/**
 * Theme Initial File
 * @package cityscape
 * @since 1.0.0
 */
if (file_exists(CITYSCAPE_INC . '/theme-init.php')) {
    require_once CITYSCAPE_INC . '/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package cityscape
 * @since 1.0.0
 */
if (file_exists(CITYSCAPE_INC . '/theme-cs-function.php')) {
    require_once CITYSCAPE_INC . '/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package cityscape
 * @since 1.0.0
 */
if (file_exists(CITYSCAPE_INC . '/theme-helper-functions.php')) {

    require_once CITYSCAPE_INC . '/theme-helper-functions.php';
    if (!function_exists('cityscape')) {
        function cityscape()
        {
            return class_exists('Cityscape_Helper_Functions') ? new Cityscape_Helper_Functions() : false;
        }
    }
}

/**
 * admin style
 * @since 1.0.0
 */
function custom_tgmpa_admin_styles($hook) {
    // Check if we are on the TGMPA page
    if (strpos($hook, 'tgmpa') !== false) {
        wp_enqueue_style('custom-tgmpa-styles', get_template_directory_uri() . '/assets/css/admin-tgmpa-styles.css');
    }
}
add_action('admin_enqueue_scripts', 'custom_tgmpa_admin_styles');

/**
 * Nav menu fallback function
 * @since 1.0.0
 */
if (is_user_logged_in()) {
    function cityscape_theme_fallback_menu()
    {
        get_template_part('template-parts/default', 'menu');
    }
}