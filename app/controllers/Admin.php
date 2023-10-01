<?php

class Admin extends Controller {
  public function index() {
    header('Location: /admin/dashboard');
    exit();
  }

  public function dashboard() {
    if (!(isset($_SESSION['username']) && !empty($_SESSION['username'])) || $_SESSION['is_admin']==false) {
      header('Location: /login');
      exit();
    }

    $data["pageTitle"] = "Admin dashboard";
    $data["username"] = $_SESSION['username'];
    $data["languageCount"] = $this->model("LanguageModel")->getLanguageCount();
    $data["moduleCount"] = $this->model("ModuleModel")->getModuleCount();
    // ini masih hardcode
    $data["videoCount"] = 60; 
    //
    $data["userCount"] = $this->model("UserModel")->getUserCount();; 

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('admin/dashboard/index', $data);
    $this->view('footer/index');
  }

  public function manage($languageName = null, $moduleName = null) {
    if (!(isset($_SESSION['username']) && !empty($_SESSION['username'])) || $_SESSION['is_admin']=false) {
      header('Location: /login');
      exit();
    }

    if (isset($languageName) && !empty($languageName) && isset($moduleName) && !empty($moduleName)) {
      $data["pageTitle"] = "Manage " . $moduleName;
      $data["language"] = ["1", "English"];
      $data["module"] = ["1", "Numbers", "Vocabulary"];
      $data["videos"] = [
        ["1", "1 to 10"],
        ["2", "11 to 19"],
        ["3", "Tens"],
        ["4", "Hundreds and Thousands"]
      ];

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('admin/module/index', $data);
      $this->view('footer/index');
    }
    
    else if (isset($languageName) && !empty($languageName)) {
      $data["pageTitle"] = "Manage " . $languageName;
      $data["language"] = ["1", "English"];
      $data["modules"] = [
        ["1", "Numbers", "Vocabulary"],
        ["2", "Colors", "Vocabulary"],
        ["3", "Animals", "Vocabulary"],
        ["4", "Present Tense", "Grammar"]
      ];

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('admin/language/index', $data);
      $this->view('footer/index');
    }
    
    else {
      $data["pageTitle"] = "Admin manage";
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
}