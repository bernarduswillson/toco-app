<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$is_admin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : null;
$profile_pic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : '/public/icons/profile.webp';
?>

<nav>
    <div class="container nav-container">

        <!-- Modal -->
        <!-- <div class="confirm-container close-modal-trigger">
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
                        <a href="../../../api/auth/logout.php" class="text-white">
                            Logout
                        </a>
                    </button>   
                </div>
            </div>  
        </div> -->
        <!--  -->
        
        <div class="left-nav">
            <a href="/">
                <img id="nav-logo" src="/public/icons/logo.svg" alt="Toco logo" draggable="false">
            </a>

            <ul class="nav-menu">
                <li><a href="<?php echo $username ? '/learn' : '/login'; ?>" class="text-sm text-black">Learn</a></li>
                <li><a href="/exercise" class="text-sm text-black">Exercise</a></li>
                <li><a href="/merchandise" class="text-sm text-black">Merchandise</a></li>
                <li><a href="/transaction" class="text-sm text-black">Transactions</a></li>
            </ul>
        </div>

        <div class="right-nav">
            <div id="hamburger">
                <div id="bar-1"></div>
                <div id="bar-2"></div>
                <div id="bar-3"></div>
            </div>
            <div id="logged">
                <?php if ($username) : ?>
                    <?php if ($is_admin) : ?>
                        <a href="/admin"><span class="text-sm logged-text">CMS</span></a>
                    <?php else : ?>
                        <a href="/mylearning"><span class="text-sm logged-text">My learning</span></a>
                    <?php endif; ?>
                    <div>
                        <a href="/profile">
                            <img id="profile-picture" src="<?php echo $profile_pic; ?>" alt="Profile picture" height="40px" width="40px" draggable="false">
                        </a>
                    </div>
                <?php else : ?>
                    <a href="/login">
                        <button class="login-btn text-sm primary-button font-reg">
                            Login
                        </button>
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </div>
    <div class="dropdown-menu">
        <ul>
            <li><a href="<?php echo $username ? '/learn' : '/login'; ?>" class="text-sm text-black">Learn</a></li>
            <li><a href="/exercise" class="text-sm text-black">Exercise</a></li>
            <li><a href="/merchandise" class="text-sm text-black">Merchandise</a></li>
            <li><a href="/transaction" class="text-sm text-black">Transactions</a></li>
            <?php if ($username) : ?>
                <?php if ($is_admin) : ?>
                    <li><a href="/admin" class="text-sm text-black">CMS</a></li>
                <?php else : ?>
                    <li><a href="/mylearning" class="text-sm text-black">My learning</a></li>
                    <?php endif; ?>
                <li><a href="/profile" class="text-sm text-black">Profile</a></li>
                <li><a href="../../../api/auth/logout.php" class="text-sm text-black">Logout</a></li>
            <?php else : ?>
                <li><a href="/login" class="login-btn text-sm primary-button font-reg">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<script src="/public/js/navbar.js"></script>