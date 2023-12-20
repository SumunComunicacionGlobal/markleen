
<div class="filter-category">
    <?php get_search_form( true ) ;?>
    
    <div class="has-text-white-color big mt-3">
        <?php esc_html_e( 'Tipos de producto', 'markleen' ); ?>
        <hr>
    </div>
    <ul class="is-style-separator-list">
        <?php
            // Get the taxonomy's terms
            $terms = get_terms(
                array(
                    'taxonomy'   => 'product-category',
                    'hide_empty' => false,
                    'orderby'  => 'name',
                    'order'    => 'DESC',
                )
            );

            // Check if any term exists
            if ( ! empty( $terms ) && is_array( $terms ) ) {
                // Run a loop and print them all
                foreach ( $terms as $term ) { ?>
                    <li>
                        <a class="<?php echo $term->name; ?>" href="<?php echo esc_url( get_term_link( $term ) ) ?>" title="<?php echo $term->name; ?>">
                            <?php echo $term->name; ?>
                        </a>
                    </li>
                <?php
                }
            } 
        ?>
    </ul>
</div>
  

