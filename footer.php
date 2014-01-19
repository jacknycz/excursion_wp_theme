		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php get_sidebar( 'footer' ); ?>
			<div class="site-info">
				<?php do_action( 'excursion_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'excursion' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'excursion' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>