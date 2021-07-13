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

  protected function callHeader()
  {
    $data['controller'] = "admin";
    $this->view('templates/header/header');
    $this->view('templates/header/headerAdmin');
    $this->view('templates/sidebar/sidebarAdmin', $data['controller']);
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

  public function login($founded = "true")
  {
    $this->checkHasLogin();

    $data['founded'] = $founded;
    $this->view('templates/header/header');
    $this->view('admin/index', $data);
    $this->view('templates/footer/footer');
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
    $data["totalRapor"] = $this->model('GuruModel')->countGuru();

    $this->callHeader();
    $this->view('admin/dashboard/dashboard', $data);
    $this->view('templates/footer/footer');
  }



  // === PERIODE SECTION - CRUD ===
  public function periode($status = "")
  {
    $this->checkHasNotLogin();

    $data['status'] = $status;
    $data['listPeriode'] = $this->model('PeriodeModel')->getAllPeriode();

    $this->callHeader();
    $this->view('admin/periode/periode', $data);
    $this->view('templates/footer/footer');
  }

  public function tambahPeriode($isSuccess = "")
  {
    $this->checkHasNotLogin();

    $this->callHeader();
    $this->view('admin/periode/tambahPeriode', $isSuccess);
    $this->view('templates/footer/footer');
  }

  public function runTambahPeriode()
  {
    $this->checkHasNotLogin();

    $tahunAjar = $_POST['periode'];
    $semester = $_POST['semester'];

    $data = $this->model('PeriodeModel')->insertPeriode($tahunAjar, $semester);

    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/tambahPeriode/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/tambahPeriode/false");
      exit;
    }
  }

  public function updatePeriode($idPeriode)
  {
    $this->checkHasNotLogin();

    $data = $this->model('PeriodeModel')->getPeriodeById($idPeriode);

    $this->callHeader();
    $this->view('admin/periode/updatePeriode', $data);
    $this->view('templates/footer/footer');
  }

  public function runUpdatePeriode($idPeriode)
  {
    $this->checkHasNotLogin();

    $tahunAjar = $_POST['periode'];
    $semester = $_POST['semester'];

    $data = $this->model('PeriodeModel')->updatePeriode($idPeriode, $tahunAjar, $semester);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/periode/edited");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/periode/failed");
      exit;
    }
  }

  public function runDeletePeriode($idPeriode)
  {
    $this->checkHasNotLogin();

    $data = $this->model('PeriodeModel')->deletePeriode($idPeriode);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/periode/deleted");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/periode/failed");
      exit;
    }
  }



  // === JURUSAN SECTION - CRUD ===
  public function jurusan($status = "")
  {
    $this->checkHasNotLogin();

    $data['listJurusan'] = $this->model('JurusanModel')->getAllJurusan();
    $data['status'] = $status;

    $this->callHeader();
    $this->view('admin/jurusan/jurusan', $data);
    $this->view('templates/footer/footer');
  }

  public function tambahJurusan($isSuccess = "")
  {
    $this->checkHasNotLogin();

    $this->callHeader();
    $this->view('admin/jurusan/tambahJurusan', $isSuccess);
    $this->view('templates/footer/footer');
  }

  public function runTambahJurusan()
  {
    $this->checkHasNotLogin();

    $jurusan = $_POST['jurusan'];

    $data = $this->model('JurusanModel')->insertJurusan($jurusan);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/tambahJurusan/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/tambahJurusan/false");
      exit;
    }
  }

  public function updateJurusan($idJurusan)
  {
    $this->checkHasNotLogin();

    $data = $this->model('JurusanModel')->getJurusanById($idJurusan);
    $this->callHeader();
    $this->view('admin/jurusan/updateJurusan', $data);
    $this->view('templates/footer/footer');
  }

  public function runUpdateJurusan($idJurusan)
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $jurusan = $_POST['jurusan'];

    $data = $this->model('JurusanModel')->updateJurusan($idJurusan, $jurusan);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/jurusan/edited");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/jurusan/failed");
      exit;
    }
  }

  public function runDeleteJurusan($idJurusan)
  {
    $this->checkHasNotLogin();

    $data = $this->model('JurusanModel')->deleteJurusan($idJurusan);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/jurusan/deleted");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/jurusan/failed");
      exit;
    }
  }



  // === MAPEL SECTION - CRUD ===
  public function mapel($status = "")
  {
    $this->checkHasNotLogin();

    $data['listMapel'] = $this->model('MapelModel')->getAllMapelWithJurusan();
    $data['status'] = $status;

    $this->callHeader();
    $this->view('admin/mapel/mapel', $data);
    $this->view('templates/footer/footer');
  }

  public function tambahMapel($isSuccess = "")
  {
    $this->checkHasNotLogin();

    $this->callHeader();
    $data['listJurusan'] = $this->model('JurusanModel')->getAllJurusan();
    $data['success'] = $isSuccess;

    $this->view('admin/mapel/tambahMapel', $data);
    $this->view('templates/footer/footer');
  }

  public function runTambahMapel()
  {
    $this->checkHasNotLogin();

    $mapel = $_POST['mapel'];
    $jurusan = $_POST['jurusan'];

    $data = $this->model('MapelModel')->insertMapel($mapel, $jurusan);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/tambahMapel/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/tambahMapel/false");
      exit;
    }
  }

  public function updateMapel($idMapel)
  {
    $this->checkHasNotLogin();

    $data['mapel'] = $this->model('MapelModel')->getMapelById($idMapel);
    $data['listJurusan'] = $this->model('JurusanModel')->getAllJurusan();

    $this->callHeader();
    $this->view('admin/mapel/updateMapel', $data);
    $this->view('templates/footer/footer');
  }

  public function runUpdateMapel($idMapel)
  {
    $this->checkHasNotLogin();

    var_dump($_POST);
    $mapel = $_POST['mapel'];
    $jurusan = $_POST['jurusan'];

    $data = $this->model('MapelModel')->updateMapel($idMapel, $mapel, $jurusan);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/mapel/edited");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/mapel/failed");
      exit;
    }
  }

  public function runDeleteMapel($idMapel)
  {
    $this->checkHasNotLogin();

    $data = $this->model('MapelModel')->deleteMapel($idMapel);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/mapel/deleted");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/mapel/failed");
      exit;
    }
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



  // === SISWA SECTION - CRUD===
  public function siswa()
  {
    $this->checkHasNotLogin();

    $data = $this->model('SiswaModel')->getAllSiswa();

    $this->view('templates/header');
    $this->view('templates/headerAdmin');
    $this->view('templates/sidebarAdmin');
    $this->view('admin/siswa', $data);
    $this->view('templates/footer');
  }

  public function tambahSiswa($isSuccess = "")
  {
    $this->checkHasNotLogin();
    $data['isSuccess'] = $isSuccess;
    $data['kelas'] = $this->model('KelasModel')->getAllKelasWithJurusan();

    $this->view('templates/header');
    $this->view('templates/headerGuru');
    $this->view('templates/sidebarGuru');
    $this->view('guru/tambahSiswa', $data);
    $this->view('templates/footer');
  }

  public function runTambahSiswa()
  {
    $this->checkHasNotLogin();
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenkel = $_POST['gender'];
    $idKelas = $_POST['kelas'];
    $isActive = $_POST['isActive'];

    $data = $this->model('SiswaModel')->insertSiswa($nis, $nama, $email, $jenkel, $idKelas, $isActive);

    if ($data == 1) {
      header("Location: " . BASE_URL . "guru/tambahSiswa/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "guru/tambahSiswa/false");
      exit;
    }
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

  // === RESULT SECTION ===

}
