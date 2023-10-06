<?php
session_start();
require_once '../../config/config.php';
require_once '../../app/core/App.php';
require_once '../../app/core/Database.php';
require_once '../../app/models/UserModel.php';

$user_model = new UserModel();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        if (isset($_SESSION['username'])) {
            session_unset();
        }
        header('Location: ../../');
        exit();
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $profile_pic = $_POST['new-profile-pic'];

        $user_model->updateProfile($_SESSION['user_id'], $username, $email, $profile_pic);

        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['profile_pic'] = $profile_pic;
        header('Location: ../../profile');
        exit();
    }
} else {
    echo 'Invalid request.';
}
?>