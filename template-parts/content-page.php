<div class="wrapper">
    <?php the_content(); ?>
    <?php
    wp_link_pages([
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'zyan') . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'zyan') . ' </span>%',
        'separator'   => '<span class="screen-reader-text"> </span>',
    ]);
    ?>
    <div class="page-comment mt-5">
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>
</div>