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
<<<<<<< Updated upstream
=======

  public function getLanguageByName($languageName) {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE language_name = :language_name');
    $this->db->bind('language_name', $languageName);
    return $this->db->single();
  }

  public function getAllLanguageName() {
    $this->db->query("SELECT language_name FROM " . $this->table);
    return $this->db->resultSet();
  }

  public function getUserLanguageCount($user_id)
  {
    $query = "SELECT COUNT(*) FROM progress WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $temp = $this->db->single(); 
    return intval($temp["count"]);
  }

  public function getUserLanguage($user_id)
  {
    $query = "SELECT language_name FROM progress p INNER JOIN languages l ON p.language_id = l.language_id WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    return $this->db->resultSet();
  }
>>>>>>> Stashed changes
}