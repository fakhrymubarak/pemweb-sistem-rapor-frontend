<?php

class Guru extends Controller
{
  protected $hasLoginSession = false;

  public function __construct()
  {
    session_start();
    $this->hasLoginSession = isset($_SESSION["guruLogin"]);
  }

  protected function checkHasLogin()
  {
    if ($this->hasLoginSession) {
      header("Location: " . BASE_URL . "guru/dashboard");
      exit;
    }
  }

  protected function checkHasNotLogin()
  {
    if (!$this->hasLoginSession) {
      header("Location: " . BASE_URL . "guru/login");
      exit;
    }
  }

  // === GURU SECTION ===
  public function index()
  {
    header("Location: " . BASE_URL . "guru/dashboard");
    exit;
  }

  public function login($founded = "true")
  {
    $this->checkHasLogin();

    $data['founded'] = $founded;
    $this->view('templates/header');
    $this->view('guru/index', $data);
    $this->view('templates/footer');
  }

  public function logout()
  {
    $this->checkHasNotLogin();
    session_unset();
    session_destroy();
    header("Location: " . BASE_URL . "guru/login");
    exit;
  }

  public function runLogin()
  {
    $this->checkHasLogin();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = $this->model('GuruModel')->loginGuru($username);

    // set session and direct to spesific view.
    if ($data == true && password_verify($password, $data['password'])) {
      $_SESSION["guruLogin"] = true;
      header("Location: " . BASE_URL . "guru/dashboard");
    } else {
      header("Location: " . BASE_URL . "guru/login/0");
    }
  }

  public function dashboard()
  {
    $this->checkHasNotLogin();

    $data["totalSiswa"] = $this->model('SiswaModel')->countSiswa();
    $data["totalMapel"] = $this->model('MapelModel')->countMapel();
    $data["totalRapor"] = $this->model('RaporModel')->countRapor();

    $this->view('templates/header');
    $this->view('templates/headerGuru');
    $this->view('templates/sidebarGuru');
    $this->view('guru/dashboard', $data);
    $this->view('templates/footer');
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



  // === SISWA SECTION - CRUD===
  public function siswa()
  {
    $this->checkHasNotLogin();

    $data = $this->model('SiswaModel')->getAllSiswa();
    var_dump($data);

    // @TODO set view
  }

  public function tambahSiswa()
  {
    $this->checkHasNotLogin();

    // @TODO set view
  }

  public function runTambahSiswa()
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $nis = $_POST[''];
    $nama = $_POST[''];
    $email = $_POST[''];
    $jenkel = $_POST[''];
    $idKelas = $_POST[''];
    $isActive = $_POST[''];

    $data = $this->model('SiswaModel')->insertSiswa($nis, $nama, $email, $jenkel, $idKelas, $isActive);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function updateSiswa($idSiswa)
  {
    $this->checkHasNotLogin();

    $data = $this->model('SiswaModel')->getSiswaById($idSiswa);
    var_dump($data);
    // @TODO set view
  }

  public function runUpdateSiswa($nis)
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $nama = $_POST[''];
    $email = $_POST[''];
    $jenkel = $_POST[''];
    $idKelas = $_POST[''];
    $isActive = $_POST[''];

    $data = $this->model('SiswaModel')->updateSiswa($nis, $nama, $email, $jenkel, $idKelas, $isActive);
    var_dump($data);

    // @TODO direct to spesific view
  }

  public function runDeleteSiswa($nis)
  {
    $this->checkHasNotLogin();

    $data = $this->model('SiswaModel')->deleteSiswa($nis);
    var_dump($data);
    die;

    // @TODO direct to spesific view
  }

  // === RAPOR SECTION - CRUD===
}
