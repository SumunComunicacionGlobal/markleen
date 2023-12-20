<section id="hero">
    <div class="entry-title">
        <?php
            if (is_search ()) {
                /* translators: %s: search query. */
                echo '<h1 class="page-title pb-6">';
                printf( esc_html__( 'Resultados de búsqueda por: %s', 'markleen' ), '<span>' . get_search_query() . '</span></h1>' );
            }
            else {
                the_archive_title( '<h1 class="page-title pb-6">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
            };
        ?>
    </div>
</section>

<div id="breadcrumbs" class="container mt-3">
    <?php rank_math_the_breadcrumbs();?>
</div>