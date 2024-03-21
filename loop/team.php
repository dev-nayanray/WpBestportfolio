<div class="relative overflow-hidden bg-white">
  <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
    <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
      <div class="sm:max-w-lg">
       
    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Our Team</h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <?php
            $users = get_users(array('orderby' => 'registered', 'order' => 'DESC', 'number' => 5)); // Retrieve latest 5 users
            foreach ($users as $user) :
                $user_info = get_userdata($user->ID);
                ?>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <?php echo get_avatar($user->ID, 64, '', $user_info->display_name, array('class' => 'w-8 h-8 rounded-full')); ?>
                        </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                <?php echo $user_info->display_name; ?>
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                <?php echo $user_info->user_email; ?>
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <?php echo '$' . rand(50, 5000); ?> <!-- Random amount for demonstration -->
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
   </div>
</div>

      </div>
      <div>
        <div class="mt-10">
          <!-- Decorative image grid -->
          <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
            <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
              <div class="flex items-center space-x-6 lg:space-x-8">
                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                  <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                </div>
                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                </div>
                <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="h-64 w-44 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg" alt="" class="h-full w-full object-cover object-center">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <a href="http://127.0.0.1/Test/team-members/" class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-center font-medium text-white hover:bg-indigo-700">Meet Our Team</a>
        </div>
      </div>
    </div>
  </div>
</div>
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