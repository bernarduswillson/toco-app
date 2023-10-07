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
            <input type="hidden" name="video_id" value="<?= $data["video_id"] ?>">
            <input type="hidden" name="module_id" value="<?= $data["module_id"] ?>">
            <input type="hidden" name="language_id" value="<?= $data["language_id"] ?>">
            <input type="hidden" name="user_id" value="<?= $data["user_id"] ?>">
            <button type="submit" class="distinct-button font-reg text-sm" id="btn-next">
                Next
            </button>
        </form>
    </div>
</div>
<!-- 
<script>
    $(document).ready(function () {
        var video_w = $('#video_w');
        var videoRatio = 1.77;
        var windowRatio = 1.6; //this is width to height ratio of video.
        $(window).resize(function () {
            setVideoHeight();
        });
        function setVideoHeight() {
            windowRatio = $(window).width() / $(window).height();
            video_w.addClass('resized');
            if (windowRatio < videoRatio) {
                video_w.width($(window).width());
                video_w.height(video_w.width() / videoRatio);
            }
            else {

                video_w.height($(window).height());
                video_w.width(video_w.height().videoRatio);
            }
        }
    });
</script>

<style>
    #video_w video {
        width: 100%;
    }

    #video_w.resized video {
        width: 100% !important;
        height: 100% !important;
    }

    .row_video {
        margin: 0;
    }
</style> -->