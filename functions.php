<?php
// Enqueue styles and scripts
function best_portfolio_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('best-portfolio-style', get_stylesheet_uri(), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'best_portfolio_enqueue_scripts');

// Add theme supports
function best_portfolio_theme_supports() {
    // Add title tag support
    add_theme_support('title-tag');
    // Add post thumbnail support
    add_theme_support('post-thumbnails');
    // Add HTML5 support for various elements
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
    ));
    // Add support for custom logo
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'best_portfolio_theme_supports');
// functions.php

// Registering a custom navigation menu
function register_my_menu() {
    register_nav_menu('primary-menu', __('Primary Menu'));
}
add_action('after_setup_theme', 'register_my_menu');



// Register custom post types
function best_portfolio_register_post_types() {
    // Register portfolio custom post type
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => __('Portfolio'),
            'singular_name' => __('Portfolio Item'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        // Add more arguments as needed
    ));
}
add_action('init', 'best_portfolio_register_post_types');

function register_product_post_type() {
    $labels = array(
        'name'               => _x( 'Products', 'post type general name', 'your-text-domain' ),
        'singular_name'      => _x( 'Product', 'post type singular name', 'your-text-domain' ),
        'menu_name'          => _x( 'Products', 'admin menu', 'your-text-domain' ),
        'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'your-text-domain' ),
        'add_new'            => _x( 'Add New', 'product', 'your-text-domain' ),
        'add_new_item'       => __( 'Add New Product', 'your-text-domain' ),
        'new_item'           => __( 'New Product', 'your-text-domain' ),
        'edit_item'          => __( 'Edit Product', 'your-text-domain' ),
        'view_item'          => __( 'View Product', 'your-text-domain' ),
        'all_items'          => __( 'All Products', 'your-text-domain' ),
        'search_items'       => __( 'Search Products', 'your-text-domain' ),
        'parent_item_colon'  => __( 'Parent Products:', 'your-text-domain' ),
        'not_found'          => __( 'No products found.', 'your-text-domain' ),
        'not_found_in_trash' => __( 'No products found in Trash.', 'your-text-domain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'your-text-domain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'product' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    );

    register_post_type( 'product', $args );
}
add_action( 'init', 'register_product_post_type' );




// Enqueue custom styles
function enqueue_custom_styles() {
    wp_enqueue_style( 'custom-styles', get_stylesheet_directory_uri() . '/custom-styles.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );
function enqueue_custom_styles_and_scripts() {
    // Enqueue CSS files
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/style.css');
    wp_enqueue_style('animate-style', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css');
    wp_enqueue_style('colors-style', get_template_directory_uri() . '/assets/css/colors.css');
    wp_enqueue_style('marketing-style', get_template_directory_uri() . '/assets/css/version/marketing.css');

    // Enqueue JavaScript files
    wp_enqueue_script('jquery');
    wp_enqueue_script('tether', get_template_directory_uri() . '/assets/js/tether.min.js', array(), false, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script('animate', get_template_directory_uri() . '/assets/js/animate.js', array(), false, true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');
