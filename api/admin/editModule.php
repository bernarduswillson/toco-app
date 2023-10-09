<?php

require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/ModuleModel.php';
session_start();

$module_model = new ModuleModel();
$xml = file_get_contents('php://input');
$data = json_decode($xml, true);

if (isset($data['order'])) {
    $module_order = $data['order'];
    $order = $module_model->getHighestModuleOrder($data['language_id']);
    if ($module_order > $order) {
        echo json_encode(array('status' => 'error', 'message' => 'Choose a number between 1 and ' . $order));
    } else {
        http_response_code(200);
        echo json_encode(array('status' => 'success', 'message' => 'Order valid'));
    }
}

if (isset($_POST['delete'])) {
    $module_id = $_POST['module_id'];

    $module_model->deleteModule($module_id);
    header('Location: ../../../../admin/manage/' . $_POST['language_id']);
    echo json_encode(array('status' => 'success', 'message' => 'Module deleted'));
} else if (isset($_POST['moduleName']) && isset($_POST['category']) && isset($_POST['difficulty']) && isset($_POST['order']) && isset($_POST['language_id'])) {
    $data['module_id'] = $_POST['module_id'];
    $data['module_name'] = $_POST['moduleName'];
    $data['category'] = $_POST['category'];
    $data['difficulty'] = $_POST['difficulty'];
    $data['module_order'] = $_POST['order'];
    $data['language_id'] = $_POST['language_id'];
    $data['old_module_order'] = $_POST['module_order'];

    if ($data['module_order'] < $data['old_module_order']) {
        $module_model->adjustModuleOrder1($data['language_id'], $data['module_order'], $data['old_module_order']);
    } else if ($data['module_order'] > $data['old_module_order']) {
        $module_model->adjustModuleOrder2($data['language_id'], $data['module_order'], $data['old_module_order']);
    }
    $module_model->editModule($data);
    $_SESSION["changes"] = "success";
    header('Location: ../../../../admin/edit/' . $data['language_id'] . "/" . $data['module_id']);
    echo json_encode(array('status' => 'success', 'message' => 'Module edited'));
}