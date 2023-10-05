const form = document.querySelector("#search-filter-sort-form");

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