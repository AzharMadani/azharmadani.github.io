<?php
/*
Template Name: Intro page
Template Post Type:  page
*/

?>

<?php $defult_logo = get_template_directory_uri() . '/assets/img/logo/logo.png'; ?>
<?php $logo = get_theme_mod('logo', $defult_logo) ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
     <meta charset="<?php esc_attr(bloginfo('charset')); ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
     <?php wp_body_open(); ?>
     <div class="zyan-body">
          <?php get_template_part('template-parts/preloader') ?>

          <div class="intro_page">
               <div class="intro_title">
                    <span class="image_logo"><img src="<?php echo esc_url($logo)  ?>" alt="" /><span class="version">V 2.0</span></span>
                    <span>Modern CV / Resume / Portfolio Wordpress Theme</span>
               </div>
               <div class="demo">
                    <div class="row justify-content-center">
                         <div class="col-sm-6">
                              <a href="https://codeefly.net/wp/zyan/" target="_blank" class="demo-item" data-cursor="Multipage <br> Demo"><img class="w-100" src="<?php echo get_template_directory_uri() ?>/assets/img/demo/01_home.png" alt="" />
                                   <h3 class="mini">Multipage Demo</h3>
                              </a>
                         </div>
                         <div class="col-sm-6">
                              <a href="https://codeefly.net/wp/zyan/one-page" target="_blank" class="demo-item" data-cursor="Onepage <br> Demo"><img class="w-100" src="<?php echo get_template_directory_uri() ?>/assets/img/demo/02_home.png" alt="" />
                                   <h3 class="mini">Onepage Demo</h3>
                              </a>
                         </div>
                         <div class="col-sm-6">
                              <a href="https://codeefly.net/wp/zyan/home-3" target="_blank" class="demo-item" data-cursor="Simple <br> Demo"><img class="w-100" src="<?php echo get_template_directory_uri() ?>/assets/img/demo/03_home.png" alt="" />
                                   <h3 class="mini">Simple Demo</h3>
                              </a>
                         </div>
                         <div class="col-sm-6">
                              <a href="https://codeefly.net/wp/zyan/home-4" target="_blank" class="demo-item" data-cursor="Video BG <br> Demo"><img class="w-100" src="<?php echo get_template_directory_uri() ?>/assets/img/demo/04_home.png" alt="" />
                                   <h3 class="mini">Video Background Demo</h3>
                              </a>
                         </div>

                         <div class="col-sm-6">
                              <a href="https://codeefly.net/wp/zyan/home-rtl/" target="_blank" class="demo-item" data-cursor="Video BG <br> Demo"><img class="w-100" src="<?php echo get_template_directory_uri() ?>/assets/img/demo/rtl-demo.png" alt="" />
                                   <h3 class="mini">Video Background Demo</h3>
                              </a>
                         </div>

                    </div>
                    <div class="coming">
                         <h3>More are coming soon...</h3>
                    </div>
               </div>
          </div>

          <?php get_template_part('template-parts/cursor') ?>
     </div>
     <?php wp_footer(); ?>
</body>

</html>