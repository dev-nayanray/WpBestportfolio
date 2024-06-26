            <div class="grid grid-cols-3 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-3 grid-container">
    <?php
    $count = 0;  
    if (have_posts()) :
        while (have_posts() && $count < 6) : // Limiting    to 6 posts for a 3x2 grid
            the_post();
            ?>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 aboutbg">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large', ['class' => 'rounded-t-lg']); ?>
                </a>
                <div class="p-5">
                    <a href="<?php the_permalink(); ?>">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php the_title(); ?></h5>
                    </a>
                    <!--  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo wp_trim_words(get_the_excerpt(), 50, '...'); ?></p> -->

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
