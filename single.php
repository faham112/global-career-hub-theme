<?php
/**
 * Single post
 * @package Global_Career_Hub
 */
get_header();
?>
<main id="primary" class="site-main">
	<div class="container">
		<div class="blog-layout">
			<div class="content-area">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'single' );
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'global-career-hub' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'global-career-hub' ) . '</span> <span class="nav-title">%title</span>',
						)
					);
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php
get_footer();
