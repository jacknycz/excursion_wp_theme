<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package excursion
 */
?>
	<div id="secondary" class="widget-area sidebar-widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
