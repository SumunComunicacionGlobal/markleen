<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Markleen
 */

?>

	<footer id="colophon" class="site-footer pb-10">
		<div class="container">
			<div class="site-info">
				<?php printf( esc_html__( '© Copyright 2023 Serge Ferrari Group', 'markleen' ) );?>
				<ul id="footer-menu">
					<li class="link-ofuscado" data-url="<?php echo esc_url( get_the_permalink(3) ); ?>"><?php esc_html_e( 'Privacy', 'markleen' ); ?></li><span class="sep"> | </span>
					<li class="link-ofuscado" data-url="<?php echo esc_url( get_page_link( 1136 ) ); ?>"><?php esc_html_e( 'Cookies', 'markleen' ); ?></li>
				</ul>	
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
