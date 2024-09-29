<?php $preloader = get_theme_mod('preloader', true) ?>
<?php $page_preloader = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_preloader') : '';?>

<?php if ($preloader === true) : ?>
     <?php if (empty($page_preloader)) : ?>
          <div class="preloader">
               <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
                    <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
               </svg>
               <h5 class="preloader-text"><?php esc_html_e('Loading', 'zyan') ?></h5>
          </div>
     <?php endif ?>
<?php endif ?>