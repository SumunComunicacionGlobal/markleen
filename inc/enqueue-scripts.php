<?php
/**
 * Enqueue scripts and styles.
 */

function markleen_scripts() {
	wp_enqueue_style( 'markleen-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'markleen-js', get_template_directory_uri() . '/assets/js/markleen.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'markleen-js', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'markleen_scripts' );


/** 
* Gutenberg scripts and styles
 */
function sumun_gutenberg_scripts() {

	wp_enqueue_script(
		'be-editor', 
		get_stylesheet_directory_uri() . '/assets/js/editor.js', 
		array( 'wp-blocks', 'wp-dom', 'wp-dom-ready', 'wp-edit-post' ), 
		filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'sumun_gutenberg_scripts' );


function dcms_editor_customizer_styles() {
	wp_enqueue_style( 'theme-editor-customizer-styles',
				get_theme_file_uri( '/style-editor.css' ),
				array(),
				wp_get_theme()->get('Version')
			);
}
add_action( 'enqueue_block_editor_assets', 'dcms_editor_customizer_styles' );




