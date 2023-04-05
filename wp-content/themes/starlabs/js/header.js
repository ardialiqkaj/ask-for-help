//Burger Menu
const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");

btn.addEventListener("click", () => {
  menu.classList.toggle("hidden");
});


//search bar toggle
jQuery(document).ready(function ($) {
    $(".dashicons-search").on("click", function () {
      $(".search-box").slideToggle();
    });
  });

  
// Dropdown Menu
const dropdownBtn = document.querySelector(".dropdown-menu");
const div = document.querySelector(".doubleDropdown");

dropdownBtn.addEventListener("click", () => {
  div.classList.toggle("hidden");
});