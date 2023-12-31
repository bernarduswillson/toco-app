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

  public function validateById($language_id, $module_id) {
    $this->db->query(
      "SELECT
        CASE
          WHEN :module_id IN (
            SELECT module_id
            FROM modules 
            WHERE language_id = :language_id
          ) THEN TRUE
          ELSE FALSE
        END AS isvalid"
    );
    $this->db->bind('language_id', $language_id);
    $this->db->bind('module_id', $module_id);
    $temp = $this->db->single(); 
    return boolval($temp["isvalid"]);
  }

  public function getModulesByLanguageId($language_id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE language_id = :language_id");
    $this->db->bind('language_id', $language_id);
    return $this->db->resultSet();
  }

  public function getModuleByName($module_name)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE module_name = :module_name");
    $this->db->bind('module_name', $module_name);
    return $this->db->single();
  }

  public function getHighestModuleOrder($language_id)
  {
    $this->db->query("SELECT MAX(module_order) FROM " . $this->table . " WHERE language_id = :language_id");
    $this->db->bind('language_id', $language_id);
    $temp = $this->db->single();
    return intval($temp["max"]);
  }

  public function getModulesByLanguageIdFiltered($language_id, $find)
  {
    $query = "
      SELECT module_id, module_name, category
      FROM modules
      WHERE language_id = :language_id ";
    
    // Search
    $find = '%' . $find . '%';  
    if (!empty($find)) {
      $query .= "AND (module_name ILIKE :find OR category ILIKE :find)";
    }

    $query .= " ORDER BY module_order ASC;";

    $this->db->query($query);
    $this->db->bind('language_id', $language_id);
    $this->db->bind('find', $find);
    return $this->db->resultSet();
  }

  public function getUserModulesByLanguageId($language_id, $user_id)
  {
    $this->db->query("
      SELECT m.module_id, m.module_name, m.language_id, m.category, m.difficulty, m.module_order,
      CASE
          WHEN mr.module_result_id IS NOT NULL THEN TRUE
          ELSE FALSE
      END AS is_finished
      FROM (
        SELECT *
        FROM modules 
        WHERE language_id = :language_id 
      ) AS m
      LEFT JOIN (
        SELECT *
        FROM modules_result
        WHERE user_id = :user_id
      ) AS mr ON m.module_id = mr.module_id
      ORDER BY m.module_order ASC");
    $this->db->bind('language_id', $language_id);
    $this->db->bind('user_id', $user_id);
    return $this->db->resultSet();
  }

  public function getUserModulesByLanguageIdFiltered($language_id, $user_id, $find, $completion, $sort)
  {
    $query = "
    SELECT m.module_id, m.module_name, m.language_id, m.category, m.difficulty, m.module_order,
      CASE
          WHEN mr.module_result_id IS NOT NULL THEN TRUE
          ELSE FALSE
      END AS is_finished
      FROM (
        SELECT *
        FROM modules 
        WHERE language_id = :language_id "; 
    
    // Search
    $find = '%' . $find . '%';
    if (!empty($find)) {
      $query .= "AND (module_name ILIKE :find OR category ILIKE :find OR difficulty ILIKE :find)";
    }

    $query .= " ) AS m
      LEFT JOIN (
        SELECT *
        FROM modules_result
        WHERE user_id = :user_id
      ) AS mr ON m.module_id = mr.module_id ";

    // Filter
    if (!empty ($completion) && $completion == "true") {
      $query .= " WHERE mr.module_result_id IS NOT NULL ";
    } else if (!empty ($completion) && $completion == "false") {
      $query .= " WHERE mr.module_result_id IS NULL ";
    }

    // Sort
    if (!empty($sort)) {
      $query .= "ORDER BY m.module_name, m.module_order ASC;";
    } else {
      $query .= "ORDER BY m.module_order ASC;";
    }

    $this->db->query($query);
    $this->db->bind('language_id', $language_id);
    if (!empty($find)) {
      $this->db->bind('find', $find);
    }
    $this->db->bind('user_id', $user_id);
    return $this->db->resultSet();
  }

  public function getModuleById($module_id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE module_id = :module_id");
    $this->db->bind('module_id', $module_id);
    return $this->db->single();
  }

  public function getUserModuleCount($user_id)
  {
    $query = "SELECT COUNT(*) FROM modules_result WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind('user_id', $user_id);
    $temp = $this->db->single();
    return intval($temp["count"]);
  }

  public function getUserModuleCountEachLanguage($user_id)
  {
      $query = "
          SELECT
              l.language_name,
              COUNT(*) AS total_modules
          FROM
              modules_result mr
          INNER JOIN
              modules m ON mr.module_id = m.module_id
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
  
  public function addModule($data)
  {
    $query = "INSERT INTO " . $this->table . " (module_name, language_id, category, difficulty, module_order) VALUES (:module_name, :language_id, :category, :difficulty, :module_order)";
    $this->db->query($query);
    $this->db->bind('module_name', $data['module_name']);
    $this->db->bind('language_id', $data['language_id']);
    $this->db->bind('category', $data['category']);
    $this->db->bind('difficulty', $data['difficulty']);
    $this->db->bind('module_order', $data['module_order']);
    $this->db->execute();
  }

  public function adjustModuleOrder1($language_id, $module_order, $old_module_order)
  {
    $query = "UPDATE " . $this->table . " SET module_order = module_order + 1 WHERE language_id = :language_id AND module_order >= :module_order AND module_order < :old_module_order";
    $this->db->query($query);
    $this->db->bind('language_id', $language_id);
    $this->db->bind('module_order', $module_order);
    $this->db->bind('old_module_order', $old_module_order);
    $this->db->execute();
  }

  public function adjustModuleOrder2($language_id, $module_order, $old_module_order)
  {
    $query = "UPDATE " . $this->table . " SET module_order = module_order - 1 WHERE language_id = :language_id AND module_order <= :module_order AND module_order > :old_module_order";
    $this->db->query($query);
    $this->db->bind('language_id', $language_id);
    $this->db->bind('module_order', $module_order);
    $this->db->bind('old_module_order', $old_module_order);
    $this->db->execute();
  }
  
  public function editModule($data)
  {
    $query = "UPDATE " . $this->table . " SET module_name = :module_name, language_id = :language_id, category = :category, difficulty = :difficulty, module_order = :module_order WHERE module_id = :module_id";
    $this->db->query($query);
    $this->db->bind('module_id', $data['module_id']);
    $this->db->bind('module_name', $data['module_name']);
    $this->db->bind('language_id', $data['language_id']);
    $this->db->bind('category', $data['category']);
    $this->db->bind('difficulty', $data['difficulty']);
    $this->db->bind('module_order', $data['module_order']);
    $this->db->execute();
  }

  public function deleteModule($module_id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE module_id = :module_id";
    $this->db->query($query);
    $this->db->bind('module_id', $module_id);
    $this->db->execute();
  }
}