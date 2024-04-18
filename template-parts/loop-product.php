<?php
/**
 * Template part for displaying products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Markleen
 */

?>


	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000" data-aos-easing="ease-out-back">  
			<div class="card-image">
				<?php the_post_thumbnail('img-card'); ?>
			</div>

			<div class="card-content">
				<h2 class="is-style-text-h4"><?php the_title(); ?></h2>
			</div>
			<div class="card-footer">
				<div class="wp-block-button is-style-outline">
					<a class="stretched-link wp-block-button__link has-primary-color has-text-color wp-element-button" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e( 'Go to product ', 'markleen' );?></a>
				</div>
			</div> 
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->	
	




