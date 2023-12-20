<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Markleen
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( is_home() && !is_front_page() ) {
				$page_id = get_option( 'page_for_posts' );
				if ( $page_id ) { 
					$page_for_posts = get_page( $page_id );
					?>

					<div class="entry-content container">
						<?php echo apply_filters( 'the_content', $page_for_posts->post_content ); ?>

					</div>

				<?php }
			} ?>

		<div class="has-primary-10-background-color blog-bg">	

		<?php
		if ( have_posts() ) : 
			
		echo '<div class="grid-container-blog container pt-8">';
			
			/* Start the Loop */
				while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/loop', get_post_type() );

			endwhile;

			echo '</div><div class="container flex-center">';
			
			the_posts_pagination();

			echo '</div>';

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>
		<?php
			// Recupera el bloque reutilizable por su ID o nombre
			$reusable_block = get_post(13475); // Reemplaza el ID de tu bloque reutilizable

			// Verifica si el bloque reutilizable existe
			if ($reusable_block) {
				// Renderiza el bloque reutilizable
				echo apply_filters('the_content', $reusable_block->post_content);
			}
		?>
	</main><!-- #main -->

<?php
get_footer();
