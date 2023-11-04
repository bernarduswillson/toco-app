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
}