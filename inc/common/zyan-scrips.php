<?php

/** 
 * zyan_scripts description
 * @return [type] [description]
 */

/** Enqueue scripts and styles. */
function zyan_scripts()
{
     wp_enqueue_style('zyan_fonts', zyan_fonts_url(), array(), time());
     /** CSS */
     wp_enqueue_style('font-awesome-pro', ZYAN_THEME_CSS_DIR . 'font-awesome-pro.css', [], _S_VERSION);
     wp_enqueue_style('iconsax-icon', ZYAN_THEME_CSS_DIR . 'iconsax-icon.min.css', [], _S_VERSION);
     wp_enqueue_style('bootstrap-css', ZYAN_THEME_CSS_DIR . 'bootstrap.min.css', [], _S_VERSION);
     wp_enqueue_style('scroll_button-css', ZYAN_THEME_CSS_DIR . 'scroll_button.css', [], _S_VERSION);
     wp_enqueue_style('zyan-plugins', ZYAN_THEME_CSS_DIR . 'plugin.css', [], _S_VERSION);
     wp_enqueue_style('spacing-css', ZYAN_THEME_CSS_DIR . 'spacing.css', [], _S_VERSION);
     wp_enqueue_style('zyan-unit', ZYAN_THEME_CSS_DIR . 'zyan-unit.css', [], _S_VERSION);
     wp_enqueue_style('zyan-core', ZYAN_THEME_CSS_DIR . 'zyan-core.css', [], _S_VERSION);
     wp_enqueue_style('zyan-responsive', ZYAN_THEME_CSS_DIR . 'responsive.css', [], _S_VERSION);
     wp_enqueue_style('zyan-style', get_stylesheet_uri(), [], _S_VERSION);

     /** JS */
     wp_enqueue_script('plugin', ZYAN_THEME_JS_DIR . 'plugin.js', ['jquery'], _S_VERSION, true);
     wp_enqueue_script('scroll_button', ZYAN_THEME_JS_DIR . 'scroll_button.js', ['jquery'], _S_VERSION, true);
     wp_enqueue_script('sticky_sidebar', ZYAN_THEME_JS_DIR . 'sticky_sidebar.js', ['jquery'], _S_VERSION, true);
     wp_enqueue_script('animation', ZYAN_THEME_JS_DIR . 'animation.js', ['jquery'], _S_VERSION, true);
     wp_enqueue_script('zyan-init', ZYAN_THEME_JS_DIR . 'main.js', ['jquery'], _S_VERSION, true);

     if (is_singular() && comments_open() && get_option('thread_comments')) {
          wp_enqueue_script('comment-reply');
     }
}
add_action('wp_enqueue_scripts', 'zyan_scripts');

/** Register Fonts */
function zyan_fonts_url()
{
     $font_url = '';
     if ('off' !== _x('on', 'Google font: on or off', 'zyan')) {
          $font_url = 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap';
     }
     return $font_url;
}
