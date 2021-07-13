<?php

class KelasModel
{
  private $table = 'kelas';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function countKelas()
  {
    $query = "SELECT COUNT(*) AS 'total' FROM " . $this->table;
    $this->db->query($query);
    return $this->db->singleSet()['total'];
  }

  public function insertKelas($kelas, $urutan, $idJurusan, $idWali)
  {
    $query = "INSERT INTO " . $this->table . "
    (`jenjang_kelas`, `urutan_kelas`, `id_jurusan`, `wali_kelas`) 
    VALUES (:kelas, :urutan, :idJurusan, :idWali);";

    $this->db->query($query);
    $this->db->bind('kelas', $kelas);
    $this->db->bind('urutan', $urutan);
    $this->db->bind('idJurusan', $idJurusan);
    $this->db->bind('idWali', $idWali);
    return $this->db->rowCount();
  }

  public function getKelasById($idKelas)
  {
    $query = "SELECT * FROM " . $this->table . "
    WHERE `id_kelas`=:idKelas;";
    $this->db->query($query);
    $this->db->bind('idKelas', $idKelas);
    return $this->db->singleSet();
  }

  public function updateKelas($idKelas, $kelas, $urutan, $idJurusan, $idWali)
  {
    $query = "UPDATE " . $this->table . "
    SET `jenjang_kelas`=:kelas,
    `urutan_kelas`=:urutan,
    `id_jurusan`=:idJurusan,
    `wali_kelas`=:idWali
    WHERE `id_kelas`=:idKelas;";

    $this->db->query($query);
    $this->db->bind('idKelas', $idKelas);
    $this->db->bind('kelas', $kelas);
    $this->db->bind('urutan', $urutan);
    $this->db->bind('idJurusan', $idJurusan);
    $this->db->bind('idWali', $idWali);
    return $this->db->rowCount();
  }

  public function deleteKelas($idKelas)
  {
    $query = "DELETE FROM " . $this->table . "
    WHERE `id_kelas`=:idKelas;";
    $this->db->query($query);
    $this->db->bind('idKelas', $idKelas);
    return $this->db->rowCount();
  }


  // RELASI KELAS - JURUSAN - WALI KELAS -
  public function getAllKelasJurusanWali()
  {
    $query = "SELECT `id_kelas`, `jenjang_kelas`, `nama_jurusan`, `urutan_kelas`, `nama_guru`  FROM " . $this->table . " k
    INNER JOIN `jurusan` j USING(id_jurusan)
    INNER JOIN `guru` g ON k.`wali_kelas`=g.`id_guru`";

    $this->db->query($query);
    return $this->db->resultSet();
  }
}
