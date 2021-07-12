<?php

class PeriodeModel
{
  private $table = 'periode_ajaran';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllPeriode()
  {
    $query = "SELECT * FROM " . $this->table;
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function insertPeriode($tahunAjar, $semester)
  {
    $query = "INSERT INTO " . $this->table . "
    (`tahun_ajaran`, `semester`)
    VALUES (:tahunAjar, :semester);";

    $this->db->query($query);
    $this->db->bind('tahunAjar', $tahunAjar);
    $this->db->bind('semester', $semester);
    return $this->db->rowCount();
  }

  public function getPeriodeById($id)
  {
    $query = "SELECT * FROM " . $this->table . "
    WHERE `id`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->singleSet();
  }

  public function updatePeriode($id, $tahunAjar, $semester)
  {
    $query = "UPDATE " . $this->table . "
    SET `tahun_ajaran`=:tahunAjar,
    `semester`=:semester
    WHERE `id`=:id;";

    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->bind('tahunAjar', $tahunAjar);
    $this->db->bind('semester', $semester);
    return $this->db->rowCount();
  }

  public function deletePeriode($id)
  {
    $query = "DELETE FROM " . $this->table . "
    WHERE `id`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->rowCount();
  }
}
