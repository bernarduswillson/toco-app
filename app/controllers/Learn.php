<?php

class Learn extends Controller {
  public function index() {
    $this->validateSession();

    $data["pageTitle"] = "Your journey starts here!";
    $data["languages"] = $this->model("LanguageModel")->getAllLanguage();

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('learn/index', $data);
    $this->view('footer/index');
  }

  public function lesson($languageId = null, $moduleId = null, $videoId = null) {
    $this->validateSession();

    $this->validateParamLanguage($languageId);
    $this->validateParamModule($languageId, $moduleId);
    $this->validateParamVideo($moduleId, $videoId);

    // Video
    if (isset($languageId) && !empty($languageId) && isset($moduleId) && !empty($moduleId) && isset($videoId) && !empty($videoId)) {
      $data["pageTitle"] = "Toco | Your journey starts here!";
      $data["user_id"] = $_SESSION['user_id'];
      $data["video_id"] = $videoId;
      $data["module_id"] = $moduleId;
      $data["language_id"] = $languageId;
      $data["video"] = $this->model("VideoModel")->getVideoById($videoId);

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('video/index', $data);
      $this->view('footer/index');
    }

    // List of modules
    else if (isset($languageId) && !empty($languageId)) {
      $data["pageTitle"] = "Keep learning!";

      $data["language"] = $this->model("LanguageModel")->getLanguageById($languageId);
      $query = $this->getQuery();

      // Search
      $data["find"] = "";
      if (isset($query["find"]) && !empty($query["find"])) {
        $data["find"] = $query["find"];
      }
      
      // Filter
      $data["completion"] = "";
      if (isset($query["completion"]) && !empty($query["completion"])) {
        $data["completion"] = $query["completion"];
      }
      
      // Sort
      $data["sort"] = "";
      if (isset($query["sort"]) && !empty($query["sort"])) {
        $data["sort"] = $query["sort"];
      }
      
      // Page
      $data_per_page = 6;
      $data["curr_page"] = "1";
      if (isset($query["page"]) && !empty($query["page"])) {
        $data["curr_page"] = $query["page"];
      }

      // Data fetching
      $data["modules"] = $this->model("ModuleModel")->getUserModulesByLanguageIdFiltered($languageId, $_SESSION["user_id"], $data["find"], $data["completion"], $data["sort"]);
      
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
      for ($i = 0; $i < count($data["modules"]); $i++) {
        $data["modules"][$i]["videos"] = $this->model("VideoModel")->getUserVideosByModuleId($data["modules"][$i]["module_id"], $_SESSION["user_id"]);
      }

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('lesson/index', $data);
      $this->view('footer/index');
    
    // No parameter
    } else {
      $this->show404();
      exit();
    }
  }

  public function validateParamLanguage($languageId) {
    if (isset($languageId) && !empty($languageId)) {
      if ($this->model("LanguageModel")->validateById($languageId)) {
        return;
      }
      $this->show404();
      exit();
    }
  }

  public function validateParamModule($languageId, $moduleId) {
    if (isset($moduleId) && !empty($moduleId)) {
      if ($this->model("ModuleModel")->validateById($languageId, $moduleId)) {
        return;
      }
      $this->show404();
      exit();
    }
  }

  public function validateParamVideo($moduleId, $videoId) {
    if (isset($videoId) && !empty($videoId)) {
      if ($this->model("VideoModel")->validateById($moduleId, $videoId)) {
        return;
      }
      $this->show404();
      exit();
    }
  }
}
