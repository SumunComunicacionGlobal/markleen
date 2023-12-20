<?php $posts = get_field('related_products');

if( $posts ): ?>
	<section id="related-projects" class="mt-6">

        <h2 class="display"><?php the_field('title_related_products');?></h2>
        <p><?php the_field('description_related_products');?></p>
		
        <div class="grid-columns-3">
            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php get_template_part( 'template-parts/loop', 'product' ); ?>
                    </article>
                <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>		
        </div>

	</section>
<?php endif; ?>