<?php
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/ModuleModel.php';

$module_model = new ModuleModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $module_id = $_POST['module_id'];

        $module_model->deleteModule($module_id);
        header('Location: ../../../../admin/manage/' . $_POST['language_id']);
        exit();
    } else {
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
        header('Location: ../../../../admin/manage/' . $data['language_id']);
        exit();
    }
} else {
    echo 'Invalid request.';
}
?>
