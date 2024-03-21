
<?php get_header();?>
<div class="relative isolate px-6 pt-14 lg:px-8 main-sec">

    <!-- Background Slider -->
    

    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-35 relative sec-main">
      <div id="background-slider" class="absolute inset-x-0 -top-80 mt-0 -z-1000 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true" style="height: 350px; border: 5px solid whitesmoke; ">
        <?php
        // The Query
        $args = array(
            'post_type'      => 'portfolio', // Change to your custom post type name
            'posts_per_page' => -1, // Display all posts
        );
        $query = new WP_Query($args);

        // Check if there are posts
        if ($query->have_posts()) :
            // Loop through the posts
            while ($query->have_posts()) : $query->the_post();
                $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Get the featured image URL
        ?>
                <div class="absolute top-0 left-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-<?php echo ($query->current_post === 0) ? '100' : '0'; ?> bg-center bg-cover bg-no-repeat" style="background-image: url('<?php echo esc_url($featured_image_url); ?>');">
                    <div class="text-center" >
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                <?php bloginfo('name'); ?> -
            </h1>
            <p class="mt-6 text-lg leading-8 text-gray-600"> <?php bloginfo('description'); ?></p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </div>
        <!-- Your content here -->
        
        

    



             
        <?php
            endwhile;
            // Restore original Post Data
            wp_reset_postdata();
        else :
            // If no posts are found
            echo 'No portfolio items found.';
        endif;
        ?>
    
</div>
<script>
    // JavaScript code for background image slider
    var currentSlide = 0;
    var slides = document.querySelectorAll('#background-slider > div');

    function showSlide(slideIndex) {
        slides.forEach(function(slide) {
            slide.style.opacity = '0';
        });
        slides[slideIndex].style.opacity = '1';
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Automatically transition to the next slide every 5 seconds
    setInterval(nextSlide, 5000);
</script>

<div class="relative isolate px-6 pt-14 lg:px-8">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80 " aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem] " style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
</div>

</div>

<div class="relative overflow-hidden bg-white">
  <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
    <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
      <div class="sm:max-w-lg">
       
<div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Our Team</h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <?php
            $users = get_users(array('orderby' => 'registered', 'order' => 'DESC', 'number' => 5)); // Retrieve latest 5 users
            foreach ($users as $user) :
                $user_info = get_userdata($user->ID);
                ?>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <?php echo get_avatar($user->ID, 64, '', $user_info->display_name, array('class' => 'w-8 h-8 rounded-full')); ?>
                        </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                <?php echo $user_info->display_name; ?>
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                <?php echo $user_info->user_email; ?>
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <?php echo '$' . rand(50, 5000); ?> <!-- Random amount for demonstration -->
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
   </div>
</div>

      </div>
      <div>
        <div class="mt-10">
          <!-- Decorative image grid -->
          <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
            <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
              <div class="flex items-center space-x-6 lg:space-x-8">
                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                  <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                </div>
                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                </div>
                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <a href="http://127.0.0.1/Test/team-members/" class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-center font-medium text-white hover:bg-indigo-700">Meet Our Team</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 grid-container" style="grid-template-columns: repeat(3, minmax(0, 1fr));">
    <?php
    $count = 0;  
    if (have_posts()) :
        while (have_posts() && $count < 6) : // Limiting to 6 posts for a 3x2 grid
            the_post();
            ?>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large', ['class' => 'rounded-t-lg']); ?>
                </a>
                <div class="p-5">
                    <a href="<?php the_permalink(); ?>">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php the_title(); ?></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo wp_trim_words(get_the_excerpt(), 180, '...'); ?></p>
                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            <?php
            $count++;
        endwhile;
    else :
        ?>
        <p><?php esc_html_e('No posts found'); ?></p>
    <?php
    endif;
    ?>
</div>



<?php
// Display Products
function display_products() {
    ?>
    <div class="bg-white">
      <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Products</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
          <?php
          $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8 // Change the number of products you want to display
          );
          $products_query = new WP_Query($args);

          if ($products_query->have_posts()) :
            while ($products_query->have_posts()) :
              $products_query->the_post();
              ?>
              <a href="<?php the_permalink(); ?>" class="group">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                  <?php the_post_thumbnail('full', ['class' => 'h-full w-full object-cover object-center group-hover:opacity-75']); ?>
                </div>
                <h3 class="mt-4 text-sm text-gray-700"><?php the_title(); ?></h3>
                <p class="mt-1 text-lg font-medium text-gray-900">100<?php echo '$' . get_post_meta(get_the_ID(), 'price', true); ?></p>
              </a>
          </div>
          <?php
            endwhile;
            wp_reset_postdata(); // Reset post data
          else :
            ?>
            <p><?php esc_html_e('No products found'); ?></p>
          <?php
          endif;
          ?>
        </div>
      </div>
    </div>
    <?php
} ?>
<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->


<?php /* Template Name: Collections Template */ ?>


<div class="bg-gray-100">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
      <h2 class="text-2xl font-bold text-gray-900">Collections</h2>

      <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
        <?php
        // Custom query to fetch portfolio items
        $portfolio_query = new WP_Query(array(
            'post_type' => 'portfolio',
            'posts_per_page' => -1, // Display all portfolio items
        ));

        if ($portfolio_query->have_posts()) :
            while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
        ?>
                <div class="group relative">
                  <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail('large', ['class' => 'h-full w-full object-cover object-center']); ?>
                    </a>
                  </div>
                  <h3 class="mt-6 text-sm text-gray-500">
                    <a href="<?php the_permalink(); ?>">
                      <span class="absolute inset-0"></span>
                      <?php the_title(); ?>
                    </a>
                  </h3>
                  <p class="text-base font-semibold text-gray-900"><?php the_excerpt(); ?></p>
                </div>
            <?php
            endwhile;
        endif;
        wp_reset_postdata(); // Reset post data
        ?>
      </div>
    </div>
  </div>
</div>

    

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <?php
    // WP_Query arguments
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
    );

    // The Query
    $query = new WP_Query($args);

    // The Loop
    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
    ?>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large', ['class' => 'p-8 rounded-t-lg']); ?>
                </a>
                <div class="px-5 pb-5">
                    <a href="<?php the_permalink(); ?>">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php the_title(); ?></h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            <?php for ($i = 0; $i < 4; $i++) : ?>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            <?php endfor; ?>
                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">$<?php echo get_post_meta(get_the_ID(), 'product_price', true); ?></span>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
                    </div>
                </div>
            </div>
    <?php endwhile;
    endif;

    // Restore original Post Data
    wp_reset_postdata();
    ?>
</div>




<section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
  <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20"></div>
  <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center"></div>
  <div class="mx-auto max-w-2xl lg:max-w-4xl">
    <img class="mx-auto h-12" src="https://tailwindui.com/img/logos/workcation-logo-indigo-600.svg" alt="">
    <div id="testimonialSlider" class="mt-10 swiper-container">
      <div class="swiper-wrapper">
        <?php
        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => -1,
        );
        $testimonials = new WP_Query($args);
        if ($testimonials->have_posts()) :
            while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
              <div class="swiper-slide">
                <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                  <?php the_content(); ?>
                </blockquote>
                <figcaption class="mt-10">
                  <img class="mx-auto h-10 w-10 rounded-full" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                  <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                    <div class="font-semibold text-gray-900"><?php the_title(); ?></div>
                    <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                      <circle cx="1" cy="1" r="1" />
                    </svg>
                    <div class="text-gray-600"><?php echo get_post_meta(get_the_ID(), 'testimonial_position', true); ?></div>
                  </div>
                </figcaption>
              </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
      </div>
      <!-- Add navigation buttons if required -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>







<div class="bg-white py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">Trusted by the world’s most innovative teams</h2>
    <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
      <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor" width="158" height="48">
      <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform" width="158" height="48">
      <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple" width="158" height="48">
      <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158" height="48">
      <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic" width="158" height="48">
    </div>
  </div>
</div>
<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<?php get_footer(); ?>
