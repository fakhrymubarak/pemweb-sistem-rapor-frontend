<?php
$listMapel = $data['listMapel'];
$status = $data['status'];
?>

<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Kelola Mata Pelajaran</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>guru\dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Kelola Mata Pelajaran</li>
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
                <h5>Tampilkan Mata Pelajaran</h5>
              </div>
            </div>

            <div class="panel-body p-20">
              <a href="<?= BASE_URL; ?>guru/tambahMapel" class="btn btn-primary mb-20">Tambah Mata Pelajaran</a>


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
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>


                  <?php $i = 1;
                  foreach ($listMapel as $jurusan) { ?>
                    <tr>
                      <td style="width: 5%"><?= $i; ?></td>
                      <td style="width: 40%"><?= $jurusan['nama_mapel']; ?></td>
                      <td style="width: 30%"><?= $jurusan['nama_jurusan']; ?></td>
                      <td style="width: 25%">
                        <a href="<?= BASE_URL; ?>guru/updateMapel/<?= $jurusan['id_mapel']; ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= BASE_URL; ?>guru/runDeleteMapel/<?= $jurusan['id_mapel']; ?>" class="btn btn-danger">Delete</a>
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