<?php

class Error404 extends Controller {
  public function index() {
    $data["pageTitle"] = "404 | Oops, error in translation";

    $this->view('header/index', $data);
    $this->view('Error404/index');
  }
}