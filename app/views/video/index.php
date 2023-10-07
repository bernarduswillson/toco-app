<?php
?>

<div class="module-video">
    <div class="video-container">
        <h1 class="video-header text-l font-bold text-blue-purple-gradient">
            <?= $data["video"]["video_name"] ?>
        </h1>
        <div class="video-player">
            <video width="1280" height="720" controls>
                <source src="<?= $data["video"]["video_url"] ?>" type="video/mp4">
            </video>
        </div>
        <div class="video-description">
            <p class="text-reg text-black text-sm">
                <?= $data["video"]["video_desc"] ?>
            </p>
        </div>
    </div>
</div>