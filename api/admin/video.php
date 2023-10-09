<?php

require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/VideoModel.php';
require_once '../../app/models/ProgressModel.php';
require_once '../../app/models/UserModel.php';

$video_model = new VideoModel();
$progress_model = new ProgressModel();
$user_model = new UserModel();
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
    $isProgress = $progress_model->isProgress($_POST['user_id'], $data['module_id']);
    $userIds = $user_model->getAllUserIds();

    foreach ($userIds as $user) {
        $user_id = $user['user_id'];
        $isProgress = $progress_model->isProgress($user_id, $data['module_id']);

        if ($isProgress == 1) {
            $progress_model->deleteProgress($user_id, $data['module_id']);
        }
    }
    header('Location: /admin/manage/' . $_POST['languageId'] . '/' . $data['module_id']);
    echo json_encode(array('status' => 'success', 'message' => 'Video created'));
}