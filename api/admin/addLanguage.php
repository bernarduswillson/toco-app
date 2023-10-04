<?php
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/LanguageModel.php';

$language_model = new LanguageModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $language_name = $_POST['languageName'];
    $language_image = $_POST['new-language-pic'];
    $language = $language_model->addLanguage($language_name, $language_image);
    header('Location: ../../admin/manage');
    exit();
} else {
    echo 'Invalid request.';
}
?>