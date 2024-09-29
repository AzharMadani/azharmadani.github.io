<?php $defult_logo = get_template_directory_uri() . '/assets/img/logo/logo.png'; 
 $page_logo = function_exists( 'get_field' ) ? get_field( 'custom_header_logo') : '';
 $logo = $page_logo ? $page_logo : get_theme_mod('logo', $defult_logo) ?>
<?php
$about = get_theme_mod('about_us', true);
$about_us_title = get_theme_mod('about_us_title', __('About us', 'zyan'));
$about_us_text = get_theme_mod('about_us_text',  __('Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et magna aliqua. Ut enim ad minim veniam laboris.', 'zyan'));
$contact = get_theme_mod('contact_from_swicher_us',  true);
$contact_from_title = get_theme_mod('contact_from_title',  __('Get In Touch', 'zyan'));
$contact_from_select = get_theme_mod('contact_from_select',  __('', 'zyan'));
$logo_swicher = get_theme_mod('logo_swicher',  true);

?>
<?php $page_type = function_exists( 'get_field' ) ? get_field( 'page_type') : '';?>

<?php if ($page_type == 'onepage') : ?>

     <?php $defult_logo_2 = get_template_directory_uri() . '/assets/img/logo/logo2.png'; ?>
     <?php $logo_2 = get_theme_mod('seconday_logo', $defult_logo) ?>

     <nav class="main_menu_2">
          <span class="menu_2_icon">
               <i class="fa-light fa-bars bar_icon-staggered bar_icon"></i>
               <i class="fa-light fa-xmark close_icon"></i>
          </span>

          <a class="logo_2" href="index_2.html">
               <img src="<?php echo esc_url($logo_2)  ?>" alt="<?php esc_attr_e('ZYAN', 'zyan') ?>" class="img-fluid w-100" />
          </a>

          <?php zyan_header_menu2(); ?>
     </nav>


<?php else : ?>


     <nav class="navbar navbar-expand-lg main_menu">
          <div class="container main_menu_bg">
               <a class="navbar-brand" href="<?php print esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($logo)  ?>" alt="<?php esc_attr_e('ZYAN', 'zyan') ?>" class="img-fluid w-100" />
               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-sharp fa-regular fa-bars bar_icon"></i>
                    <i class="fa-regular fa-xmark close_icon"></i>
               </button>
               <?php if (has_nav_menu('menu-1')) : ?>
                    <div class="collapse navbar-collapse" id="navbarNav">
                         <?php zyan_header_menu(); ?>
                         <span class="toggle_icon c-pointer" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-sharp fa-sharp fa-regular fa-bars bar_icon-staggered"></i></span>
                    </div>
               <?php else : ?>
                    <div class="collapse navbar-collapse flex-grow-unset" id="navbarNav">
                         <span class="toggle_icon c-pointer" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-sharp fa-sharp fa-regular fa-bars bar_icon-staggered"></i></span>
                    </div>
               <?php endif ?>
          </div>
     </nav>

     <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
          <div class="offcanvas-header">
               <?php if (!empty($contact)) : ?>
                    <a class="offcanvas-logo" href="<?php print esc_url(home_url('/')); ?>">
                         <img src="<?php echo esc_url($logo)  ?>" alt="<?php esc_attr_e('ZYAN', 'zyan') ?>" class="img-fluid w-100" />
                    </a>
               <?php endif ?>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="fa-regular fa-xmark"></i>
               </button>
          </div>
          <div class="offcanvas-body">
               <div class="tf__design_form offcanvas_form">
                    <?php if (!empty($about)) : ?>
                         <div class="offcanvas-content-box">
                              <h4 class="offcanvas_title"><?php echo zyan_kses($about_us_title) ?></h4>
                              <p>
                                   <?php echo zyan_kses($about_us_text) ?>
                              </p>
                         </div>
                    <?php endif ?>
                    <?php if (!empty($contact)) : ?>
                         <div class="offcanvas_contact_form">
                              <h4 class="offcanvas_title"><?php echo zyan_kses($contact_from_title) ?></h4>
                              <?php echo do_shortcode('[contact-form-7  id="' . $contact_from_select . '"]'); ?>
                         </div>
                    <?php endif ?>
               </div>
          </div>
     </div>
<?php endif ?>