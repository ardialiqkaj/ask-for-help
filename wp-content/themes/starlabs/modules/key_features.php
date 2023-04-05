 <?php 
$title = $module['title'];
$paragraph = $module['paragraph'];
$boxes = $module['boxes'];

?>
    <div class="w-full" id="key-features">
        <h1 class=" tracking-normal normal-case font-bold text-5xl text-center mt-12 mx-auto mb-0 dark:text-white"><?php echo $title ?></h1>
        <p class=" mt-5 mx-auto mb-0 text-gray-400 text-center w-[70%]"><?php echo $paragraph ?> <a href="https://freepik.com/photos/business"  class="underline hover:no-underline p-0 ">Freepik</a></p>
        <img class="mt-[30px] mb-0 object-cover w-full h-[469px] mx-auto" src="//images03.nicepage.com/c461c07a441a5d220e8feb1a/989ba51b0f1f5d87a311be92/dawq-min.jpg?version=">
        <div class="w-full">
			<div class="max-w-[1008px] m-auto max-lg:w-11/12 mb-6 md:mb-14">
				<div class="grid xs:grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 container m-auto mt-[-174px] max-lg:w-full">
				    <?php foreach($boxes as $box):?>
				        <div class="bg-white dark:bg-[#243042] dark:text-white rounded-3xl py-6 px-7 shadow-lg mb-8 w-[220px] min-h-[220px] max-lg:m-auto max-lg:w-full">
							<span class=" bg-none my-0"> 
								<img src="<?php echo $box['box_image']['url']; ?>" alt="icon" class="w-[59px] h-[59px] mx-auto">
					        </span> 
						   <h4 class="text-lg font-bold mt-5 mx-2.5 mb-0 text-center"><?php echo $box['box_title']; ?></h4>
						   <p class="text-5xl font-bold mt-[35px] mx-[9] mb-0 text-[#4767c9] text-center"><?php echo $box['box_number'];?></</p>
						
					    </div>
				    <?php endforeach; ?>	  
				</div>
			</div>
        </div>      


    </div>
