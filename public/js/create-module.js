const createBtn = document.querySelector("#create-btn");
const moduleNameInput = document.querySelector("#module-input");
const categoryInput = document.querySelector("#category-input");
const orderInput = document.querySelector("#order-input");

function validate() {
  if (moduleNameInput.value && categoryInput.value && orderInput.value) {
    createBtn.classList.remove("disable");
    createBtn.disabled = false;
  } else {
    createBtn.classList.add("disable");
    createBtn.disabled = true;
  }
}

moduleNameInput.addEventListener("blur", () => {
  validate();
});

categoryInput.addEventListener("blur", () => {
  validate();
});

orderInput.addEventListener("blur", () => {
  validate();
});