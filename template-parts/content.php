<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Markleen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'markleen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'markleen' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<hr>
	<div class="row mb-4 mt-4">
		<div class="col-xs-12 col-sm-6">
			<div class="tag-metas">
				<svg class="icon" width="12" height="12" viewBox="0 0 16 16">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>//assets/icons/sprite-icons.svg#chevron-left" />
				</svg>
				<?php _e('Previous', 'markleen');?>
			</div>
			<?php previous_post_link('<big>%link</big>'); ?>
		</div>
		<div class="col-xs-12 col-sm-6 end-sm">
			<div class="tag-metas end-sm">
				<?php _e('Next', 'markleen');?>
				<svg class="icon" width="12" height="12" viewBox="0 0 16 16">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/icons/sprite-icons.svg#chevron-right" />
				</svg>
			</div>
			<?php next_post_link('<big>%link</big>'); ?>
		</div>
	</div>
	<hr>
	<footer class="entry-footer">
		<?php markleen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
