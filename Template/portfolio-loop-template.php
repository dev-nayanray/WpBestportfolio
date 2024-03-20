<?php
/**
 * Template Name: Portfolio Loop
 */

get_header();

// The WordPress loop
if (have_posts()) :
    while (have_posts()) : the_post();
        // Start the loop
        ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content(); ?>

                <?php
                // Custom query to fetch portfolio items
                $portfolio_query = new WP_Query(array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => -1, // Display all portfolio items
                ));

                if ($portfolio_query->have_posts()) :
                    while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                        ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    <?php
                    endwhile;
                endif;
                wp_reset_postdata(); // Reset post data
                ?>
            </div>
        </div>
    <?php
    endwhile;
endif;

get_footer();
