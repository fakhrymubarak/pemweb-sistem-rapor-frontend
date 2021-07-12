<div class="content-wrapper">
  <div class="content-container">
    <div class="left-sidebar bg-black-300 box-shadow ">
      <div class="sidebar-content">
        <div class="user-info">
          <img src="http://placehold.it/90/c2c2c2?text=Admin" class="img-circle profile-img">
          <h6 class="title">Administrator</h6>
          <!-- <small class="info">SMA Negeri 1 Indonesia</small> -->
        </div>

        <div class="sidebar-nav">
          <ul class="side-nav color-gray">
            <li>
              <a href="<?= BASE_URL; ?>guru/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
            </li>


            <li class="has-children">
              <a href=""><i class="fa fa-users"></i> <span>Siswa</span> <i class="fa fa-angle-right arrow"></i></a>
              <ul class="child-nav">
                <li><a href="<?= BASE_URL; ?>guru/tambahSiswa"><i class="fa fa-bars"></i> <span>Tambah Siswa</span></a></li>
                <li><a href="<?= BASE_URL; ?>guru/siswa"><i class="fa fa fa-server"></i> <span>Kelola Data Siswa</span></a></li>

              </ul>
            </li>

            <li class="has-children">
              <a href=""><i class="fa fa-file-text"></i> <span>Mata Pelajaran</span> <i class="fa fa-angle-right arrow"></i></a>
              <ul class="child-nav">
                <li><a href="<?= BASE_URL; ?>guru/tambahMapel"><i class="fa fa-bars"></i> <span>Buat Mapel Baru</span></a></li>
                <li><a href="<?= BASE_URL; ?>guru/mapel"><i class="fa fa fa-server"></i> <span>Kelola Mapel</span></a></li>
              </ul>

            </li>

            <li class="has-children">
              <a href=""><i class="fa fa-graduation-cap"></i> <span>Hasil Belajar</span> <i class="fa fa-angle-right arrow"></i></a>
              <ul class="child-nav">
                <li><a href="<?= BASE_URL; ?>guru/tambahHasil"><i class="fa fa-bars"></i> <span>Input Hasil Belajar</span></a></li>
                <li><a href="<?= BASE_URL; ?>guru/rapor"><i class="fa fa fa-server"></i> <span>Kelola Hasil Belajar</span></a></li>

              </ul>
            </li>

            <li><a href="change-password.php"><i class="fa fa fa-server "></i> <span> Ganti Password</span></a></li>
            </li>

          </ul>





        </div>
        <!-- /.sidebar-nav -->
      </div>
      <!-- /.sidebar-content -->
    </div>