<?php
/**
 * The template for displaying archive products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Markleen
 */

get_header();

get_template_part( 'template-parts/hero', 'products' ); ?>
	
    <main id="main" class="site-main has-neutral-white-background-color">

        <section class="content">
            <div class="content-wrap">
                <div id="breadcrumbs">
                    <?php rank_math_the_breadcrumbs();?>
                </div>
                <?php the_archive_description('<div>', '</div>') ;?>
            </div>

            <?php get_template_part( 'template-parts/aside-products'); ?>
        
            <?php
            if ( have_posts() ) : ?>
                
                <div class="grid-loop grid-columns-3 mt-3">

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post(); ?>
                        
                            <?php
                            /*
                            * Include the Post-Type-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                            */
                            get_template_part( 'template-parts/loop', 'product' ); ?>

                    <?php endwhile; ?>

                </div><!-- end .row entry-content -->
                    
                
            <?php else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>
        </section>
        <?php
            // Recupera el bloque reutilizable por su ID o nombre
            $reusable_block = get_post(PREFOOTER_PRODUCTS_ID); // Reemplaza el ID de tu bloque reutilizable

            // Verifica si el bloque reutilizable existe
            if ($reusable_block) {
                // Renderiza el bloque reutilizable
                echo apply_filters('the_content', $reusable_block->post_content);
            }
        ?>
    </main><!-- #main -->

<?php
get_footer();

