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

            <!-- Modal -->
            <div class="confirm-container close-modal-trigger">
                <div class="confirm-card">
                    <div class="confirm-content">
                        <h2 class="text-md text-red font-reg">Are you sure?</h2>
                        <p class="text-sm text-black font-reg">You will be logged out from Toco</p>
                    </div>
                    <div class="modal-button-container">
                        <button type="button" class="secondary-btn font-reg text-sm close-modal-trigger">
                            Cancel
                        </button>   
                        <button class="primary-btn font-reg text-sm" id="logout-btn" name="logout" type="submit">
                            Logout
                        </button>   
                    </div>
                </div>  
            </div>
            <!--  -->

            <div class="top-profile">
                <img id="profile-picture-profile" class="profile-image" src="<?php echo $profile_pic; ?>" alt="Profile"
                    draggable="false" height="150px" width="150px">
                <input type="hidden" id="new-profile-pic" name="new-profile-pic" value="<?php echo $profile_pic; ?>">
                <div class="modify-image">
                    <input id="upload-input" type="file" accept="image/*">
                    <label for="upload-input" class="change-btn font-reg text-sm .change-btn">Change picture</label>
                    <button id="delete-btn" class="delete-btn font-reg text-sm">
                        Delete picture
                    </button>
                </div>
            </div>
            <div class="profile-form">
                <div class="username-form">
                    <label class="font-reg text-sm" for="username">Username</label>
                    <input class="username-input font-reg text-sm" type="text" name="username" id="username"
                        value="<?php echo $username; ?>" required>
                    <p id="username-error"></p>
                </div>
                <div class="email-form">
                    <label class="font-reg text-sm" for="email">Email</label>
                    <input class="email-input font-reg text-sm" type="email" name="email" id="email"
                        value="<?php echo $email; ?>" required>
                    <p id="email-error"></p>
                </div>
            </div>
            <div class="btn-container">
                <button type="button" class="logout-btn font-reg text-sm modal-trigger">
                    Logout
                </button>
                <button class="save-btn font-reg text-sm" type="submit" id="save-btn" disable>
                    Save changes
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    const initialUsername = "<?php echo $username; ?>";
    const initialEmail = "<?php echo $email; ?>";
</script>
<script src="../../../public/js/profile.js"></script>
<script src="../../../public/js/modal.js"></script>