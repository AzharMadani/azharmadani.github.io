<?php get_header(); ?>

<?php $page_type = function_exists( 'get_field' ) ? get_field( 'page_type') : '';?> 

<?php if ($page_type == 'onepage') : ?>
	<div class="main">
		<div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
			<div class="page-content">
				<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
						get_template_part('template-parts/content', 'page');
					endwhile;
				else :
					get_template_part('template-parts/content', 'none');
				endif;
				?>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="page-container pt_115 xs_pt_75 pb_70 xs_pb_30">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="page-content">
						<?php
						if (have_posts()) :
							while (have_posts()) : the_post();
								get_template_part('template-parts/content', 'page');
							endwhile;
						else :
							get_template_part('template-parts/content', 'none');
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
<?php get_footer();
