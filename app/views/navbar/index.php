<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$is_admin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : null;
$profile_pic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : '/public/icons/profile.webp';
?>

<nav>
    <div class="container nav-container">
        
        <div class="left-nav">
            <a href="/">
                <img id="nav-logo" src="/public/icons/logo.svg" alt="Toco logo" draggable="false">
            </a>

            <ul class="nav-menu">
                <li><a href="<?php echo $username ? '/learn' : '/login'; ?>" class="text-sm text-black">Learn</a></li>
                <li><a href="/#" class="text-sm text-black">Articles</a></li>
                <li><a href="/#" class="text-sm text-black">Bootcamp</a></li>
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
                        <span class="text-sm"><?php echo $username; ?>'s CMS</span>
                    <?php else : ?>
                        <span class="text-sm"><?php echo $username; ?>'s learning</span>
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
            <li><a href="/#" class="text-sm text-black">Articles</a></li>
            <li><a href="/#" class="text-sm text-black">Bootcamp</a></li>
            <?php if ($username) : ?>
                <li><a href="/logout" class="text-sm text-black"><?php echo $username; ?>'s learning</a></li>
                <?php if ($is_admin) : ?>
                    <li><a href="/admin/dashboard" class="text-sm text-black">CMS</a></li>
                <?php else : ?>
                    <li><a href="/profile" class="text-sm text-black">Profile</a></li>
                <?php endif; ?>
                <li><a href="../../../api/auth/logout.php" class="text-sm text-black">Logout</a></li>
            <?php else : ?>
                <li><a href="/login" class="login-btn text-sm primary-button font-reg">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<script src="/public/js/navbar.js"></script>
