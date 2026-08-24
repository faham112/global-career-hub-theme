<?php
/**
 * Footer
 * @package Global_Career_Hub
 */
?>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-widgets">
				<div class="footer-about">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-1' ); ?>
					<?php else : ?>
						<p><strong>Global Career Hub .ORG</strong></p>
						<p><?php esc_html_e( 'Connecting Talent, Creating Futures. Career insights, guidance and professional growth.', 'global-career-hub' ); ?></p>
					<?php endif; ?>
				</div>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php else : ?>
					<div class="footer-widget">
						<h4><?php esc_html_e( 'Quick Links', 'global-career-hub' ); ?></h4>
						<ul>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'global-career-hub' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About', 'global-career-hub' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact', 'global-career-hub' ); ?></a></li>
						</ul>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				<?php endif; ?>
			</div>
			<div class="footer-bottom">
				<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Global Career Hub .ORG</a>. <?php esc_html_e( 'All rights reserved.', 'global-career-hub' ); ?></p>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
