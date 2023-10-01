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
}