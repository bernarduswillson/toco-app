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

function saveImageToRepository(imageFile) {
    const formData = new FormData();
    formData.append('image', imageFile);

    fetch('../../api/auth/image.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            const cleanedData = data.replace(/^(\.\.\/\..\/)/, '');
            const rootData = cleanedData.startsWith('/') ? cleanedData : '/' + cleanedData
            console.log('New file path:', rootData);
            const newProfilePicInput = document.getElementById('new-profile-pic');
            newProfilePicInput.value = rootData;
            const profilePicture = document.getElementById('profile-picture-profile');
            profilePicture.src = rootData;
        })
        .catch(error => console.error('Error:', error));
}

document.getElementById('username').addEventListener('input', checkUsername);
document.getElementById('email').addEventListener('input', checkEmail);

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

const validateUsername = (username) => {
    return String(username)
        .toLowerCase()
        .match(/^[a-zA-Z0-9_]*$/);
}

document.getElementById('username').addEventListener('input', checkUsername);
document.getElementById('email').addEventListener('input', checkEmail);


function checkUsername() {
    let username = document.getElementById("username").value

    if (username == initialUsername) {
        document.getElementById("username").style.borderColor = "black";
        document.getElementById('username-error').innerHTML = "";
    }
    else if (username.length < 3) {
        document.getElementById("username").style.borderColor = "red";
        document.getElementById('username-error').innerHTML = "Username needs to be at least 3 characters long";
    }
    else if (!validateUsername(username)) {
        document.getElementById("username").style.borderColor = "red";
        document.getElementById('username-error').innerHTML = "Username can only contain alphanumeric characters and underscore";
    }
    else {
        // nanti hapus aja
        // document.getElementById("username").style.borderColor = "green";
        // document.getElementById('username-error').innerHTML = "";
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../../api/auth/register.php', true);
        xhr.onload = function () {
            if (this.status == 200) {
                let response = JSON.parse(this.responseText);
                if (response.status == "success") {
                    document.getElementById("username").style.borderColor = "green";
                    document.getElementById('username-error').innerHTML = "";
                }
                else {
                    document.getElementById("username").style.borderColor = "red";
                    document.getElementById('username-error').innerHTML = response.message;
                }
            }
            checkAll();
        }

        xhr.send(JSON.stringify({ username: username }));
    }
    checkAll();
}

function checkEmail() {
    let email = document.getElementById("email").value

    if (email == initialEmail) {
        document.getElementById("email").style.borderColor = "black";
        document.getElementById('email-error').innerHTML = "";
    }
    else if (email.length < 3) {
        document.getElementById("email").style.borderColor = "red";
    }
    else if (!validateEmail(email)) {
        document.getElementById("email").style.borderColor = "red";
        document.getElementById('email-error').innerHTML = "Invalid email";
    }
    else {
        // nanti hapus aja
        // document.getElementById("email").style.borderColor = "green";
        // document.getElementById('email-error').innerHTML = "";
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../../api/auth/register.php', true);
        xhr.onload = function () {
            if (this.status == 200) {
                console.log(this.responseText);
                let response = JSON.parse(this.responseText);
                if (response.status == "success") {
                    document.getElementById("email").style.borderColor = "green";
                    document.getElementById('email-error').innerHTML = "";
                }
                else {
                    document.getElementById("email").style.borderColor = "red";
                    document.getElementById('email-error').innerHTML = response.message;
                }
            }
            checkAll();
        }

        xhr.send(JSON.stringify({ email: email }));
    }
    checkAll();
}

function checkAll() {
    if (document.getElementById("username").style.borderColor == "red" || document.getElementById("email").style.borderColor == "red") {
        document.getElementById('save-btn').disabled = true
        document.getElementById('save-btn').style.cursor = "not-allowed";
    }
    else {
        document.getElementById('save-btn').disabled = false
        document.getElementById('save-btn').style.cursor = "pointer";
    }
}