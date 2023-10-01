<?php

class Profile extends Controller {
  public function index() {
    if (!$this->isLoggedIn()) {
        header('Location: /login');
        exit();
    }

    $data["pageTitle"] = "Toco | Your journey starts here!";

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('profile/index');
    $this->view('footer/index');
  }
  
  private function isLoggedIn() {
    return isset($_SESSION['username']) && !empty($_SESSION['username']);
  }
}
