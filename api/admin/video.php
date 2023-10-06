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
    if ($video_order > $order + 1) {
        echo json_encode(array('status' => 'error', 'message' => 'Max order is ' . ($order + 1)));
    } else {
        http_response_code(200);
        echo json_encode(array('status' => 'success', 'message' => 'Order valid'));
    }
}

if (isset($_POST['videoName']) && isset($_POST['new-video']) && isset($_POST['order']) && isset($_POST['moduleId'])) {
    $data['video_name'] = $_POST['videoName'];
    $data['description'] = $_POST['description'];
    $data['video_url'] = $_POST['new-video'];
    $data['video_order'] = $_POST['order'];
    $data['module_id'] = $_POST['moduleId'];

    $video_model->addVideo($data);
    header('Location: /admin/manage/' . $_POST['languageId'] . '/' . $_POST['moduleId']);
    echo json_encode(array('status' => 'success', 'message' => 'VIdeo created'));
}