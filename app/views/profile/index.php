<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
?>
    <div class="profile">
        <div class="profile-container">
            <h1 class="profile-header text-xl font-bold text-blue-purple-gradient">
                Your Profile
            </h1>
            <div class="top-profile">
                <img class="profile-image" src="../../../public/icons/profile.webp" alt="Profile" draggable="false" height="150px">
                <div class="modify-image">
                    <button class="change-btn font-reg text-sm">
                        Change picture
                    </button>
                    <button class="delete-btn font-reg text-sm">
                        Delete picture
                    </button>
                </div>
            </div>
            <div class="profile-form">
                <div class="username-form">
                    <label class="font-reg text-sm" for="username">Username</label>
                    <input class="username-input font-reg text-sm" type="text" name="username" id="username" value="<?php echo $username; ?>">
                </div>
                <div class="email-form">
                    <label class="font-reg text-sm" for="email">Email</label>
                    <input class="email-input font-reg text-sm" type="email" name="email" id="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="btn-container">
                <button class="logout-btn font-reg text-sm">
                    Logout
                </button>
                <button class="save-btn font-reg text-sm">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</body>
</html>
