document.getElementById('upload-input').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
        const profilePicture = document.getElementById('profile-picture-profile');
        profilePicture.src = e.target.result;
        saveImageToRepository(file);
    };

    reader.readAsDataURL(file);
});

document.getElementById('delete-btn').addEventListener('click', function (event) {
    event.preventDefault();
    const profilePicture = document.getElementById('profile-picture-profile');
    profilePicture.src = '../../../public/icons/profile.webp';
    const uploadInput = document.getElementById('upload-input');
    uploadInput.value = '';
    const newProfilePicInput = document.getElementById('new-profile-pic');
    newProfilePicInput.value = '/public/icons/profile.webp';
});

document.getElementById('logout-btn').addEventListener('click', function (event) {
    event.preventDefault();
});

function saveImageToRepository(imageFile) {
    const formData = new FormData();
    formData.append('image', imageFile);

    fetch('../../api/auth/image.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('New file path:', data);
        const newProfilePicInput = document.getElementById('new-profile-pic');
        newProfilePicInput.value = data;
        const profilePicture = document.getElementById('profile-picture-profile');
        profilePicture.src = data;
    })
    .catch(error => console.error('Error:', error));
}

