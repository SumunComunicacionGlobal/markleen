<?php

/**
 * Image Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'swiper-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$images = get_field('block_slide_img');
$size = 'full'; // (thumbnail, medium, large, full or custom size)


if($images) : ?>

    <div id="<?php echo esc_attr($id); ?>" class="swiper swiper-img-block mt-3">
        <div class="swiper-wrapper">
            <?php foreach($images as $image): ?>
            <div class="swiper-slide">
                <figure class="wp-block-image size-large">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <figcaption class="wp-element-caption"><?php echo esc_html($image['caption']); ?></figcaption>
                </figure>
            </div>
            <?php endforeach;
            
            wp_reset_postdata(); ?>
        </div>
            
        <!-- Add Arrows -->
        <div class="dflex">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
<?php endif; ?>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper('#<?php echo esc_attr($id); ?>', {
    autoHeight: true,
	navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        768: {
          slidesPerView: 1,
        },
        769: {
          slidesPerView: 3,
        },
      },
	});
</script>