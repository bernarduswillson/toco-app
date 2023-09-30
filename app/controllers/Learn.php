<?php

class Learn extends Controller {
  public function index() {
    $data["pageTitle"] = "Toco | The best site to learn languages";

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('learn/index');
    $this->view('footer/index');
  }
}