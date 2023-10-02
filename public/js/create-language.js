const createBtn = document.querySelector("#create-btn");
const languageNameInput = document.querySelector("#language-input");

languageNameInput.addEventListener("blur", () => {
  if (languageNameInput.value) {
    createBtn.classList.remove("disable");
    createBtn.disabled = false;
  } else {
    createBtn.classList.add("disable");
    createBtn.disabled = true;
  }
})