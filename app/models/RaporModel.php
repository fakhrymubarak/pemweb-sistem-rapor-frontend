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
}
