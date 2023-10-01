<?php
session_start();
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/User.php';

$user_model = new UserModel();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $profile_pic = $_POST['new-profile-pic'];

    $user_model->updateProfile($username, $email, $profile_pic);

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['profile_pic'] = $profile_pic;
    header('Location: ../../profile');
    exit();
} else {
    echo 'Invalid request.';
}
?>