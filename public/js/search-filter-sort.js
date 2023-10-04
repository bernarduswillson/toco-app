const form = document.querySelector("#search-filter-sort-form");

// Sort
const sortBtn = document.querySelector(".sort-container");
const checkbox = document.querySelector("#sort-input");

checkbox.addEventListener("click", () => {
  sortBtn.classList.toggle("active");
  goToPage(1);
});

// Filter
const filterInput = document.querySelector("#difficulty-input");

filterInput.addEventListener("change", () => {
  goToPage(1);
})

// Search
const searchBox = document.querySelector("#search-box");
let timeoutId;

searchBox.addEventListener("input", () => {
  clearTimeout(timeoutId);
  timeoutId = setTimeout(() => {
    goToPage(1);
  }, 500);
})

// Pagination
const pageInput = document.querySelector("#page-input");

function prevPage() {
  let temp = parseInt(pageInput.value);
  temp--;
  pageInput.value = temp;
  form.submit();
}

function nextPage() {
  let temp = parseInt(pageInput.value);
  temp++;
  pageInput.value = temp;
  form.submit();
}

function goToPage(destination_page) {
  pageInput.value = destination_page;
  form.submit();
}