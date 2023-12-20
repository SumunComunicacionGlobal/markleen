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
				<?php
					$sector = get_field('filter_sectors');
					$use = get_field('filter_using');
				?>

				<div class="small uppercase">
					<?php esc_html_e( 'Type: ', 'markleen' ); 
                        $terms = get_the_terms( $post->ID , 'product-category' ); 
                            if  ($terms) {
                                foreach ( $terms as $term ) {
                                echo  $term->name ;
                                }
                            }
                    ?>
				</div>
				<div class="small uppercase"><?php esc_html_e( 'Sector: ', 'markleen' ); ?><?php echo esc_html($sector); ?></div>
				<div class="small uppercase"><?php esc_html_e( 'Use: ', 'markleen' ); ?> <?php echo esc_html($use); ?></div>
			</div>
			<div class="card-footer">
				<div class="wp-block-button is-style-outline">
					<a class="wp-block-button__link has-primary-color has-text-color wp-element-button" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e( 'Go to product ', 'markleen' );?></a>
				</div>
			</div> 
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->	
	




