<?php
?>

    <div class="login">
        <div class="left-login">
        </div>
        <div class="right-login">
            <div class="right-login2">
                <img class="login-image" src="../../../public/icons/logo.svg" alt="Logo" height="50px">
                <h1 class="login-header">
                    Login
                </h1>
                <form action="../../../api/auth/login.php" method="post">
                    <div class="login-field">
                        <h2 class="login-username">
                            Username
                        </h2>
                        <input type="text" name="username" id="username" class="login-username-input" placeholder="Your username" required>
                        <h2 class="login-password">
                            Password
                        </h2>
                        <input type="password" name="password" id="password" class="login-password-input" placeholder="Your password" required>
                    </div>
                    <p class="login-error">
                    <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        ?>
                    </p>
                    <div class="button-container">
                        <button class="login-button" type="submit">
                            Login
                        </button>
                    </div>
                </form>
                <h3 class="login-desc1">
                    <a class="login-desc1-click" href="/register">
                        Don't have an account yet? Register here
                    </a>
                </h3>
                <h3 class="login-desc2">
                    <a class="login-desc2-click" href="https://www.tiktok.com/@beweeee/video/7216658880758172955">
                        Forgot password?
                    </a>
                </h3>
            </div>
        </div>
    </div>
</body>
</html>
