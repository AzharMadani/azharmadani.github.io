<?php $subscribe_switch = get_theme_mod('subscribe_switch', true) ?>
<?php $subscribe_title = get_theme_mod('subscribe_title', __('SUBSCRIBE MY NEWSLETTER', 'zyan')); ?>
<?php $subscribe_from_select = get_theme_mod('subscribe_from_select',  __('', 'zyan')); ?>
<?php if (!empty($subscribe_switch)) : ?>
     <div class="tf__subscribe">
          <div class="tf__subscribe_overlay pt_115 xs_pt_75 pb_120 xs_pb_80">
               <div class="container">
                    <div class="row">
                         <div class="col-xl-6 col-lg-8 col-md-10 m-auto">
                              <div class="tf__subscribe_text">
                                   <h3 class="has-animation"><?php echo zyan_kses($subscribe_title) ?></h3>
                                   <?php echo do_shortcode('[contact-form-7  id="' . $subscribe_from_select . '"]'); ?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
<?php endif ?>