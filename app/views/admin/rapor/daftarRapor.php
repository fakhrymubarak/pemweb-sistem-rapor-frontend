<?php
$listSiswa = $data['listRapor'];
$status = $data['status'];
?>

<style>
  .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }

  .succWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }
</style>
<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Kelola Rapor Siswa</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>admin/dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li> Rapor</li>
          <li class="active">Kelola Rapor Siswa</li>
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
                <h5>Lihat Informasi Siswa</h5>
              </div>
            </div>

            <div class="panel-body p-20">
              <a href="<?= BASE_URL; ?>admin/tambahRapor" class="btn btn-primary mb-20">Tambah Hasil Belajar</a>

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
                    <th>Nama </th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Total Nilai</th>
                    <th>Total Mapel</th>
                    <th>Persentasi</th>
                    <th>Action</th>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($listSiswa as $siswa) {
                  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $siswa['nama_siswa']; ?></td>
                      <td><?= $siswa['nis']; ?></td>
                      <td><?= $siswa['jenjang_kelas'] . " " . $siswa['nama_jurusan'] . " " . $siswa['urutan_kelas']; ?></td>
                      <td style="width: 10%"><?= (int)$siswa['total_nilai']; ?></td>
                      <td style="width: 10%"><?= (int)$siswa['total_mapel']; ?></td>
                      <td style="width: 10%"><?= $persentasiNilai = (int)$siswa['total_nilai'] / (int)$siswa['total_mapel']; ?> %</td>
                      <td style="width: 25%">
                        <a href="<?= BASE_URL; ?>admin/updateRapor/<?= $siswa['nis']; ?>" class="btn btn-warning">Detail</a>
                        <a href="<?= BASE_URL; ?>admin/detailRapor/<?= $siswa['nis'] . "/" . $siswa['id_kelas']; ?>" class="btn btn-primary">Preview</a>
                      </td>
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