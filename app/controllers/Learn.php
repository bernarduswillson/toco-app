<?php

use JetBrains\PhpStorm\Language;

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
      echo "Video page";
    }

    // List of modules
    else if (isset($languageId) && !empty($languageId)) {
      $data["pageTitle"] = "Keep learning!";
      $data["language"] = $this->model("LanguageModel")->getLanguageById($languageId);
      $data["modules"] = $this->model("ModuleModel")->getUserModulesByLanguageId($languageId, $_SESSION["user_id"]);
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
    }
  }

  public function validateParamLanguage($languageId) {
    if (isset($languageId) && !empty($languageId)) {
      if ($this->model("LanguageModel")->validateById($languageId)) {
        return;
      }
      $this->show404();
    }
  }

  public function validateParamModule($languageId, $moduleId) {
    if (isset($moduleId) && !empty($moduleId)) {
      if ($this->model("ModuleModel")->validateById($languageId, $moduleId)) {
        return;
      }
      $this->show404();
    }
  }

  public function validateParamVideo($moduleId, $videoId) {
    if (isset($videoId) && !empty($videoId)) {
      if ($this->model("VideoModel")->validateById($moduleId, $videoId)) {
        return;
      }
      $this->show404();
    }
  }
}
