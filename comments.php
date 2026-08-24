<?php
/**
 * Comments
 * @package Global_Career_Hub
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area" style="margin-top:2rem;background:#fff;padding:1.75rem;border-radius:12px;">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				esc_html( _n( '%1$s comment', '%1$s comments', get_comments_number(), 'global-career-hub' ) ),
				number_format_i18n( get_comments_number() )
			);
			?>
		</h2>
		<ol class="comment-list" style="list-style:none;padding:0;">
			<?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?>
		</ol>
	<?php endif; ?>
	<?php comment_form(); ?>
</div>
