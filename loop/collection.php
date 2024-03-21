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
                   <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add To Cart</button>
                </div>
            </div>
    <?php endwhile;
    endif;

    // Restore original Post Data
    wp_reset_postdata();
    ?>
</div>
