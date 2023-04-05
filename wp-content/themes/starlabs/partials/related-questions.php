<div class="my-8 max-w-fit">
     <?php
       $terms = get_the_terms( $post->ID, 'field' );

         if ( empty( $terms ) ) {
              $terms = array();
         }

         $term_list = wp_list_pluck( $terms, 'slug' );

        $related_args = array(
             'post_type' => 'questions',
             'posts_per_page' => 3,
             'post_status' => 'publish',
             'post__not_in' => array( $post->ID ),
             'orderby' => 'rand',
             'tax_query' => array(
             array(
                'taxonomy' => 'field',
                'field' => 'slug',
                'terms' => $term_list
             )
             )
         );

        $my_query = new WP_Query( $related_args );

         if ( $my_query->have_posts() ) {
         ?>
        <h4 class="text-base px-2 font-semibold tracking-widest uppercase text-gray-600 py-4 dark:text-white">Related Questions:</h4>
        <ul class="space-y-2">
          <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <li class="mx-5 text-black py-4 border-b border-slate-300 last:border-none dark:text-gray-300">
                <a href="<?php the_permalink(); ?>" class="hover:text-[#4767c9]"><?php the_title(); ?></a>
            </li>
          <?php endwhile; ?>
        </ul>
        <?php
        }

         wp_reset_query();
     ?>
</div>