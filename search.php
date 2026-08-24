<?php
/**
 * Search results
 * @package Global_Career_Hub
 */
get_header();
?>
<main id="primary" class="site-main">
	<div class="container" style="padding-top:2rem;">
		<header class="page-header" style="margin-bottom:2rem;">
			<h1 class="page-title">
				<?php
				printf(
					esc_html__( 'Search Results for: %s', 'global-career-hub' ),
					'<span>' . get_search_query() . '</span>'
				);
				?>
			</h1>
		</header>
		<div class="posts-grid">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>
		<?php the_posts_pagination(); ?>
	</div>
</main>
<?php
get_footer();
