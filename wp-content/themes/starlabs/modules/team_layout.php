<?php 
    $team = $module['team'];
    $title=$module['title'];

    $default_pic="https://rugby.vlaanderen/wp-content/uploads/2018/03/Anonymous-Profile-pic.jpg";
?>

<section class="bg-[#F2F2F2] flex flex-col items-center dark:bg-[#181f2a]" id="team-layout">

    <h1 class="text-center font-bold text-black text-3xl p-10 dark:text-white"><?php echo $title?></h1>

    <div class="flex flex-wrap items-stretch justify-center max-w-screen-2xl  row">

        <?php foreach($team as $value):?>

        <div class="container w-full  bg-white dark:bg-[#222c3b] border-none rounded-3xl m-10  max-w-md ">
            <div class=" flex flex-col  md:flex-row  items-center h-full">

                <!-- Image-->
                <div class="p-3">

                    <?php if($value['image']): ?>
                    <img src="<?php echo $value['image']['url']; ?>" alt=""
                        class="w-40 h-40  md:h-auto md:w-72  rounded-full border-none object-cover">
                    <?php else:?>
                    <img src="<?php  echo $default_pic ?>" alt=""
                        class=" w-40 h-40  md:h-auto md:w-72  rounded-full border-none  object-cover">
                    <?php endif;?>
                </div>

                <!-- Name and Description -->
                <div class="p-3 flex flex-col justify-between w-full space-y-3 ">
                    <span class=" text-slate-300 font-semibold text-center
                        md:text-left  dark:text-slate-300"><?php  echo $value['job_role'];?>
                    </span>
                    <h4 class="text-lg font-bold text-center md:text-left text-[#4767C9] dark:text-white">
                        <?php  echo $value['name'];?>
                    </h4>
                    <p class="text-slate-400 text-sm"><?php echo $value['description'];?></p>



                    <!-- Icons -->
                    <div class="flex">

                        <a rel="noopener noreferrer" href="<?php echo $value['facebook_url']['url']; ?>"
                            target=<?php echo $value['facebook_url']['target'] ?> aria-label="Dribble"
                            class="p-1 rounded-full bg-[#4767C9]">
                            <svg class="h-6 w-6 text-white" width="6" height="6" viewBox="0 0 24 24" stroke-width="1"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                            </svg>
                        </a>


                        <a rel="noopener noreferrer" href="<?php echo $value['twitter_url']['url']; ?>"
                            target=<?php echo $value['twitter_url']['target'] ?> aria-label="Twitter"
                            class="p-1 rounded-full bg-[#4767C9] ml-5">
                            <svg class="h-6 w-6 text-white " viewBox="0 0 24 24" fill="white" stroke="currentColor"
                                stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                            </svg>
                        </a>

                        <a rel="noopener noreferrer" href="<?php echo $value['instagram_url']['url']; ?>"
                            target=<?php echo $value['instagram_url']['target'] ?> aria-label="Email"
                            class="p-1 rounded-full bg-[#4767C9]  ml-5">
                            <svg class="h-6 w-6 text-white" width="4" height="4" viewBox="0 0 24 24" stroke-width="1"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect x="4" y="4" width="16" height="16" rx="4" />
                                <circle cx="12" cy="12" r="3" />
                                <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                            </svg>
                        </a>

                    </div>
                </div>


            </div>

        </div>
        <?php endforeach ; ?>
    </div>




</section>