<?php

        //get fields
        $title_variable = get_field('question_title');
        $description_variable = get_field('question_description');
        $date_variable = get_field('question_date');
        $terms = get_the_terms(get_the_ID(), 'field');
        $post_ID = get_the_ID();
        gt_set_post_views($post_ID);
        if ($terms && !is_wp_error($terms)) :
            $cat_name = $terms[0]->name;
        else :
            $cat_name = 'N/A';
        endif;

?>