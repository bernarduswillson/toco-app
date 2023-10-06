<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['video'])) {
    $file = $_FILES['video'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo 'Error during file upload.';
        exit();
    }
    $fileName = $file['name'];
    $destination = '../../public/imgdata/video/' . $fileName;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        echo $destination;
    } else {
        echo 'Error while saving the file.';
    }
} else {
    echo 'Invalid request.';
}
?>
