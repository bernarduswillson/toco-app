<?php

class Admin extends Controller {
  public function index() {
    header('Location: /admin/dashboard');
    exit();
  }

  public function dashboard() {
    if (!(isset($_SESSION['username']) && !empty($_SESSION['username']))) {
      header('Location: /login');
    }

    $data["pageTitle"] = "Admin dashboard";
    $data["username"] = $_SESSION['username'];
    // $data["numOfLanguage"] = $this->model('LanguageModel')->getLanguageCount();
    $data["numOfLanguage"] = 4; // ini masih hardcode
    $data["numOfModules"] = 12; // ini masih hardcode
    $data["numOfVideos"] = 60; // ini masih hardcode
    $data["numOfUsers"] = 3; // ini masih hardcode

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('admin/dashboard/index', $data);
    $this->view('footer/index');
  }
}