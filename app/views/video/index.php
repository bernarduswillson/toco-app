<!DOCTYPE html>
<html>
<head>
    <title>My Video Page</title>
    <link rel="stylesheet" href="../../../public/css/video.css">
</head>
<body>
    <div class="module-video">
        <div class="video-container">
            <h1 class="video-header text-l font-bold text-blue-purple-gradient">
                <?php echo implode($data["video_name"]); ?>
            </h1>
            <div class="video-player">
                <video width="1280" height="720" controls>
                    <source src="<?php echo implode($data["video_url"]); ?>" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</body>
</html>