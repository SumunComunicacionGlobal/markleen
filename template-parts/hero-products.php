<section id="hero">

    <?php if (is_tax('product-category')) :?>

        <div class="entry-title aos-init aos-animate" data-aos="fade-right" data-aos-delay="250" data-aos-duration="1000">
            <h1><?php echo single_cat_title(); ?></h1>
        </div>

        <div class="post-thumbnail">
            <?php // Obtén el término de la taxonomía actual
                $tax = get_queried_object();
                // Obtén la imagen
                $image = get_field('image_products_category', $tax);
            ?>
            <img src="<?php echo $image; ?>" alt="<?php echo single_cat_title(); ?>">
        </div>

    <?php else : ?>

        <div class="entry-title aos-init aos-animate" data-aos="slide-right" data-aos-duration="1000" data-aos-easing="ease-out-back">
            <?php the_title('<h1 class="">', '</h1>'); ?>
        </div>

        <?php
        $video = get_field('hero_video');
        if ($video) :?>
        
        <div class="post-thumbnail-video">
            <div class="wp-block-cover is-light" style="min-height:488px">
                <span aria-hidden="true" class="wp-block-cover__background has-secondary-80-background-color has-background-dim"></span>
                <video class="wp-block-cover__video-background intrinsic-ignore" autoplay="" muted="" loop="" playsinline="" src="<?php echo esc_url($video); ?>" data-object-fit="cover"></video>
            </div>
        </div>

        <?php else : ?>

        <div class="post-thumbnail">
            <?php the_post_thumbnail('full'); ?>
        </div>

        <?php endif; ?>

    <?php endif; ?>

</section>