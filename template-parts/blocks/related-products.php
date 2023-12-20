<?php
/**
 * Block Name: Related Products
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$posts = get_field('related_products');
$grid_columns = get_field('related_products_columns');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-container--related-products';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

if($posts) :

?>

	<div class="grid-columns-<?php echo $grid_columns; ?>">
		<?php
        
        foreach($posts as $poste) :
            global $post;
            
            $post = $poste;
            
            setup_postdata($post);
            
            get_template_part( 'template-parts/loop', 'product' );
        
        endforeach;
        
        wp_reset_postdata(); ?>
    </div>

<?php endif; ?>