<?php
$controller = $data;
?>

<div class="content-wrapper">
  <div class="content-container">
    <div class="left-sidebar bg-black-300 box-shadow ">
      <div class="sidebar-content">
        <div class="user-info">
          <img src="<?= BASE_URL; ?>assets/admin.png" class="img-circle profile-img" height="105">
          <h6 class="title">Super Admin</h6>
        </div>
        <!-- /.user-info -->

        <div class="sidebar-nav">
          <ul class="side-nav color-gray">

            <li>
              <a href="<?= BASE_URL . $controller; ?>/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
            </li>

            <!-- SISWA -->
            <li class="has-children">
              <a href="#"><i class="fa fa-users"></i> <span>Siswa</span> <i class="fa fa-angle-right arrow"></i></a>
              <ul class="child-nav">
                <li><a href="<?= BASE_URL . $controller; ?>/tambahSiswa"><i class="fa fa-bars"></i> <span>Tambah Data Siswa</span></a></li>
                <li><a href="<?= BASE_URL . $controller; ?>/siswa"><i class="fa fa fa-server"></i> <span>Kelola Data Siswa</span></a></li>
              </ul>
            </li>

            <!-- RAPOR -->
            <li class="has-children">
              <a href="#"><i class="fa fa-graduation-cap"></i> <span>Hasil Belajar</span> <i class="fa fa-angle-right arrow"></i></a>
              <ul class="child-nav">
                <li><a href="<?= BASE_URL . $controller; ?>/tambahRapor"><i class="fa fa-bars"></i> <span>Tambah Hasil Belajar</span></a></li>
                <li><a href="<?= BASE_URL . $controller; ?>/rapor"><i class="fa fa fa-server"></i> <span>Kelola Hasil Belajar</span></a></li>
              </ul>
            </li>

            <!-- MAPEL -->
            <li class="has-children">
              <a href="#"><i class="fa fa-file-text"></i> <span>Mata Pelajaran</span> <i class="fa fa-angle-right arrow"></i></a>
              <ul class="child-nav">
                <li><a href="<?= BASE_URL . $controller; ?>/tambahMapel"><i class="fa fa-bars"></i> <span>Buat Mapel Baru</span></a></li>
                <li><a href="<?= BASE_URL . $controller; ?>/mapel"><i class="fa fa fa-server"></i> <span>Kelola Mapel</span></a></li>
              </ul>
            </li>

            <!-- GURU -->
            <li class="has-children">
              <a href="#"><i class="fa fa-users"></i> <span>Tenaga Pendidik</span> <i class="fa fa-angle-right arrow"></i></a>
              <ul class="child-nav">
                <li><a href="<?= BASE_URL . $controller; ?>/tambahGuru"><i class="fa fa-bars"></i> <span>Tambahkan Guru</span></a></li>
                <li><a href="<?= BASE_URL . $controller; ?>/guru"><i class="fa fa fa-server"></i> <span>Kelola Guru</span></a></li>
              </ul>
            </li>

            <?php if ($controller != "guru") { ?>
              <!-- KELAS -->
              <li class="has-children">
                <a href="#"><i class="fa fa-file-text"></i> <span>Daftar Kelas</span> <i class="fa fa-angle-right arrow"></i></a>
                <ul class="child-nav">
                  <li><a href="<?= BASE_URL . $controller; ?>/tambahKelas"><i class="fa fa-bars"></i> <span>Buat Kelas Baru</span></a></li>
                  <li><a href="<?= BASE_URL . $controller; ?>/kelas"><i class="fa fa fa-server"></i> <span>Kelola Kelas</span></a></li>
                </ul>
              </li>

              <!-- PERIODE -->
              <li class="has-children">
                <a href="#"><i class="fa fa-clock-o"></i> <span>Periode</span> <i class="fa fa-angle-right arrow"></i></a>
                <ul class="child-nav">
                  <li><a href="<?= BASE_URL . $controller; ?>/tambahPeriode"><i class="fa fa-bars"></i> <span>Buat Periode Baru</span></a></li>
                  <li><a href="<?= BASE_URL . $controller; ?>/periode"><i class="fa fa fa-server"></i> <span>Kelola Periode Belajar</span></a></li>
                </ul>
              </li>

              <!-- JURUSAN -->
              <li class="has-children">
                <a href="#"><i class="fa fa-clock-o"></i> <span>Jurusan</span> <i class="fa fa-angle-right arrow"></i></a>
                <ul class="child-nav">
                  <li><a href="<?= BASE_URL . $controller; ?>/tambahJurusan"><i class="fa fa-bars"></i> <span>Buat Jurusan Baru</span></a></li>
                  <li><a href="<?= BASE_URL . $controller; ?>/jurusan"><i class="fa fa fa-server"></i> <span>Kelola Jurusan Belajar</span></a></li>
                </ul>
              </li>

            <?php } ?>

            <!-- PASSWORD -->
            <li><a href="<?= BASE_URL . $controller; ?>/gantiPassword"><i class="fa fa fa-server "></i> <span> Ganti Password</span></a></li>

            </li>
        </div>
        <!-- /.sidebar-nav -->
      </div>
      <!-- /.sidebar-content -->
    </div>