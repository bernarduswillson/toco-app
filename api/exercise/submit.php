<?php
function submitQuiz($exerciseId, $selectedOption)
{
    $selectedOption = rtrim($selectedOption, '.');

    $pairs = explode(',', $selectedOption);

    $submitData = [];

    foreach ($pairs as $pair) {
        list($questionId, $optionId) = explode(':', $pair);
        $submitData["question_" . $questionId] = $optionId;
    }

    var_dump($submitData);
    var_dump($exerciseId);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://172.20.10.2:5000/exercise/result/" . $exerciseId);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($submitData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);

    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);
        echo 'Quiz submitted successfully: ' . print_r($data, true);
    }

    curl_close($ch);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitQuiz'])) {
    $exerciseId = $_POST['exerciseId'];
    $selectedOption = isset($_POST['selectedOption']) ? $_POST['selectedOption'] : [];

    submitQuiz($exerciseId, $selectedOption);
}
?>