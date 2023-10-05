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
                <iframe src="<?php echo implode($data["video_url"]); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</body>
</html>