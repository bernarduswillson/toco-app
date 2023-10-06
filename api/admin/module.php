<?php

require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/ModuleModel.php';

$module_model = new ModuleModel();
$xml = file_get_contents('php://input');
$data = json_decode($xml, true);

if (isset($data['order'])) {
    $module_order = $data['order'];
    $order = $module_model->getHighestModuleOrder($data['language_id']);
    if ($module_order > $order + 1) {
        echo json_encode(array('status' => 'error', 'message' => 'Max order is ' . ($order + 1)));
    } else {
        http_response_code(200);
        echo json_encode(array('status' => 'success', 'message' => 'Order valid'));
    }
}

if (isset($_POST['moduleName']) && isset($_POST['category']) && isset($_POST['difficulty']) && isset($_POST['order']) && isset($_POST['language_id'])) {
    $data['module_name'] = $_POST['moduleName'];
    $data['category'] = $_POST['category'];
    $data['difficulty'] = $_POST['difficulty'];
    $data['module_order'] = $_POST['order'];
    $data['language_id'] = $_POST['language_id'];

    $module_model->addModule($data);
    header('Location: /admin/manage/' . $data['language_id']);
    echo json_encode(array('status' => 'success', 'message' => 'Module created'));
}