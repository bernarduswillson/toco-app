<div class="module-video">
    <div class="video-container">
        <h1 class="video-header text-xl font-bold text-blue-purple-gradient">
            <?php echo $data["video_title"]; ?>
        </h1>
        <div class="video-player">
            <iframe src="<?php echo $data["video_url"]; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>