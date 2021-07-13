<?php
$success = $data['isSuccess'];
$siswa = $data['siswa'];
$listRapor = $data["listRapor"];

?>

<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Tambah Data Siswa</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>guru/dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li> Siswa</li>
          <li class="active">Tambah Siswa</li>
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
                <h5>Daftar Nilai Siswa</h5>
              </div>
            </div>
            <div class="panel-body">

              <?php if ($success == "true") { ?>
                <div class="alert alert-success left-icon-alert" role="alert">
                  <strong>Berhasil</strong>
                </div>

              <?php } else if ($success == "false") { ?>

                <div class="alert alert-danger left-icon-alert" role="alert">
                  <strong>Error</strong>
                </div>
              <?php } ?>

              <form class="form-horizontal" method="post" action="<?= BASE_URL; ?>guru/runUpdateNilai/">
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Siswa:</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $siswa['nama_siswa']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nis" class="col-sm-2 control-label">NIS:</label>
                  <div class="col-sm-10">
                    <input type="text" name="nis" class="form-control" id="nis" value="<?= $siswa['nis']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas:</label>
                  <div class="col-sm-10">
                    <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $siswa['jenjang_kelas'] . " " . $siswa['nama_jurusan'] . " " . $siswa['urutan_kelas']; ?>" disabled>
                  </div>
                </div>


                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Periode :</label>
                  <div class="col-sm-10">
                    <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $listRapor[0]['tahun_ajaran'] . " - " . $listRapor[0]['semester']; ?>" disabled>
                  </div>
                </div>

                <a href="<?= BASE_URL; ?>guru/tambahRapor" class="btn btn-primary mb-20">Tambah Hasil Belajar</a>

                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Mata Pelajaran</th>
                      <th>Nilai Lama</th>
                      <th>Update Nilai</th>
                      <th>Action</th>
                  </thead>
                  <tbody>

                    <?php $i = 1;
                    foreach ($listRapor as $rapor) {
                    ?>
                      <tr>
                        <td style="width: 5%"><?= $i; ?></td>
                        <td><?= $rapor['nama_mapel']; ?></td>
                        <td style="width: 15%"><?= $rapor['nilai']; ?></td>
                        <td style="width: 15%">
                          <input type="hidden" name="nis" class="form-control" id="nilai" value="<?= $siswa['nis']; ?>">
                          <input type="hidden" name="id<?= $i; ?>" class="form-control" id="nilai" value="<?= $rapor['id']; ?>">
                          <input type="number" name="nilai<?= $i; ?>" class="form-control" id="nilai" value="<?= $rapor['nilai']; ?>">
                        </td>
                        <td style="width: 20%">
                          <button type="submit" name="submit" value="<?= $i; ?>" class="btn btn-warning">Update</button>
                          <a href="<?= BASE_URL ?>guru/runDeleteNilai/<?= $rapor['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>

                    <?php $i++;
                    } ?>
                  </tbody>
                </table>
              </form>

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