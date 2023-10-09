<?php
?>

<div class="mylearning">
    <div class="mylearning-container">
        <h1 class="mylearning-header text-xl font-bold text-blue-purple-gradient">
            My Learning
        </h1>
        <div class="overall-container">
            <h2 class="overall-header">
                Overall Progress
            </h2>
            <div class="overall-card">
                <div class="overall-languages font-bold text-md">
                    <?= $data["userLanguageCount"] ?> Languages
                    <img id="trophy-logo" src="/public/icons/trophy.svg" alt="Trophy" draggable="false" height="20px">
                </div>
                <div class="right-card font-reg text-sm">
                    <span class="overall-modules">
                        <?= $data["userModuleCount"] ?> Modules
                    </span>
                    <span class="overall-videos">
                        <?= $data["userVideoCount"] ?> Videos
                    </span>
                </div>
            </div>
        </div>
        <div class="progress-container">
            <h2 class="progress-header">
                Progress
            </h2>
            <?php foreach ($data["userLanguage"] as $index => $language): ?>
                <div class="progress-card">
                    <div class="progress-languages font-bold text-md">
                        <?= $language['language_name'] ?>
                    </div>
                    <div class="right-card font-reg text-sm">
                        <span class="progress-modules">
                            <?= isset($data["userModuleCountEachLanguage"][$index]['total_modules']) ? $data["userModuleCountEachLanguage"][$index]['total_modules'] : 0 ?>
                            Modules
                        </span>
                        <span class="progress-videos">
                            <?= isset($data["userVideoCountEachLanguage"][$index]['total_videos']) ? $data["userVideoCountEachLanguage"][$index]['total_videos'] : 0 ?>
                            Videos
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>