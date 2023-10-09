<?php

class Profile extends Controller {
  public function index() {
    $this->validateSession();

    $data["pageTitle"] = "Toco | Your journey starts here!";

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('toast/index');
    $this->view('profile/index');
    $this->view('footer/index');

    if (isset($_SESSION["changes"]) && $_SESSION["changes"] == "success") {
      echo '<script>showToast("Profile updated successfully.");</script>';
      unset($_SESSION["changes"]);
    }
  } 
}
