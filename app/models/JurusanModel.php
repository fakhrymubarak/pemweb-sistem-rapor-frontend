<?php

class JurusanModel
{
  private $table = 'jurusan';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllJurusan()
  {
    $query = "SELECT * FROM " . $this->table;
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function insertJurusan($jurusan)
  {
    $query = "INSERT INTO " . $this->table . "
    (`nama_jurusan`)
    VALUES (:jurusan);";

    $this->db->query($query);
    $this->db->bind('jurusan', $jurusan);
    return $this->db->rowCount();
  }

  public function getJurusanById($id)
  {
    $query = "SELECT * FROM " . $this->table . "
    WHERE `id_jurusan`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->singleSet();
  }

  public function updateJurusan($id, $jurusan)
  {
    $query = "UPDATE " . $this->table . "
    SET `nama_jurusan`=:jurusan
    WHERE `id_jurusan`=:id;";

    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->bind('jurusan', $jurusan);
    return $this->db->rowCount();
  }

  public function deleteJurusan($id)
  {
    $query = "DELETE FROM " . $this->table . "
    WHERE `id_jurusan`=:id;";
    $this->db->query($query);
    $this->db->bind('id', $id);
    return $this->db->rowCount();
  }
}
