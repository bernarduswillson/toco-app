<?php

class Exercise extends Controller {
  public function index() {
    $this->validateSession();

    $data["pageTitle"] = "Test your knowledge!";
    $data["languages"] = $this->model("LanguageModel")->getAllLanguage();

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('exercise/index', $data);
    $this->view('footer/index');
  }

  public function question($exerciseId = null) {
    $this->validateSession();

    // $this->validateParamQuestion($questionId);

    // Question
    if (isset($exerciseId) && !empty($exerciseId)) {
      $data["pageTitle"] = "Test your knowledge!";
      $data["user_id"] = $_SESSION['user_id'];
      $data["exercise_id"] = $exerciseId;
      // $data["video"] = $this->model("VideoModel")->getVideoById($videoId);

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('question/index', $data);
      $this->view('footer/index');
    }
  }

  public function validateParamQuestion($questionId) {
    if (isset($questionId) && !empty($questionId)) {
      // if ($this->model("VideoModel")->validateById($moduleId, $videoId)) {
      //   return;
      // }
      $this->show404();
      exit();
    }
  }
}