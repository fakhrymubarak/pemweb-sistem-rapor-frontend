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

  protected function callHeader()
  {
    $controller = "guru";
    $this->view('templates/header/header');
    $this->view('templates/header/headeTopBar', $controller);
    $this->view('templates/sidebar/sidebar', $controller);
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
    $this->view('templates/header/header', $data);
    $this->view('guru/index', $data);
    $this->view('templates/footer/footer');
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
      $_SESSION["usernameGuru"] = $data['username'];
      header("Location: " . BASE_URL . "guru/dashboard");
    } else {
      header("Location: " . BASE_URL . "guru/login/0");
    }
  }

  public function dashboard()
  {
    $this->checkHasNotLogin();

    $data["totalSiswa"] = $this->model('SiswaModel')->countSiswaBasedGuru($_SESSION["usernameGuru"]);
    $data["totalMapel"] = $this->model('MapelModel')->countMapel();
    $data["totalRapor"] = $this->model('RaporModel')->countRaporBasedGuru($_SESSION["usernameGuru"]);

    $this->callHeader();
    $this->view('guru/dashboard/dashboard', $data);
    $this->view('templates/footer/footer');
  }

  // === SISWA SECTION - CRUD===
  public function siswa($status = "")
  {
    $this->checkHasNotLogin();
    $username = $_SESSION["usernameGuru"];
    $data['status'] = $status;
    $data['listSiswa'] = $this->model('SiswaModel')->getAllSiswaWithTeacher($username);

    $this->callHeader();
    $this->view('guru/siswa/siswa', $data);
    $this->view('templates/footer/footer');
  }

  public function tambahSiswa($isSuccess = "")
  {
    $this->checkHasNotLogin();

    $username = $_SESSION["usernameGuru"];
    $data['isSuccess'] = $isSuccess;
    $data['kelas'] = $this->model('KelasModel')->getKelasByWali($username);

    $this->callHeader();
    $this->view('guru/siswa/tambahSiswa', $data);
    $this->view('templates/footer/footer');
  }

  public function runTambahSiswa()
  {
    $this->checkHasNotLogin();
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenkel = $_POST['gender'];
    $idKelas = $_POST['idKelas'];
    $isActive = $_POST['isActive'];

    $data = $this->model('SiswaModel')->insertSiswa($nis, $nama, $email, $jenkel, $idKelas, $isActive);
    if ($data == 1) {
      header("Location: " . BASE_URL . "guru/tambahSiswa/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "guru/tambahSiswa/false");
      exit;
    }
  }

  public function updateSiswa($idSiswa)
  {
    $this->checkHasNotLogin();

    $username = $_SESSION["usernameGuru"];
    $data['siswa'] = $this->model('SiswaModel')->getSiswaWithJurusanKelasById($idSiswa);
    $data['kelas'] = $this->model('KelasModel')->getKelasByWali($username);

    $this->callHeader();
    $this->view('guru/siswa/updateSiswa', $data);
    $this->view('templates/footer/footer');
  }

  public function runUpdateSiswa($nis)
  {
    $this->checkHasNotLogin();

    // @TODO set post
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenkel = $_POST['gender'];
    $idKelas = $_POST['idKelas'];
    $isActive = $_POST['isActive'];
    $isActive = $_POST[''];

    $data = $this->model('SiswaModel')->updateSiswa($nis, $nama, $email, $jenkel, $idKelas, $isActive);
    if ($data == 1) {
      header("Location: " . BASE_URL . "guru/siswa/edited");
      exit;
    } else {
      header("Location: " . BASE_URL . "guru/siswa/failed");
      exit;
    }
  }

  public function runDeleteSiswa($nis)
  {
    $this->checkHasNotLogin();

    $data = $this->model('SiswaModel')->deleteSiswa($nis);
    if ($data == 1) {
      header("Location: " . BASE_URL . "guru/siswa/deleted");
      exit;
    } else {
      header("Location: " . BASE_URL . "guru/siswa/failed");
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
    $this->view('guru/mapel/mapel', $data);
    $this->view('templates/footer/footer');
  }

  public function tambahMapel($isSuccess = "")
  {
    $this->checkHasNotLogin();

    $this->callHeader();
    $data['listJurusan'] = $this->model('JurusanModel')->getAllJurusan();
    $data['success'] = $isSuccess;

    $this->view('guru/mapel/tambahMapel', $data);
    $this->view('templates/footer/footer');
  }

  public function runTambahMapel()
  {
    $this->checkHasNotLogin();

    $mapel = $_POST['mapel'];
    $jurusan = $_POST['jurusan'];

    $data = $this->model('MapelModel')->insertMapel($mapel, $jurusan);
    if ($data == 1) {
      header("Location: " . BASE_URL . "guru/tambahMapel/true");
      exit;
    } else {
      header("Location: " . BASE_URL . "guru/tambahMapel/false");
      exit;
    }
  }

  public function updateMapel($idMapel)
  {
    $this->checkHasNotLogin();

    $data['mapel'] = $this->model('MapelModel')->getMapelById($idMapel);
    $data['listJurusan'] = $this->model('JurusanModel')->getAllJurusan();

    $this->callHeader();
    $this->view('guru/mapel/updateMapel', $data);
    $this->view('templates/footer/footer');
  }

  public function runUpdateMapel($idMapel)
  {
    $this->checkHasNotLogin();

    $mapel = $_POST['mapel'];
    $jurusan = $_POST['jurusan'];

    $data = $this->model('MapelModel')->updateMapel($idMapel, $mapel, $jurusan);
    if ($data == 1) {
      header("Location: " . BASE_URL . "guru/mapel/edited");
      exit;
    } else {
      header("Location: " . BASE_URL . "guru/mapel/failed");
      exit;
    }
  }

  public function runDeleteMapel($idMapel)
  {
    $this->checkHasNotLogin();

    $data = $this->model('MapelModel')->deleteMapel($idMapel);
    if ($data == 1) {
      header("Location: " . BASE_URL . "guru/mapel/deleted");
      exit;
    } else {
      header("Location: " . BASE_URL . "guru/mapel/failed");
      exit;
    }
  }
}
