<?php

class ModuleModel {
  private $table = 'modules';
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function getModuleCount() {
    $this->db->query('SELECT COUNT(*) FROM ' . $this->table);
    $temp = $this->db->single(); 
    return intval($temp["count"]);
  }

  public function getModulesByLanguageId($language_id) {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE language_id = :language_id");
    $this->db->bind('language_id', $language_id);
    return $this->db->resultSet();
  }

  public function getModuleById($module_id) {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE module_id = :module_id");
    $this->db->bind('module_id', $module_id);
    return $this->db->single();
  }
  public function getModuleByName($module_name, $language_name) {
    $this->db->query('SELECT * FROM ' . $this->table . ' m INNER JOIN languages l ON m.language_id = l.language_id WHERE module_name = :module_name AND l.language_name = :language_name');
    $this->db->bind('module_name', $module_name);
    $this->db->bind('language_name', $language_name);
    return $this->db->single();
  }

  public function getUserModuleCount($user_id)
  {
    $query = "SELECT COUNT(*) FROM modules_result WHERE user_id = :user_id AND is_finished = true";
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $temp = $this->db->single();
    return intval($temp["count"]);
  }

  public function getUserModuleCountEachLanguage($user_id)
  {
    $query = "SELECT l.language_name, COUNT(*) AS total_modules FROM modules_result mr INNER JOIN modules m ON mr.module_id = m.module_id INNER JOIN languages l ON m.language_id = l.language_id WHERE user_id = :user_id AND is_finished = true GROUP BY l.language_name";
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    return $this->db->resultSet();
  }
  
  public function getModulesByLanguageIdSearched($language_id, $search) {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE language_id = :language_id AND (module_name like :search OR category like :search)");
    $this->db->bind('language_id', $language_id);
    $this->db->bind('search', $search);
    return $this->db->resultSet();
  }
}