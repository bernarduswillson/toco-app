<?php

class LanguageModel
{
  private $table = 'languages';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getLanguageCount()
  {
    $this->db->query('SELECT COUNT(*) FROM ' . $this->table);
    $temp = $this->db->single(); 
    return intval($temp["count"]);
  }
}