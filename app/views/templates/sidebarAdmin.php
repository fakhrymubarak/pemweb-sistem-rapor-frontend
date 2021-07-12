<div class="content-wrapper">
  <div class="content-container">
    <div class="left-sidebar bg-black-300 box-shadow ">
      <div class="sidebar-content">
        <div class="user-info">
          <img src="http://placehold.it/90/c2c2c2?text=Admin" class="img-circle profile-img">
          <h6 class="title">Administrator</h6>
          <small class="info">SMA Negeri 1 Indonesia</small>
        </div>
        <!-- /.user-info -->

        <div class="sidebar-nav">
          <ul class="side-nav color-gray">
            <li class="nav-header">
              <span class=""></span>
            </li>
            <li>
              <a href="<?= BASE_URL; ?>dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>

            </li>

            <li class="nav-header">
            </li>
            <li class="has-children">
              <a href="#"><i class="fa fa-file-text"></i> <span>Daftar Kelas</span> <i class="fa fa-angle-right arrow"></i></a>
              <ul class="child-nav">
                <li><a href="add-class.php"><i class="fa fa-bars"></i> <span>Buat Kelas Baru</span></a></li>
                <li><a href="manage-classes.php"><i class="fa fa fa-server"></i> <span>Kelola Kelas</span></a></li>

              </ul>
            </li>
            <li class="has-children">
              <a href="#"><i class="fa fa-file-text"></i> <span>Mata Pelajaran</span> <i class="fa fa-angle-right arrow"></i></a>
              <ul class="child-nav">
                <li><a href="add-subject.php"><i class="fa fa-bars"></i> <span>Buat Mapel Baru</span></a></li>
                <li><a href="manage-subjects.php"><i class="fa fa fa-server"></i> <span>Kelola Mapel</span></a></li>
                <li><a href="add-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Tambah Mapel Lintas Minat</span></a></li>
                <a href="manage-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Kelola Mapel Lintas Minat</span></a>
            </li>
          </ul>
          </li>
          <li class="has-children">
            <a href="#"><i class="fa fa-users"></i> <span>Siswa</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul class="child-nav">
              <li><a href="add-students.php"><i class="fa fa-bars"></i> <span>Tambah Data Siswa</span></a></li>
              <li><a href="manage-students.php"><i class="fa fa fa-server"></i> <span>Kelola Data Siswa</span></a></li>

            </ul>
          </li>
          <li class="has-children">
            <a href="#"><i class="fa fa-users"></i> <span>Tenaga Pendidik</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul class="child-nav">
              <li><a href="add-teachers.php"><i class="fa fa-bars"></i> <span>Tambahkan Guru</span></a></li>
              <li><a href="manage-teachers.php"><i class="fa fa fa-server"></i> <span>Kelola Guru</span></a></li>

            </ul>
          </li>
          <li class="has-children">
            <a href="#"><i class="fa fa-graduation-cap"></i> <span>Hasil Belajar</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul class="child-nav">
              <li><a href="add-result.php"><i class="fa fa-bars"></i> <span>Tambah Hasil Belajar</span></a></li>
              <li><a href="manage-results.php"><i class="fa fa fa-server"></i> <span>Kelola Hasil Belajar</span></a></li>

            </ul>
          </li>
          <li class="has-children">
            <a href="#"><i class="fa fa-clock-o"></i> <span>Periode</span> <i class="fa fa-angle-right arrow"></i></a>
            <ul class="child-nav">
              <li><a href="add-periode.php"><i class="fa fa-bars"></i> <span>Buat Periode Baru</span></a></li>
              <li><a href="manage-periode.php"><i class="fa fa fa-server"></i> <span>Kelola Periode Belajar</span></a></li>

            </ul>
          </li>
          <li><a href="change-password.php"><i class="fa fa fa-server "></i> <span> Ganti Password</span></a></li>

          </li>
        </div>
        <!-- /.sidebar-nav -->
      </div>
      <!-- /.sidebar-content -->
    </div>