<?php

class Login extends Controller {
  public function index() {
    if ($this->isLoggedIn()) {
      header('Location: /');
      exit();
    }

    $data["pageTitle"] = "Login";
    $this->view('header/index', $data);
    $this->view('login/index');
  }
}
