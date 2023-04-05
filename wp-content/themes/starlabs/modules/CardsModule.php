<?php 
$cards = $module['cards'];
$cards_title = $module['cards_title'];

?>
<div class="mt-20" id="cards-module">
      <h1 class="mt-8 mx-auto max-w-md text-4xl font-bold text-center dark:text-white">
      <?php echo $cards_title; ?>
      </h1>

      <div
        class="container w-8/12 mx-auto grid sm:grid-cols-2 lg:grid-cols-3 gap-10 mt-10 mb-14"
      > <?php foreach ($cards as $card) : ?>
        <div class="bg-white rounded-2xl p-5 shadow-lg dark:bg-[#243042] dark:text-white">
          <div class="space-y-2">
            <img src="<?php echo $card['card_image']['url']; ?>" class="w-16 h-16 dark:text-white" />
            <h2 class="font-bold"><?php echo $card['card_name']; ?></h2>
          </div>
          <div class="pt-3 text-gray-400">
            <p><?php echo $card['card_description']; ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>