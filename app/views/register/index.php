<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/register.css">
    <link rel="stylesheet" href="../../../public/css/global.css">
    <script src="../../../public/js/register.js"></script>
</head>
<body>
    <div class="register">
        <div class="left-register">
        </div>
        <div class="right-register">
            <div class="right-register2">
                <img class="register-image" src="../../../public/img/logo.svg" alt="Logo" height="50px">
                <h1 class="register-header">
                    Register
                </h1>
                <div class="register-field">
                    <h2 class="register-email">
                        Email
                    </h2>
                    <input type="email" name="email" id="email" class="register-email-input" placeholder="Your email" onchange="checkEmail()" required>
                    <p id="email-error"></p>
                    <h2 class="register-username">
                        Username
                    </h2>
                    <input type="text" name="username" id="username"class="register-username-input" placeholder="Your username" onchange="checkUsername()" required>
                    <p id="username-error"></p>
                    <h2 class="register-password">
                        Password
                    </h2>
                    <input type="password" name="password" id="password"class="register-password-input" placeholder="Your password" onchange="checkPassword()" required>
                    <p id="password-error"></p>
                    <h2 class="register-confirm">
                        Confirm Password
                    </h2>
                    <input type="password" name="confirm-password" id="confirm-password"class="register-confirm-input" placeholder="Confirm your password" onchange="checkPassword()">
                    <p id="confirm-password-error"></p>
                </div>
                <div class="button-container">
                    <a href="/?dashboard">
                        <button type="submit" class="register-button" id="register-button" disabled>
                            Register
                        </button>
                    </a>
                </div>
                <h3 class="register-desc1">
                    <a href="/?login" class="register-desc1-click">
                    Already have an account? Login here
                    </a>
                </h3>
            </div>
        </div>
    </div>
</body>
</html>
