<?php
/**
 * Single post content
 * @package Global_Career_Hub
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
	<header class="entry-header" style="text-align:center;margin-bottom:1.75rem;">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta" style="color:#8E8E93;font-size:0.9rem;">
			<span><?php echo esc_html( get_the_date() ); ?></span>
			· <span><?php the_author(); ?></span>
		</div>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail" style="margin-bottom:1.75rem;border-radius:12px;overflow:hidden;">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php endif; ?>
	<div class="entry-content" style="background:#fff;padding:2rem;border-radius:12px;box-shadow:0 2px 12px rgba(0,0,0,0.06);">
		<?php the_content(); ?>
	</div>
</article>
