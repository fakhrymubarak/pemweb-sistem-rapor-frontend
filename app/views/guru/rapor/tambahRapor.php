<?php
$success = $data['success'];
$listMapel = $data['listMapel'];
$listPeriode = $data['listPeriode'];
?>

<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Tambah Hasil Belajar</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>admin\dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li> Rapor</li>
          <li class="active">Tambah Hasil Beljar</li>
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
                <h5>Biodata Siswa</h5>
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

              <form class="form-horizontal" method="post" action="<?= BASE_URL; ?>admin/runTambahRapor">
                <div class="form-group">
                  <label for="nis" class="col-sm-2 control-label">Nomor Induk (NIS)</label>
                  <div class="col-sm-10">
                    <input type="text" name="nis" class="form-control" id="nis" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="mapel" class="col-sm-2 control-label">Mata Pelajaran</label>
                  <div class="col-sm-10">
                    <select name="mapel" class="form-control" id="mapel" required>
                      <option value="">Pilih Mata Pelajaran</option>

                      <?php foreach ($listMapel as $mapel) { ?>
                        <option value="<?= $mapel['id_mapel']; ?>">
                          <?= $mapel['nama_jurusan'] . " - " . $mapel['nama_mapel']; ?>
                        </option>
                      <?php } ?>

                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="radio" value="0" hidden>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">Nilai Mata Pelajaran</label>
                  <div class="col-sm-10">
                    <input type="number" name="nilai" class="form-control" id="nilai" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="periode" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <select name="periode" class="form-control" id="periode" required>
                      <option value="">Pilih Periode Ajaran</option>

                      <?php foreach ($listPeriode as $periode) { ?>
                        <option value="<?= $periode['id']; ?>">
                          <?= $periode['tahun_ajaran'] . " - " . $periode['semester']; ?>
                        </option>
                      <?php } ?>

                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="radio" value="0" hidden>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                </div>

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