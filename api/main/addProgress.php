<?php
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/ProgressModel.php';
session_start();

$progress_model = new ProgressModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $language_id = $_POST['language_id'];
    $existingProgress = $progress_model->getLanguageProgressCount($_SESSION['user_id'], $language_id);
    if (intval($existingProgress) === 0) {
        $progress_model->initialize($_SESSION['user_id'], $language_id);
    }
    header('Location: ../../learn/lesson/' . $language_id);
    exit();
} else {
    echo 'Invalid request.';
}
?>