<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <?php wp_head(); ?>
</head>


<body class="bg-gray-100 dark:bg-[#1c2431] font-display ">


    <nav class="bg-white dark:bg-black shadow-lg w-full fixed z-50 h-16 ">
        <div class=" md:container flex flex-wrap items-center justify-between mx-auto">
            <!-- Logo  -->
            <a href="<?php echo home_url(); ?>" class="w-40 flex items-center pl-4">
                <?php
                $header_logo = get_field('header_logo', 'option');

                if (!empty($header_logo)) : ?>
                    <img class="object-contain h-16 " src="<?php echo esc_url($header_logo['url']); ?>" alt="<?php echo esc_attr($header_logo['alt']); ?>" />
                <?php endif; ?>
            </a>

            <!-- Burger Menu -->
            <button type="button" class="mobile-menu-button inline-flex items-center mr-4 rounded-lg md:hidden  focus:outline-none focus:ring-2 focus:ring-gray-200  " aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-8 h-8 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" x-show="!showMenu">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>

            <div class="flex">
                <div class="dark-mode-button w-[56px] h-8 bg-gray-100 rounded-3xl shadow-[inset_0_3px_6px_0_rgb(0,0,0,0.2)] my-auto">
                    <button name="dark-mode-button" id="dark-mode" class="w-6 h-6 bg-[#4767c9] rounded-3xl mx-1 my-1 duration-200 text-[#4767c9] dark:translate-x-full"></button>
                </div>
                <!-- Navbar  -->
                <div class="md:flex flex-row-reverse items-center hidden mobile-menu w-full text-black dark:text-white md:w-auto" id="navbar-text">

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class' => 'flex flex-col  rounded-lg md:flex-row md:space-x-4 md:text-sm md:font-medium md:border-0 md:bg-transparent',
                            'container' => false,
                            'walker' => new Walker_Nav_Primary()
                        )
                    );
                    ?>

                </div>
            </div>
        </div>
        <!-- search bar -->
        <div class="search-box  rounded-sm absolute hidden  right-5 p-2  mx-auto text-gray-600 ">
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <input type="search" class="search-field border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" placeholder="<?php echo esc_attr_x('Search', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
                <button type="submit" class="search-submit text-white cursor-pointer absolute right-0 top-0 mt-5 mr-4" value="<?php echo esc_attr_x('Search', 'submit button') ?>">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </form>
        </div>
    </nav>