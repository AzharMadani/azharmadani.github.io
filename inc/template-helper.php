<?php

// zyan_kses_intermediate
function zyan_kses_intermediate($string = '')
{
     return wp_kses($string, zyan_get_allowed_html_tags('intermediate'));
}

function zyan_get_allowed_html_tags($level = 'basic')
{
     $allowed_html = [
          'b'      => [],
          'i'      => [],
          'u'      => [],
          'em'     => [],
          'br'     => [],
          'abbr'   => [
               'title' => [],
          ],
          'span'   => [
               'class' => [],
          ],
          'strong' => [],
          'a'      => [
               'href'  => [],
               'title' => [],
               'class' => [],
               'id'    => [],
          ],
     ];

     if ($level === 'intermediate') {
          $allowed_html['a'] = [
               'href' => [],
               'title' => [],
               'class' => [],
               'id' => [],
          ];
          $allowed_html['div'] = [
               'class' => [],
               'id' => [],
          ];
          $allowed_html['img'] = [
               'src' => [],
               'class' => [],
               'alt' => [],
          ];
          $allowed_html['del'] = [
               'class' => [],
          ];
          $allowed_html['ins'] = [
               'class' => [],
          ];
          $allowed_html['bdi'] = [
               'class' => [],
          ];
          $allowed_html['i'] = [
               'class' => [],
               'data-rating-value' => [],
          ];
     }

     return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function zyan_kses($raw)
{
     $allowed_tags = array(
          'a'                         => array(
               'class'   => array(),
               'href'    => array(),
               'rel'  => array(),
               'title'   => array(),
               'target' => array(),
          ),
          'abbr'                      => array(
               'title' => array(),
          ),
          'b'                         => array(),
          'blockquote'                => array(
               'cite' => array(),
          ),
          'cite'                      => array(
               'title' => array(),
          ),
          'code'                      => array(),
          'del'                    => array(
               'datetime'   => array(),
               'title'      => array(),
          ),
          'dd'                     => array(),
          'div'                    => array(
               'class'   => array(),
               'title'   => array(),
               'style'   => array(),
          ),
          'dl'                     => array(),
          'dt'                     => array(),
          'em'                     => array(),
          'h1'                     => array(),
          'h2'                     => array(),
          'h3'                     => array(),
          'h4'                     => array(),
          'h5'                     => array(),
          'h6'                     => array(),
          'i'                         => array(
               'class' => array(),
          ),
          'img'                    => array(
               'alt'  => array(),
               'class'   => array(),
               'height' => array(),
               'src'  => array(),
               'width'   => array(),
          ),
          'li'                     => array(
               'class' => array(),
          ),
          'ol'                     => array(
               'class' => array(),
          ),
          'p'                         => array(
               'class' => array(),
          ),
          'q'                         => array(
               'cite'    => array(),
               'title'   => array(),
          ),
          'span'                      => array(
               'class'   => array(),
               'title'   => array(),
               'style'   => array(),
          ),
          'iframe'                 => array(
               'width'         => array(),
               'height'     => array(),
               'scrolling'     => array(),
               'frameborder'   => array(),
               'allow'         => array(),
               'src'        => array(),
          ),
          'strike'                 => array(),
          'br'                     => array(),
          'strong'                 => array(),
          'data-wow-duration'            => array(),
          'data-wow-delay'            => array(),
          'data-wallpaper-options'       => array(),
          'data-stellar-background-ratio'   => array(),
          'ul'                     => array(
               'class' => array(),
          ),
          'svg' => array(
               'class' => true,
               'aria-hidden' => true,
               'aria-labelledby' => true,
               'role' => true,
               'xmlns' => true,
               'width' => true,
               'height' => true,
               'viewbox' => true, // <= Must be lower case!
          ),
          'g'     => array('fill' => true),
          'title' => array('title' => true),
          'path'  => array('d' => true, 'fill' => true,),
     );

     if (function_exists('wp_kses')) { // WP is here
          $allowed = wp_kses($raw, $allowed_tags);
     } else {
          $allowed = $raw;
     }

     return $allowed;
}


/** zyan pagination */
if (!function_exists('zyan_pagination')) {

     function _zyan_pagi_callback($pagination)
     {
          return $pagination;
     }

     //page navegation
     function zyan_pagination($prev, $next, $pages, $args)
     {
          global $wp_query, $wp_rewrite;
          $menu = '';
          $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

          if ($pages == '') {
               global $wp_query;
               $pages = $wp_query->max_num_pages;

               if (!$pages) {
                    $pages = 1;
               }
          }

          $pagination = [
               'base' => add_query_arg('paged', '%#%'),
               'format' => '',
               'total' => $pages,
               'current' => $current,
               'prev_text' => $prev,
               'next_text' => $next,
               'type' => 'array',
          ];

          //rewrite permalinks
          if ($wp_rewrite->using_permalinks()) {
               $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
          }

          if (!empty($wp_query->query_vars['s'])) {
               $pagination['add_args'] = ['s' => get_query_var('s')];
          }

          $pagi = '';
          if (paginate_links($pagination) != '') {
               $paginations = paginate_links($pagination);
               $pagi .= '<ul class="pagination">';
               foreach ($paginations as $key => $pg) {
                    $pagi .= '<li class="page-item">' . $pg . '</li>';
               }
               $pagi .= '</ul>';
          }

          print _zyan_pagi_callback($pagi);
     }
}


/** get tags */
function zyan_get_tag()
{
     $html = '';
     if (has_tag()) {
          $html .= '<div class="tags d-flex flex-wrap details-tag">';
          $html .= get_the_tag_list('', ' ', '');
          $html .= '</div>';
     }
     return $html;
}


// zyan_comment 
if (!function_exists('zyan_comment')) {
     function zyan_comment($comment, $args, $depth)
     {
          $GLOBAL['comment'] = $comment;
          extract($args, EXTR_SKIP);
          $args['reply_text'] = 'Reply';
          $replayClass = 'comment-depth-' . esc_attr($depth);
?>
          <li id="comment-<?php comment_ID(); ?>" class="tf__details_bloger">
               <div class="comments-box">
                    <h3> <?php print get_comment_author_link(); ?></h3>
                    <span><?php comment_time(get_option('date_format')); ?></span>
                    <?php comment_text(); ?>
                    <?php comment_reply_link(array_merge($args, ['depth' => $depth, 'max_depth' => $args['max_depth']])); ?>
                    <?php if (get_avatar($comment, 102, null, null, ['class' => []])) : ?>
                         <div class="img">
                              <?php print get_avatar($comment, 102, null, null, ['class' => []]); ?>
                         </div>
                    <?php endif ?>
               </div>
     <?php
     }
}

function zyan_header_menu()
{
     wp_nav_menu([
          'theme_location' => 'menu-1',
          'menu_class' => 'navbar-nav m-auto',
          'container' => '',
          'fallback_cb' => 'Zyan_Navwalker_Class::fallback',
          'walker' => new Zyan_Navwalker_Class(),
     ]);
}
function zyan_header_menu2()
{
     wp_nav_menu([
          'theme_location' => 'menu-2',
          'menu_class' => 'navbar-nav m-auto',
          'container' => '',
          'fallback_cb' => 'Zyan_Navwalker_Class::fallback',
          'walker' => new Zyan_Navwalker_Class(),
     ]);
}
