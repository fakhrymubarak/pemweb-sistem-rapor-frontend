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
    $controller = "admin";
    $this->view('templates/header/header');
    $this->view('templates/header/headeTopBar', $controller);
    $this->view('templates/sidebar/sidebar', $controller);
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
    header("Location: " . BASE_URL . "admin/login");
    exit;
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
  public function kelas($status = "")
  {
    $this->checkHasNotLogin();

    $data['listKelas'] = $this->model('KelasModel')->getAllKelasJurusanWali();
    $data['status'] = $status;

    $this->callHeader();
    $this->view('admin/kelas/kelas', $data);
    $this->view('templates/footer/footer');
  }

  public function tambahKelas($isSuccess = "")
  {
    $this->checkHasNotLogin();

    $data['success'] = $isSuccess;
    $data['listJurusan'] = $this->model('JurusanModel')->getAllJurusan();
    $data['listGuru'] = $this->model('GuruModel')->getAllGuru();

    $this->callHeader();
    $this->view('admin/kelas/tambahKelas', $data);
    $this->view('templates/footer/footer');
  }

  public function runTambahKelas()
  {
    $this->checkHasNotLogin();

    $kelas = $_POST['jenjangKelas'];
    $urutan = $_POST['urutan'];
    $idJurusan = $_POST['jurusan'];
    $idWali = $_POST['wali'];

    $data = $this->model('KelasModel')->insertKelas($kelas, $urutan, $idJurusan, $idWali);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/tambahKelas/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/tambahKelas/false");
      exit;
    }
  }

  public function updateKelas($idKelas)
  {
    $this->checkHasNotLogin();

    $data['kelas'] = $this->model('KelasModel')->getKelasById($idKelas);
    $data['listJurusan'] = $this->model('JurusanModel')->getAllJurusan();
    $data['listGuru'] = $this->model('GuruModel')->getAllGuru();

    $this->callHeader();
    $this->view('admin/kelas/updateKelas', $data);
    $this->view('templates/footer/footer');
  }

  public function runUpdateKelas($idKelas)
  {
    $this->checkHasNotLogin();

    $kelas = $_POST['jenjangKelas'];
    $urutan = $_POST['urutan'];
    $idJurusan = $_POST['jurusan'];
    $idWali = $_POST['wali'];

    $data = $this->model('KelasModel')->updateKelas($idKelas, $kelas, $urutan, $idJurusan, $idWali);
    var_dump($data);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/kelas/edited");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/kelas/failed");
      exit;
    }
  }

  public function runDeleteKelas($idKelas)
  {
    $this->checkHasNotLogin();

    $data = $this->model('KelasModel')->deleteKelas($idKelas);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/kelas/deleted");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/kelas/failed");
      exit;
    }
  }



  // === TEACHER SECTION - CRUD ===

  public function guru($status = "")
  {
    $this->checkHasNotLogin();

    $data['status'] = $status;
    $data['listGuru'] = $this->model('GuruModel')->getAllGuru();

    $this->callHeader();
    $this->view('admin/guru/guru', $data);
    $this->view('templates/footer/footer');
  }

  public function tambahGuru($isSuccess = "")
  {
    $this->checkHasNotLogin();

    $this->callHeader();
    $this->view('admin/guru/tambahGuru', $isSuccess);
    $this->view('templates/footer/footer');
  }

  public function runTambahGuru()
  {
    $this->checkHasNotLogin();

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $isWaliKelas = $_POST['isWaliKelas'];
    $isActive = $_POST['isActive'];

    $data = $this->model('GuruModel')->insertGuru($nama, $nip, $username, $password, $isWaliKelas, $isActive);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/tambahGuru/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/tambahGuru/false");
      exit;
    }
  }

  public function updateGuru($idGuru)
  {
    $this->checkHasNotLogin();

    $data = $this->model('GuruModel')->getGuruById($idGuru);

    $this->callHeader();
    $this->view('admin/guru/updateGuru', $data);
    $this->view('templates/footer/footer');
  }

  public function runUpdateGuru($idGuru)
  {
    $this->checkHasNotLogin();

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $isWaliKelas = $_POST['isWaliKelas'];
    $isActive = $_POST['isActive'];

    $data = $this->model('GuruModel')->updateGuru($idGuru, $nama, $nip, $username, $password, $isWaliKelas, $isActive);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/guru/edited");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/guru/failed");
      exit;
    }
  }

  public function runDeleteGuru($idGuru)
  {
    var_dump($idGuru);
    $this->checkHasNotLogin();

    $data = $this->model('GuruModel')->deleteGuru($idGuru);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/guru/deleted");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/guru/failed");
      exit;
    }
  }



  // === SISWA SECTION - CRUD===
  public function siswa($status = "")
  {
    $this->checkHasNotLogin();

    $data['listSiswa'] = $this->model('SiswaModel')->getAllSiswaJurusanKelas();
    $data['status'] = $status;

    $this->callHeader();
    $this->view('admin/siswa/siswa', $data);
    $this->view('templates/footer/footer');
  }

  public function tambahSiswa($isSuccess = "")
  {
    $this->checkHasNotLogin();

    $data['isSuccess'] = $isSuccess;
    $data['kelas'] = $this->model('KelasModel')->getAllKelasJurusanWali();

    $this->callHeader();
    $this->view('admin/siswa/tambahSiswa', $data);
    $this->view('templates/footer/footer');
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
      header("Location: " . BASE_URL . "admin/tambahSiswa/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/tambahSiswa/false");
      exit;
    }
    // @TODO direct to spesific view
  }

  public function updateSiswa($idSiswa)
  {
    $this->checkHasNotLogin();

    $data['siswa'] = $this->model('SiswaModel')->getSiswaWithJurusanKelasById($idSiswa);
    $data['kelas'] = $this->model('KelasModel')->getAllKelasJurusanWali();
    $this->callHeader();
    $this->view('admin/siswa/updateSiswa', $data);
    $this->view('templates/footer/footer');
  }

  public function runUpdateSiswa($nis)
  {
    $this->checkHasNotLogin();

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenkel = $_POST['gender'];
    $idKelas = $_POST['kelas'];
    $isActive = $_POST['isActive'];

    $data = $this->model('SiswaModel')->updateSiswa($nis, $nama, $email, $jenkel, $idKelas, $isActive);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/siswa/edited");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/siswa/failed");
      exit;
    }
  }

  public function runDeleteSiswa($nis)
  {
    $this->checkHasNotLogin();

    $data = $this->model('SiswaModel')->deleteSiswa($nis);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/siswa/deleted");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/siswa/failed");
      exit;
    }

    // @TODO direct to spesific view
  }

  // === RESULT SECTION ===
  public function rapor($status = "")
  {
    $this->checkHasNotLogin();

    $data['listRapor'] = $this->model('RaporModel')->getAllFullRaporSiswa();
    $data['status'] = $status;

    $this->callHeader();
    $this->view('admin/rapor/daftarRapor', $data);
    $this->view('templates/footer/footer');
  }

  public function detailRapor($nis = "", $idKelas)
  {
    $this->checkHasNotLogin();
    if ($nis == "" || $idKelas == "") {
      header("Location: " . BASE_URL . "admin/rapor");
      exit;
    } else {
      $data["siswa"] = $this->model('SiswaModel')->getSiswaWithJurusanKelasById($nis);
      $data["listRapor"] = $this->model('RaporModel')->getFullRaporByNis($nis);
      $data["controller"] = "admin";

      $this->view('templates/header/header');
      $this->view('templates/header/headerRapor', $data["controller"]);
      $this->view('siswa/rapor', $data);
      $this->view('templates/footer/footer');
    }
  }

  public function tambahRapor($isSuccess = "")
  {
    $this->checkHasNotLogin();

    $this->callHeader();
    $data['listMapel'] = $this->model('MapelModel')->getAllMapelWithJurusan();
    $data['listPeriode'] = $this->model('PeriodeModel')->getAllPeriode();
    $data['success'] = $isSuccess;

    $this->view('admin/rapor/tambahRapor', $data);
    $this->view('templates/footer/footer');
  }

  public function runTambahRapor()
  {
    $this->checkHasNotLogin();

    var_dump($_POST);
    $nis = $_POST['nis'];
    $idMapel = $_POST['mapel'];
    $nilai = $_POST['nilai'];
    $periodeNilai = $_POST['periode'];;

    $data = $this->model('RaporModel')->insertRapor($nis, $idMapel, $nilai, $periodeNilai);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/tambahRapor/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/tambahRapor/false");
      exit;
    }
  }

  public function updateRapor($nis, $isSuccess = "")
  {
    $this->checkHasNotLogin();

    $data["controller"] = "admin";
    $data["isSuccess"] = $isSuccess;
    $data["siswa"] = $this->model('SiswaModel')->getSiswaWithJurusanKelasById($nis);
    $data["listRapor"] = $this->model('RaporModel')->getFullRaporByNis($nis);

    $this->callHeader();
    $this->view('admin/rapor/updateRapor', $data);
    $this->view('templates/footer/footer');
  }

  public function runUpdateNilai()
  {
    $this->checkHasNotLogin();

    var_dump($_POST);
    $submit = $_POST['submit'];
    $idRapor = $_POST['id' . $submit];
    $nilai = $_POST['nilai' . $submit];
    $nis = $_POST['nis'];
    $data = $this->model('RaporModel')->updateRaporNilai($idRapor, $nilai);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/updateRapor/" . $nis . "/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/updateRapor/" . $nis . "/false");
      exit;
    }

    $this->callHeader();
    $this->view('admin/rapor/updateRapor', $data);
    $this->view('templates/footer/footer');
  }


  public function runDeleteNilai($idRapor)
  {
    $this->checkHasNotLogin();

    $nis = $this->model('RaporModel')->getRaporById($idRapor)['nis'];

    $data = $this->model('RaporModel')->deleteRapor($idRapor);
    if ($data == 1) {
      header("Location: " . BASE_URL . "admin/updateRapor/" . $nis . "/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "admin/updateRapor/" . $nis . "/false");
      exit;
    }
  }
}
