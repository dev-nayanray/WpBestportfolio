<?php
/**
 * Template Name: Blog Loop
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrapper">
        <?php get_header(); ?>

        <section id="cta" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 align-self-center">
                        <h2><?php bloginfo('name'); ?></h2>
                        <p class="lead"><?php bloginfo('description'); ?></p>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="newsletter-widget text-center align-self-center">
                            <h3><?php _e('Subscribe Today!', 'text-domain'); ?></h3>
                            <p><?php _e('Subscribe to our weekly Newsletter and receive updates via email.', 'text-domain'); ?></p>
                            <?php echo do_shortcode('[contact-form-7 id="123" title="Subscribe Form"]'); ?>
                        </div><!-- end newsletter -->
                    </div>
                </div>
            </div>
        </section>

        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="page-wrapper">
                            <div class="container">
                <div class="post-loop-container">
                    <?php
                    // Custom query to fetch posts
                    $post_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => -1, // Display all posts
                    ));

                    if ($post_query->have_posts()) :
                        while ($post_query->have_posts()) : $post_query->the_post();
                    ?>
                            <a href="<?php the_permalink(); ?>" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 post-loop-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php the_title(); ?></h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php the_excerpt(); ?></p>
                                </div>
                            </a>
                    <?php
                        endwhile;
                    else :
                        echo __('No posts found', 'wp-best-portfolio');
                    endif;
                    wp_reset_postdata(); // Reset post data
                    ?>
                </div>
            </div>
                            <!-- end blog-custom-build -->


                            <div class="row">
                                <div class="col-md-12">
                                    


<nav aria-label="Page navigation example">
  <ul class="flex items-center -space-x-px h-10 text-base">
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only">Previous</span>
        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
        </svg>
      </a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
    </li>
    <li>
      <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
    </li>
    <li>
      <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only">Next</span>
        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
      </a>
    </li>
  </ul>
</nav>

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end page-wrapper -->
                        
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12">
                        <?php get_sidebar(); ?>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

   


        <?php get_footer(); ?>
    </div><!-- end wrapper -->
    <?php wp_footer(); ?>
</body>
</html>
