<?php
/* 
Template Name: My Answers
*/
get_header();
?>
<div class=" container w-full mx-auto md:w-auto px-8  flex flex-col md:flex-row pt-16 ">
    <div class="w-full flex">
        <div class="w-full ">
            <section class="" id="my-answers">
                <div class="w-full m-auto">
                    <div class="text-center my-8">
                        <h1 class="text-3xl font-bold dark:text-white">My Answers</h1>
                    </div>

                    <?php
if(isset($_POST['update'])) {
    $new_content = $_POST['new_content'];
    $comment_id = $_POST['comment_id'];
    $args = array(
      'comment_ID' => $comment_id,
      'comment_content' => $new_content
    );
    wp_update_comment($args);
  }
  
  if(isset($_POST['cancel'])) {
    unset($_POST['comment_id']);
  }
  if(isset($_POST['delete'])) {
    $comment_id = $_POST['comment_id'];
    wp_delete_comment($comment_id);
  }
  
  $args = array(
    'user_id' => get_current_user_id(),
    'status' => 'approve' 
  );
  $comments = get_comments($args);
  
  foreach ($comments as $comment) {
    echo '<div class="border-y-[1px] border-x-[0.5px] bg-white dark:bg-[#181f2a] border-gray-200 border-collapse p-4 mb-3 dark:text-white dark:border-gray-600 ">';
    if(isset($_POST['edit']) && $_POST['comment_id'] == $comment->comment_ID) {
      echo '
      <form action="" method="post" class="bg-white  dark:bg-[#181f2a] shadow-md rounded px-8 pt-6 pb-8 mb-4 ">
      <label class="block text-gray-700 text-sm font-bold mb-2 dark:text-white" for="username">
      My answer:
      </label>
      <textarea name="new_content" row="4"  class="h-28 shadow appearance-none border rounded w-full py-2 px-3 dark:text-gray-200 dark:bg-[#181f2a] dark:border-gray-600 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " >'.$comment->comment_content.'</textarea>
      <input type="hidden" name="comment_id" value="'.$comment->comment_ID.'">
      <div class="flex justify-end min-h-[40px] items-center w-full mx-auto ">
      <input type="submit" name="update" value="Update" class="cursor-pointer min-w-[80px] h-[35px] bg-blue-500 text-white flex justify-center items-center mr-3 rounded">
      <input type="submit" name="cancel" value="Cancel" class=" cursor-pointer min-w-[80px] h-[35px] bg-red-500 text-white flex justify-center items-center mr-3 rounded">
      </div>
      </form>';
    } else {
      echo '<h2 class="text-xl font-medium mb-2 dark:text-white"><a href="'.get_permalink($comment->comment_post_ID).'">'.get_the_title($comment->comment_post_ID).'</a></h2>';
      echo $comment->comment_content;
      echo '<div class="flex justify-end min-h-[40px] items-center w-full mx-auto ">
              <form action="" method="post">
                <input type="hidden" name="comment_id" value="'.$comment->comment_ID.'">
                <input type="submit" name="edit" value="Edit" class="cursor-pointer min-w-[80px] h-[35px] bg-blue-500 text-white flex justify-center items-center mr-3 rounded">
              </form>
              <a href="'.get_permalink($comment->comment_post_ID).'" class="min-w-[80px] h-[35px] bg-indigo-400 text-white flex justify-center items-center mr-3 rounded">View</a>
             
              <a class="btn-delete min-w-[80px] h-[35px] bg-red-500 text-white flex justify-center items-center mr-3 rounded"
              href="#" data-item-id="'.$comment->comment_ID.'">Delete</a>
              <div id="deleteModal-'.$comment->comment_ID.'" class="hidden fixed top-0 left-0 w-full h-full flex items-center drop-shadow-2xl justify-center">
                <div class="bg-white dark:bg-[#202a3c] p-6 rounded">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                  <p class="text-lg mb-4 dark:text-white">Are you sure you want to delete this comment?
                  </p>
                  <div class="p-3  mt-2 text-center space-x-4 md:block">
                  <form action="" method="post">
                  <input type="hidden" name="comment_id" value="'.$comment->comment_ID.'">
                  <input type="submit" name="delete" value="Delete" class=" bg-red-500 text-white p-2 rounded cursor-pointer">
                  <button type="button" class= " cursor-pointer bg-gray-500 text-white p-2 rounded" onClick="hideModal('.$comment->comment_ID.')">Cancel</button>
                  </form>
                  </div>
                </div>
              </div>


            </div>
          </div>';
    }
  }
  ?>




                </div>

            </section>
        </div>
    </div>


    <div class="w-full md:w-[30%] pt-16">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>