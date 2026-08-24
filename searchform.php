<?php
/**
 * Search form
 * @package Global_Career_Hub
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="search-field"><?php echo esc_html_x( 'Search for:', 'label', 'global-career-hub' ); ?></label>
	<input type="search" id="search-field" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'global-career-hub' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'global-career-hub' ); ?></button>
</form>
