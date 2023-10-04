<?php

class Learn extends Controller {
  public function index() {
    if (!$this->isLoggedIn()) {
        header('Location: /login');
        exit();
    }

    $data["pageTitle"] = "Your journey starts here!";
    $data["languages"] = $this->model("LanguageModel")->getAllLanguage();

    $this->view('header/index', $data);
    $this->view('navbar/index');
    $this->view('learn/index', $data);
    $this->view('footer/index');
  }
  
  private function isLoggedIn() {
    return isset($_SESSION['username']) && !empty($_SESSION['username']);
  }

  public function lesson($languageId = null, $moduleId = null, $videoId = null) {
    if (!$this->isLoggedIn()) {
      header('Location: /login');
      exit();
    }

    // Video
    if (isset($languageId) && !empty($languageId) && isset($moduleId) && !empty($moduleId) && isset($videoId) && !empty($videoId)) {

    }
    // List of modules
    else if (isset($languageId) && !empty($languageId)) {
      $data["pageTitle"] = "Keep learning!";

      $data["language"] = $this->model("LanguageModel")->getLanguageById($languageId);
            
      $data["modules"] = $this->model("ModuleModel")->getModulesByLanguageId($languageId);
      if (isset($_GET["find"]) && !empty($_GET["find"])) {
        $find = "%" . $_GET["find"] . "%"; 
        $data["modules"] = $this->model("ModuleModel")->getModulesByLanguageIdSearched($languageId, $find);
      }

      for ($i = 0; $i < count($data["modules"]); $i++) {
        $data["modules"][$i]["videos"] = $this->model("VideoModel")->getVideosByModuleId($data["modules"][$i]["module_id"]);
      }

      $this->view('header/index', $data);
      $this->view('navbar/index');
      $this->view('lesson/index', $data);
      $this->view('footer/index');
    } else {
      header('Location: /404');
      exit();
    }
  }
}
