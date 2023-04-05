<div class="text-gray-500 w-full m-auto my-2 dark:text-white">
    <h2 class="mb-2 text-gray-800 font-bold dark:text-white "><?php echo $title_variable; ?></h2>
    <p class="">
    <p class=""><?php $desc_string = strval($description_variable);
                            echo substr($desc_string, 0, 200); ?><b> . . .</b></p>
    </p>
</div>