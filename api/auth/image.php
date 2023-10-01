<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo 'Error during file upload.';
        exit();
    }
    $fileName = $file['name'];
    $destination = '../../public/profpic/' . $fileName;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        echo $destination;
    } else {
        echo 'Error while saving the file.';
    }
} else {
    echo 'Invalid request.';
}
?>
