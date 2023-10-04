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
}