window.addEventListener("load", showActiveName);
window.addEventListener("load", showActiveDesc);

//This function gets the ID of the first Tab Description Div and removes class 'hidden' from it
function showActiveName() {
  let tabContent = document.querySelector(".tab-content");
  if (tabContent) {
    let firstElement = tabContent.firstElementChild;
    firstElement.classList.remove("hidden");
  }
}

//This function adds text color and background color to the first Tab name which is active on load
function showActiveDesc() {
  let element = document.querySelector("#list-item");
  if (element) {
    element.classList.add("bg-[#4767c9]");
    element.classList.add("text-white");
    element.classList.remove("text-gray-600");
    element.classList.remove("bg-white");
    element.classList.remove("dark:bg-[#181f2a]");
  }
}

//This function changes the tab description based on which Tab Name we click
function changeActiveTab(event, tabID) {
  let element = event.target;
  ulElement = element.parentNode.parentNode;
  aElements = ulElement.querySelectorAll("li > a");
  tabContents = document
    .getElementById("tabs-id")
    .querySelectorAll(".tab-content > div");
  for (let i = 0; i < aElements.length; i++) {
    aElements[i].classList.remove("text-white");
    aElements[i].classList.remove("bg-[#4767c9]");
    aElements[i].classList.add("text-gray-600");
    aElements[i].classList.add("bg-white");
    aElements[i].classList.add("dark:bg-[#181f2a]");
    tabContents[i].classList.add("hidden");
    tabContents[i].classList.remove("block");
  }
  element.classList.remove("text-gray-600");
  element.classList.remove("bg-white");
  element.classList.remove("dark:bg-[#181f2a]");
  element.classList.add("text-white");
  element.classList.add("bg-[#4767c9]");
  document.getElementById(tabID).classList.remove("hidden");
  document.getElementById(tabID).classList.add("block");
}

// Mark an answer as correct
function markAsCorrect(comment_id) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", ajax_object.ajax_url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      document.getElementById("iscorrect" + comment_id).innerHTML =
        '<svg class="fill-green-600 w-5 h-5 inline-block mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">\
      <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->\
      <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM337 209L209 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L303 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>\
    </svg> Correct';
      document.getElementById("iscorrect" + comment_id).className =
        "text-green-600 font-bold";
    }
  };
  xhr.send("action=mark_as_correct&comment_id=" + comment_id);
}

// add the onclick event handler to the button
document.getElementById("iscorrect" + comment_id).onclick = function () {
  markAsCorrect(comment_id);
};
