<?php

class UserModel
{
  private $table = 'users';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getUserByEmail($email)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
    $this->db->bind('email', $email);
    return $this->db->single();
  }

  public function getUserByUsername($username)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
    $this->db->bind('username', $username);
    return $this->db->single();
  }

  public function getAllUser()
  {
    $this->db->query('SELECT * FROM users');
    return $this->db->resultSet();
  }

  public function register($data)
  {
    $query = "INSERT INTO users (email, username, password, is_admin) values (:email, :username, :password, false)";
    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updateProfile($user_id, $username, $email, $profile_pic)
  {
    $query = "UPDATE users SET username = :username, email = :email, profile_pic = :profile_pic WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind('username', $username);
    $this->db->bind('email', $email);
    $this->db->bind('profile_pic', $profile_pic);
    $this->db->bind('user_id', $user_id);
    $this->db->execute();
    return $this->db->rowCount();
  }
}