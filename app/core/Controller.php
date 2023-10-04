<?php

class Controller {
  public function view($view, $data = []) {
    // Check for view file
    if (file_exists('app/views/' . $view . '.php')) {
      require_once 'app/views/' . $view . '.php';
    } else {
      // View does not exist
      die('View does not exist');
    }
  }

  public function model($model) {
    require_once 'app/models/' . $model . '.php';
    return new $model;
  }

  public function show404() {
    $data["pageTitle"] = "404 | Oops, error in translation";

    $this->view("header/index", $data);
    $this->view("Error404/index");
  }

  public function validateSession() {
    if (!$this->isLoggedIn()) {
      header('Location: /login');
      exit();
    }
  }

  public function isLoggedIn() {
    return isset($_SESSION['username']) && !empty($_SESSION['username']);
  }
}