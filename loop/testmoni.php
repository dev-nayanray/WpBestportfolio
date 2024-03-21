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