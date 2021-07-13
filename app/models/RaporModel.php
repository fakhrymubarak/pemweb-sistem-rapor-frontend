<?php

class RaporModel
{
  private $table = 'rapor_nilai';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function countRapor()
  {
    $query = "SELECT COUNT(DISTINCT `nis`) AS 'total' FROM " . $this->table;
    $this->db->query($query);
    return $this->db->singleSet()['total'];
  }

  public function insertRapor($nis, $idMapel, $nilai, $periode_nilai)
  {
    $query = "INSERT INTO " . $this->table . "
   (`nis`, `id_mapel`, `nilai`, `periode_nilai`) 
    VALUES (:nis, :idMapel, :nilai, :periode_nilai);";

    $this->db->query($query);
    $this->db->bind('nis', $nis);
    $this->db->bind('idMapel', $idMapel);
    $this->db->bind('nilai', $nilai);
    $this->db->bind('periode_nilai', $periode_nilai);
    return $this->db->rowCount();
  }

  public function getRaporById($id)
  {
    $query = "SELECT * FROM " . $this->table . "
    WHERE `id`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->singleSet();
  }

  public function updateRaporNilai($id, $nilai)
  {
    $query = "UPDATE " . $this->table . "
    SET `nilai`=:nilai
    WHERE `id`=:id;";

    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->bind('nilai', $nilai);
    return $this->db->rowCount();
  }

  public function deleteRapor($id)
  {
    $query = "DELETE FROM " . $this->table . "
    WHERE `id`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->rowCount();
  }



  // RELATION QUERY WITH SISWA
  public function getAllFullRaporSiswa()
  {
    $query = "SELECT `nama_siswa`, `nis`, `id_kelas`, `jenjang_kelas`, `nama_jurusan`, `urutan_kelas`, 
    SUM(`nilai`) AS `total_nilai`,
    COUNT(`nilai`) AS `total_mapel`
    FROM " . $this->table . " 
    INNER JOIN `siswa` USING(`nis`)
    INNER JOIN `kelas` USING(`id_kelas`)
    INNER JOIN `jurusan` j USING(id_jurusan)
    GROUP BY `nis`;";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getRaporByNis($nis)
  {
    $query = "SELECT * FROM " . $this->table . "
    INNER JOIN `siswa` USING(`nis`)
    WHERE `nis`=:nis;";
    $this->db->query($query);
    $this->db->bind('nis', $nis);
    return $this->db->resultSet();
  }

  public function getFullRaporByNis($nis)
  {
    $query = "SELECT rp.`id`, `nama_mapel` ,`nilai`, `tahun_ajaran`, `semester` FROM " . $this->table . " rp
    INNER JOIN `siswa` USING(`nis`)
    INNER JOIN `mapel` USING(`id_mapel`)
    INNER JOIN `periode_ajaran` pa ON `periode_nilai`=pa.`id`
    WHERE `nis`=:nis;";
    $this->db->query($query);
    $this->db->bind('nis', $nis);
    return $this->db->resultSet();
  }


  // RELATIONAL QUERY WITH GURU
  public function countRaporBasedGuru($usernameGuru)
  {
    $query = "SELECT COUNT(DISTINCT `nis`) AS 'total' FROM " . $this->table . "
    INNER JOIN `siswa` USING(`nis`)
    INNER JOIN `kelas` k USING(`id_kelas`)
    INNER JOIN `guru` g ON k.`wali_kelas`=g.`id_guru`
    WHERE `username`=:username;";
    $this->db->query($query);
    $this->db->bind('username', $usernameGuru);
    return $this->db->singleSet()['total'];
  }
}
