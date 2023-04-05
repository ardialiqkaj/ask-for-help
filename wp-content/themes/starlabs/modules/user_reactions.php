<?php
$users = $module['users'];
$section_title = $module['section_title'];
$section_button = $module['section_button'];

$default_pic = "https://rugby.vlaanderen/wp-content/uploads/2018/03/Anonymous-Profile-pic.jpg";
?>
<section id="user-reactions" class="dark:bg-[#181f2a]">
    <?php if ($section_title) : ?>
        <h2 class="text-center text-5xl font-bold mb-8 mt-12 dark:text-white"><?php echo $section_title; ?></h2>
    <?php else : ?>
        <h2 class="text-center text-5xl font-bold my-8">Read what our customers say</h2>
    <?php endif; ?>
    <div class="w-[1140px] m-auto mt-16 max-lg:w-11/12">
        <div class="w-[1008px] m-auto max-lg:w-11/12">
            <div class="grid grid-cols-2 gap-8 max-lg:grid-cols-1">
                <?php foreach ($users as $value) : ?>
                    <div class="bg-white dark:bg-[#222c3b] w-full px-16 pt-10 pb-10 rounded-3xl max-lg:p-4" id="user-card">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="fill-[#4767c9] dark:fill-[#4767c9] w-10 h-10 mb-4">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M0 216C0 149.7 53.7 96 120 96h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V320 288 216zm256 0c0-66.3 53.7-120 120-120h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H320c-35.3 0-64-28.7-64-64V320 288 216z" />
                        </svg>
                        <p class="text-gray-400 pb-6  dark:text-slate-300"><?php echo $value['user_comment']; ?></p>
                        <div class="flex max-lg:flex-col">
                            <?php if ($value['profile_image']) : ?>
                                <img src="<?php echo $value['profile_image']['url']; ?>" alt="profile" class="rounded-full w-[50px] h-[50px] object-cover">
                            <?php else : ?>
                                <img src="<?php echo $default_pic ?>" alt="profile" class="rounded-full w-[50px] h-[50px] object-cover">
                            <?php endif; ?>
                            <div class="pl-6 max-lg:pl-0">
                                <p class="font-bold dark:text-white" id="user-name"><?php echo $value['name']; ?></p>
                                <p class="text-gray-400  dark:text-slate-300 "><?php echo $value['job_role']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="flex justify-center my-16">
            <div class="flex justify-self-center justify-center w-72 h-16 bg-[#4767c9] dark:bg-[#5bbde7] dark:hover:bg-[#7fcef0] rounded-full items-center">
                <?php foreach ($section_button as $btvalue) : ?>
                    <a href="<?php echo $btvalue['button_link']; ?>" class="text-white text-2xl font-bold "><?php echo $btvalue['button_name']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>