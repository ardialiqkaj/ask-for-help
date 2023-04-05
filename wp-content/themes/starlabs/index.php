<?php get_header();?>
<div class="pt-16">

    <?php 
   $field = get_field('modules');
   if (is_array($field)) {
        foreach ($field as $key => $value) {
            $module = $value[$value['acf_fc_layout']];
            include (get_template_directory().'/modules/'.$value['acf_fc_layout'].'.php');
        }
   }?>
</div>
<?php 
get_footer();
?>