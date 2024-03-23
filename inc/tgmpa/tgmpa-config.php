<?php
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'after_setup_theme', 'wpbestportfolio_register_required_plugins' );

function wpbestportfolio_register_required_plugins() {
    $plugins = array(
        // array(
        //     'name'     => 'Advanced Custom Fields',
        //     'slug'     => 'advanced-custom-fields',
        //     'required' => true,
        //     'text_domain' => 'wp-best-portfolio', // Set text domain
        // ),
        // array(
        //     'name'     => 'Custom Meta Boxes',
        //     'slug'     => 'custom-meta-boxes',
        //     'required' => true,
        //     'text_domain' => 'wp-best-portfolio', // Set text domain
        // ),
    );

    tgmpa( $plugins );
}

