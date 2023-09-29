<?php
?>

<nav>
    <div class="container nav-container">
        
        <div class="left-nav">
            <a href="/">
                <img id="nav-logo" src="/public/icons/logo.svg" alt="Toco logo">
            </a>

            <ul class="nav-menu">
                <li><a href="/?learn" class="text-sm text-black">Learn</a></li>
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

            <a href="/?login">
                <button class="login-btn text-sm primary-button font-reg">
                    Login
                </button>
            </a>
        </div>

    </div>
    <div class="dropdown-menu">
        <ul>
            <li><a href="/?learn" class="text-sm text-black">Learn</a></li>
            <li><a href="/#" class="text-sm text-black">Articles</a></li>
            <li><a href="/#" class="text-sm text-black">Bootcamp</a></li>
            <li><a href="/?login" class="login-btn text-sm primary-button font-reg">Login</a></li>
        </ul>
    </div>
</nav>
<script src="/public/js/navbar.js"></script>
