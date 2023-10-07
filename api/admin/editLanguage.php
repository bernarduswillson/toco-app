<?php

require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/LanguageModel.php';

$language_model = new LanguageModel();
$xml = file_get_contents('php://input');
$data = json_decode($xml, true);

if (isset($data['language'])) {
    $language_name = $data['language'];
    $language = $language_model->getLanguageByName($language_name);
    if ($language == null) {
        http_response_code(200);
        echo json_encode(array('status' => 'success', 'message' => 'Language not found'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Language exists'));
    }
}

if (isset($_POST['delete'])) {
    $language_id = $_POST['language-id'];
    $language = $language_model->deleteLanguage($language_id);
    if ($language == null) {
        echo json_encode(array('status' => 'error', 'message' => 'Language not found'));
    } else {
        header('Location: ../../admin/manage');
        echo json_encode(array('status' => 'success', 'message' => 'Language deleted'));
    }
} else if (isset($_POST['languageName']) && isset($_POST['new-language-pic'])) {
    $language_name = $_POST['languageName'];
    $language_image = $_POST['new-language-pic'];
    $language = $language_model->editLanguage($_POST['language-id'], $language_name, $language_image);

    if ($language == null) {
        echo json_encode(array('status' => 'error', 'message' => 'Language exists'));
    } else {
        header('Location: ../../admin/manage');
        echo json_encode(array('status' => 'success', 'message' => 'Language updated'));
    }
}