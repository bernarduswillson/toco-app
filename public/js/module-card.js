const moduleCard = document.querySelectorAll(".module-card");

for(let i = 0; i < moduleCard.length; i++) {
  moduleCard[i].addEventListener("click", () => {
    moduleCard[i].classList.toggle("active")
  })
}