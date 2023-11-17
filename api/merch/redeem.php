<?php
function redeem($voucher, $userId)
{
    // rest buy merchandise
    $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, "http://express:5000/voucher/use/" . $voucher);
    curl_setopt($ch, CURLOPT_URL, "http://172.20.10.2:5000/voucher/use/" . $voucher);
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

    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);
    }

    if ($data["message"] === "success") {
        $isSuccess = 1;
    } else {
        $isSuccess = 0;
    }

    return $isSuccess;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['redeemVoucher'])) {
    $userId = $_POST['userId'];
    $voucher = $_POST['voucher'];

    $isSuccess = redeem($voucher, $userId);

    header('Location: ../../merchandise');
}
?>