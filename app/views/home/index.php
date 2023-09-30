<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>

        <div class="home">
            <div class="home-container container">
                
                <!-- Hero -->

                <div class="hero-container">
                    <div class="left-home">
                        <h2 class="text-md font-reg text-blue">
                            Fluency Awaits:
                        </h2>
                        <h1 class="text-xl font-bold text-blue-purple-gradient">
                            Your Path to <br> Multilingual Excellence
                        </h1>                        
                        <a class="distinct-button get-started-btn font-reg text-sm" href="<?php echo $username ? '/?learn' : '/?login'; ?>">
                            Get Started
                        </a>
                    </div>
                    <div class="right-home">
                        <img class="home-image" src="/public/icons/earth.svg" alt="Earth" draggable="false">
                    </div>
                </div>

                <!-- About -->

                <div class="about-container">
                    <img id="about-logo" src="/public/icons/logo.svg" alt="Toco logo" draggable="false">
                    <h2 class="hidden">About</h2>
                    <p class="font-reg text-sm">
                        Learn new languages with Toco and achieve Multilingual Brilliance.
                        We configure our courses fo you and keep them entertaining and fun.
                    </p>
                    <img id="about-image" src="/public/images/about-image.png" alt="About image" draggable="false">
                </div>

                <!-- Features -->

                <div class="feature-container">
                    <h2 class="hidden">Features</h2>
                    <h2 class="font-bold text-xl text-blue-purple-gradient">Discover</h2>

                    <div class="feature-card-container">
                        <div class="feature-card left-card">
                            <img src="/public/images/feature-1.png" alt="Resources features" draggable="false">
                            <p class="font-reg text-sm text-black">
                                Explore a treasure trove of linguistic
                                possibilities with 52 diverse languages,
                                a whopping 631 modules, and an
                                extensive library of 3,155 instructional
                                videos at your fingertips.
                            </p>
                        </div>
                        <div class="feature-card">
                            <img src="/public/images/feature-2.png" alt="Resources features" draggable="false">
                            <p class="font-reg text-sm text-black">
                                Engage in a dynamic roleplay
                                session with our interactive chatbot,
                                and unlock invaluable feedback
                                that will supercharge your language
                                learning journey.
                            </p>
                        </div>
                        <div class="feature-card left-card">
                            <img src="/public/images/feature-3.png" alt="Resources features" draggable="false">
                            <p class="font-reg text-sm text-black">
                                Immerse yourself in global
                                conversations with native speakers
                                from around the world, elevating your
                                language learning experience to
                                new heights.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Banner -->

                <div class="banner-container">
                    <h2 class="text-xl text-blue-purple-gradient">Language mastery made simple.</h2>
                </div>

            </div>
        </div>