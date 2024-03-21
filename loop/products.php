
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
