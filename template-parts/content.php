<?php $categories = get_the_terms($post->ID, 'category'); ?>
<?php if (is_single()) : ?>
     <article id="post-<?php the_ID(); ?>" <?php post_class('tf__blog_details_area mb-5'); ?>>
          <?php if (has_post_thumbnail()) : ?>
               <div class="tf__blog_details_img">
                    <img src="<?php print esc_attr(get_the_post_thumbnail_url($post->ID, 'full')) ?>" alt="blog" class="img-fluid w-100" />
               </div>
          <?php endif; ?>
          <ul class="blog_details_header">
               <?php if (get_the_author()) : ?>
                    <li> <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>">
                              <i class="fa-sharp fa-solid fa-circle-user"></i> By
                              <?php print get_the_author() ?>
                         </a>
                    </li>
               <?php endif ?>
               <li>
                    <i class="fa-sharp fa-solid fa-clock"></i>
                    <?php the_time(get_option('date_format')); ?>
               </li>
               <li><a href="<?php comments_link(); ?>">
                         <i class="fa-sharp fa-solid fa-comments"></i>
                         <?php comments_number(); ?>
                    </a>
               </li>
          </ul>
          <div class="tf__blog_details_text mt-3">
               <?php the_content(); ?>
          </div>
          <div class="details_blog_share">
               <div class="share_icon">
                    <?php if (function_exists('cf_core_render_share_icon')) : ?>
                         <div class="d-flex align-items-center">
                              <h6><i class="fa-solid fa-share-nodes"></i> <?php esc_html_e('Share :', 'zyan') ?></h6>
                              <ul class="social_share d-flex flex-wrap">
                                   <?php cf_core_render_share_icon(); ?>
                              </ul>
                         </div>
                    <?php endif ?>
                    <?php if (zyan_get_tag()) : ?>
                         <div class="d-flex align-items-center">
                              <h6><i class="fa-sharp fa-solid fa-tag"></i> <?php esc_html_e('Tags :', 'zyan') ?></h6>
                              <?php print zyan_get_tag() ?>
                         </div>
                    <?php endif ?>
               </div>
          </div>
          <ul class="next_prev_button">
               <?php
               $prev_post = get_previous_post();
               $prev_post_ = get_adjacent_post(false, '', true);
               if ($prev_post_) {
                    $id = $prev_post->ID;
                    $prev_permalink = get_permalink($prev_post->ID);
               }

               ?>
               <?php
               $next_post = get_next_post();
               $next_post_ = get_adjacent_post(false, '', false);
               if ($next_post_) {
                    $nid = $next_post->ID;
                    $next_permalink = get_permalink($next_post->ID);
               }

               ?>
               <?php if ($prev_post) : ?>
                    <li class="previous_post">
                         <a href="<?php print esc_url($prev_permalink) ?>" data-cursor="Previous <br> post">
                              <p class="text-start"><?php esc_html_e('Previous post', 'zyan') ?></p>
                              <h5><?php echo zyan_kses($prev_post->post_title) ?></h5>
                         </a>
                    </li>
               <?php endif ?>
               <?php if ($next_post) : ?>
                    <li class="next_post">
                         <a href="<?php print esc_url($next_permalink) ?>" data-cursor="next <br> post">
                              <p><?php esc_html_e('Next post', 'zyan') ?></p>
                              <h5><?php echo zyan_kses($next_post->post_title) ?></h5>
                         </a>
                    </li>
               <?php endif ?>
          </ul>
     </article>
<?php else : ?>
     <article <?php post_class('tf__blog_list_item') ?> id="post-<?php the_ID(); ?>">
          <?php if (has_post_thumbnail()) : ?>
               <a href="<?php the_permalink() ?>" data-cursor="Read <br> More" class="tf__blog_list_img">
                    <img src="<?php print esc_attr(get_the_post_thumbnail_url($post->ID, 'full')) ?>" alt="blog list" class="img-fluid w-100">
                    <span><?php echo get_the_date() ?></span>
               </a>
          <?php endif ?>
          <div class="tf__blog_list_text">
               <?php if (get_the_title()) : ?>
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
               <?php endif ?>
               <?php the_excerpt(); ?>
          </div>
     </article>
<?php endif; ?>