<?php
function submitQuiz($exerciseId, $exerciseName, $selectedOptions, $userId, $isDone)
{
    // rest submit exercise
    $pairs = array();

    if ($selectedOptions) {
        $selectedOptions = rtrim($selectedOptions, '.');
        $pairs = explode(',', $selectedOptions);
    }


    $submitData = [];

    foreach ($pairs as $pair) {
        list($questionId, $optionId) = explode(':', $pair);
        $submitData["question_" . $questionId] = $optionId;
    }

    $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, "http://express:5000/exercise/result/" . $exerciseId);
    curl_setopt($ch, CURLOPT_URL, "http://172.20.10.2:5000/exercise/result/" . $exerciseId);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
        $ch, 
        CURLOPT_POSTFIELDS, 
        json_encode(
            array(
                "selectedOptions" => $submitData,
                "userId" => (int)$userId,
            )
        )
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);

    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);

        $correctResults = $data['correctResults'];
        $wrongResults = $data['wrongResults'];

        $correctCount = count($correctResults);
        $wrongCount = count($wrongResults);

        $score = $correctCount / ($correctCount + $wrongCount) * 100;

        // echo 'Quiz submitted successfully. Score: ' . $score;
    }

    curl_close($ch);

    if ($isDone) {
        return $score;
    }

    // rest add progress
    $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, "http://express:5000/progress/create");
    curl_setopt($ch, CURLOPT_URL, "http://172.20.10.2:5000/progress/create");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        json_encode(
            array(
                "user_id" => (int)$userId,
                "exercise_id" => (int)$exerciseId,
                "score" => $score
            )
        )
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);
        // echo 'Progress added successfully. Progress id: ' . $data['result']['progress_id'];
    }

    return $score;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitQuiz'])) {
    $exerciseId = $_POST['exerciseId'];
    $exerciseName = $_POST['exerciseName'];
    $userId = $_POST['userId'];
    $isDone = $_POST['isDone'];
    $selectedOptions = isset($_POST['selectedOptions']) ? $_POST['selectedOptions'] : [];

    $score = submitQuiz($exerciseId, $exerciseName, $selectedOptions, $userId, $isDone);

    header('Location: ../../exercise/result/' . $exerciseId . '?name=' . $exerciseName . '&score=' . $score . '&isDone=' . $isDone);
}
?>