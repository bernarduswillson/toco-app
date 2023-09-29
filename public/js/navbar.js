const hamburger = document.querySelector("#hamburger");
const dropDownMenu = document.querySelector(".dropdown-menu");

hamburger.addEventListener('click', () => {
    console.log("toggle");
    dropDownMenu.classList.toggle("open");
    hamburger.classList.toggle("open");
});
