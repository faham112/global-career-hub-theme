<?php
/**
 * No posts
 * @package Global_Career_Hub
 */
?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found Yet', 'global-career-hub' ); ?></h1>
	</header>
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php esc_html_e( 'Publish your first post to get started.', 'global-career-hub' ); ?></p>
			<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Write Your First Post', 'global-career-hub' ); ?></a>
		<?php else : ?>
			<p><?php esc_html_e( 'Nothing matched your search.', 'global-career-hub' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</section>
