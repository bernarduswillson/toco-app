<?php

class ModuleModel
{
  private $table = 'modules';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getModuleCount()
  {
    $this->db->query('SELECT COUNT(*) FROM ' . $this->table);
    $temp = $this->db->single(); 
    return intval($temp["count"]);
  }

  public function getModulesByLanguageId($language_id) {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE language_id = :language_id");
    $this->db->bind('language_id', $language_id);
    return $this->db->resultSet();
  }

  public function getModuleByName($module_name, $language_name) {
    $this->db->query('SELECT * FROM ' . $this->table . ' m INNER JOIN languages l ON m.language_id = l.language_id WHERE module_name = :module_name AND l.language_name = :language_name');
    $this->db->bind('module_name', $module_name);
    $this->db->bind('language_name', $language_name);
    return $this->db->single();
  }
}