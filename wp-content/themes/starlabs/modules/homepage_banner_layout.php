<?php
$left_text = $module['left_text'];
$right_text = $module['right_text'];
$paragraph = $module['paragraph'];

global $wpdb;

if (isset($_POST['submit']) && wp_verify_nonce($_POST['my_form_nonce'], 'my_form_submit')) {

  if (current_user_can('publish_posts')) {


    $post_title = sanitize_text_field($_POST['question_title']);
    $post_category =  $_POST['question_category'];

    $post_data = array(
      'post_title' => $post_title,
      'post_status' => 'publish',
      'post_type' => 'questions',
      'tax_input' => array('field' => array($post_category)),
    );

    //insert the post into the database

    $post_id = wp_insert_post($post_data);

    //Update the ACF field
    update_field('question_title', sanitize_text_field($_POST['question_title']), $post_id);

    update_field('question_description', sanitize_text_field($_POST['question_description']), $post_id);
  }
};

if (isset($_POST['submit'])) {
  if (!is_user_logged_in()) {
    wp_redirect(site_url().'/login');
  } else {
    wp_redirect( get_permalink($post_id) );
  }
}

?>

<div class="min-h-screen max-w-full bg-right-bottom bg-cover bg-no-repeat text-white flex flex-wrap justify-center items-center bg-[url('https://images01.nicepage.com/a1389d7bc73adea1e1c1fb7e/14932e39a84a5afe9272d0c1/pexels-photo-301930copy.jpg')] dark:bg-[url('https://cdn.discordapp.com/attachments/1053338653415456768/1077212011051618314/homepage-darkmode.jpg')]">
  <div class="h-full mt-20 flex lg:flex-row gap-20 justify-start lg:basis-[69%] flex-col p-[30px]">
    <div class="max-w-full flex flex-row justify-start items-center lg:flex-col flex-1">
      <h1 class="text-5xl font-bold">
        <?php echo $left_text; ?>
      </h1>
    </div>
    <div class="max-h-full relative flex flex-col justify-center lg:basis-[41%]">
      <div class="w-full flex flex-col text-left relative">
        <h3 class="text-2xl font-bold p-0 text-left">
          <?php echo $right_text; ?></h3>
        <p class="mt-5 mr-auto mb-0 ml-0">
          <?php echo $paragraph; ?>
        </p>
      </div>
      <div class="h-auto block text-left bg-[#4767c9] dark:bg-[#243042] rounded-3xl mt-6 relative text-base">
        <form method="post" action="" id="myform" class="p-[40px] -ml-2 mt-0 w-[calc(100%+10px)] flex flex-wrap items-end">
          <?php wp_nonce_field('my_form_submit', 'my_form_nonce') ?>
          <div class="w-full text-start">
            <label for="my-textfield" class="text-base"></label>
            <input class="bg-[#ffffff] text-[#111111] rounded-2xl block w-full mb-3 py-2.5 px-3 border-none text-start" id="question_title" name="question_title" type="text" value="" placeholder="Title" required />
          </div>
          <div class="w-full">
            <label class="block text-white font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-select">
              Choose a Category
            </label>
            <select name="question_category" id="question_category " class="bg-[#ffffff] text-[#111111] rounded-2xl block w-full mb-3 py-2.5 px-3 border-none text-start" required>
              <?php
              $terms = get_terms(array(
                'taxonomy' => 'field',
                'hide_empty' => false,
              ));
              foreach ($terms as $term) {
                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
              }; ?>
            </select>
          </div>
          <div class="w-full">
            <label for="message" class="text-start text-base"></label>
            <textarea class="bg-[#ffffff] text-[#111111] rounded-2xl block w-full mb-3 py-2.5 px-3 border-none text-start" value="" rows="4" placeholder="Description" id="question_description" name="question_description" required></textarea>
          </div>
          <div class="w-full mb-0">
            <?php

            ?>
            <button class="bg-blue-100 text-[#111111] border-none hover:font-medium rounded-2xl cursor-pointer text-center px-4 py-2 min-w-[100px] hover:bg-white hover:text-[#4767c9]  dark:bg-[#5bbde7] dark:text-white dark:hover:bg-[#7fcef0]" type="submit" name="submit">
              Create
            </button>
            <?php ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>