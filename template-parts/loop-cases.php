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

        <div class="card-content">
            <div class="post-format-tag uppercase"><?php esc_html_e( 'Case studies', 'markleen' ); ?></div>
            <div class="mb-2">
                <a class="big hover-underline-animation" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </div>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->