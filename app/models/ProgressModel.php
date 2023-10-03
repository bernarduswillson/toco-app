<?php

class ProgressModel
{
  private $table = 'progress';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function initialize($user_id, $language_id)
  {
    $query = "INSERT INTO progress (user_id, language_id) VALUES (:user_id, :language_id)";
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $this->db->bind('language_id', $language_id);
    return $this->db->execute();
  }

  public function getLanguageProgressCount($user_id, $language_id)
  {
    $query = "SELECT COUNT(*) FROM progress WHERE user_id = :user_id AND language_id = :language_id";
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $this->db->bind('language_id', $language_id);
    $temp = $this->db->single();
    return intval($temp["count"]);
  }
}