<?php

class Siswa extends Controller
{
  function __construct()
  {
    session_start();
  }

  public function index()
  {
    $this->view('templates/headerPerusahaan');
    $this->view("perusahaan/index");
    $this->view('templates/footer');
  }

  private function hasLoginSession()
  {
    return isset($_SESSION["perushLogin"]);
  }
}
