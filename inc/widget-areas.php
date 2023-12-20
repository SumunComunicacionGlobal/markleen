<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function markleen_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'markleen' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'markleen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="text-h5" class="widget-title">',
		'after_title'   => '</p>',
	) );
	

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'markleen' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'markleen' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="text-h4 uppercase widget-title">',
		'after_title'   => '</div>',
	) );

	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Nav', 'markleen' ),
			'id'            => 'footer-main-nav',
			'description'   => esc_html__( 'Añadir widget aquí.', 'markleen' ),
			'before_widget' => '<section id="%1$s" class="%2$s">',
			'after_widget'  => '</section>',
		)
    );

}
add_action( 'widgets_init', 'markleen_widgets_init' );
