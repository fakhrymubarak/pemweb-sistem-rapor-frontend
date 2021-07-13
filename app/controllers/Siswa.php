<?php

class Siswa extends Controller
{

  public function __construct()
  {
    session_start();
  }

  public function index()
  {
    header("Location: " . BASE_URL . "siswa/login");
    exit;
  }

  public function login($founded = "true")
  {
    $data['kelas'] = $this->model('KelasModel')->getAllKelasJurusanWali();
    $data['periode'] = $this->model('PeriodeModel')->getAllPeriode();
    $data['founded'] = $founded;
    $this->view('templates/header/header');
    $this->view('templates/header/headerRapor');
    $this->view('siswa/index', $data);
    $this->view('templates/footer/footer');
  }

  public function runLoginRapor()
  {
    $nis = $_POST['nis'];
    $idKelas = $_POST['idKelas'];
    $idPeriode = $_POST['idPeriode'];

    $data = $this->model('RaporModel')->getRaporByNis($nis);
    if ($data == true && $data[0]['id_kelas'] == $idKelas) {
      header("Location: " . BASE_URL . "siswa/rapor/" . $nis . "/" . $idKelas . "/" . $idPeriode);
      exit;
    } else {
      header("Location: " . BASE_URL . "siswa/login/0");
      exit;
    }
  }

  public function rapor($nis = "", $idKelas = "", $idPeriode = "")
  {
    if ($nis == "" || $idKelas == "") {
      header("Location: " . BASE_URL . "siswa/login");
      exit;
    } else {
      $data["controller"] = "siswa";
      $data["siswa"] = $this->model('SiswaModel')->getSiswaWithJurusanKelasById($nis);
      $data["listRapor"] = $this->model('RaporModel')->getFullRaporByNisPeriode($nis, $idPeriode);

      $this->view('templates/header/header');
      $this->view('templates/header/headerRapor', $data["controller"]);
      $this->view('siswa/rapor', $data);
      $this->view('templates/footer/footer');
    }
  }
}
