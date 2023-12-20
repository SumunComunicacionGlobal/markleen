<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Markleen
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
    
    <div class="card-blog">  
        
        <?php if (get_post_format() !== 'aside') : // Verificar si el formato no es "Aside" ?>
            
            <div class="card-image">
                <?php the_post_thumbnail('img-card-blog'); ?>
            </div>

        <?php endif; ?>

        <div class="card-content">

            <?php 

                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<a class="post-format-tag uppercase" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                }

            ?>
                    
            <div class="mb-2">
                <a class="big hover-underline-animation" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </div>

        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->