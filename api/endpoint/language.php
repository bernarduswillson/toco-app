<?php
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/LanguageModel.php';

$language_model = new LanguageModel();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $languages = $language_model->getAllLanguage();
    $data = [
        'status' => 'success',
        'message' => $languages,
    ];
} else {
    $data = [
        'message' => 'Unsupported request method',
    ];
}
echo json_encode($data);
?>
