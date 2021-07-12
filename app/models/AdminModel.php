<?php

class AdminModel
{
  private $table = 'admin';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  /** 
   *  @param string $username the admin username
   *  @return false if email or password wrong  
   *  */
  public function loginAdmin($username)
  {
    $query = "SELECT `username`, `password` FROM " . $this->table . " 
    WHERE `username`=:username";

    $this->db->query($query);
    $this->db->bind('username', $username);
    return $this->db->singleSet();
  }

  public function registerAdmin($username, $password)
  {
    $query = "INSERT INTO " . $this->table . "
      (`username`, `password`) 
      VALUES (:username, :pass)";

    $this->db->query($query);
    $this->db->bind('username', $username);
    $this->db->bind('pass', $password);
    return $this->db->rowCount();
  }
}
