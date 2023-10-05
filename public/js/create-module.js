const createBtn = document.querySelector("#create-btn");
const moduleNameInput = document.querySelector("#module-input");
const categoryInput = document.querySelector("#category-input");
const orderInput = document.querySelector("#order-input");

document.getElementById('module-input').addEventListener('input', checkModule);
document.getElementById('category-input').addEventListener('input', checkCategory);
document.getElementById('order-input').addEventListener('input', checkOrder);

function checkModule() {
  let module = document.getElementById("module-input").value
  if (module.length < 1) {
    document.getElementById("module-input").style.borderColor = "red";
    document.getElementById('module-error').innerHTML = "Module cannot be empty";
  } else {
    document.getElementById("module-input").style.borderColor = "green";
    document.getElementById('module-error').innerHTML = "";
  }
  checkAll();
}

function checkCategory() {
  let category = document.getElementById("category-input").value
  if (category.length < 1) {
    document.getElementById("category-input").style.borderColor = "red";
    document.getElementById('category-error').innerHTML = "Category cannot be empty";
  } else {
    document.getElementById("category-input").style.borderColor = "green";
    document.getElementById('category-error').innerHTML = "";
  }
  checkAll();
}

function checkOrder() {
  let order = document.getElementById("order-input").value
  if (order.length < 1) {
    document.getElementById("order-input").style.borderColor = "red";
    document.getElementById('order-error').innerHTML = "Order cannot be empty";
  } else {
    document.getElementById("order-input").style.borderColor = "green";
    document.getElementById('order-error').innerHTML = "";
  }
  checkAll();
}



function checkAll() {
  if (document.getElementById("module-input").style.borderColor == "green" && document.getElementById("category-input").style.borderColor == "green" && document.getElementById("order-input").style.borderColor == "green") {
    document.getElementById('create-btn').disabled = false;
    document.getElementById('create-btn').style.cursor = "pointer";
    document.getElementById('create-btn').classList.remove("disable");
  } else {
    document.getElementById('create-btn').disabled = true;
    document.getElementById('create-btn').style.cursor = "not-allowed";
    document.getElementById('create-btn').classList.add("disable");
  }
}

languageNameInput.addEventListener("blur", () => {
  if (languageNameInput.value) {
    createBtn.classList.remove("disable");
    createBtn.disabled = false;
  } else {
    createBtn.classList.add("disable");
    createBtn.disabled = true;
  }
})

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