<?php

class Exercise extends Controller
{
  public function index()
  {
    $this->validateSession();

    $data["pageTitle"] = "Test your knowledge!";
    $data["user_id"] = $_SESSION['user_id'];
    $data["languages"] = $this->model("LanguageModel")->getAllLanguage();

    // get exercises
    // $baseUrl = 'http://express:5000/exercise';
    $baseUrl = 'http://192.168.0.11:5000/exercise';
    $ch = curl_init($baseUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $exercise = json_decode($response, true);

    $data["exercise"] = $exercise['result'];

    // progress
    // $baseUrl = 'http://express:5000/progress/user/' . $data["user_id"];
    $baseUrl = 'http://192.168.0.11:5000/progress/user/' . $data["user_id"];
    $ch = curl_init($baseUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $progress = json_decode($response, true);

    $data["progress"] = $progress['result'];

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('exercise/index', $data);
    $this->view('footer/index');
  }

  public function question($exerciseId = null)
  {
    $this->validateSession();
    $this->validateParamExercise($exerciseId);

    // Question
    if (isset($exerciseId) && !empty($exerciseId)) {
      $data["pageTitle"] = "Test your knowledge!";
      $data["exercise_id"] = intval($exerciseId);
      $data["user_id"] = $_SESSION['user_id'];

      // selected exercise
      // $baseUrl = 'http://express:5000/exercise';
      $baseUrl = 'http://192.168.0.11:5000/exercise';
      $ch = curl_init($baseUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $exercise = json_decode($response, true);

      $data["exercise"] = $exercise['result'];

      foreach ($data["exercise"] as $exercise) {
        if ($exercise["exercise_id"] === $data["exercise_id"]) {
          $data["currentExercise"] = $exercise;
          break;
        }
      }

      // progress
      // $baseUrl = 'http://express:5000/progress/user/' . $data["user_id"];
      $baseUrl = 'http://192.168.0.11:5000/progress/user/' . $data["user_id"];
      $ch = curl_init($baseUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $progress = json_decode($response, true);

      $data["progress"] = $progress['result'];
      $data["isDone"] = false;
      foreach ($data["progress"] as $progress) {
        if ($progress["exercise_id"] === $data["exercise_id"]) {
          $data["isDone"] = true;
          break;
        }
      }

      // questions
      // $baseUrl = 'http://express:5000/question/' . $data["exercise_id"];
      $baseUrl = 'http://192.168.0.11:5000/question/' . $data["exercise_id"];
      $ch = curl_init($baseUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $question = json_decode($response, true);

      $data["questions"] = $question['result'];

      // options
      foreach ($data["questions"] as &$question) {
        // $baseUrl = 'http://express:5000/option/' . $question["question_id"];
        $baseUrl = 'http://192.168.0.11:5000/option/' . $question["question_id"];
        $ch = curl_init($baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $option = json_decode($response, true);

        $question["options"] = $option['result'];

        curl_close($ch);
      }
      unset($question);

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('question/index', $data);
      $this->view('footer/index');
    }
  }

  public function validateParamExercise($exerciseId)
  {
    if (isset($exerciseId) && !empty($exerciseId)) {
      // $baseUrl = 'http://express:5000/exercise/validate/' . $exerciseId;
      $baseUrl = 'http://192.168.0.11:5000/exercise/validate/' . $exerciseId;
      $ch = curl_init($baseUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $valid = json_decode($response, true);

      if ($valid['result'] === true) {
        return;
      }
      
      $this->show404();
      exit();
    }
  }
}