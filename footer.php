<?php get_template_part('template-parts/cursor') ?>
<?php get_template_part('template-parts/progress') ?>
<?php $page_header = get_post_meta(get_the_ID(), '_page_header', 'multi_page'); ?>
<?php get_template_part('template-parts/footer') ?>
</div>
<?php wp_footer(); ?>
</body>

</html>