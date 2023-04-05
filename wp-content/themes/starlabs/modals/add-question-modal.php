<!-- Add new question -->
<?php
    global $wpdb;
    
    if ( isset( $_POST['submit'] ) && wp_verify_nonce($_POST['my_form_nonce'],'my_form_submit') ){

        if(current_user_can('publish_posts')){


            $post_title =sanitize_text_field($_POST['question_title']);
            $post_category =  $_POST['question_category'];

            $post_data=array(
                'post_title'=>$post_title,
                'post_status'=>'publish',
                'post_type'=>'questions',
                'tax_input' => array( 'field' => array($post_category) ),
            );

            //insert the post into the database

            $post_id=wp_insert_post($post_data);
    
            //Update the ACF field
            update_field('question_title',sanitize_text_field($_POST['question_title']),$post_id);

            update_field('question_description',sanitize_text_field($_POST['question_description']),$post_id);

    }?>

<?php 
    wp_redirect( get_permalink($post_id) ); exit;}
?>
    <!-- Main modal -->

    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 top-10 z-50 outline-none focus:outline-none justify-center items-center shadow-sm"
        id="modal-id">
        <div class="relative w-auto my-6 mx-auto max-w-[420px]">
            <!--content-->
            <div class="border-0 rounded-lg -lg relative flex flex-col w-full bg-white dark:bg-[#202a3c] outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                    <h3 class="text-2xl font-semibold dark:text-white">
                        Add a new question
                    </h3>
                    <button
                        class="p-1 ml-auto bg-transparent border-0 text-black  float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                        onclick="toggleModal('modal-id')">
                        <span
                            class="bg-transparent text-black opacity-50 hover:opacity-100 h-6 w-6 text-2xl block outline-none focus:outline-none">
                            <span class="dashicons dashicons-no text-2xl"></span>
                        </span>
                    </button>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                    <form method="post" action="" id="myform">
                        <?php wp_nonce_field('my_form_submit', 'my_form_nonce') ?>
                        <div class="flex flex-wrap p-2 mt-0 rounded  bg-white dark:bg-[#202a3c]">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 w-full dark:text-white" for="my-textfield">
                                Question Title
                            </label>
                            <input
                                class=" py-2 form-input block w-full focus:bg-white border border-gray-300 rounded pl-1"
                                id="question_title" name="question_title" type="text" value="" placeholder="Title"
                                required>


                        </div>

                        <div class="flex flex-wrap p-2 mt-0 rounded  bg-white dark:bg-[#202a3c] ">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 w-full dark:text-white" for="my-textfield">
                                Question Description
                            </label>
                            <textarea
                                class="form-textarea block w-full focus:bg-white border border-gray-300 rounded pl-1"
                                value="" rows="8" placeholder="Description" id="question_description"
                                name="question_description" required></textarea>


                        </div>

                        <div class="flex flex-wrap p-2 mt-0 rounded  bg-white dark:bg-[#202a3c]">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4 dark:text-white" for="my-select">
                                Choose a Category
                            </label>
                            <select name="question_category" id="question_category "
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 p-3"
                                required>
                                <?php
                                     $terms = get_terms( array(
                                                    'taxonomy' => 'field',
                                                                  'hide_empty' => false,
                                                ));
                                            foreach( $terms as $term ) {
                                     echo '<option value="' . esc_attr( $term->term_id ) . '">' . esc_html( $term->name ) . '</option>';
                                        } ?>
                            </select>
                        </div>

                </div>


                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                    <button
                        class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" onclick="toggleModal('modal-id')">
                        Close
                    </button>
                    <button
                        class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded  hover:-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="submit" name="submit">
                        Create
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>


