<?php
/**
 * The template for displaying all single study cases
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Markleen
 */

 get_header();

 get_template_part( 'template-parts/hero', get_post_type() ); ?>
	 
	 <main id="main" class="site-main container">
 
		 <?php
		 while ( have_posts() ) :
			 the_post(); 
 
				 get_template_part( 'template-parts/content', get_post_type() ); 
				 
			 endwhile; // End of the loop.
		 ?>
 
	 </main><!-- #main -->
 
	 
	 <?php
		 // Recupera el bloque reutilizable por su ID o nombre
		 $reusable_block = get_post(12807); // Reemplaza el ID de tu bloque reutilizable
 
		 // Verifica si el bloque reutilizable existe
		 if ($reusable_block) {
			 // Renderiza el bloque reutilizable
			 echo apply_filters('the_content', $reusable_block->post_content);
		 }
	 ?>
 
 <?php		
 get_footer();
