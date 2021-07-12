<?php

class Siswa extends Controller
{
  function __construct()
  {
    session_start();
  }

  public function index()
  {
    $this->view('templates/headerLogin');
    $this->view('siswa/index');
    $this->view('templates/footer');
  }
}
