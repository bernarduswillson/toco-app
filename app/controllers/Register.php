<?php

class Register extends Controller {
  public function index() {
    $data["pageTitle"] = "Register";

    $this->view('header/index', $data);
    $this->view('register/index');
  }
}