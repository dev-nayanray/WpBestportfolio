<?php /* Template Name: Collections Template */ ?>
<?php get_header(); ?>

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

<?php get_footer(); ?>
