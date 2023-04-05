<?php

get_header();

include get_template_directory() . '/partials/content-get-field.php'; 
?>

<div class="w-full flex flex-col  justify-center pt-16">
    <div class="flex justify-center">

        <?php 
        if (is_search()) {
            echo
            "<h1 class='text-indigo-500 font-semibold text-2xl p-10'>
            You searched for: "  . 
            get_search_query() . 
            "</h1>";
        }
        ?>
    </div>
    <?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post();?>
    <div class="mx-auto  md:w-4/6 w-10/12  py-5">

        <div class="border-y-[1px] border-x-[0.5px] bg-white dark:bg-[#181f2a] border-gray-200  dark:border-gray-600  border-collapse  p-4 ">
            <div class="flex flex-wrap ">
                <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]"
                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                    alt="user profile">
                <p class="text-gray-500 leading-8 mr-2 dark:text-white">Asked on:
                </p>
                <span class="text-gray-500 leading-8 mr-2 dark:text-white "> <?php echo get_the_date(); ?> |</span>
                <a class="text-gray-500 leading-8 dark:text-white">In: <?php echo $cat_name ?></a>


            </div>


            <div class="text-gray-500 w-full m-auto my-2 dark:text-white">
                <h2 class="mb-2 text-gray-800 font-bold dark:text-white"><?php echo $title_variable; ?></h2>
                <p class="">
                    <?php $desc_string = strval($description_variable);
                                                    echo substr($desc_string, 0, 200); ?><b> . . .</b>
                </p>

            </div>
            <div class="flex">
                <div class="flex flex-row text-xs  ">
                    <!--Content view with ID  -->
                    <?php get_template_part('partials/content','viewID'); ?>

                </div>

                <div class="flex justify-end  min-h-[40px] items-center w-full mx-auto">
                    <a class="min-w-[80px] h-[35px] bg-indigo-500 text-white flex justify-center items-center mr-3 rounded"
                        href="<?php echo the_permalink(); ?>">View</a>
                </div>
            </div>
        </div>

    </div>
    <?php endwhile; ?>



    <!-- Pagination -->
    <div class="p-2 mb-2 flex flex-row justify-end items-end gap-1">
        <?php
         $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
         $pagination = paginate_links(array(
            'current' => $paged,
            'prev_text' => '<',
            'next_text' => '>',
        ));
        $pagination = str_replace('current', 'w-10 h-10 flex justify-center items-center p-2 rounded-full border border-gray-300 text-white font-bold bg-[#1e90ff]', $pagination);
        $pagination = str_replace('<a', '<a class="w-10 h-10 flex justify-center items-center p-2 rounded-full border border-gray-300 text-gray-400 font-bold hover:bg-gray-200"', $pagination);
        echo $pagination;
                        ?>
    </div>

    <?php else : ?>
    <div class="flex justify-center  my-48">

        <div class=" text-center m-auto bg-red-600 w-4/6 p-5 rounded-md">

            <p class="text-white font-medium text-lg"> Sorry, question not found! </p>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php

get_footer();
?>