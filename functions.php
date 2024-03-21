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

// Add custom image sizes for cropped image
add_action( 'after_setup_theme', 'theme_custom_image_sizes' );
function theme_custom_image_sizes() {
    add_image_size( 'custom-cropped-image-small', 100, 60, true ); // Small size: Width: 100px, Height: 60px, Crop: true
    add_image_size( 'custom-cropped-image-medium', 200, 120, true ); // Medium size: Width: 200px, Height: 120px, Crop: true
    add_image_size( 'custom-cropped-image-large', 400, 240, true ); // Large size: Width: 400px, Height: 240px, Crop: true
    // Add more sizes as needed
}

// Display custom cropped images
if ( has_post_thumbnail() ) {
    ?>
    <div class="custom-cropped-images-container">
        <?php
        // Display small custom cropped image
        the_post_thumbnail( 'custom-cropped-image-small', array( 'class' => 'custom-cropped-image-small-class' ) );

        // Display medium custom cropped image
        the_post_thumbnail( 'custom-cropped-image-medium', array( 'class' => 'custom-cropped-image-medium-class' ) );

        // Display large custom cropped image
        the_post_thumbnail( 'custom-cropped-image-large', array( 'class' => 'custom-cropped-image-large-class' ) );
        ?>
    </div>
    <?php
}


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


function create_team_post_type() {
    register_post_type( 'team',
        array(
            'labels' => array(
                'name' => __( 'Team' ),
                'singular_name' => __( 'Team Member' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'team'),
            'supports' => array('title', 'editor', 'thumbnail') // Add support for title, editor, and thumbnail (for image)
        )
    );

    // Add meta boxes for member name and position
    add_action('add_meta_boxes', 'team_member_meta_boxes');
    add_action('save_post', 'save_team_member_meta');
}

function team_member_meta_boxes() {
    add_meta_box(
        'team_member_name',
        'Member Name',
        'team_member_name_callback',
        'team',
        'normal',
        'default'
    );

    add_meta_box(
        'team_member_position',
        'Position',
        'team_member_position_callback',
        'team',
        'normal',
        'default'
    );
}

function team_member_name_callback($post) {
    $value = get_post_meta($post->ID, '_team_member_name', true);
    echo '<input type="text" id="team_member_name" name="team_member_name" value="' . esc_attr($value) . '" size="25" />';
}

function team_member_position_callback($post) {
    $value = get_post_meta($post->ID, '_team_member_position', true);
    echo '<input type="text" id="team_member_position" name="team_member_position" value="' . esc_attr($value) . '" size="25" />';
}

function save_team_member_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['team_member_name'])) {
        update_post_meta($post_id, '_team_member_name', sanitize_text_field($_POST['team_member_name']));
    }

    if (isset($_POST['team_member_position'])) {
        update_post_meta($post_id, '_team_member_position', sanitize_text_field($_POST['team_member_position']));
    }
}

add_action( 'init', 'create_team_post_type' );



// Register Custom Post Type Testimonial
function custom_post_type_testimonial() {

    $labels = array(
        'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Testimonials', 'text_domain' ),
        'all_items'             => __( 'All Testimonials', 'text_domain' ),
        'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Testimonial', 'text_domain' ),
        'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
        'update_item'           => __( 'Update Testimonial', 'text_domain' ),
        'view_item'             => __( 'View Testimonial', 'text_domain' ),
        'view_items'            => __( 'View Testimonials', 'text_domain' ),
        'search_items'          => __( 'Search Testimonial', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Testimonial', 'text_domain' ),
        'description'           => __( 'Customer testimonials', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-testimonial',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'rewrite'               => array( 'slug' => 'testimonial' ),
    );
    register_post_type( 'testimonial', $args );

}
add_action( 'init', 'custom_post_type_testimonial', 0 );


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
