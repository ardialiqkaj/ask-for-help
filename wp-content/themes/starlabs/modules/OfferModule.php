<div class="bg-[#4767c9]" id="offer-module">
<?php
    $title = $module['title'];
    $sub_title = $module['sub_title'];
    $offer = $module['offer'];
    $description = $module['description'];
    $button = $module['button'];
    $copyright = $module['copyright'];
    $terms = $module['terms'];
    $privacy_policy = $module['privacy_policy'];
    
?>
<div class="dark:bg-[#181f2a]" >
    <div class="py-14">
       <?php if($title): ?>
        <h5 class=" leading-3 space-y-1.5 font-semibold flex justify-center text-lg	 text-white"><?php echo $title ?></h5><br>
        <?php endif; ?>

        <?php if($sub_title): ?>
        <h2 class=" flex justify-center text-white text-[30px]"><?php echo $sub_title ?></h2>
        <?php endif; ?>

        <?php if($offer): ?>
        <h1 class=" font-bold flex justify-center text-white text-[70px] text-center max-lg:text-[50px]"><?php echo $offer ?></h1>
        <?php endif; ?>

        <?php if($description): ?>
        <p class="tracking-tight text-white flex justify-center px-6 text-center  dark:text-slate-300"><?php echo $description ?></p>
        <?php endif; ?>
            
        <div class=" my-10 text-white flex justify-center">
        <?php if($button): ?>
        <a href="<?php echo $button['url'] ?>" target="_blank" class="self-center font-bold bg-white dark:bg-[#5bbde7] dark:hover:bg-[#7fcef0] rounded-full hover:bg-[#adbce9]"><h3 class="px-20 py-4 text-lg font-bold text-slate-500 dark:text-white"><?php echo $button['title']?></h3></a>
        <?php endif ?></div>
        <div class="text-[14px] text-white flex justify-center">
    
    <?php 
        if( $copyright ): ?>
        <p class="text-white text-center"><?php echo $copyright ?><span class="dark:text-[#4767C9]"> •</span>
    <?php endif;?>

    <?php 
        if( $terms ): ?>    
        <a class="underline underline-offset-1 dark:text-[#4767C9]">  <?php echo $terms ?> •</a>
    <?php endif; ?>

    
    <?php 
        if( $privacy_policy ): ?> 
     <a class="ml-1 underline underline-offset-1 dark:text-[#4767C9]"><?php echo $privacy_policy ?></a></p>
     <?php endif; ?>
    </div>
         </div>
    </div>
</div>