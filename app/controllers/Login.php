<?php

class Login extends Controller {
  public function index() {
    $data["pageTitle"] = "Login";

    $this->view('header/index', $data);
    $this->view('login/index');
  }
}