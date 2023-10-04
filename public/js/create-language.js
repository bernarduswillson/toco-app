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

document.getElementById('upload-input').addEventListener('change', function (event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function (e) {
    const languagePicture = document.getElementById('language-image');
    languagePicture.src = e.target.result;
    saveImageToRepository(file);
  };

  reader.readAsDataURL(file);
});

document.getElementById('delete-btn').addEventListener('click', function (event) {
  event.preventDefault();
  const languagePicture = document.getElementById('language-image');
  languagePicture.src = '../../../public/icons/profile.webp';
  const uploadInput = document.getElementById('upload-input');
  uploadInput.value = '';
  const newLanguagePicInput = document.getElementById('new-language-pic');
  newLanguagePicInput.value = '/public/icons/profile.webp';
});

function saveImageToRepository(imageFile) {
  const formData = new FormData();
  formData.append('image', imageFile);

  fetch('../../api/admin/languageImage.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.text())
    .then(data => {
      console.log('New file path:', data);
      const newLanguagePicInput = document.getElementById('new-language-pic');
      newLanguagePicInput.value = data;
      const languagePicture = document.getElementById('language-picture');
      languagePicture.src = data;
    })
    .catch(error => console.error('Error:', error));
}