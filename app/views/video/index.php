<div class="module-video">
    <div class="video-container">
        <h1 class="video-header text-l font-bold text-blue-purple-gradient">
            <?= $data["video"]["video_name"] ?>
        </h1>
        <div class="video-player" id="video_w">
            <video controls>
                <source src="<?= $data["video"]["video_url"] ?>" type="video/mp4">
            </video>
        </div>
        <div class="video-description">
            <p class="text-reg text-black text-sm">
                <?= $data["video"]["video_desc"] ?>
            </p>
        </div>
        <form action="../../../../api/main/addFinished.php" method="post">
            <div class="video-button-container">
                <button class="distinct-button font-reg text-sm" id="btn-back" name="back">
                    Back
                </button>
                <input type="hidden" name="video_id" value="<?= $data["video_id"] ?>">
                <input type="hidden" name="module_id" value="<?= $data["module_id"] ?>">
                <input type="hidden" name="language_id" value="<?= $data["language_id"] ?>">
                <input type="hidden" name="user_id" value="<?= $data["user_id"] ?>">
                <button type="submit" class="distinct-button font-reg text-sm" id="btn-finish">
                    Next
                </button>
            </div>
        </form>
    </div>
</div>