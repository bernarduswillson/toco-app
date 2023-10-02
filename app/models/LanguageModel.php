<?php

class LanguageModel
{
  private $table = 'languages';
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function getLanguageCount() {
    $this->db->query('SELECT COUNT(*) FROM ' . $this->table);
    $temp = $this->db->single(); 
    return intval($temp["count"]);
  }

  public function getAllLanguage() {
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultSet();
  }

  public function getLanguageByName($languageName) {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE language_name = :language_name');
    $this->db->bind('language_name', $languageName);
    return $this->db->single();
  }

  public function getLanguageById($languageId) {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE language_id = :language_id');
    $this->db->bind('language_id', $languageId);
    return $this->db->single();
  }
}