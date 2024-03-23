<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/apple-touch-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> 
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/responsive.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/colors.css" rel="stylesheet">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/version/marketing.css" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
 
<nav class="bg-white border-gray-200 dark:bg-gray-900" style="height: 100px; max-width: 1920px;">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
            <?php if ( has_custom_logo() ) {
                the_custom_logo();
            } else { ?>
                <img class="h-12 w-auto" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/default-logo.png" alt="<?php bloginfo( 'name' ); ?>">
            <?php } ?>
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <?php if ( is_user_logged_in() ) { 
                $current_user = wp_get_current_user();
                $user_avatar_url = get_avatar_url($current_user->ID);
            ?>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="<?php echo esc_url($user_avatar_url); ?>" alt="user photo">
                </button>
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown" style="position: absolute; right: 0px; top: 90px;">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white"><?php echo esc_html($current_user->display_name); ?></span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400"><?php echo esc_html($current_user->user_email); ?></span>
                    </div>
                    <?php if (has_nav_menu('user-menu')) {
                        wp_nav_menu(array(
                            'theme_location' => 'user-menu',
                            'container' => false,
                            'menu_class' => 'py-2',
                            'link_before' => '<span class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">',
                            'link_after' => '</span>'
                        ));
                    } ?>
                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
                </div>
            <?php } else { ?>
                <a href="<?php echo esc_url( wp_login_url() ); ?>" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only" style="width: 100px; height: 30px;">Login</span>
                    <span class="w-8 h-8 rounded-full flex items-center justify-center text-white">Login</span>
                </a>
            <?php } ?>
            <button data-collapse-toggle="navbar-user" type="button" id="toggleButton" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="user-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="flex items-center">
                <button id="search-toggle" class="flex text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700" style="margin-left: 50px;">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6M11 5a6 6 0 100 12 6 6 0 000-12z"/>
                    </svg>
                </button>
            </div>
        </div>



        
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggleButton');
        const userDropdown = document.getElementById('user-dropdown');

        toggleButton.addEventListener('click', function() {
            if (userDropdown.classList.contains('hidden')) {
                userDropdown.classList.remove('hidden');
                toggleButton.setAttribute('aria-expanded', 'true');
            } else {
                userDropdown.classList.add('hidden');
                toggleButton.setAttribute('aria-expanded', 'false');
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        userMenuButton.addEventListener('click', function() {
            // Toggle the visibility of the user dropdown menu
            if (userDropdown.classList.contains('hidden')) {
                userDropdown.classList.remove('hidden');
                userMenuButton.setAttribute('aria-expanded', 'true');
            } else {
                userDropdown.classList.add('hidden');
                userMenuButton.setAttribute('aria-expanded', 'false');
            }
        });
    });
</script>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'container' => false,
                'menu_class' => 'flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700',
                'link_before' => '<span class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">',
                'link_after' => '</span>'
            ) );
            ?>
        </div>
    </div>

</nav>
