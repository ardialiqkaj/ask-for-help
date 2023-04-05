<a class="btn-delete min-w-[80px] h-[35px] bg-red-500 text-white flex justify-center items-center mr-3 rounded" href="#"
    onClick="showModal()" data-item-id="<?php echo $post_ID; ?>">Delete</a>


<div id="deleteModal-<?php echo $post_ID; ?>"
    class="hidden fixed top-0 left-0 w-full h-full flex items-center justify-center">
    <div class="bg-white dark:bg-[#202a3c] p-6 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto"
            viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                clip-rule="evenodd" />
        </svg>
        <p class="text-lg mb-4 dark:text-white">Are you sure you want to delete this question?
        </p>
        <div class="p-3  mt-2 text-center space-x-4 md:block">
            <button class="bg-gray-500 text-white p-2 rounded"
                onClick="hideModal(<?php echo $post_ID; ?>)">Cancel</button>
            <a class="bg-red-500 text-white p-2 rounded"
                href="<?php echo get_delete_post_link(get_the_ID()); ?>">Delete</a>
        </div>
    </div>
</div>