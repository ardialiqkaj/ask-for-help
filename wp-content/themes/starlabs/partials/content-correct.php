<?php
if($author_id==$user_id){
    if ($is_correct) {
      $text .= '<p class="absolute top-0 right-0 mr-4"><svg class="fill-green-600 w-5 h-5 inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM337 209L209 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L303 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <button name="is_correct" class="text-green-600 font-bold" id="iscorrect"> Correct</button></p>';
  } else {
      $text .= '<p class="absolute top-0 right-0 mr-4"><button name="is_correct" class="text-slate-500" id="iscorrect'.$comment_id.'" onclick="markAsCorrect('.$comment_id.')">Mark as correct</button></p>';
  }
}
?>