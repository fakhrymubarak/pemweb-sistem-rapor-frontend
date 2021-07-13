<?php

class MapelModel
{
  private $table = 'mapel';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function countMapel()
  {
    $query = "SELECT COUNT(*) AS 'total' FROM " . $this->table;
    $this->db->query($query);
    return $this->db->singleSet()['total'];
  }


  public function getAllMapel()
  {
    $query = "SELECT * FROM " . $this->table;
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function insertMapel($mapel, $idJurusan)
  {
    $query = "INSERT INTO " . $this->table . "
    (`nama_mapel`, `id_jurusan`)
    VALUES (:mapel, :idJurusan);";

    $this->db->query($query);
    $this->db->bind('mapel', $mapel);
    $this->db->bind('idJurusan', $idJurusan);
    return $this->db->rowCount();
  }

  public function getMapelById($id)
  {
    $query = "SELECT * FROM " . $this->table . "
    WHERE `id_mapel`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->singleSet();
  }

  public function updateMapel($id, $mapel, $idJurusan)
  {
    $query = "UPDATE " . $this->table . "
    SET `nama_mapel`=:mapel,
    `id_jurusan`=:idJurusan
    WHERE `id_mapel`=:id;";

    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->bind('mapel', $mapel);
    $this->db->bind('idJurusan', $idJurusan);
    return $this->db->rowCount();
  }

  public function deleteMapel($id)
  {
    $query = "DELETE FROM " . $this->table . "
    WHERE `id_mapel`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->rowCount();
  }


  // MAPEL RELATION WITH JURUSAN

  public function getAllMapelWithJurusan()
  {
    $query = "SELECT `id_mapel`, `nama_mapel`, `nama_jurusan` FROM " . $this->table . " 
    INNER JOIN `jurusan` USING(`id_jurusan`)";

    $this->db->query($query);
    return $this->db->resultSet();
  }
}
