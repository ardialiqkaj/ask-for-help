<?php
get_header();
$question_title = get_field('question_title');
$question_description = get_field('question_description');
$post_id = get_the_ID();
$author_id = get_post_field('post_author', $post_id);
$author_name  =  get_the_author_meta('display_name', $author_id);
$author_url = get_author_posts_url($author_id);

?>

<div class=" container w-full mx-auto md:w-auto px-8 flex flex-col md:flex-row  pt-16  ">
    <div class=" mx-auto md:pt-5 pb-0 shadow-zinc-400   md:m-5 w-full mb-3 ">
        <div class="flex justify-between">

            <div class="p-5 text-left ">
                <?php if ($question_title) : ?>
                <h3 id="single-question-title" class="text-4xl font-bold dark:text-white"><?php echo $question_title ?></h3>
                <?php endif; ?>
            </div>

            <!-- Mark as solved and solved section -->
            <div class="p-5">
                <?php  get_template_part('partials/content','solved'); ?>
            </div>

        </div>
        <div class="p-5 text-slate-500  dark:text-white">
            <?php if ($question_description) : ?>
            <p><?php echo $question_description ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-0 text-slate-500 px-5 pt-2 text-xs flex justify-between">

            <!-- View section -->
            <?php get_template_part('partials/content','view'); ?>

            <div class="flex">
                <?php 
                    ?>
                <p class="mr-5 dark:text-white"><?php echo get_the_date() ?></p>
                <a class="hover:text-sky-600 max-md:text-sky-600 dark:text-white" href="<?php echo $author_url; ?>">by:
                    <?php echo $author_name; ?>
                </a>
            </div>
        </div>
        <div class="h-[2px] my-10 bg-[#4767C9]"></div>

        <!-- Comment Section -->
        <?php   
        include get_template_directory() . '/partials/content-comment.php'; ?>
        <!-- Related Questions -->
       <?php include get_template_directory() . '/partials/related-questions.php'; ?>


    </div>

    <div class="w-full md:w-[30%] pt-16">
        <?php get_sidebar(); ?>
    </div>
</div>



<?php get_footer(); ?>