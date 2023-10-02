const createBtn = document.querySelector("#create-btn");
const videoNameInput = document.querySelector("#name-input");
const descInput = document.querySelector("#desc-input");
const urlInput = document.querySelector("#url-input");
const orderInput = document.querySelector("#order-input");

function validate() {
  if (videoNameInput.value && descInput.value && urlInput.value && orderInput.value) {
    createBtn.classList.remove("disable");
    createBtn.disabled = false;
  } else {
    createBtn.classList.add("disable");
    createBtn.disabled = true;
  }
}

videoNameInput.addEventListener("blur", () => {
  validate();
});

descInput.addEventListener("blur", () => {
  validate();
});

urlInput.addEventListener("blur", () => {
  validate();
});

orderInput.addEventListener("blur", () => {
  validate();
});