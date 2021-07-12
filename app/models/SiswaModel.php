<?php

class SiswaModel
{
  private $table = 'siswa';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function countSiswa()
  {
    $query = "SELECT COUNT(*) AS 'total' FROM " . $this->table;
    $this->db->query($query);
    return $this->db->singleSet()['total'];
  }

  public function getAllSiswa()
  {
    $query = "SELECT * FROM " . $this->table;
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function insertSiswa($nis, $nama, $email, $jenkel, $idKelas, $isActive)
  {
    $query = "INSERT INTO " . $this->table . "
    (`nis`, `nama_siswa`, `email`, `jenkel`, `id_kelas`, `isActive`) 
    VALUES (:nis, :nama, :email, :jenkel, :idKelas, :isActive);";

    $this->db->query($query);
    $this->db->bind('nis', $nis);
    $this->db->bind('nama', $nama);
    $this->db->bind('email', $email);
    $this->db->bind('jenkel', $jenkel);
    $this->db->bind('idKelas', $idKelas);
    $this->db->bind('isActive', $isActive);
    return $this->db->rowCount();
  }

  public function getSiswaById($nis)
  {
    $query = "SELECT * FROM " . $this->table . "
    WHERE `nis`=:nis;";
    $this->db->query($query);
    $this->db->bind('nis', $nis);
    return $this->db->singleSet();
  }

  public function updateSiswa($nis, $nama, $email, $jenkel, $idKelas, $isActive)
  {
    $query = "UPDATE " . $this->table . "
    SET `nama_siswa`=:nama,
    `email`=:email,
    `jenkel`=:jenkel,
    `id_kelas`=:idKelas,
    `isActive`=:isActive
    WHERE `nis`=:nis;";

    $this->db->query($query);
    $this->db->bind('nis', $nis);
    $this->db->bind('nama', $nama);
    $this->db->bind('email', $email);
    $this->db->bind('jenkel', $jenkel);
    $this->db->bind('idKelas', $idKelas);
    $this->db->bind('isActive', $isActive);
    return $this->db->rowCount();
  }

  public function deleteSiswa($nis)
  {
    $query = "DELETE FROM " . $this->table . "
    WHERE `nis`=:nis;";
    $this->db->query($query);
    $this->db->bind('nis', $nis);
    return $this->db->rowCount();
  }
}
