<?php $page_dir = function_exists( 'get_field' ) ? get_field( 'page_dir') : '';?> 

<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="<?php echo $page_dir ?>">

<head>
  <meta charset="<?php esc_attr(bloginfo('charset')); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="zyan-body">
    <?php get_template_part('template-parts/preloader') ?>
    <?php get_template_part('template-parts/header') ?>
    <?php do_action('zyan_before_main_content'); ?>