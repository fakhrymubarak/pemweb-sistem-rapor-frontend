<?php
$listPeriode = $data['listPeriode'];
$status = $data['status'];

?>

<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Kelola Periode Belajar</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Kelola Periode Belajar</li>
        </ul>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <h5>Tampilkan Periode Belajar</h5>
              </div>
            </div>

            <div class="panel-body p-20">
              <a href="<?= BASE_URL; ?>admin/tambahPeriode" class="btn btn-primary mb-20">Tambah Periode Belajar</a>


              <?php if ($status == "deleted") { ?>
                <div class="alert alert-success left-icon-alert" role="alert">
                  <strong>Berhasil Menghapus Data</strong>
                </div>

              <?php } else if ($status == "edited") { ?>
                <div class="alert alert-success left-icon-alert" role="alert">
                  <strong>Berhasil Mengupdate Data</strong>
                </div>

              <?php } else if ($status == "failed") { ?>

                <div class="alert alert-danger left-icon-alert" role="alert">
                  <strong>Error</strong>
                </div>
              <?php } ?>
              <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Periode</th>
                    <th>Semester</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($listPeriode as $periode) { ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $periode['tahun_ajaran']; ?></td>
                      <td><?= $periode['semester']; ?></td>
                      <td>
                        <a href="<?= BASE_URL; ?>admin/updatePeriode/<?= $periode['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= BASE_URL; ?>admin/runDeletePeriode/<?= $periode['id']; ?>" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>

                  <?php $i++;
                  } ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>
</div>
</div>