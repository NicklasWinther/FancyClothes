let button = document.querySelector("body > button");
window.addEventListener("scroll", () => {
  window.pageYOffset > 200
    ? button.classList.remove("hide")
    : button.classList.add("hide");
});
button.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});
