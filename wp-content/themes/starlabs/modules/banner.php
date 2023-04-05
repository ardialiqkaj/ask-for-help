<?php
    $image = $module['image'];
    $banner_description = $module['description'];
    $banner_title = $module['title'];

?>

<div class=' h-60 w-full relative flex justify-center bg-[#6B9EBF]'>
    <?php if($image): ?>
    <img src="<?php echo $image['url'] ?>"
        class="w-full h-full object-cover  absolute mix-blend-multiply  opacity-60 " />
    <?php  endif; ?>
    <div class="py-20">
        <?php if($banner_title): ?>
        <h1 class="text-white text-center text-6xl font-bold max-lg:text-5xl max-sm:text-3xl"><?php echo $banner_title ?></h1>
        <?php endif;?>

        <?php if($banner_description): ?>
        <p class="text-slate-300 text-2xl text-center  font-light mt-5"><?php echo $banner_description ?> </p>
        <?php endif; ?>
    </div>


</div>