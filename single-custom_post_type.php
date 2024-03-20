<?php
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the content template.
            get_template_part( 'template-parts/content', get_post_type() );

        // End the loop.
        endwhile;
        ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php
get_footer();
