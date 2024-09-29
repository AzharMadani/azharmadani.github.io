<?php get_header(); ?>
<section class="tf__error_page">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 m-auto">
        <div class="tf__error_text">
          <h1><?php esc_html_e('404', 'zyan') ?></h1>
          <h2><?php esc_html_e('Sorry! This page can’t found', 'zyan') ?></h2>
          <p><?php esc_html_e("The page you are looking for doesn't exist or has been moved", 'zyan') ?>
          </p>
          <a href="<?php print esc_url(home_url('/')); ?>" class="common_btn">
            <?php esc_html_e('Back to Homepage', 'zyan') ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer();
