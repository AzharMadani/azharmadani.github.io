<?php get_header(); ?>
<section class="tf__blog_list_page pt_120 xs_pt_80 pb_120 xs_pb_80" id="blogs">
     <div class="container">
          <div class="row">
               <div class="col-xl-8 col-lg-8">
                    <?php if (have_posts()) :
                         if (is_home() && !is_front_page()) :
                    ?>
                              <header>
                                   <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                              </header>
                         <?php endif; ?>

                         <div class="row">
                              <div class="col-xl-12">
                                   <?php while (have_posts()) : the_post();
                                        get_template_part('template-parts/content', get_post_format());
                                   endwhile ?>
                              </div>
                              <div class="tf__pagination">
                                   <div class="row">
                                        <div class="col-12">
                                             <nav aria-label="Page navigation example">
                                                  <?php zyan_pagination('<i class="far fa-angle-left"></i>', '<i class="far fa-angle-right"></i>', '', ['class' => '']); ?>
                                             </nav>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    <?php endif; ?>
               </div>
               <div class="col-xl-4 col-lg-4">
                    <?php get_sidebar(); ?></div>
          </div>
     </div>
     </div>
</section>
<?php get_template_part('template-parts/subscribe') ?>
<?php get_footer();
