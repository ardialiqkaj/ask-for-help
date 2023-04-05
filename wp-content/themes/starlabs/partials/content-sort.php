<!-- Sort comments -->

<div class="flex justify-end mb-7">
    <button class="text-black bg-white dark:bg-[#181f2a]  dark:text-white font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
        type="button" data-dropdown-toggle="dropdown">Sort by <svg class="w-4 h-4 ml-2" fill="none"
            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
            </path>
        </svg></button>
    <div class="hidden bg-white  dark:bg-[#181f2a] text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
        <ul class="py-1" aria-labelledby="dropdown">
            <li>
                <a href="?sort=newest" class="text-sm hover:bg-gray-100 dark:text-white  dark:hover:bg-gray-500 text-gray-700 block px-4 py-2">Newest to
                    Oldest</a>
            </li>
            <li>
                <a href="?sort=oldest" class="text-sm hover:bg-gray-100 dark:text-white  dark:hover:bg-gray-500 text-gray-700 block px-4 py-2">Oldest to
                    Newest</a>
            </li>
            <li>
                <a href="?sort=liked" class="text-sm hover:bg-gray-100 dark:text-white  dark:hover:bg-gray-500 text-gray-700 block px-4 py-2">Most
                    liked</a>
            </li>
        </ul>
    </div>
</div>
<!-- Sort comments function -->
<?php

if (isset($_GET['sort'])) {
    if ($_GET['sort'] == "newest") {
        //Sort comments by date created, newest to oldest
        $comments = get_comments(array(
            'post_id' => get_the_ID(),
            'status' => 'approve',
            'order' => 'ASC'
        ));
    } elseif ($_GET['sort'] == "oldest") {
        //Sort comments by date created, oldest to newest
        $comments = get_comments(array(
            'post_id' => get_the_ID(),
            'status' => 'approve',
            'order' => 'DESC'
        ));
    } elseif ($_GET['sort'] == "liked") {
        //Get all comments
        $comments = get_comments(array(
            'post_id' => get_the_ID(),
            'status' => 'approve'
        ));
    
        //Sort the comments based on the like count
        usort($comments, function($a, $b) {
            $a_likes = get_comment_meta($a->comment_ID, 'like_count', true);
            $b_likes = get_comment_meta($b->comment_ID, 'like_count', true);
    
            if ($a_likes == $b_likes) {
                return 0;
            }
    
            return ($a_likes < $b_likes) ? -1 : 1;
        });
    
        //Get the index of the first comment without a like count
        $index = 0;
        for ($i = 0; $i < count($comments); $i++) {
            if (!get_comment_meta($comments[$i]->comment_ID, 'like_count', true)) {
                $index = $i;
                break;
            }
        }
    
        //Move all comments without a like count to the end of the array
        $unliked_comments = array_splice($comments, $index);
        $comments = array_merge($comments, $unliked_comments);
    
    }
} else {
    $comments = get_comments(array(
        'post_id' => get_the_ID(),
        'status' => 'approve'
    ));
}
?>

<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>