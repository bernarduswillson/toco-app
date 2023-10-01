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
    // ini masih hardcode
    // $data["numOfLanguage"] = $this->model('LanguageModel')->getLanguageCount();
    $data["numOfLanguage"] = 4;
    $data["numOfModules"] = 12; 
    $data["numOfVideos"] = 60; 
    $data["numOfUsers"] = 3; 
    //

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('admin/dashboard/index', $data);
    $this->view('footer/index');
  }

  public function manage() {
    if (!(isset($_SESSION['username']) && !empty($_SESSION['username']))) {
      header('Location: /login');
    }

    $data["pageTitle"] = "Admin dashboard";
    // ini masih hardcode
    $data["languages"] = [
      ["1", "English"],
      ["2", "Indonesian"],
      ["3", "French"],
      ["4", "Germany"],
    ];
    //

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('admin/manage/index', $data);
    $this->view('footer/index');
  }
}