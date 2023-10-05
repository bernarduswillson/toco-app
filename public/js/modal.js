const modalTrigger = document.querySelector(".modal-trigger");
const modalBox = document.querySelector(".confirm-container");
const closeBtn = document.querySelector(".close-modal-trigger");

modalTrigger.addEventListener("click", () => {
  modalBox.classList.add("active");
});

closeBtn.addEventListener("click", () => {
  modalBox.classList.remove("active");
})