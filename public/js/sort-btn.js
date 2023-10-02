const filterBtn = document.querySelector(".sort-container");
const checkbox = document.querySelector("#sort-input");

checkbox.addEventListener("click", () => {
  filterBtn.classList.toggle("active");
});
