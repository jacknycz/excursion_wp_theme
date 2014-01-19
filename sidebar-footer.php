<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package excursion
 */
?>
	<div id="sidebar-footer" class="footer-sidebar widget-area sidebar-widget-area clearfix" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
