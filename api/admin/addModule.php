<?php
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/ModuleModel.php';

$module_model = new ModuleModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['module_name'] = $_POST['moduleName'];
    $data['category'] = $_POST['category'];
    $data['difficulty'] = $_POST['difficulty'];
    $data['module_order'] = $_POST['order'];
    $data['language_id'] = $_POST['language_id'];

    $module_model->addModule($data);
    header('Location: /admin/manage/' . $data['language_id']);
    exit();
} else {
    echo 'Invalid request.';
}
?>