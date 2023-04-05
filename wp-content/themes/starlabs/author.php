<?php get_header(); ?>
<div class="container mx-auto w-full flex flex-col pt-16 md:flex-row">
    <section class="w-full" id="author-page">
        <?php
        
        $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if (isset($_POST['posts_per_page'])) {
            $posts_per_page = $_POST['posts_per_page'];
          } else {
            $posts_per_page = 5;
          }

        $author_name = get_query_var('author_name');
        $author = get_user_by('slug', $author_name);
        $args = array(
            'post_type' => 'questions',
            'author' => $author->ID,
            'posts_per_page' => $posts_per_page,
            'paged' => $currentPage
        ); ?>
        <h4 class="text-black dark:text-white text-left text-3xl font-bold mt-5">Posts from <?php echo get_the_author(); ?></h4>
        <?php $lastBlog = new WP_Query($args); ?>
        <div class="w-full m-auto max-lg:mx-0">
            <?php if ($lastBlog->have_posts()) : ?>
            <div class="w-full m-auto py-8">
                <?php while ($lastBlog->have_posts()) : $lastBlog->the_post(); ?>
                <div class="border-y-[1px] border-x-[0.5px] bg-white dark:bg-[#181f2a] border-gray-200 border-collapse p-4 mb-3" id="single-author-post">
                    <?php
                          // Get Fields
                          include get_template_directory() . '/partials/content-get-field.php'; 
                            ?>
                    <div class="flex max-md:flex-wrap">
                        <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]"
                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                            alt="user profile">
                        <p class="text-gray-500 dark:text-white leading-8 mr-2">Asked on: <?php echo get_the_date(); ?> | </p>
                        <a class="text-gray-500 dark:text-white leading-8 mr-2">In: <?php echo $cat_name ?> | </a>
                        <a class="text-gray-500 dark:text-white leading-8 mr-2">Posted by:
                            <?php echo '<a class="text-gray-500 dark:text-white leading-8 mr-2 hover:text-sky-600 max-md:text-sky-600" href="' . $author_url . '">' . get_the_author() . '</a>'; ?></a>
                    </div>
                    <div class="text-gray-500 dark:text-white w-full m-auto my-2">
                        <h2 class="mb-2 text-gray-800 dark:text-white font-bold"><?php echo $title_variable; ?></h2>
                        <p class="">
                        <p class=""><?php $desc_string = strval($description_variable);
                                            echo substr($desc_string, 0, 200); ?><b> . . .</b></p>
                        </p>
                    </div>
                    <div class="flex justify-between  min-h-[40px] items-center w-full mx-auto">
                        <div class="flex">
                            <!--Content view with ID  -->
                            <?php get_template_part('partials/content','viewID'); ?>
                        </div>
                        <a id="author-page-answer" class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded"
                            href="<?php echo the_permalink(); ?>">Answer</a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
        <!-- Pagination -->

        <?php include get_template_directory() . '/partials/content-pagination.php' ?>

        <?php wp_reset_postdata();
        ?>
    </section>
    <div class="w-full md:w-[30%]">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>