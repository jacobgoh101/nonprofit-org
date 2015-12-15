<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nonprofit_Organization
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footer-logo">
		<a href="#" onclick="return false;"><img alt="footer-logo-1" src="http://localhost/nonprofit-org/wp-content/themes/nonprofit-org/images/footer/footer-logo-1.png"></a>
		<a href="#" onclick="return false;"><img alt="footer-logo-2" src="http://localhost/nonprofit-org/wp-content/themes/nonprofit-org/images/footer/footer-logo-2.png"></a>
		<a href="#" onclick="return false;"><img alt="footer-logo-3" src="http://localhost/nonprofit-org/wp-content/themes/nonprofit-org/images/footer/footer-logo-3.png"></a>
	</div>
	<div class="footer-content">
		<div class="footer-newsletter">
			<?php if(is_dynamic_sidebar('footer-newsletter' )){
				dynamic_sidebar( 'footer-newsletter' );
			} ?>
		</div>

		<hr>

		<div class="footer-company-information-and-social-media">
			<div class="footer-company-information">
				<a href="http://localhost/nonprofit-org/sitemap/">SITEMAP</a> | <a href="#" onclick="return false;">PRIVACY POLICY</a><br/>
				COPYRIGHT <?php echo date('Y') ?> NONPROFIT ORGANIZATION
			</div>
			<div class="footer-social-media">
				<a href="#" onclick="return false;"><i class="fa fa-facebook-square"></i></a>
				<a href="#" onclick="return false;"><i class="fa fa-twitter"></i></a>
				<a href="#" onclick="return false;"><i class="fa fa-google-plus"></i></a>
				<a href="#" onclick="return false;"><i class="fa fa-youtube"></i></a>
				<a href="#" onclick="return false;"><i class="fa fa-rss"></i></a>
				<a href="#" onclick="return false;"><i class="fa fa-instagram"></i></a>
				<a href="#" onclick="return false;"><i class="fa fa-linkedin"></i></a>
			</div>
		</div>
	</div>
	<div class="site-info">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nonprofit-org' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'nonprofit-org' ), 'WordPress' ); ?></a>
		<span class="sep"> | </span>
		<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'nonprofit-org' ), 'nonprofit-org', '<a href="http://jacobgoh.com" rel="designer">Jacob Goh</a>' ); ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
