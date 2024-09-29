<?php

// zyan_search_filter_form
if (!function_exists('zyan_search_filter_form')) {
     function zyan_search_filter_form($form)
     {
          $form = sprintf(
               '<form method="get" action="%s" method="get">
               <input type="text" placeholder="Search your keyword..." value="%s" name="s" required id="search">
               <button type="submit">
                    <i class="fa-regular fa-magnifying-glass"></i>
               </button>
          </form>',
               esc_url(home_url('/')),
               esc_attr(get_search_query()),
               esc_html__('Search', 'zyan')
          );

          return $form;
     }
     add_filter('get_search_form', 'zyan_search_filter_form');
}

function add_file_types_to_uploads($file_types)
{
     $new_filetypes = array();
     $new_filetypes['svg'] = 'image/svg+xml';
     $file_types = array_merge($file_types, $new_filetypes);
     return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');
