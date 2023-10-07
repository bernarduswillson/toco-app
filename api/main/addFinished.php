<?php
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/ProgressModel.php';
require_once '../../app/models/VideoModel.php';

$progress_model = new ProgressModel();
$video_model = new VideoModel();
$xml = file_get_contents('php://input');
$data = json_decode($xml, true);

$video_id = $_POST['video_id'];
$module_id = $_POST['module_id'];
$language_id = $_POST['language_id'];

$video_order = $video_model->getVideoOrder($video_id);

if (isset($_POST['back'])) {
    if ($video_order == 1) {
        header('Location: ../../learn/lesson/' . $_POST['language_id']);
    } else if ($video_order > 1) {
        $prev_video_id = $video_model->getVideoIdByOrder($module_id, $video_order - 1);
        header('Location: ../../learn/lesson/' . $language_id . '/' . $module_id . '/' . $prev_video_id);
    }
} else if (isset($_POST['video_id']) && isset($_POST['module_id']) && isset($_POST['language_id'])) {
    $user_id = $_POST['user_id'];

    $highest_video_order = $video_model->getHighestVideoOrder($module_id);
    $is_finished = $progress_model->isUserVideoFinished($user_id, $video_id);
    $video_count = $video_model->getVideoCountByModuleId($module_id);
    $video_finished_count = $progress_model->getUserVideoFinishedCount($user_id, $module_id);
    
    if ($is_finished == 0) {
        $progress_model->addVideoResult($user_id, $video_id);
    }

    if ($video_count == $video_finished_count + 1) {
        $progress_model->addModuleResult($user_id, $module_id);
    }

    if ($video_order == $highest_video_order) {
        header('Location: ../../learn/lesson/' . $language_id);
    } else if ($video_order < $highest_video_order) {
        $next_video_id = $video_model->getVideoIdByOrder($module_id, $video_order + 1);
        header('Location: ../../learn/lesson/' . $language_id . '/' . $module_id . '/' . $next_video_id);
    }
}