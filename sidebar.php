<?php
if (!is_active_sidebar('custom-blog-widget')) {
     return;
}
?>
<?php dynamic_sidebar('custom-blog-widget');
