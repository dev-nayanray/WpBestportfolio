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
            <div class="relative">
    <button id="search-toggle" class="flex text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700" style="margin-left: 50px;">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6M11 5a6 6 0 100 12 6 6 0 000-12z"/>
        </svg>
    </button>
    <div id="search-popup" class="absolute z-10 top-0 mt-10 w-80 bg-white border border-gray-300 rounded-lg shadow-lg p-4 " style="display: none; right: .15rem; ">
        <form action="search.php" method="get" class="flex items-center max-w-lg mx-auto">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.15 5.6h.01m3.337 1.913h.01m-6.979 0h.01M5.541 11h.01M15 15h2.706a1.957 1.957 0 0 0 1.883-1.325A9 9 0 1 0 2.043 11.89 9.1 9.1 0 0 0 7.2 19.1a8.62 8.62 0 0 0 3.769.9A2.013 2.013 0 0 0 13 18v-.857A2.034 2.034 0 0 1 15 15Z"/>
                    </svg>
                </div>
                <input type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required />
                <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7v3a5.006 5.006 0 0 1-5 5H6a5.006 5.006 0 0 1-5-5V7m7 9v3m-3 0h6M7 1h2a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3Z"/>
                    </svg>
                </button>
            </div>
            <button type="submit" class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4 me-2 r-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>Search
            </button>
        </form>
    </div>
</div>

<script>
document.getElementById('search-toggle').addEventListener('click', function() {
    var searchPopup = document.getElementById('search-popup');
    if (searchPopup.style.display === 'none') {
        searchPopup.style.display = 'block';
    } else {
        searchPopup.style.display = 'none';
    }
});
</script>

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
