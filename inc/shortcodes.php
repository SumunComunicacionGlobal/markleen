<?php

function taxonomy_terms_list_shortcode($atts) {
    $atts = shortcode_atts(array(
        'type' => 'list', // Valor predeterminado: 'list'
    ), $atts);

    ob_start();

    // Get the taxonomy's terms
    $terms = get_terms(
        array(
            'taxonomy'   => 'product-category',
            'hide_empty' => false,
        )
    );

    // Check if any term exists
    if (!empty($terms) && is_array($terms)) {
        if ($atts['type'] === 'list_with_images') {
            // Output list with names and images
            echo '<div class="grid-columns-3">';
            foreach ($terms as $term) {
                echo '<div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000" data-aos-easing="ease-out-back">';
                
                // Output the term's image using ACF (adjust the field name as needed)
                $image = get_field('image_products_category', $term);
                if ($image) {
                    echo '<div class="card-image"><img src="' . esc_url($image) . '" alt="' . esc_attr($term->name) . '"></div>';
                }
                
                echo '<div class="card-content">';
                echo '<a class="' . esc_attr($term->name) . '" href="' . esc_url(get_term_link($term)) . '" title="' . esc_attr($term->name) . '">';
                echo '<h2 class="is-style-text-h4">' . esc_html($term->name) . '</h2>';
                echo '</a></div>';
                
                echo '</div>';
            }
            echo '</div>';
        } elseif ($atts['type'] === 'list') {
            // Output list with names only
            echo '<ul class="is-style-separator-list">';
            foreach ($terms as $term) {
                echo '<li>';
                echo '<a class="' . esc_attr($term->name) . '" href="' . esc_url(get_term_link($term)) . '" title="' . esc_attr($term->name) . '">';
                echo esc_html($term->name);
                echo '</a>';
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    return ob_get_clean();
}
add_shortcode('taxonomy_terms_list', 'taxonomy_terms_list_shortcode');


function mostrar_taxonomia_shortcode($atts) {
    // Establecer los atributos por defecto
    $atts = shortcode_atts(
        array(
            'tipo_entrada' => 'produtcs',
            'taxonomia'    => 'product-category',
        ),
        $atts,
        'mostrar_taxonomia'
    );

    // Obtener los términos de la taxonomía del tipo de entrada personalizada
    $terms = get_the_terms(get_the_ID(), $atts['taxonomia']);

    // Mostrar los términos si existen
    if ($terms) {
        $output = '';

        foreach ($terms as $term) {
            $output .= $term->name . ', ';
        }

        $output = rtrim($output, ', '); // Eliminar la última coma y espacio

        return $output;
    } else {
        return 'No hay términos para esta taxonomía.';
    }
}

// Registrar el shortcode
add_shortcode('mostrar_taxonomia', 'mostrar_taxonomia_shortcode');
