<?php

class VideoModel
{
  private $table = 'videos';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getVideoCount()
  {
    $this->db->query('SELECT COUNT(*) FROM ' . $this->table);
    $temp = $this->db->single(); 
    return intval($temp["count"]);
  }

  public function getVideosByModuleId($module_id) {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE module_id = :module_id");
    $this->db->bind('module_id', $module_id);
    return $this->db->resultSet();
  }
  
  public function getVideoById($video_id) {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE video_id = :video_id");
    $this->db->bind('video_id', $video_id);
    return $this->db->single();
  }
}