<?php

/**
 * Breadcrumbs for zyan theme.
 *
 * @package     zyan
 * @author      Theme_Pure
 * @copyright   Copyright (c) 2022, Theme_Pure
 * @link        https://weblearnbd.net
 * @since       zyan 1.0.0
 */


function zyan_breadcrumb_func()
{
     global $post;
     $breadcrumb_class = '';
     $breadcrumb_show = 1;


     if (is_front_page() && is_home()) {
          $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'zyan'));
          $breadcrumb_class = 'home_front_page';
     } elseif (is_front_page()) {
          $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'zyan'));
          $breadcrumb_show = 0;
     } elseif (is_home()) {
          if (get_option('page_for_posts')) {
               $title = get_the_title(get_option('page_for_posts'));
          }
     } elseif (is_single() && 'post' == get_post_type()) {
          $title = get_the_title();
     } elseif (is_single() && 'product' == get_post_type()) {
          $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'zyan'));
     } elseif (is_single() && 'courses' == get_post_type()) {
          $title = esc_html__('Course Details', 'zyan');
     } elseif ('courses' == get_post_type()) {
          $title = esc_html__('Courses', 'zyan');
     } elseif (is_search()) {
          $title = esc_html__('Search Results for : ', 'zyan') . get_search_query();
     } elseif (is_404()) {
          $title = esc_html__('Page not Found', 'zyan');
     } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
          $title = get_theme_mod('breadcrumb_shop', __('Shop', 'zyan'));
     } elseif (is_archive()) {
          $title = get_the_archive_title();
     } else {
          $title = get_the_title();
     }



     $_id = get_the_ID();

     if (is_single() && 'product' == get_post_type()) {
          $_id = $post->ID;
     } elseif (function_exists("is_shop") and is_shop()) {
          $_id = wc_get_page_id('shop');
     } elseif (is_home() && get_option('page_for_posts')) {
          $_id = get_option('page_for_posts');
     }

     $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
     if (!empty($_GET['s'])) {
          $is_breadcrumb = null;
     }

     if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

          $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
          $hide_bg_img = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';

          // get_theme_mod
          $bg_img = get_theme_mod('breadcrumb_bg_img');
          $breadcrumb_switch = get_theme_mod('breadcrumb_switch', true);

          if ($hide_bg_img && empty($_GET['s'])) {
               $bg_img = '';
          } else {
               $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
          } ?>
          <?php $breadcrumb_switch = get_theme_mod('breadcrumb_switch', true) ?>
          

          <!-- page title area start -->
     

          <?php if (!empty($breadcrumb_switch)) : ?>
                    <section class="tf__breadcrumb banner" style="background-color:#09101A ;">
                         <div class="container">
                              <div class="row">
                                   <div class="col-12">
                                        <div class="tf__breadcrum_text">
                                             <h1><?php echo zyan_kses($title) ?></h1>
                                             <ul class="page-breadcrumb">
                                                  <?php if (function_exists('bcn_display')) {
                                                       bcn_display();
                                                  } ?>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </section>
          <?php endif ?>
          <!-- page title area end -->
<?php
     }
}

add_action('zyan_before_main_content', 'zyan_breadcrumb_func');
