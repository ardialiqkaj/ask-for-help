<!-- Mark as solved and Solved section -->
<?php
         $close = get_field('close');
         global $user_ID;
         $post_id = get_the_ID();
         $author_id = get_post_field('post_author', $post_id);

        if (!$close) : ?>
<?php if ($author_id == $user_ID) : ?>
<form action="" method="POST">

    <button type="submit" id=<?php echo $post_id; ?> name=<?php echo $post_id; ?>
        class="bg-transparent rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100  hover:dark:bg-[#202a3c] focus:outline-none ">
        <p class=" text-slate-500 text-lg dark:text-white">Mark as solved</p>
    </button>
</form>
<?php else : ?>

<?php endif; ?>

<?php
        if (isset($_POST[$post_id])) {
           update_field('close', 1, $post_id);
           echo "<script type='text/javascript'>
           location.reload();
           </script>";
               return;}
    ?>

<?php else : ?>
<div class="w-16  overflow-hidden inline-block relative">
    <div class=" h-8  bg-green-600 -rotate-45 ">
    </div>
    <div>
        <p class=" text-black font-bold text-lg absolute top-0  dark:text-white">Solved </p>
    </div>
</div>
<?php endif; ?>