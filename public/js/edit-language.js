const createBtn = document.querySelector("#create-btn");
const languageNameInput = document.querySelector("#language-input");

document.getElementById('language-input').addEventListener('input', checkLanguage);

function checkLanguage() {
  let language = document.getElementById("language-input").value
  if (language == initialLanguage && language.length > 0) {
    document.getElementById("language-input").style.borderColor = "black";
    document.getElementById('language-error').innerHTML = "";
  }
  else if (language.length < 1) {
    document.getElementById("language-input").style.borderColor = "red";
    document.getElementById('language-error').innerHTML = "Language cannot be empty";
  }
  else {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../api/admin/language.php', true);
    xhr.onload = function () {
      if (this.status == 200) {
        console.log(this.responseText);
        let response = JSON.parse(this.responseText);
        if (response.status == "success") {
          document.getElementById("language-input").style.borderColor = "green";
          document.getElementById('language-error').innerHTML = "";
        }
        else {
          document.getElementById("language-input").style.borderColor = "red";
          document.getElementById('language-error').innerHTML = response.message;
        }
      }
      checkAll();
    }

    xhr.send(JSON.stringify({ language: language }));
  }
  checkAll();
}

function checkAll() {
  if (document.getElementById("language-input").style.borderColor == "red") {
    document.getElementById('create-btn').disabled = true;
    document.getElementById('create-btn').style.cursor = "not-allowed";
    document.getElementById('create-btn').classList.add("disable");
  } else {
    document.getElementById('create-btn').disabled = false;
    document.getElementById('create-btn').style.cursor = "pointer";
    document.getElementById('create-btn').classList.remove("disable");
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
  languagePicture.src = '/public/icons/profile.webp';
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
      const cleanedData = data.replace(/^(\.\.\/\..\/)/, '');
      const rootData = cleanedData.startsWith('/') ? cleanedData : '/' + cleanedData
      console.log('New file path:', rootData);
      const newLanguagePicInput = document.getElementById('new-language-pic');
      newLanguagePicInput.value = rootData;
      const languagePicture = document.getElementById('language-image');
      languagePicture.src = rootData;
    })
    .catch(error => console.error('Error:', error));
}