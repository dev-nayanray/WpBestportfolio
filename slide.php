<div class="relative isolate px-6 pt-14 lg:px-8 main-sec">

    <!-- Background Slider -->
    

    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-35 relative sec-main">
      <div id="background-slider" class="absolute inset-x-0 -top-80 mt-0 -z-1000 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true" style="height: 350px; border: 5px solid whitesmoke; ">
        <?php
        // The Query
        $args = array(
            'post_type'      => 'portfolio', // Change to your custom post type name
            'posts_per_page' => -1, // Display all posts
        );
        $query = new WP_Query($args);

        // Check if there are posts
        if ($query->have_posts()) :
            // Loop through the posts
            while ($query->have_posts()) : $query->the_post();
                $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Get the featured image URL
        ?>
                <div class="absolute top-0 left-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-<?php echo ($query->current_post === 0) ? '100' : '0'; ?> bg-center bg-cover bg-no-repeat" style="background-image: url('<?php echo esc_url($featured_image_url); ?>');">
                    <div class="text-center" >
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                <?php bloginfo('name'); ?> -
            </h1>
            <p class="mt-6 text-lg leading-8 text-gray-600"> <?php bloginfo('description'); ?></p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </div>
        <!-- Your content here -->
        
        

    



             
        <?php
            endwhile;
            // Restore original Post Data
            wp_reset_postdata();
        else :
            // If no posts are found
            echo 'No portfolio items found.';
        endif;
        ?>
    
</div>
<script>
    // JavaScript code for background image slider
    var currentSlide = 0;
    var slides = document.querySelectorAll('#background-slider > div');

    function showSlide(slideIndex) {
        slides.forEach(function(slide) {
            slide.style.opacity = '0';
        });
        slides[slideIndex].style.opacity = '1';
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Automatically transition to the next slide every 5 seconds
    setInterval(nextSlide, 5000);
</script>


<div class="relative isolate px-6 pt-14 lg:px-8">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80 " aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem] " style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
</div>

</div>