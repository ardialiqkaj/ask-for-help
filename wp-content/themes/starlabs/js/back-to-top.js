// Back to top button
const toTop = document.querySelector(".back-to-top");

toTop.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

window.addEventListener("scroll", () => {
  if (window.pageYOffset > 200) {
    toTop.classList.remove("hidden");
    toTop.classList.add("block");
  } else {
    toTop.classList.add("hidden");
    toTop.classList.remove("block");
  }
});
