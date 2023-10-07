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
    $query = 'INSERT INTO ' . $this->table . ' (user_id, language_id) VALUES (:user_id, :language_id)';
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $this->db->bind('language_id', $language_id);
    return $this->db->execute();
  }

  public function getLanguageProgressCount($user_id, $language_id)
  {
    $query = 'SELECT COUNT(*) FROM ' . $this->table . ' WHERE user_id = :user_id AND language_id = :language_id';
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $this->db->bind('language_id', $language_id);
    $temp = $this->db->single();
    return intval($temp["count"]);
  }

  public function getUserVideoFinishedCount($user_id, $module_id)
  {
    $query = 'SELECT COUNT(*) FROM videos_result WHERE user_id = :user_id AND video_id IN (SELECT video_id FROM videos WHERE module_id = :module_id)';
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $this->db->bind('module_id', $module_id);
    $temp = $this->db->single();
    return intval($temp["count"]);
  }

  public function addVideoResult($user_id, $video_id)
  {
    $query = 'INSERT INTO videos_result (user_id, video_id) VALUES (:user_id, :video_id)';
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $this->db->bind('video_id', $video_id);
    return $this->db->execute();
  }

  public function addModuleResult($user_id, $module_id)
  {
    $query = 'INSERT INTO modules_result (user_id, module_id) VALUES (:user_id, :module_id)';
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $this->db->bind('module_id', $module_id);
    return $this->db->execute();
  }

  public function isUserVideoFinished($user_id, $video_id)
  {
    $query = 'SELECT COUNT(*) FROM videos_result WHERE user_id = :user_id AND video_id = :video_id';
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $this->db->bind('video_id', $video_id);
    $temp = $this->db->single();
    return intval($temp["count"]);
  }
}