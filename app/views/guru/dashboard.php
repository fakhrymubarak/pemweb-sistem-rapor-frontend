<?php
$counter = $data;
?>
<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-sm-6">
        <h2 class="title">Dashboard</h2>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <a class="dashboard-stat bg-primary" href="manage-students.php">
            <span class="number counter"><?= $counter['totalSiswa']; ?></span>
            <span class="name">Siswa Terdaftar</span>
            <span class="bg-icon"><i class="fa fa-users"></i></span>
          </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <a class="dashboard-stat bg-danger" href="manage-subjects.php">
            <span class="number counter"><?= $counter['totalMapel']; ?></span>
            <span class="name">Mata Pelajaran</span>
            <span class="bg-icon"><i class="fa fa-ticket"></i></span>
          </a>
          <!-- /.dashboard-stat -->
        </div>
        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <a class="dashboard-stat bg-success" href="manage-results.php">
            <span class="number counter"><?= $counter['totalRapor']; ?></span>
            <span class="name">Hasil Raport</span>
            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
</div> <!-- end of sidebar guru -->
</div>
</div> <!-- end of header guru -->