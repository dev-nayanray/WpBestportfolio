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
                            <div class="blog-custom-build">
                                <?php
                                if (have_posts()) :
                                    while (have_posts()) : the_post();
                                        // Start the loop
                                        ?>
                                        <div id="post-<?php the_ID(); ?>" <?php post_class('blog-box wow fadeIn'); ?>>
                                            <div class="post-media">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                                                    <div class="hovereffect">
                                                        <span></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="blog-meta big-meta text-center">
                                                <div class="post-sharing">
                                                    <?php echo do_shortcode('[addtoany]'); ?>
                                                </div>
                                                <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                                <div class="entry-content">
                                                    <?php the_content(); ?>
                                                </div>
                                                <small><?php the_category(', '); ?></small>
                                                <small><?php the_time('j F, Y'); ?></small>
                                                <small><?php the_author_posts_link(); ?></small>
                                                <small><i class="fa fa-eye"></i> <?php echo get_post_meta(get_the_ID(), 'post_views_count', true); ?></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                        <?php
                                    endwhile;
                                else :
                                    echo __('No posts found', 'text-domain');
                                endif;
                                ?>
                            </div><!-- end blog-custom-build -->

                            <hr class="invis">

                            <div class="row">
                                <div class="col-md-12">
                                    <?php the_posts_pagination(); ?>
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

   <section class="section lb">
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
                        echo __('No posts found', 'text-domain');
                    endif;
                    wp_reset_postdata(); // Reset post data
                    ?>
                </div>
            </div><!-- end container -->
        </section><!-- end section -->


        <?php get_footer(); ?>
    </div><!-- end wrapper -->
    <?php wp_footer(); ?>
</body>
</html>
