<?php
$category_selection = $module['category_selection'];
$category_relation = $module['relation'];
$byDefault_relation = $module['by_default_relation'];

$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
if (isset($_POST['posts_per_page'])) {
    $posts_per_page = $_POST['posts_per_page'];
  } else {
    $posts_per_page = 5;
  }

?>
<section class="" id="display-category">
    <?php if ($category_selection == 'By default') {
        $cat_name = $byDefault_relation->name;

        $args = array(
            'post_type' => 'questions',
            'tax_query' => array(
              array(
                'taxonomy' => 'field',
                'field' => 'slug',
                'terms' => $cat_name
              )
            ),
            'posts_per_page' => $posts_per_page,
            'paged' => $currentPage
          );
        $lastBlog = new WP_Query($args); ?>
    <div class=" container w-full mx-auto md:w-auto px-8 md:px-0 m-auto max-lg:mx-0">
        <div class="w-full m-auto max-lg:mx-0">
            <!-- Add new question -->
            <div class="flex justify-between  flex-wrap">
                <h4 class="text-black text-left text-3xl font-bold mt-5 dark:text-white">All Questions</h4>
                <button type="button"
                    class="px-4 py-3 bg-[#4767C9] text-white font-display text-xs uppercase rounded hover:bg-[#4767D9] mt-5"
                    onclick="<?php if (!is_user_logged_in()) { echo 'window.location.href = \'' . home_url('/login') . '\';'; } else { echo 'toggleModal(\'modal-id\');'; } ?>">
                    Ask a question
                </button>

                <?php include get_template_directory() . '/modals/add-question-modal.php' ?>

                <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

                <?php if ($lastBlog->have_posts()) : ?>

                <div class="w-full m-auto py-8">
                    <div class="flex justify-between items-start md:items-center flex-col md:flex-row dark:text-white ">
                    <?php
                        $total_questions = $lastBlog->found_posts;
                        // Check if the posts are filtered by "solved" or "not solved"
                        $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
                        if ($filter == 'solved') {
                            $args['meta_query'] = array(
                                array(
                                    'key' => 'close',
                                    'value' => 1,
                                ),
                            );
                        } elseif ($filter == 'notsolved') {
                            $args['meta_query'] = array(
                                array(
                                    'key' => 'close',
                                    'compare' => 'NOT EXISTS',
                                ),
                            );
                        }

                        // Get the number of posts after the filter is applied
                        $filtered_query = new WP_Query($args);
                        $filtered_posts_count = $filtered_query->found_posts;
                      
                        echo $filtered_posts_count . ' questions';

                        include get_template_directory() . '/filters.php';
                     ?>


                    </div>
                    <?php while ($lastBlog->have_posts()) : $lastBlog->the_post(); ?>
                    <div class="border-y-[1px] border-x-[0.5px] bg-white border-gray-200 border-collapse p-4 mb-3 dark:bg-[#181f2a] dark:border-gray-600">
                        <?php 
                // Get Fields
                     include get_template_directory() . '/partials/content-get-field.php'; 
                ?>
                        <div class="flex max-md:justify-between relative flex-col md:flex-row" id="post-header">
                            <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]"
                                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                alt="user profile">
                            <p class="text-gray-500 leading-8 mr-2 dark:text-white">Asked on: <?php echo get_the_date(); ?> | </p>
                            <a class="text-gray-500 leading-8 mr-2 dark:text-white">In: <?php echo $cat_name ?> | </a>
                            <div class="flex">
                                <a class="text-gray-500 leading-8 mr-2 dark:text-white">Posted by:
                                    <?php echo '<a class="text-gray-500 leading-8 mr-2 hover:text-sky-600 max-md:text-sky-600 dark:text-white" href="' . $author_url . '">' . get_the_author() . '</a>'; ?></a>
                            </div>

                    <!-- Mark as solved and Solved Section -->
                    <div class="absolute top-0 right-0">
                        <?php get_template_part('partials/content','solved'); ?>
                    </div>
                </div>
                <?php include get_template_directory() . '/partials/content-questions.php' ?>
                
                <div class="flex justify-between  min-h-[40px] items-center w-full mx-auto">
                    <!--Content view with ID  -->
                    <div class="flex dark:text-white">
                        <?php get_template_part('partials/content','viewID'); ?>
                    </div>

                            <a id="answer-button" class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded"
                                href="<?php echo the_permalink(); ?>">Answer</a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
            <!-- Pagination-->

            <?php
               include get_template_directory() . '/partials/content-pagination.php'
            ?>

            <?php wp_reset_postdata();
    } else {
        $posts_per_page = 5;
        $offset = ($currentPage - 1) * $posts_per_page;
        $category_relation_pagination = array_slice($category_relation, $offset, $posts_per_page);
        if (have_posts()) {
        ?>
            <div class=" container w-full mx-auto md:w-auto px-8">
                <div class="w-full m-auto py-8">
                    <?php foreach ($category_relation_pagination as $value) : ?>
                    <div class="border-y-[1px] border-x-[0.5px] bg-white border-gray-200 border-collapse p-4 mb-3">
                        <?php
                            gt_set_post_views($value->ID);
                            $title_variable = get_field('question_title', $value->ID);
                            $description_variable = get_field('question_description', $value->ID);
                            $date_variable = get_field('question_date', $value->ID);
                            $getslugid = wp_get_post_terms($value->ID, 'field');
                            $getslug = $getslugid[0]->name;
                            $close = get_field('close');
                            $post_ID = get_the_ID();
                            $author_id = $value->post_author;
                            $author_url = get_author_posts_url($author_id);
                            $author_name = get_the_author_meta('display_name', $author_id);
                            ?>
                        <div id="post-header" class="flex max-md:flex-wrap relative">
                            <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]"
                                src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                alt="user profile">
                            <p class="text-gray-500 leading-8 mr-2">Asked on: <?php echo $date_variable; ?> | </p>
                            <a class="text-gray-500 leading-8 mr-2">In: <?php echo $getslug ?> |</a>
                            <a class="text-gray-500 leading-8 mr-2">Posted by:
                                <?php echo '<a class="text-gray-500 leading-8 mr-2 hover:text-sky-600 max-md:text-sky-600" href="' . $author_url . '">' . $author_name . '</a>'; ?></a>

                            <!-- Mark as solved and Solved Section -->

                            <div class="absolute top-0 right-0">
                                <?php get_template_part('partials/content','solved'); ?>

                    </div>
                </div>
                <?php include get_template_directory() . '/partials/content-questions.php' ?>
                
                <div class="flex justify-between min-h-[40px] items-center w-full mx-auto">
                    <div class="flex">
                        <!--Content view with ID  -->
                        <?php get_template_part('partials/content','viewID'); ?>
                    </div>
                    <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded"
                        href="<?php echo the_permalink($value->ID); ?>">Answer</a>
                </div>
            </div>
            <?php endforeach; ?>

                </div>
            </div>

            <?php };
    }; ?>
</section>