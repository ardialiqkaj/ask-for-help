<?php
/* 
Template Name: My Questions
*/
get_header();

?>

<div class=" container w-full mx-auto  px-8 md:mx-auto flex flex-col md:flex-row pt-16 ">
    <div class="w-full flex">
        <div class="w-full ">
            <section class="">
                <div class="w-full m-auto">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    if (isset($_POST['posts_per_page'])) {
                        $posts_per_page = $_POST['posts_per_page'];
                    } else {
                        $posts_per_page = 5;
                    }
                    $args = array(
                        'post_type' => 'questions',
                        'author' => get_current_user_id(),
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5,
                        'paged' => $paged,
                    );
                    $lastBlog = new WP_Query($args); ?>
                    <div class="w-full m-auto">
                        <!-- Add new question -->
                        <div class="flex justify-between  flex-wrap">
                            <h4 class="text-black text-left text-3xl font-bold mt-5 dark:text-white ">My Questions</h4>
                            <button type="button" class="px-4 py-3 bg-[#4767C9]  text-white font-display text-xs uppercase rounded hover:bg-[#4767D9] mt-5 " onclick="toggleModal('modal-id')">
                                Add new question
                            </button>
                            <?php include get_template_directory() . '/modals/add-question-modal.php' ?>

                            <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                            <?php if ($lastBlog->have_posts()) : ?>
                                <div class="w-full m-auto py-4">
                                    <!-- Filted solved and not solved -->
                                    <?php require(get_template_directory() . '/filter-solved-notsolved.php'); ?>

                                    <?php while ($lastBlog->have_posts()) : $lastBlog->the_post();
                                        // Get field variables
                                        require(get_template_directory() . '/partials/content-get-field.php');

                                    ?>
                                        <div id="single-my-question" class="border-y-[1px] border-x-[0.5px]  bg-white border-gray-200 border-collapse p-4 mb-3 dark:bg-[#181f2a] dark:border-gray-600">
                                            <div class="flex max-md:justify-between relative flex-col md:flex-row ">
                                                <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="user profile">
                                                <p class="text-gray-500 leading-8 mr-2 dark:text-white">Asked on: <?php echo get_the_date(); ?>
                                                </p>
                                                <a class="text-gray-500 leading-8 dark:text-white">In: <?php echo $cat_name ?></a>
                                                <div class="absolute top-0 right-0">
                                                    <?php get_template_part('partials/content', 'solved'); ?>
                                                </div>
                                            </div>
                                            <?php include get_template_directory() . '/partials/content-questions.php' ?>
                                            <div class="flex">
                                                <div class="flex flex-row text-xs dark:text-white  ">
                                                    <!--Content view with ID  -->
                                                    <?php get_template_part('partials/content', 'viewID'); ?>
                                                </div>

                                                <div class="flex justify-end  min-h-[40px] items-center w-full mx-auto ">
                                                    <a class="min-w-[80px] h-[35px] bg-indigo-500 text-white flex justify-center items-center mr-3 rounded" href="<?php echo the_permalink(); ?>">View</a>
                                                    <!-- Delete Modal -->
                                                    <?php include get_template_directory() . '/modals/delete-modal.php' ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Pagination -->
                        <?php
                        require(get_template_directory() . '/partials/content-pagination.php');
                        ?>

                        <?php wp_reset_postdata(); ?>
            </section>
        </div>
    </div>
    <div class="w-full md:w-[30%]">
        <?php get_sidebar(); ?>
    </div>
</div>
</div>

<?php get_footer(); ?>