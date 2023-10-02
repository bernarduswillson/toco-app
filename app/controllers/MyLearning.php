<?php

class MyLearning extends Controller
{
    public function index()
    {
        if (!$this->isLoggedIn()) {
            header('Location: /login');
            exit();
        }

        $data["pageTitle"] = "Toco | Your journey starts here!";
        $data["user_id"] = $_SESSION['user_id'];
        $data["userLanguageCount"] = $this->model("LanguageModel")->getUserLanguageCount($data["user_id"]);
        $data["userModuleCount"] = $this->model("ModuleModel")->getUserModuleCount($data["user_id"]);
        $data["userVideoCount"] = $this->model("VideoModel")->getUserVideoCount($data["user_id"]);
        $data["userLanguage"] = $this->model("LanguageModel")->getUserLanguage($data["user_id"]);
        $data["userModuleCountEachLanguage"] = $this->model("ModuleModel")->getUserModuleCountEachLanguage($data["user_id"]);
        $data["userVideoCountEachLanguage"] = $this->model("VideoModel")->getUserVideoCountEachLanguage($data["user_id"]);

        $this->view('header/index', $data);
        $this->view('navbar/index');
        $this->view('mylearning/index', $data);
        $this->view('footer/index');
    }

    private function isLoggedIn()
    {
        return isset($_SESSION['username']) && !empty($_SESSION['username']);
    }
}