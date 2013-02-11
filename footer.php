<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Ruby
 * @since Ruby 1.0
 */
?>
	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'ruby_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'ruby' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'ruby' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<script src="<?php echo get_theme_root_uri(); ?>/ruby_newest/js/scripts.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>