<?php

class GuruModel
{
  private $table = 'guru';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function loginGuru($username)
  {
    $query = "SELECT `username`, `password` FROM " . $this->table . " 
    WHERE `username`=:username";

    $this->db->query($query);
    $this->db->bind('username', $username);
    return $this->db->singleSet();
  }

  public function countGuru()
  {
    $query = "SELECT COUNT(*) AS 'total' FROM " . $this->table;
    $this->db->query($query);
    return $this->db->singleSet()['total'];
  }

  public function getAllGuru()
  {
    $query = "SELECT * FROM " . $this->table;
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function insertGuru($nama, $nip, $username, $password, $isWaliKelas, $isActive)
  {
    $query = "INSERT INTO " . $this->table . "
    (`nama_guru`, `nip`, `username`, `password`, `isWaliKelas`, `isActive`)
    VALUES (:nama, :nip, :username, :pass, :isWaliKelas, :isActive);";

    $this->db->query($query);
    $this->db->bind('nama', $nama);
    $this->db->bind('nip', $nip);
    $this->db->bind('username', $username);
    $this->db->bind('pass', $password);
    $this->db->bind('isWaliKelas', $isWaliKelas);
    $this->db->bind('isActive', $isActive);
    return $this->db->rowCount();
  }

  public function getGuruById($id)
  {
    $query = "SELECT * FROM " . $this->table . "
    WHERE `id_guru`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->singleSet();
  }

  public function updateGuru($idGuru, $nama, $nip, $username, $password, $isWaliKelas, $isActive)
  {
    $query = "UPDATE " . $this->table . "
    SET `nama_guru`=:nama,
    `nip`=:nip,
    `username`=:username,
    `password`=:pass,
    `isWaliKelas`=:isWaliKelas
    `isActive`=:isActive
    WHERE `id_guru`=:idGuru;";

    $this->db->query($query);
    $this->db->bind('idGuru', $idGuru);
    $this->db->bind('nama', $nama);
    $this->db->bind('nip', $nip);
    $this->db->bind('username', $username);
    $this->db->bind('pass', $password);
    $this->db->bind('isWaliKelas', $isWaliKelas);
    $this->db->bind('isActive', $isActive);
    return $this->db->rowCount();
  }

  public function deleteGuru($id)
  {
    $query = "DELETE FROM " . $this->table . "
    WHERE `id_guru`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->rowCount();
  }
}
