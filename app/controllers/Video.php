<?php

class Video extends Controller {
  public function index() {
    if (!$this->isLoggedIn()) {
        header('Location: /video');
        exit();
    }

    $data["pageTitle"] = "Toco | Your journey starts here!";
    $data["user_id"] = $_SESSION['user_id'];
    $data["video_id"] = 1;

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('video/index', $data);
    $this->view('footer/index');
  }
  
  private function isLoggedIn() {
    return isset($_SESSION['username']) && !empty($_SESSION['username']);
  }
}