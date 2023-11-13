<?php

class Merchandise extends Controller
{
    public function index()
    {
        $this->validateSession();

        $data["pageTitle"] = "Merch!";
        $data["user_id"] = $_SESSION['user_id'];

        $this->view('header/index', $data);
        $this->view('navbar/index');
        $this->view('merchandise/index', $data);
        $this->view('footer/index');
    }
}