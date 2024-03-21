<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo( 'name' ); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> 
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Animate styles for this template -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

    <!-- Version Marketing CSS for this template -->
    <link href="css/version/marketing.css" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  
<div class="bg-white">
  <header class="absolute inset-x-0 top-0 z-50" >
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global" style="height:150px;line-height: 100px;">
      <div class="flex lg:flex-1">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="-m-1.5 p-1.5">
        <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
        <?php
        // Check if a custom logo is set
        if ( has_custom_logo() ) {
            // Display the custom logo
            the_custom_logo();
        } else {
            // If no custom logo is set, display a default image
            ?>
            <img class="h-60 w-100" src="<?php echo esc_url( get_template_directory_uri() ); ?>/path/to/default/logo.png" alt="<?php bloginfo( 'name' ); ?>">
            <?php
        }
        ?>
    </a>
</div>

      <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
    <div class="hidden lg:flex lg:gap-x-12">
  <?php
    // Displaying WordPress menu
    wp_nav_menu(array(
      'theme_location' => 'primary-menu',
      'container' => false,
      'items_wrap' => '%3$s', // Removes the <ul> wrapper around menu items
      'menu_class' => 'flex space-x-4 text-sm font-semibold leading-6 text-gray-900',
      'link_before' => '<span class="hover:bg-gray-200 px-2 py-1 rounded-lg">',
      'link_after' => '</span>'
    ));
  ?>
</div>


      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="<?php echo esc_url( wp_login_url() ); ?>" class="text-sm font-semibold leading-6 text-gray-900"><?php _e( 'Log in', 'textdomain' ); ?> <span aria-hidden="true">&rarr;</span></a>
      </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div class="fixed inset-0 z-50"></div>
      <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="-m-1.5 p-1.5">
            <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
          </a>
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
  <div class="-my-6 divide-y divide-gray-500/10">
    <div class="space-x-4 py-6 flex flex-wrap">
      <?php
        // Displaying WordPress menu for mobile
        wp_nav_menu(array(
          'theme_location' => 'primary-menu',
          'container' => false,
          'items_wrap' => '%3$s', // Removes the <ul> wrapper around menu items
          'menu_class'     => 'text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50', // Adjusted menu class
        ));
      ?>
    </div>
    <div class="py-6">
      <a href="<?php echo esc_url( wp_login_url() ); ?>" class="block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 "><?php _e( 'Log in', 'best-portfolio' ); ?></a>
    </div>
  </div>
</div>

    </div>
  </header>

  <span style="height:50px; ">
     <br>    
  </span>

