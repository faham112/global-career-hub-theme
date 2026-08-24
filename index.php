<?php
/**
 * Main template - news style homepage
 * @package Global_Career_Hub
 */
get_header();
?>

<div class="latest-ticker">
	<div class="container">
		<div class="ticker-inner">
			<span class="ticker-label"><?php esc_html_e( 'LATEST', 'global-career-hub' ); ?></span>
			<div class="ticker-track">
				<?php
				$ticker = new WP_Query( array( 'posts_per_page' => 8, 'post_status' => 'publish', 'ignore_sticky_posts' => 1 ) );
				if ( $ticker->have_posts() ) :
					while ( $ticker->have_posts() ) :
						$ticker->the_post();
						echo '<a href="' . esc_url( get_permalink() ) . '" class="ticker-item">' . esc_html( get_the_title() ) . '</a>';
					endwhile;
					wp_reset_postdata();
				else :
					echo '<span class="ticker-item">' . esc_html__( 'Welcome to Global Career Hub — Connecting Talent, Creating Futures', 'global-career-hub' ) . '</span>';
				endif;
				?>
			</div>
		</div>
	</div>
</div>

<main id="primary" class="site-main news-layout">
	<div class="container">
		<?php if ( have_posts() ) : ?>

			<section class="top-news-section">
				<div class="section-heading">
					<span class="section-heading-line"></span>
					<h2 class="section-heading-text"><?php esc_html_e( 'TOP STORIES', 'global-career-hub' ); ?></h2>
					<span class="section-heading-line"></span>
				</div>
				<div class="top-news-grid">
					<?php
					$i = 0;
					while ( have_posts() ) :
						the_post();
						$i++;
						if ( $i > 5 ) {
							break;
						}
						$card_class = 'news-card' . ( 1 === $i ? ' news-card--featured' : ' news-card--side' );
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( $card_class ); ?>>
							<a href="<?php the_permalink(); ?>" class="news-card__link">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="news-card__thumb"><?php the_post_thumbnail( 1 === $i ? 'large' : 'medium' ); ?></div>
								<?php else : ?>
									<div class="news-card__thumb" style="min-height:140px;background:#E5E5EA;"></div>
								<?php endif; ?>
								<div class="news-card__body">
									<?php
									$cats = get_the_category();
									if ( ! empty( $cats ) ) {
										echo '<span class="news-card__cat">' . esc_html( $cats[0]->name ) . '</span>';
									}
									?>
									<h3 class="news-card__title"><?php the_title(); ?></h3>
									<div class="news-card__meta"><span><?php echo esc_html( get_the_date() ); ?></span></div>
									<?php if ( 1 === $i ) : ?>
										<p class="news-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
									<?php endif; ?>
								</div>
							</a>
						</article>
						<?php
					endwhile;
					rewind_posts();
					?>
				</div>
			</section>

			<section class="more-news-section">
				<div class="section-heading">
					<span class="section-heading-line"></span>
					<h2 class="section-heading-text"><?php esc_html_e( 'MORE ARTICLES', 'global-career-hub' ); ?></h2>
					<span class="section-heading-line"></span>
				</div>
				<div class="posts-grid news-posts-grid">
					<?php
					$j = 0;
					while ( have_posts() ) :
						the_post();
						$j++;
						if ( $j <= 5 ) {
							continue;
						}
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					?>
				</div>
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => '← ' . esc_html__( 'Previous', 'global-career-hub' ),
						'next_text' => esc_html__( 'Next', 'global-career-hub' ) . ' →',
					)
				);
				?>
			</section>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
