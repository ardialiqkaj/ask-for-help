<!-- Comment Section -->
<?php wp_enqueue_script('comment-reply'); ?>
<section class="bg-gray-100 0 py-4 dark:bg-[#1c2431] " id="content-comment-section">
    <div class=" mx-auto px-4 ">
        <?php
                $args = array(
                    'comment_field' =>
                        '<div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 block  dark:bg-[#181f2a]   dark:border-gray-600" >
                        <textarea id="comment" rows="6" name="comment"
                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none  dark:bg-[#181f2a] dark:text-white "
                        placeholder="Help with an answer..." required></textarea>
                        </div>',
                        'cancel_reply_link'    => __('Cancel'),
                );
                ?>

        <div class="flex justify-between items-center mb-6  ">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white ">Answers </h2>
        </div>

        <?php comment_form($args); ?>

    </div>
    <ol class="commentlist ">


        <?php 
        // Sort comments
        $comments_number = get_comments_number();
        if ( $comments_number == 0 ) {
            echo '<p class="text-center font-bold  dark:text-white ">Be the first to give an answer</p>';
        } else {
            include get_template_directory() . '/partials/content-sort.php';
        }
  
              //Display the list of comments
                    wp_list_comments(array(
                        'per_page' => -1,
                        'reverse_top_level' => true
                    ), $comments);
        ?>
    </ol>
    <?php
                if (is_single() && comments_open() && get_option('thread_comments')) {   ?>
    <?php wp_enqueue_script('comment-reply'); ?>
    <?php   } ?>

</section>
