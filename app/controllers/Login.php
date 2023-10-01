<?php

class Login extends Controller {
  public function index() {
    if ($this->isLoggedIn()) {
      header('Location: /learn');
      exit();
    }

    $data["pageTitle"] = "Login";
    $this->view('header/index', $data);
    $this->view('login/index');
  }

  private function isLoggedIn() {
    return isset($_SESSION['user_id']);
  }
}
