<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Markleen
 */

get_header();

get_template_part( 'template-parts/hero', 'single' ); ?>

	<main id="primary" class="site-main container">
		<div id="breadcrumbs">
			<?php rank_math_the_breadcrumbs();?>
		</div>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );



			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
	
	<?php
		// Recupera el bloque reutilizable por su ID o nombre
		$reusable_block = get_post(13475); // Reemplaza el ID de tu bloque reutilizable

		// Verifica si el bloque reutilizable existe
		if ($reusable_block) {
			// Renderiza el bloque reutilizable
			echo apply_filters('the_content', $reusable_block->post_content);
		}
	?>

<?php
get_footer();



