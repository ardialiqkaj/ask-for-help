<?php 
	
/*
	Template Name: Right Sidebar Page
*/
	
get_header(); ?>

<div class="w-full">

    <div class="p-4 container w-full  mx-auto flex flex-col md:flex-row ">
        <div class="w-full pt-16">

            <?php 
              $field = get_field('modules');
           if (is_array($field)) {
               foreach ($field as $key => $value) {
                $module = $value[$value['acf_fc_layout']];
            include (get_template_directory().'/modules/'.$value['acf_fc_layout'].'.php');
        }
   }
      ?>
        </div>

        <div class="w-full md:w-[30%] pt-16">
            <?php get_sidebar();?>
        </div>
    </div>
</div>


<?php get_footer(); ?>