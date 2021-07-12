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

  public function getRaporById($nis)
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
    $query = "SELECT `nama_mapel` ,`nilai`, `tahun_ajaran`, `semester` FROM " . $this->table . "
    INNER JOIN `siswa` USING(`nis`)
    INNER JOIN `mapel` USING(`id_mapel`)
    INNER JOIN `periode_ajaran` pa ON `periode_nilai`=pa.`id`
    WHERE `nis`=:nis;";
    $this->db->query($query);
    $this->db->bind('nis', $nis);
    return $this->db->resultSet();
  }
}
