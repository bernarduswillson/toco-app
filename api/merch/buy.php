<?php
function buyItem($merchId, $userId, $email)
{
    // rest buy merchandise
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://express:5000/merch/buy/" . $merchId);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        json_encode(
            array(
                "user_id" => (int)$userId,
                "email" => $email
            )
        )
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);

    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);
    }

    if ($data["message"] === "success") {
        $isSuccess = 1;
    } else if ($data["message"] === "insufficient gems") {
        $isSuccess = 0;
    } else {
        $isSuccess = -1;
    }

    return $isSuccess;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buyMerch'])) {
    $merchId = $_POST['merchId'];
    $userId = $_POST['userId'];
    $email = $_POST['email'];

    $isSuccess = buyItem($merchId, $userId, $email);

    header('Location: ../../merchandise/confirmation/' . $merchId . '/?success=' . $isSuccess);
}
?>