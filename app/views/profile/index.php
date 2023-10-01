<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$profile_pic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : '/public/icons/profile.webp';
?>
    <div class="profile">
        <div class="profile-container">
            <h1 class="profile-header text-xl font-bold text-blue-purple-gradient">
                Your Profile
            </h1>
            <form action="../../../api/auth/profile.php" method="post">
                <div class="top-profile">
                    <img id="profile-picture-profile" class="profile-image" src="<?php echo $profile_pic; ?>" alt="Profile" draggable="false" height="150px" width="150px">
                    <input type="hidden" id="new-profile-pic" name="new-profile-pic" value="<?php echo $profile_pic; ?>">
                    <div class="modify-image">
                        <button class="change-btn font-reg text-sm">
                            <input type="file" id="upload-input" accept="image/*">
                            Change picture
                        </button>
                        <button id="delete-btn" class="delete-btn font-reg text-sm">
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
                        <a href="../../../api/auth/logout.php">
                            Logout
                        </a>
                    </button>
                    <button class="save-btn font-reg text-sm" type="submit">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../../../public/js/profile.js"></script>
</body>
</html>
