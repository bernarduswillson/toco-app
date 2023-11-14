<?php
function buyItem($merchId, $userId)
{
    // rest buy merchandise
    $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, "http://express:5000/merch/buy/" . $merchId);
    curl_setopt($ch, CURLOPT_URL, "http://192.168.0.11:5000/merch/buy/" . $merchId);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        json_encode(
            array(
                "user_id" => (int)$userId
            )
        )
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    var_dump($response);

    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buyMerch'])) {
    $merchId = $_POST['merchId'];
    $userId = $_POST['userId'];

    buyItem($merchId, $userId);
}
?>