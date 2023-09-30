<?php

class Home extends Controller {
  public function index() {
    $data["pageTitle"] = "Tuco | The best site to learn languages";

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('home/index');
    $this->view('footer/index');
  }
}