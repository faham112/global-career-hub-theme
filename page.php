<?php
/**
 * Page template
 * @package Global_Career_Hub
 */
get_header();
?>
<main id="primary" class="site-main">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
				<header class="entry-header" style="text-align:center;margin-bottom:2rem;">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="post-thumbnail" style="margin-bottom:2rem;border-radius:12px;overflow:hidden;">
						<?php the_post_thumbnail( 'full' ); ?>
					</div>
				<?php endif; ?>
				<div class="entry-content" style="background:#fff;padding:2rem;border-radius:12px;box-shadow:0 2px 12px rgba(0,0,0,0.06);max-width:800px;margin:0 auto;">
					<?php the_content(); ?>
				</div>
			</article>
			<?php
	endwhile;
		?>
	</div>
</main>
<?php
get_footer();
