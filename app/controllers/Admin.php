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
      $data["pageTitle"] = "Manage " . $data["module"]["module_name"];
      $query = $this->getQuery();
      
      // Search
      $data["find"] = "";
      if (isset($query["find"]) && !empty($query["find"])) {
        $data["find"] = $query["find"];
      }

      // Page
      $data_per_page = 6;
      $data["curr_page"] = "1";
      if (isset($query["page"]) && !empty($query["page"])) {
        $data["curr_page"] = $query["page"];
      }

      // Fetch data
      $data["videos"] = $this->model("VideoModel")->getVideosByModuleIdFiltered($moduleId, $data["find"]);

      // Paginate data
      $data["total_page"] = ceil(count($data["videos"])/$data_per_page);
      $videos_part = [];
      $j = 0;
      for ($i = ($data["curr_page"] - 1) * $data_per_page; $i < $data["curr_page"] * $data_per_page; $i++) { 
        if (isset($data["videos"][$i])) {
          $videos_part[$j] = $data["videos"][$i];
          $j++;
        }
      }
      $data["videos"] = $videos_part;

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('admin/module/index', $data);
      $this->view('footer/index');
    }
    
    // Manage Modules
    else if (isset($languageId) && !empty($languageId)) {

      $data["language"] = $this->model("LanguageModel")->getLanguageById($languageId);
      $data["pageTitle"] = "Manage " . $data["language"]["language_name"];
      $query = $this->getQuery();

      // Search
      $data["find"] = "";
      if (isset($query["find"]) && !empty($query["find"])) {
        $data["find"] = $query["find"];
      }

      // Page
      $data_per_page = 6;
      $data["curr_page"] = "1";
      if (isset($query["page"]) && !empty($query["page"])) {
        $data["curr_page"] = $query["page"];
      }
      
      // Fetch data
      $data["modules"] = $this->model("ModuleModel")->getModulesByLanguageIdFiltered($data["language"]["language_id"], $data["find"]);

      // Paginate data
      $data["total_page"] = ceil(count($data["modules"])/$data_per_page);
      $modules_part = [];
      $j = 0;
      for ($i = ($data["curr_page"] - 1) * $data_per_page; $i < $data["curr_page"] * $data_per_page; $i++) { 
        if (isset($data["modules"][$i])) {
          $modules_part[$j] = $data["modules"][$i];
          $j++;
        }
      }
      $data["modules"] = $modules_part;

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('admin/language/index', $data);
      $this->view('footer/index');
    }
    
    // Manage Languages
    else {
      $data["pageTitle"] = "Admin manage";
      $query = $this->getQuery();
  
      // Search
      $data["find"] = "";
      if (isset($query["find"]) && !empty($query["find"])) {
        $data["find"] = $query["find"];
      }

      // Page
      $data_per_page = 6;
      $data["curr_page"] = "1";
      if (isset($query["page"]) && !empty($query["page"])) {
        $data["curr_page"] = $query["page"];
      }

      // Fetch data
      $data["languages"] = $this->model("LanguageModel")->getAllLanguageFiltered($data["find"]);

      // Paginate data
      $data["total_page"] = ceil(count($data["languages"])/$data_per_page);
      $languages_part = [];
      $j = 0;
      for ($i = ($data["curr_page"] - 1) * $data_per_page; $i < $data["curr_page"] * $data_per_page; $i++) { 
        if (isset($data["languages"][$i])) {
          $languages_part[$j] = $data["languages"][$i];
          $j++;
        }
      }
      $data["languages"] = $languages_part;

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