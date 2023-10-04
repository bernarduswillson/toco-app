<?php

class App {
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];
  protected $query = [];

  public function __construct() {
    $url = $this->parse_url();
    $_QUERY = $this->query; 
    
    // === CONTROLLER ===

    if ( isset($url[0]) && !empty($url[0]) ) {
      if ( file_exists('app/controllers/' . $url[0] . '.php')) {
        $this->controller = $url[0];
        unset($url[0]);
      } else {
        $this->controller = 'Error404';
        unset($url[0]);
      }
    }

    require_once 'app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    // === METHOD ===

    if ( isset($url[1]) ) {
      if ( method_exists($this->controller, $url[1]) ) {
        $this->method = $url[1];
        unset($url[1]);
      } else {
        $this->controller = 'Error404';
        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        unset($url[0]);
      }
    }

    // === PARAMETER ===

    if ( !empty($url) ) {
      $this->params = array_values($url);
    }

    // === RUN CONTROLLERS, METHODS, AND PARAMS ===

    call_user_func_array([$this->controller, $this->method], $this->params);

  }

  public function parse_url() {
    if ( isset($_SERVER["REQUEST_URI"]) ) {
      $protocol = "http://";
      $host = "www.toco.com";
      $path = $_SERVER["REQUEST_URI"];

      $url = $protocol . $host . $path;
      $url = parse_url($url);

      $url_path = $url["path"];
      $url_path = ltrim($url_path, '/');
      $url_path = rtrim($url_path, '/');
      $url_path = filter_var($url_path, FILTER_SANITIZE_URL);
      $url_path = explode('/', $url_path);

      if (isset($url["query"])) {
        $queryArray = [];
        parse_str($url["query"], $queryArray);
        $this->query = $queryArray;
      }

      return $url_path;
    }
  }
}