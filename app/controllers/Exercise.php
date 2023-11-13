<?php

class Exercise extends Controller
{
  public function index()
  {
    $this->validateSession();
    
    $data["pageTitle"] = "Test your knowledge!";
    $data["languages"] = $this->model("LanguageModel")->getAllLanguage();

    $baseUrl = 'http://172.20.10.2:5000/exercise';
    $ch = curl_init($baseUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $exercise = json_decode($response, true);

    $data["exercise"] = $exercise['result'];

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('exercise/index', $data);
    $this->view('footer/index');
  }

  public function question($exerciseId = null)
  {
    $this->validateSession();

    // $this->validateParamQuestion($questionId);

    // Question
    if (isset($exerciseId) && !empty($exerciseId)) {
      $data["pageTitle"] = "Test your knowledge!";
      $data["user_id"] = $_SESSION['user_id'];
      $data["exercise_id"] =  intval($exerciseId);

      $baseUrl = 'http://172.20.10.2:5000/exercise';
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

      $baseUrl = 'http://172.20.10.2:5000/question/' . $data["exercise_id"];
      $ch = curl_init($baseUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $question = json_decode($response, true);

      $data["question"] = $question['result'][0]; // ini '0' bisa diganti page

      $baseUrl = 'http://172.20.10.2:5000/option/' . $data["question"]["question_id"];
      $ch = curl_init($baseUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $option = json_decode($response, true);

      $data["option"] = $option['result'];
      
      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('question/index', $data);
      $this->view('footer/index');
    }
  }

  public function validateParamQuestion($questionId)
  {
    if (isset($questionId) && !empty($questionId)) {
      // if ($this->model("VideoModel")->validateById($moduleId, $videoId)) {
      //   return;
      // }
      $this->show404();
      exit();
    }
  }
}