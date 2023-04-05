<?php
        $title = $module['title'];
        $paragraph = $module['paragraph'];
        $socials = $module['socials'];
?>

<div class="bg-split-white-blue dark:bg-split-gray w-full min-h-[539px] relative flex justify-center items-center" id="contact-form">
      <div class="lg:min-h-[377px] lg:w-[965px] w-[340px] my-10 shadow-[0px_0px_20px_-0_rgba(0,0,0,0.15)] h-auto text-left text-[#111111] bg-[#ffffff] dark:bg-[#222c3b] rounded-3xl relative flex lg:flex-row justify-center items-start flex-col">
        <div class="max-w-full relative py-7 px-10 flex flex-col flex-1">
          <h1 class="relative normal-case text-5xl font-bold mt-6 mr-auto text-center dark:text-white"><?php echo $title ?></h1>
          <p class="relative text-lg text-[#999999] block lg:mt-12 mt-2.5 leading-8 lg:text-left text-center  dark:text-slate-300">
          <?php echo $paragraph ?>
          </p>
          <div class="h-7 min-h-4 w-40 min-w-32 lg:mt-8 lg:ml-0 mt-2.5 relative flex ml-24 ">
            <a href="<?php echo $socials['facebook'];?>" target="_blank" class="h-full flex-1 cursor-pointer ml-5"><span class="h-full flex"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content dark:fill-white" viewBox="0 0 112 112" x="0px" y="0px" id="svg-50ee"><path d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2 c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path></svg></span></a>
            <a href="<?php echo $socials['twitter'];?>" target="_blank" class="h-full flex-1 cursor-pointer ml-5"><span class="h-full flex"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content dark:fill-white" viewBox="0 0 112 112" x="0px" y="0px" id="svg-d346"><path d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2 c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7 c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2 c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5 c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path></svg></a>
            <a href="<?php echo $socials['instagram'];?>" target="_blank" class="h-full flex-1 cursor-pointer ml-5"><span class="h-full flex"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content dark:fill-white" viewBox="0 0 112 112" x="0px" y="0px" id="svg-dd2a"><path d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path><path d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path><path d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7 V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7 c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path></svg></span></a>
            <a href="<?php echo $socials['google+'];?>" target="_blank" class="h-full flex-1 cursor-pointer ml-5"><span class="h-full flex"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content dark:fill-white" viewBox="0 0 112 112" x="0px" y="0px" id="svg-102d"><path d="M62.2,81.6c-8.6,11.2-24.6,14.4-37.6,10C10.9,87,0.8,73.2,1,58.5c-0.8-18,15.2-34.6,33.1-34.9 c9.2-0.8,18.2,2.7,25,8.6c-2.9,3.1-5.7,6.2-8.9,9.2c-6.2-3.8-13.5-6.5-20.6-4C18.1,40.7,11,54.2,15.4,65.6 c3.5,11.8,17.8,18.3,29.2,13.2c5.8-2.1,9.7-7.4,11.3-13.2c-6.6-0.1-13.2,0-20.1-0.3c0-3.9,0-7.9,0-11.9c11.2,0,22.2,0,33.3,0 C69.9,63.4,68.3,73.9,62.2,81.6z M110.9,63.7c-3.4,0-6.6,0-10,0c0,3.4,0,6.6,0,10c-3.4,0-6.6,0-10,0c0-3.4,0-6.6,0-10 c-3.4,0-6.6,0-10,0c0-3.4,0-6.6,0-10c3.4,0,6.6,0,10,0c0-3.4,0-6.6,0.1-10c3.4,0,6.6,0,10,0c0,3.4,0,6.6,0,10c3.4,0,6.6,0,10,0 C110.9,56.9,110.9,60.3,110.9,63.7z"></path></svg></span></a>
          </div>
        </div>
        <div class="relative h-auto block lg:py-7 lg:px-10 py-2 px-4">
          <form action="#" class="p-0 lg:mt-12 mt-2.5 flex flex-col flex-wrap">
            <div class="mb-7  w-full text-start self-start text-base block">
              <label for="name" class="text-start text-base  dark:text-white">Name</label>
              <input type="text" placeholder="Enter your Name" class="bg-[#f2f2f2] rounded-xl block w-full py-2.5 px-3 m-0 border-none h-auto overflow-visible text-start" />
            </div>
            <div class="flex lg:flex-row flex-col">
              <div class="mb-7  w-full lg:w-1/2 text-start block">
                <label for="phone" class="text-start self-start text-base block  dark:text-white">Phone</label>
                <input
                  type="phone number"
                  placeholder="Enter your phone (e.g. +14155552675)"
                  class="bg-[#f2f2f2] rounded-xl block w-full py-2.5 px-3 m-0 border-none h-auto overflow-visible text-start"
                />
              </div>
              <div class="mb-7 md:pl-7 w-full lg:w-1/2 text-start block">
                <label for="email" class="text-start self-start text-base block  dark:text-white">Email</label>
                <input type="email" placeholder="Enter a valid email address" class="bg-[#f2f2f2] rounded-xl block w-full py-2.5 px-3 m-0 border-none h-auto overflow-visible text-start" />
              </div>
            </div>
            <div class="w-full text-start block text-[#ffffff] py-2">
              <a href="#" class="bg-[#4767c9] w-full text-center uppercase tracking-[2px] font-bold my-px relative rounded-xl inline-block py-2.5 px-8 mb-7 cursor-pointer dark:bg-[#5bbde7] dark:text-white dark:hover:bg-[#7fcef0] "> Request clarification </a>
            </div>
          </form>
        </div>
      </div>
    </div>