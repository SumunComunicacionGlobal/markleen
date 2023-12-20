<section id="hero">
    <div class="entry-title">
        <?php echo the_title( '<h1 class="">', '</h1>' );?>
        <div class="entry-meta mt-2">
            <?php
            markleen_posted_on();
            markleen_posted_by();
            ?>
        </div><!-- .entry-meta -->
    </div>

    <div class="post-thumbnail" >
        <?php the_post_thumbnail('full'); ?>
    </div>
</section>