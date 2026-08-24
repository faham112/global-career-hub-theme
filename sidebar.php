<?php
/**
 * Sidebar
 * @package Global_Career_Hub
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
