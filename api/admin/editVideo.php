<?php

require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/VideoModel.php';

$video_model = new VideoModel();
$xml = file_get_contents('php://input');
$data = json_decode($xml, true);

if (isset($data['order'])) {
    $video_order = $data['order'];
    $order = $video_model->getHighestVideoOrder($data['module_id']);
    if ($video_order > $order) {
        echo json_encode(array('status' => 'error', 'message' => 'Choose a number between 1 and ' . $order));
    } else {
        http_response_code(200);
        echo json_encode(array('status' => 'success', 'message' => 'Order valid'));
    }
}

if (isset($_POST['delete'])) {
    $video_id = $_POST['video_id'];

    $video_model->deleteVideo($video_id);
    header('Location: ../../../../admin/manage/' . $_POST['language_id'] . '/' . $_POST['module_id']);
} else if (isset($_POST['videoName']) && isset($_POST['new-video']) && isset($_POST['order']) && isset($_POST['module_id'])) {
    $data['video_id'] = $_POST['video_id'];
    $data['video_name'] = $_POST['videoName'];
    $data['description'] = $_POST['description'];
    $data['video_url'] = $_POST['new-video'];
    $data['video_order'] = $_POST['order'];
    $data['module_id'] = $_POST['module_id'];
    $data['old_video_order'] = $_POST['video_order'];

    if ($data['video_order'] < $data['old_video_order']) {
        $video_model->adjustVideoOrder1($data['module_id'], $data['video_order'], $data['old_video_order']);
    } else if ($data['video_order'] > $data['old_video_order']) {
        $video_model->adjustVideoOrder2($data['module_id'], $data['video_order'], $data['old_video_order']);
    }
    $video_model->editVideo($data);
    header('Location: ../../../../admin/manage/' . $_POST['language_id'] . '/' . $_POST['module_id']);
}