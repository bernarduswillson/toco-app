<?php
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/VideoModel.php';

$video_model = new VideoModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $video_id = $_POST['video_id'];

        $video_model->deleteVideo($video_id);
        header('Location: ../../../../admin/manage/' . $_POST['language_id'] . '/' . $_POST['module_id']);
        exit();
    } else {
        $data['video_id'] = $_POST['video_id'];
        $data['video_name'] = $_POST['videoName'];
        $data['description'] = $_POST['description'];
        $data['video_url'] = $_POST['videoUrl'];
        $data['video_order'] = $_POST['order'];
        $data['module_id'] = $_POST['module_id'];
        $data['old_video_order'] = $_POST['video_order'];

        $video_model->editVideo($data);
        header('Location: ../../../../admin/manage/' . $_POST['language_id'] . '/' . $_POST['module_id']);
        exit();
    }
} else {
    echo 'Invalid request.';
}
?>
