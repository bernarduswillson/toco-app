<?php

class Register extends Controller {
  public function index() {
    if ($this->isLoggedIn()) {
      header('Location: /');
      exit();
    }

    $data["pageTitle"] = "Register";

    $this->view('header/index', $data);
    $this->view('register/index');
  }
}