<?php

// let's create the function for the custom type - Products
function custom_post_products() { 
    // creating (registering) the custom type 
    register_post_type( 'products', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Products', 'markleen'), /* This is the Title of the Group */
            'singular_name' => __('Product', 'markleen'), /* This is the individual type */
            'all_items' => __('All products', 'markleen'), /* the all items menu item */
            'add_new' => __('Add new', 'markleen'), /* The add new menu item */
            'add_new_item' => __('Add new products', 'markleen'), /* Add New Display Title */
            'edit' => __( 'Edit', 'markleen' ), /* Edit Dialog */
            'edit_item' => __('Edit Product', 'markleen'), /* Edit Display Title */
            'new_item' => __('New Product', 'markleen'), /* New Display Title */
            'view_item' => __('View Product', 'markleen'), /* View Display Title */
            'search_items' => __('Search Product', 'markleen'), /* Search Custom Type Title */ 
            'not_found' =>  __('Nothig found on base data.', 'markleen'), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __('Nothig found on trash', 'markleen'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-video-alt', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'rewrite'   => array( 'slug' => 'products', 'markleen' , 'with_front' => true ), /* you can specify its url slug */
            'has_archive' => false, //__('soluciones-derrames', 'markleen'), /* you can rename the slug here */
            'capability_type' => 'page',
            'hierarchical' => true,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes')
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_products');

// now let's add custom Product categories 
register_taxonomy( 'product-category', 
array('products'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Product Categories', 'markleen' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Product Category', 'markleen' ), /* single taxonomy name */
        'search_items' =>  __( 'Search categories', 'markleen' ), /* search title for taxomony */
        'all_items' => __( 'All categories', 'markleen' ), /* all title for taxonomies */
        'parent_item' => __( 'Parent category', 'markleen' ), /* parent title for taxonomy */
        'parent_item_colon' => __( 'Parent category:', 'markleen' ), /* parent taxonomy title */
        'edit_item' => __( 'Edit Category', 'markleen' ), /* edit custom taxonomy title */
        'update_item' => __( 'Update Category', 'markleen' ), /* update title for taxonomy */
        'add_new_item' => __( 'Add new Category', 'markleen' ), /* add new title for taxonomy */
        'new_item_name' => __( 'New Category', 'markleen' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_in_rest' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite'   => array( 'slug' => 'product-category', 'markleen' , 'with_front' => true ), /* you can specify its url slug */
    'has_archive' => true, /* you can rename the slug here */
    )
);


// let's create the function for the custom type - Case studies
function custom_post_cases() { 
    // creating (registering) the custom type 
    register_post_type( 'cases', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Case studies', 'markleen'), /* This is the Title of the Group */
            'singular_name' => __('Study case', 'markleen'), /* This is the individual type */
            'all_items' => __('All Case studies', 'markleen'), /* the all items menu item */
            'add_new' => __('Add new', 'markleen'), /* The add new menu item */
            'add_new_item' => __('Add new Case studies', 'markleen'), /* Add New Display Title */
            'edit' => __( 'Edit', 'markleen' ), /* Edit Dialog */
            'edit_item' => __('Edit Case Study', 'markleen'), /* Edit Display Title */
            'new_item' => __('New Case Study', 'markleen'), /* New Display Title */
            'view_item' => __('View Case Study', 'markleen'), /* View Display Title */
            'search_items' => __('Search Case Study', 'markleen'), /* Search Custom Type Title */ 
            'not_found' =>  __('Nothig found on base data.', 'markleen'), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __('Nothig found on trash', 'markleen'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 12, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-format-quote', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'rewrite'   => array( 'slug' => 'case-studies', 'markleen' , 'with_front' => true ), /* you can specify its url slug */
            'has_archive' => false, /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => true,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail')
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_cases');