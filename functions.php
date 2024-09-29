<?php

if (!defined('_S_VERSION')) {
     // Replace the version number of the theme on each release.
     define('_S_VERSION', '1.0.0');
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zyan_setup()
{
     /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on zyan, use a find and replace
		* to change 'zyan' to the name of your theme in all the template files.
		*/
     load_theme_textdomain('zyan', get_template_directory() . '/languages');

     // Add default posts and comments RSS feed links to head.
     add_theme_support('automatic-feed-links');

     /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
     add_theme_support('title-tag');

     /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-img-post-thumbnails/
		*/
     add_theme_support('post-thumbnails');

     // This theme uses wp_nav_menu() in one location.

     register_nav_menus(
          array(
               'menu-1' => esc_html__('Primary', 'zyan'),
               'menu-2' => esc_html__('Secondary', 'zyan'),
          )
     );

     // Add support for full and wide align img.
     add_theme_support('align-wide');

     // Add support for editor styles.
     add_theme_support('editor-styles');

     flush_rewrite_rules();

     // Add support for responsive embedded content.
     add_theme_support('responsive-embeds');

     remove_theme_support('widgets-block-editor');

     add_filter('use_widgets_block_editor', '__return_false');

     add_image_size('zyan-case-details', 1170, 600, ['center', 'center']);

     if (!isset($content_width)) {
          $content_width = 600;
     }
}
add_action('after_setup_theme', 'zyan_setup');


/** Define global variable */
define('ZYAN_THEME_DIR', get_template_directory());
define('ZYAN_THEME_URI', get_template_directory_uri());
define('ZYAN_THEME_CSS_DIR', ZYAN_THEME_URI . '/assets/css/');
define('ZYAN_THEME_JS_DIR', ZYAN_THEME_URI . '/assets/js/');
define('ZYAN_THEME_INC', ZYAN_THEME_DIR . '/inc/');

/** Include zyan require files */
require_once ZYAN_THEME_INC . 'common/zyan-scrips.php';
require_once ZYAN_THEME_INC . 'common/zyan-breadcrumb.php';
require_once ZYAN_THEME_INC . 'class-navwalker.php';
require_once ZYAN_THEME_INC . 'class-tgm-plugin-activation.php';
require_once ZYAN_THEME_INC . 'add_plugin.php';
require_once ZYAN_THEME_INC . 'common/zyan-widgets.php';

/** Kirki */
require_once ZYAN_THEME_INC . 'kirki-customizer.php';
require_once ZYAN_THEME_INC . 'class-zyan-kirki.php';

/** Functions which enhance the theme by hooking into WordPress. */
require ZYAN_THEME_INC . 'template-helper.php';
require ZYAN_THEME_INC . 'template-functions.php';



add_action('admin_enqueue_scripts', 'zyan_admin_custom_scripts');
function zyan_admin_custom_scripts()
{
     wp_enqueue_media();
     wp_enqueue_style('customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css', array());
     wp_register_script('zyan-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', ['jquery'], '', true);
     wp_enqueue_script('zyan-admin-custom');
}
