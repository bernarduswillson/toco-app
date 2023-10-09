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

  public function validateById($module_id, $video_id) {
    $this->db->query(
      "SELECT
        CASE
          WHEN :video_id IN (
            SELECT video_id
            FROM videos 
            WHERE module_id = :module_id
          ) THEN TRUE
          ELSE FALSE
        END AS isvalid"
    );
    $this->db->bind('module_id', $module_id);
    $this->db->bind('video_id', $video_id);
    $temp = $this->db->single(); 
    return boolval($temp["isvalid"]);
  }

  public function getVideosByModuleId($module_id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE module_id = :module_id");
    $this->db->bind('module_id', $module_id);
    return $this->db->resultSet();
  }

  public function getHighestVideoOrder($module_id)
  {
    $this->db->query("SELECT MAX(video_order) FROM " . $this->table . " WHERE module_id = :module_id");
    $this->db->bind('module_id', $module_id);
    $temp = $this->db->single();
    return intval($temp["max"]);
  }

  public function getVideosByModuleIdFiltered($module_id, $find) {
    $query = "
      SELECT video_id, video_name
      FROM videos
      WHERE module_id = :module_id   
    ";
    
    // Search
    $find = '%' . $find . '%';  
    if (!empty($find)) {
      $query .= "AND video_name ILIKE :find";
    }

    $query .= " ORDER BY video_order ASC;";

    $this->db->query($query);
    $this->db->bind('module_id', $module_id);
    $this->db->bind('find', $find);
    return $this->db->resultSet();
  }

  public function getUserVideosByModuleId($module_id, $user_id)
  {
    $this->db->query("
    SELECT v.video_id, v.video_name, v.module_id, v.video_order,
    CASE
        WHEN vr.video_result_id IS NOT NULL THEN TRUE
        ELSE FALSE
    END AS is_finished
    FROM (
      SELECT *
      FROM videos 
      WHERE module_id = :module_id 
    ) AS v
    LEFT JOIN (
      SELECT *
      FROM videos_result
      WHERE user_id = :user_id
    ) AS vr ON v.video_id = vr.video_id
    ORDER BY v.video_order ASC");
    $this->db->bind('module_id', $module_id);
    $this->db->bind('user_id', $user_id);
    return $this->db->resultSet();
  }

  public function getVideoById($video_id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE video_id = :video_id");
    $this->db->bind('video_id', $video_id);
    return $this->db->single();
  }

  public function getVideoByName($video_name, $module_name, $language_name)
  {
    $this->db->query("SELECT * 
                      FROM " . $this->table . " v
                      INNER JOIN modules m ON v.module_id = m.module_id
                      INNER JOIN languages l ON m.language_id = l.language_id
                      WHERE l.language_name = :language_name
                      AND m.module_name = :module_name
                      AND v.video_name = :video_name");
    $this->db->bind('language_name', $language_name);
    $this->db->bind('module_name', $module_name);
    $this->db->bind('video_name', $video_name);
    return $this->db->single();
  }

  public function getUserVideoCount($user_id)
  {
    $query = "SELECT COUNT(*) FROM videos_result WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $temp = $this->db->single();
    return intval($temp["count"]);
  }

  public function getVideoCountByModuleId($module_id)
  {
    $query = "SELECT COUNT(*) FROM videos WHERE module_id = :module_id";
    $this->db->query($query);
    $this->db->bind('module_id', $module_id);
    $temp = $this->db->single();
    return intval($temp["count"]);
  }

  public function getUserVideoCountEachLanguage($user_id)
  {
    $query = "
        SELECT
            l.language_name,
            COUNT(*) AS total_videos
        FROM
            videos_result vr
        INNER JOIN
            videos v ON vr.video_id = v.video_id
        INNER JOIN
            modules m ON v.module_id = m.module_id
        INNER JOIN
            languages l ON m.language_id = l.language_id
        WHERE
            user_id = :user_id
        GROUP BY
            l.language_name";

    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    return $this->db->resultSet();
  }

  public function getVideoOrder($video_id)
  {
    $this->db->query("SELECT video_order FROM " . $this->table . " WHERE video_id = :video_id");
    $this->db->bind('video_id', $video_id);
    $temp = $this->db->single();
    return intval($temp["video_order"]);
  }

  public function getVideoIdByOrder($module_id, $video_order)
  {
    $this->db->query("SELECT video_id FROM " . $this->table . " WHERE module_id = :module_id AND video_order = :video_order");
    $this->db->bind('module_id', $module_id);
    $this->db->bind('video_order', $video_order);
    $temp = $this->db->single();
    return intval($temp["video_id"]);
  }

  public function addVideo($data)
  {
    $query = "INSERT INTO " . $this->table . " (video_name, video_desc, video_url, video_order, module_id) VALUES (:video_name, :description, :video_url, :video_order, :module_id)";
    $this->db->query($query);
    $this->db->bind('video_name', $data['video_name']);
    $this->db->bind('description', $data['description']);
    $this->db->bind('video_url', $data['video_url']);
    $this->db->bind('video_order', $data['video_order']);
    $this->db->bind('module_id', $data['module_id']);
    $this->db->execute();
  }

  public function adjustVideoOrder1($module_id, $video_order, $old_video_order)
  {
    $query = "UPDATE " . $this->table . " SET video_order = video_order + 1 WHERE module_id = :module_id AND video_order >= :video_order AND video_order < :old_video_order";
    $this->db->query($query);
    $this->db->bind('module_id', $module_id);
    $this->db->bind('video_order', $video_order);
    $this->db->bind('old_video_order', $old_video_order);
    $this->db->execute();
  }

  public function adjustVideoOrder2($module_id, $video_order, $old_video_order)
  {
    $query = "UPDATE " . $this->table . " SET video_order = video_order - 1 WHERE module_id = :module_id AND video_order <= :video_order AND video_order > :old_video_order";
    $this->db->query($query);
    $this->db->bind('module_id', $module_id);
    $this->db->bind('video_order', $video_order);
    $this->db->bind('old_video_order', $old_video_order);
    $this->db->execute();
  }

  public function editVideo($data)
  {
    $query = "UPDATE " . $this->table . " SET video_name = :video_name, video_desc = :description, video_url = :video_url, video_order = :video_order WHERE video_id = :video_id";
    $this->db->query($query);
    $this->db->bind('video_name', $data['video_name']);
    $this->db->bind('description', $data['description']);
    $this->db->bind('video_url', $data['video_url']);
    $this->db->bind('video_order', $data['video_order']);
    $this->db->bind('video_id', $data['video_id']);
    $this->db->execute();
  }

  public function deleteVideo($video_id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE video_id = :video_id";
    $this->db->query($query);
    $this->db->bind('video_id', $video_id);
    $this->db->execute();
  }
  public function getVideoUrl ($video_id) {
    $this->db->query("SELECT video_url FROM " . $this->table . " WHERE video_id = :video_id");
    $this->db->bind('video_id', $video_id);
    $temp = $this->db->single();
    return $temp;
  }

  public function getVideoTitle ($video_id) {
    $this->db->query("SELECT video_name FROM " . $this->table . " WHERE video_id = :video_id");
    $this->db->bind('video_id', $video_id);
    $temp = $this->db->single();
    return $temp;
  }
}