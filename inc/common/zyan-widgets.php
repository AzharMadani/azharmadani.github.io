<?php

function my_theme_register_sidebar()
{
     $args = array(
          'name'          => __('Blog Sidebar', 'zyan'),
          'id'            => 'custom-blog-widget',
          'description'   => __('Your Blog Widget.', 'zyan'),
          'before_widget' => '<div class="tf__sidebar_item tf__sidebar_category mb_30 tf__sidebar_search form">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="widget-header">',
          'after_title'   => '</h3>',
     );
     register_sidebar($args);
}
add_action('widgets_init', 'my_theme_register_sidebar');
