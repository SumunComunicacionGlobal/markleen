<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Markleen
 */

get_header();

get_template_part( 'template-parts/hero', get_post_type() ); ?>

<main id="primary" class="site-main container">

	<div id="breadcrumbs">
		<?php rank_math_the_breadcrumbs();?>
	</div>

	<div class="grid-columns-3 mt-7 mb-8">

		<?php if ( have_posts() ) : ?>

			<?php
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

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>

</main><!-- #main -->
<?php
	// Recupera el bloque reutilizable por su ID o nombre
	$reusable_block = get_post(PREFOOTER_BLOG_ID); // Reemplaza el ID de tu bloque reutilizable

	// Verifica si el bloque reutilizable existe
	if ($reusable_block) {
		// Renderiza el bloque reutilizable
		echo apply_filters('the_content', $reusable_block->post_content);
	}
?>

<?php
get_footer();
