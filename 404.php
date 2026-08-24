<?php
/**
 * 404
 * @package Global_Career_Hub
 */
get_header();
?>
<main id="primary" class="site-main">
	<div class="container">
		<section class="no-results" style="text-align:center;padding:4rem 1rem;">
			<h1 style="font-size:4rem;color:#1C1C1E;">404</h1>
			<p><?php esc_html_e( 'Page not found.', 'global-career-hub' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Back to Homepage', 'global-career-hub' ); ?></a>
		</section>
	</div>
</main>
<?php
get_footer();
