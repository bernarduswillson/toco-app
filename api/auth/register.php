<?php

require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/UserModel.php';
require_once '../../app/models/ProgressModel.php';
require_once '../../app/models/LanguageModel.php';

$user_model = new UserModel();
$progress_model = new ProgressModel();
$language_model = new LanguageModel();
$xml = file_get_contents('php://input');
$data = json_decode($xml, true);


if (isset($data['username'])) {
  $username = $data['username'];
  $user = $user_model->getUserByUsername($username);
  if ($user == null) {
    http_response_code(200);
    echo json_encode(array('status' => 'success', 'message' => 'User not found'));
  } else {
    echo json_encode(array('status' => 'error', 'message' => 'User exists'));
  }
}

if (isset($data['email'])) {
  $email = $data['email'];
  $user = $user_model->getUserByEmail($email);
  if ($user == null) {
    http_response_code(200);
    echo json_encode(array('status' => 'success', 'message' => 'User not found'));
  } else {
    echo json_encode(array('status' => 'error', 'message' => 'User exists'));
  }
}


if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $rows = $user_model->register(array('username' => $username, 'password' => $password, 'email' => $email));

  if ($rows && $language_rows && $progress_rows) {
    header('Location: ../../login');
    echo json_encode(array('status' => 'success', 'message' => 'User created'));

  } else {
    $_SESSION['error'] = "Something went wrong";
    header('Location: ../../register');
  }
}
