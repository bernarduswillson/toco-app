function showToast(message) {
  console.log("test");

  setTimeout(() => {
    const toastContainer = document.querySelector("#toast-container");
    const toastMessage = document.querySelector("#toast-message");
    toastMessage.innerHTML = message;
    toastContainer.classList.add("active");

    setTimeout(() => {
        toastContainer.classList.remove("active");
    }, 3000);
  }, 500);
  
}