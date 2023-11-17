const modalTriggers = document.querySelectorAll(".modal-trigger");

modalTriggers.forEach((trigger, index) => {
  const modalBox = trigger.parentNode.querySelector(".confirm-container");
  const closeBtn = modalBox.querySelector(".close-modal-trigger");

  trigger.addEventListener("click", () => {
    modalBox.classList.add("active");
  });

  closeBtn.addEventListener("click", () => {
    modalBox.classList.remove("active");
  });
});