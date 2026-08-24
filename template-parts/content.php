<?php
/**
 * Post card
 * @package Global_Career_Hub
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
		</div>
	<?php endif; ?>
	<div class="post-content">
		<div class="post-meta" style="margin-bottom:0.65rem;font-size:0.78rem;color:#8E8E93;">
			<?php gch_post_categories(); ?>
			<span><?php echo esc_html( get_the_date() ); ?></span>
		</div>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="entry-excerpt"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'global-career-hub' ); ?> →</a>
	</div>
</article>
