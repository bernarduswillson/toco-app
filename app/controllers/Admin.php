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
    $data["videoCount"] = $this->model("VideoModel")->getVideoCount();
    $data["userCount"] = $this->model("UserModel")->getUserCount();

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

    // Manage Videos
    if (isset($languageName) && !empty($languageName) && isset($moduleName) && !empty($moduleName)) {
      $data["pageTitle"] = "Manage " . $moduleName;
      $data["language"] = $this->model("LanguageModel")->getLanguageByName($languageName);
      $data["module"] = $this->model("ModuleModel")->getModuleByName($moduleName);
      $data["videos"] = $this->model("VideoModel")->getVideosByModuleId($data["module"]["module_id"]);
      // $data["videos"] = [
      //   ["1", "1 to 10"],
      //   ["2", "11 to 19"],
      //   ["3", "Tens"],
      //   ["4", "Hundreds and Thousands"]
      // ];

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('admin/module/index', $data);
      $this->view('footer/index');
    }
    
    // Manage Modules
    else if (isset($languageName) && !empty($languageName)) {
      $data["pageTitle"] = "Manage " . $languageName;

      $data["language"] = $this->model("LanguageModel")->getLanguageByName($languageName);
      $data["modules"] = $this->model("ModuleModel")->getModulesByLanguageId($data["language"]["language_id"]);

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('admin/language/index', $data);
      $this->view('footer/index');
    }
    
    // Manage Languages
    else {
      $data["pageTitle"] = "Admin manage";
      $data["languages"] = $this->model("LanguageModel")->getAllLanguage();
  
      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('admin/manage/index', $data);
      $this->view('footer/index');
    }
  }
}