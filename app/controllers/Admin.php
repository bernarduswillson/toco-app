<?php

class Admin extends Controller {
  public function index() {
    header('Location: /admin/dashboard');
    exit();
  }

  public function dashboard() {
    if (!(isset($_SESSION['username']) && !empty($_SESSION['username'])) || !$_SESSION['is_admin']) {
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
    if (!(isset($_SESSION['username']) && !empty($_SESSION['username'])) || !$_SESSION['is_admin']) {
      header('Location: /login');
      exit();
    }

    // Manage Videos
    if (isset($languageName) && !empty($languageName) && isset($moduleName) && !empty($moduleName)) {
      $data["pageTitle"] = "Manage " . $moduleName;
      $data["language"] = $this->model("LanguageModel")->getLanguageByName($languageName);
      $data["module"] = $this->model("ModuleModel")->getModuleByName($moduleName, $languageName);
      $data["videos"] = $this->model("VideoModel")->getVideosByModuleId($data["module"]["module_id"]);

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

  public function create($languageName = null, $moduleName = null) {
    if (!(isset($_SESSION['username']) && !empty($_SESSION['username'])) || !$_SESSION['is_admin']) {
      header('Location: /login');
      exit();
    }

    // Create Video
    if (isset($languageName) && !empty($languageName) && isset($moduleName) && !empty($moduleName)) {
      $data["pageTitle"] = "Add New Module";
      $data["languageName"] = $languageName;
      $data["moduleName"] = $moduleName;
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/create/video/index", $data);
      $this->view("footer/index");
    }

    // Create Module
    else if (isset($languageName) && !empty($languageName)) {
      $data["pageTitle"] = "Add New Module";
      $data["languageName"] = $languageName;
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/create/module/index", $data);
      $this->view("footer/index");
    } 
    
    // Create Language
    else {
      $data["pageTitle"] = "Add New Language";
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/create/language/index", $data);
      $this->view("footer/index");
    }
  }

  public function edit($languageName = null, $moduleName = null, $videoName = null) {
    if (!(isset($_SESSION['username']) && !empty($_SESSION['username'])) || !$_SESSION['is_admin']) {
      header('Location: /login');
      exit();
    }

    // Edit Video
    if (isset($languageName) && !empty($languageName) && isset($moduleName) && !empty($moduleName) && isset($videoName) && !empty($videoName)) {
      $data["pageTitle"] = "Add New Module";
      $data["languageName"] = $languageName;
      $data["moduleName"] = $moduleName;
      $data["videoName"] = $videoName;
      $data["video"] = $this->model("VideoModel")->getVideoByName($videoName, $moduleName, $languageName);
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/edit/video/index", $data);
      $this->view("footer/index");
    }

    // Edit Module
    else if (isset($languageName) && !empty($languageName) && isset($moduleName) && !empty($moduleName)) {
      $data["pageTitle"] = "Add New Module";
      $data["languageName"] = $languageName;
      $data["moduleName"] = $moduleName;
      $data["module"] = $this->model("ModuleModel")->getModuleByName($moduleName, $languageName);
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/edit/module/index", $data);
      $this->view("footer/index");
    } 
    
    // Edit Language
    else if (isset($languageName) && !empty($languageName)) {
      $data["pageTitle"] = "Add New Language";
      $data["languageName"] = $languageName;
      $data["language"] = $this->model("LanguageModel")->getLanguageByName($languageName);
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/edit/language/index", $data);
      $this->view("footer/index");
    }
  }
}