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

  public function getSiswaWithJurusanKelasById($nis)
  {
    $query = "SELECT `nis`, `nama_siswa`, `jenjang_kelas`, `urutan_kelas`, `nama_jurusan`  FROM " . $this->table . "
    INNER JOIN `kelas` USING(`id_kelas`)
    INNER JOIN `jurusan` USING(`id_jurusan`)
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



  // RELATIONAL QUERY WITH GURU
  public function getAllSiswaWithTeacher($usernameGuru)
  {
    $query = "SELECT * FROM " . $this->table . "
    INNER JOIN `kelas` k USING(`id_kelas`)
    INNER JOIN `guru` g ON k.`wali_kelas`=g.`id_guru`
    INNER JOIN `jurusan` USING(`id_jurusan`)
    WHERE `username`=:username;";

    $this->db->query($query);
    $this->db->bind('username', $usernameGuru);
    return $this->db->resultSet();
  }

  public function countSiswaBasedGuru($usernameGuru)
  {
    $query = "SELECT COUNT(*) AS 'total' FROM " . $this->table . "
    INNER JOIN `kelas` k USING(`id_kelas`)
    INNER JOIN `guru` g ON k.`wali_kelas`=g.`id_guru`
    WHERE `username`=:username;";
    $this->db->query($query);
    $this->db->bind('username', $usernameGuru);
    return $this->db->singleSet()['total'];
  }
}
