<div class="container">
    <div class="content">
        <?php
        // Start the loop
        while (have_posts()) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <!-- Display the post title -->
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <!-- Display the feature image -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content">
                    <!-- Display the post content -->
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <!-- Display the share buttons -->
                    <div class="share-buttons">
                        <!-- Add your share buttons here -->
                    </div>
                    <!-- Display the comment section -->
                    <?php comments_template(); ?>
                </footer>
            </article>
        <?php endwhile; ?>
    </div>
    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
