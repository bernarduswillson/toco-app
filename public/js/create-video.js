const createBtn = document.querySelector("#create-btn");
const videoNameInput = document.querySelector("#name-input");
const descInput = document.querySelector("#desc-input");
const urlInput = document.querySelector("#url-input");
const orderInput = document.querySelector("#order-input");

document.getElementById('name-input').addEventListener('input', checkVideo);
document.getElementById('order-input').addEventListener('input', checkOrder);

function checkVideo() {
  let video = document.getElementById("name-input").value
  if (video.length < 1) {
    document.getElementById("name-input").style.borderColor = "red";
    document.getElementById('video-error').innerHTML = "Video name cannot be empty";
  } else {
    document.getElementById("name-input").style.borderColor = "green";
    document.getElementById('video-error').innerHTML = "";
  }
  checkAll();
}

function checkOrder() {
  let order = document.getElementById("order-input").value
  let module_id = document.getElementById("module_id").value

  if (order.length < 1) {
    document.getElementById("order-input").style.borderColor = "red";
    document.getElementById('order-error').innerHTML = "Order cannot be empty";
  }
  else {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../../../../api/admin/video.php', true);
    xhr.onload = function () {
      if (this.status == 200) {
        console.log(this.responseText);
        let response = JSON.parse(this.responseText);
        if (response.status == "success") {
          document.getElementById("order-input").style.borderColor = "green";
          document.getElementById('order-error').innerHTML = "";
        }
        else {
          document.getElementById("order-input").style.borderColor = "red";
          document.getElementById('order-error').innerHTML = response.message;
        }
      }
      checkAll();
    }

    xhr.send(JSON.stringify({ order: order, module_id: module_id }));
  }
  checkAll();
}

function checkAll() {
  if (document.getElementById("name-input").style.borderColor == "red" || document.getElementById("order-input").style.borderColor == "red") {
    document.getElementById('create-btn').disabled = true;
    document.getElementById('create-btn').style.cursor = "not-allowed";
    document.getElementById('create-btn').classList.add("disable");
  } else {
    document.getElementById('create-btn').disabled = false;
    document.getElementById('create-btn').style.cursor = "pointer";
    document.getElementById('create-btn').classList.remove("disable");
  }
}

document.getElementById('upload-input').addEventListener('change', function (event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function (e) {
    saveVideoToRepository(file);
  };

  reader.readAsDataURL(file);
});

document.getElementById('delete-btn').addEventListener('click', function (event) {
  event.preventDefault();
  const uploadInput = document.getElementById('upload-input');
  uploadInput.value = '';
  const newVideoInput = document.getElementById('new-video');
  newVideoInput.value = '/public/video/default.mp4';
});

function saveVideoToRepository(videoFile) {
  const formData = new FormData();
  formData.append('video', videoFile);

  fetch('../../../../../api/admin/moduleVideo.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.text())
    .then(data => {
      const cleanedData = data.replace(/^(\.\.\/\..\/)/, '');
      const rootData = cleanedData.startsWith('/') ? cleanedData : '/' + cleanedData
      console.log('New file path:', rootData);
      const newVideoInput = document.getElementById('new-video');
      newVideoInput.value = rootData;
    })
    .catch(error => console.error('Error:', error));
}

function validate() {
  if (videoNameInput.value && orderInput.value) {
    createBtn.classList.remove("disable");
    createBtn.disabled = false;
  } else {
    createBtn.classList.add("disable");
    createBtn.disabled = true;
  }
}

videoNameInput.addEventListener("blur", () => {
  validate();
});

descInput.addEventListener("blur", () => {
  validate();
});

orderInput.addEventListener("blur", () => {
  validate();
});