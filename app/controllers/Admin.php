<?php

class Admin extends Controller
{
  protected $hasLoginSession = false;

  public function __construct()
  {
    session_start();
    $this->hasLoginSession = isset($_SESSION["adminLogin"]);
  }

  protected function checkHasLogin()
  {
    if ($this->hasLoginSession) {
      header("Location: " . BASE_URL . "admin/dashboard");
      exit;
    }
  }

  protected function checkHasNotLogin()
  {
    if (!$this->hasLoginSession) {
      header("Location: " . BASE_URL . "admin/login");
      exit;
    }
  }



  // === ADMIN SECTION ===
  public function index()
  {
    header("Location: " . BASE_URL . "admin/dashboard");
    exit;
  }

  // public function runRegister()
  // {
  //   $username = "admin";
  //   $password = password_hash("secret", PASSWORD_DEFAULT);
  //   $data = $this->model('AdminModel')->registerAdmin($username, $password);
  //   var_dump($data);
  // }

  public function login()
  {
    $this->checkHasLogin();
    // @TODO set view
  }

  public function logout()
  {
    $this->checkHasNotLogin();
    session_unset();
    session_destroy();
  }

  public function runLogin()
  {
    $this->checkHasLogin();

    $username = "admin"; //USE POST HERE
    $password = "secret"; //USE POST HERE

    var_dump($password);
    $data = $this->model('AdminModel')->loginAdmin($username);

    // set session and direct to spesific view.
    if ($data == true && password_verify($password, $data['password'])) {
      $_SESSION["adminLogin"] = true;
      header("Location: " . BASE_URL . "admin/dashboard");
    } else {
      header("Location: " . BASE_URL . "admin/login");
    }
  }

  public function dashboard()
  {
    $this->checkHasNotLogin();

    $data["totalSiswa"] = $this->model('SiswaModel')->countSiswa();
    $data["totalMapel"] = $this->model('MapelModel')->countMapel();
    $data["totalKelas"] = $this->model('KelasModel')->countKelas();
    $data["totalGuru"] = $this->model('GuruModel')->countGuru();

    var_dump($data);

    // @TODO set view
  }



  // === PERIODE SECTION - CRUD ===
  public function periode()
  {
    $this->checkHasNotLogin();

    $data = $this->model('PeriodeModel')->getAllPeriode();
    var_dump($data);

    // @TODO set view
  }

  public function tambahPeriode()
  {
    $this->checkHasNotLogin();

    // @TODO set view
  }

  public function runTambahPeriode()
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $tahunAjar = $_POST[''];
    $semester = $_POST[''];

    $data = $this->model('PeriodeModel')->insertPeriode($tahunAjar, $semester);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function updatePeriode($idPeriode)
  {
    $this->checkHasNotLogin();

    $data = $this->model('PeriodeModel')->getPeriodeById($idPeriode);
    var_dump($data);
    // @TODO set view
  }

  public function runUpdatePeriode($idPeriode)
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $tahunAjar = $_POST[''];
    $semester = $_POST[''];

    $data = $this->model('PeriodeModel')->updatePeriode($idPeriode, $tahunAjar, $semester);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function runDeletePeriode($idPeriode)
  {
    $this->checkHasNotLogin();

    $data = $this->model('PeriodeModel')->deletePeriode($idPeriode);
    var_dump($data);
    die;

    // @TODO direct to spesific view
  }



  // === JURUSAN SECTION - CRUD ===
  public function jurusan()
  {
    $this->checkHasNotLogin();

    $data = $this->model('JurusanModel')->getAllJurusan();
    var_dump($data);

    // @TODO set view
  }

  public function tambahJurusan()
  {
    $this->checkHasNotLogin();

    // @TODO set view
  }

  public function runTambahJurusan()
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $jurusan = $_POST[''];

    $data = $this->model('JurusanModel')->insertJurusan($jurusan);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function updateJurusan($idJurusan)
  {
    $this->checkHasNotLogin();

    $data = $this->model('JurusanModel')->getJurusanById($idJurusan);
    var_dump($data);
    // @TODO set view
  }

  public function runUpdateJurusan($idJurusan)
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $jurusan = $_POST[''];

    $data = $this->model('JurusanModel')->updateJurusan($idJurusan, $jurusan);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function runDeleteJurusan($idJurusan)
  {
    $this->checkHasNotLogin();

    $data = $this->model('JurusanModel')->deleteJurusan($idJurusan);
    var_dump($data);
    die;

    // @TODO direct to spesific view
  }



  // === MAPEL SECTION - CRUD ===
  public function mapel()
  {
    $this->checkHasNotLogin();

    $data = $this->model('MapelModel')->getAllMapel();
    var_dump($data);

    // @TODO set view
  }

  public function tambahMapel()
  {
    $this->checkHasNotLogin();

    // @TODO set view
  }

  public function runTambahMapel()
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $mapel = $_POST[''];

    $data = $this->model('MapelModel')->insertMapel($mapel);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function updateMapel($idMapel)
  {
    $this->checkHasNotLogin();

    $data = $this->model('MapelModel')->getMapelById($idMapel);
    var_dump($data);
    // @TODO set view
  }

  public function runUpdateMapel($idMapel)
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $mapel = $_POST[''];

    $data = $this->model('MapelModel')->updateMapel($idMapel, $mapel);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function runDeleteMapel($idMapel)
  {
    $this->checkHasNotLogin();

    $data = $this->model('MapelModel')->deleteMapel($idMapel);
    var_dump($data);
    die;

    // @TODO direct to spesific view
  }



  // ==== KELAS SECTION - CRUD ===
  public function kelas()
  {
    $this->checkHasNotLogin();

    $data = $this->model('KelasModel')->getAllKelas();
    var_dump($data);

    // @TODO set view
  }

  public function tambahKelas()
  {
    $this->checkHasNotLogin();

    // @TODO set view
  }

  public function runTambahKelas()
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $kelas = $_POST[''];
    $urutan = $_POST[''];
    $idJurusan = $_POST[''];
    $idWali = $_POST[''];

    $data = $this->model('KelasModel')->insertKelas($kelas, $urutan, $idJurusan, $idWali);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function updateKelas($idKelas)
  {
    $this->checkHasNotLogin();

    $data = $this->model('KelasModel')->getKelasById($idKelas);
    var_dump($data);
    // @TODO set view
  }

  public function runUpdateKelas($idKelas)
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $kelas = $_POST[''];
    $urutan = $_POST[''];
    $idJurusan = $_POST[''];
    $idWali = $_POST[''];

    $data = $this->model('KelasModel')->updateKelas($idKelas, $kelas, $urutan, $idJurusan, $idWali);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function runDeleteKelas($idKelas)
  {
    $this->checkHasNotLogin();

    $data = $this->model('KelasModel')->deleteKelas($idKelas);
    var_dump($data);
    die;

    // @TODO direct to spesific view
  }



  // === TEACHER SECTION - CRUD ===

  public function guru()
  {
    $this->checkHasNotLogin();

    $data = $this->model('GuruModel')->getAllGuru();
    var_dump($data);

    // @TODO set view
  }

  public function tambahGuru()
  {
    $this->checkHasNotLogin();

    // @TODO set view
  }

  public function runTambahGuru()
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $nip = $_POST[''];
    $nama = $_POST[''];
    $username = $_POST[''];
    $password = password_hash($_POST[''], PASSWORD_DEFAULT);
    $isWaliKelas = $_POST[''];
    $isActive = $_POST[''];

    // $nip = "123123123";
    // $nama = "dummyGuru";
    // $username = "guru";
    // $password = password_hash("secretGuru", PASSWORD_DEFAULT);
    // $isWaliKelas = "1";
    // $isActive = "1";

    $data = $this->model('GuruModel')->insertGuru($nama, $nip, $username, $password, $isWaliKelas, $isActive);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function updateGuru($idGuru)
  {
    $this->checkHasNotLogin();

    $data = $this->model('GuruModel')->getGuruById($idGuru);
    var_dump($data);
    // @TODO set view
  }

  public function runUpdateGuru($idGuru)
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $nip = $_POST[''];
    $nama = $_POST[''];
    $username = $_POST[''];
    $password = $_POST[''];
    $isWaliKelas = $_POST[''];
    $isActive = $_POST[''];

    $data = $this->model('GuruModel')->updateGuru($idGuru, $nama, $nip, $username, $password, $isWaliKelas, $isActive);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function runDeleteGuru($idGuru)
  {
    var_dump($idGuru);
    $this->checkHasNotLogin();

    $data = $this->model('GuruModel')->deleteGuru($idGuru);
    var_dump($data);
    die;

    // @TODO direct to spesific view
  }



  // === SISWA SECTION - CRUD ===


  // === RESULT SECTION ===

}
