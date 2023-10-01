<?php

class ProgressModel
{
  private $table = 'progress';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function initialize($data)
  {
    $query = "INSERT INTO progress (user_id, language_id) values (:user_id, :language_id)";
    $this->db->query($query);
    $this->db->bind('user_id', $data['user_id']);
    $this->db->bind('language_id', $data['language_id']);
    $this->db->execute();
    return $this->db->rowCount();
  }
}