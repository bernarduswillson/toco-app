const form = document.querySelector("#search-filter-sort-form");

// Sort
const sortBtn = document.querySelector(".sort-container");
const checkbox = document.querySelector("#sort-input");

checkbox.addEventListener("click", () => {
  sortBtn.classList.toggle("active");
  form.submit();
});

// Filter
const filterInput = document.querySelector("#difficulty-input");

filterInput.addEventListener("change", () => {
  form.submit();
})

// Search
const searchBox = document.querySelector("#search-box");
let timeoutId;

searchBox.addEventListener("input", () => {
  console.log("change");
  clearTimeout(timeoutId);
  timeoutId = setTimeout(() => {
    form.submit();
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