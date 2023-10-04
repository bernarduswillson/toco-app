<?php
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/VideoModel.php';

$video_model = new VideoModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['video_name'] = $_POST['videoName'];
    $data['description'] = $_POST['description'];
    $data['video_url'] = $_POST['videoUrl'];
    $data['video_order'] = $_POST['order'];
    $data['module_id'] = $_POST['moduleId'];

    $video_model->addVideo($data);
    header('Location: /admin/manage/' . $_POST['languageId'] . '/' . $_POST['moduleId']);
    exit();
} else {
    echo 'Invalid request.';
}
?>