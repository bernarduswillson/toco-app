<?php

class Admin extends Controller {
  public function index() {
    $this->validateSession();

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

  public function manage($languageId = null, $moduleId = null) {
    $this->validateSession();

    // Manage Videos
    if (isset($languageId) && !empty($languageId) && isset($moduleId) && !empty($moduleId)) {
      $data["language"] = $this->model("LanguageModel")->getLanguageById($languageId);
      $data["module"] = $this->model("ModuleModel")->getModuleById($moduleId);
      $data["videos"] = $this->model("VideoModel")->getVideosByModuleId($moduleId);
      $data["pageTitle"] = "Manage " . $data["module"]["module_name"];

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('admin/module/index', $data);
      $this->view('footer/index');
    }
    
    // Manage Modules
    else if (isset($languageId) && !empty($languageId)) {
      $data["language"] = $this->model("LanguageModel")->getLanguageById($languageId);
      $data["modules"] = $this->model("ModuleModel")->getModulesByLanguageId($data["language"]["language_id"]);
      $data["pageTitle"] = "Manage " . $data["language"]["language_name"];

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

  public function create($languageId = null, $moduleId = null) {
    $this->validateSession();

    // Create Video
    if (isset($languageId) && !empty($languageId) && isset($moduleId) && !empty($moduleId)) {
      $data["pageTitle"] = "Add New Module";
      $data["languageId"] = $languageId;
      $data["moduleId"] = $moduleId;
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/create/video/index", $data);
      $this->view("footer/index");
    }

    // Create Module
    else if (isset($languageId) && !empty($languageId)) {
      $data["pageTitle"] = "Add New Module";
      $data["languageId"] = $languageId;
  
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

  public function edit($languageId = null, $moduleId = null, $videoId = null) {
    $this->validateSession();

    // Edit Video
    if (isset($languageId) && !empty($languageId) && isset($moduleId) && !empty($moduleId) && isset($videoId) && !empty($videoId)) {
      $data["pageTitle"] = "Add New Module";
      $data["languageId"] = $languageId;
      $data["video"] = $this->model("VideoModel")->getVideoById($videoId);
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/edit/video/index", $data);
      $this->view("footer/index");
    }

    // Edit Module
    else if (isset($languageId) && !empty($languageId) && isset($moduleId) && !empty($moduleId)) {
      $data["pageTitle"] = "Add New Module";
      $data["module"] = $this->model("ModuleModel")->getModuleById($moduleId);
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/edit/module/index", $data);
      $this->view("footer/index");
    } 
    
    // Edit Language
    else if (isset($languageId) && !empty($languageId)) {
      $data["pageTitle"] = "Add New Language";
      $data["language"] = $this->model("LanguageModel")->getLanguageById($languageId);
  
      $this->view("header/index", $data);
      $this->view("navbar/index");
      $this->view("admin/edit/language/index", $data);
      $this->view("footer/index");
    }
  }
}