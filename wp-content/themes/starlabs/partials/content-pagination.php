<div class="p-2 mb-2 flex flex-row justify-between gap-1 dark:text-white">
    <div class="flex flex-row justify-end items-end">
        <?php
            $total_pages = $lastBlog->max_num_pages;

            if ($total_pages > 1) {

                $current_page = max(1, get_query_var('paged'));

                  if ( strpos( $_SERVER['REQUEST_URI'], '?filter' ) !== false ) {

                    $pagination = paginate_links( array(
                        'format'  => '?paged=%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text' => '<',
                        'next_text' => '>',
                    ) );
             
             
                  }
                    else{

                      $pagination = paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                    'format' => '/page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text' => '<',
                    'next_text' => '>',
                ));
          
              }
                
                $pagination = str_replace('current', 'w-10 h-10 mr-1 flex justify-center items-center p-2 rounded-full border border-gray-300 text-white font-bold bg-[#1e90ff]', $pagination);

                $pagination = str_replace('<a', '<a class="w-10 h-10 mr-1 flex justify-center items-center p-2 rounded-full border border-gray-300 text-gray-400 font-bold hover:bg-gray-200 dark:hover:bg-[#243042]"', $pagination);
                echo $pagination;

            }
            ?>

    </div>
    <hr>
    <form action="" method="post">
        <div class="flex flex-row justify-end ">
            <input type="submit"
                class="w-10 h-10 flex justify-center items-center mr-2 p-2 rounded-md  border border-gray-300 text-gray-400 font-bold hover:bg-gray-200 dark:hover:bg-[#243042]"
                name="posts_per_page" value="5"
                style="cursor:pointer;  <?php if ($posts_per_page == 5) echo 'background-color: #1e90ff; color: white;'; ?>"
                title="Show 5 items per page">
            <input type="submit"
                class="w-10 h-10 flex justify-center items-center mr-2 p-2 rounded-md  border border-gray-300 text-gray-400 font-bold hover:bg-gray-200 dark:hover:bg-[#243042]"
                name="posts_per_page" value="10"
                style="cursor:pointer; <?php if ($posts_per_page == 10) echo 'background-color: #1e90ff; color: white;'; ?>"
                title="Show 10 items per page">
            <input type="submit"
                class="w-10 h-10 flex justify-center items-center mr-2 p-2 rounded-md  border border-gray-300 text-gray-400 font-bold hover:bg-gray-200 dark:hover:bg-[#243042]"
                name="posts_per_page" value="15"
                style="cursor:pointer; <?php if ($posts_per_page == 15) echo 'background-color: #1e90ff; color: white;'; ?>"
                title="Show 15 items per page">
            <p class="text-xs mt-2.5 dark:text-white">per page</p>
        </div>
    </form>





</div>