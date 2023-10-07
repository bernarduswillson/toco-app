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
    </div>
</div>

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
</style>