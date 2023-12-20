<?php
/**
 * Block Name: Grid Blog Cases
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */



$title = get_field('blog_cases_title');
$number = get_field('blog_cases_number');

?>


<div class="wp-container-title wp-block-group is-content-justification-left is-nowrap is-layout-flex wp-block-group-is-layout-flex">
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-wide">
    <p class="is-style-text-h2 is-layout-flow wp-block-paragraph-is-layout-flow"><?php echo $title ;?></p>
    <p class="has-text-align-right section-number has-accent-color has-text-color is-layout-flow wp-block-paragraph-is-layout-flow"><strong><?php echo $number ;?></strong></p>
</div>

<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>

<?php

    $args_pages = array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $args_cases = array(
        'post_type' => 'cases',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $loop_pages = new WP_Query($args_pages);
    $loop_cases = new WP_Query($args_cases);

    if ($loop_pages->have_posts() || $loop_cases->have_posts()) :
        ?>
        <div class="grid-container-blog">
        
        <?php
        while (($loop_pages->have_posts() || $loop_cases->have_posts())) {
            
            if ($loop_pages->have_posts()) {
                $loop_pages->the_post();
                
                get_template_part( 'template-parts/loop', get_post_type() );
            }
            if ($loop_cases->have_posts()) {
                $loop_cases->the_post();
                
                get_template_part( 'template-parts/loop', get_post_type() );
            }
        }
        ?>
        </div>
        <?php
    else :
        // No se encontraron publicaciones
    endif;

    wp_reset_postdata()
;?>

