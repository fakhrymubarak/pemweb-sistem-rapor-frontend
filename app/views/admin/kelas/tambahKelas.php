<?php
$success = $data['success'];
$listJurusan = $data['listJurusan'];
$listGuru = $data['listGuru'];

?>
<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Tambah Kelas</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>admin\dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Tambah Kelas</li>
        </ul>
      </div>

    </div>
    <!-- /.row -->
  </div>
  <section class="section">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <h5>Tambah Kelas</h5>
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


              <form class="form-horizontal" method="post" action="<?= BASE_URL; ?>admin\runTambahKelas">
                <div class="form-group">
                  <label for="jenjangKelas" class="col-sm-2 control-label">Kelas:</label>
                  <div class="col-sm-10">
                    <input type="text" name="jenjangKelas" class="form-control" id="jenjangKelas" placeholder="VII, VIII, IX, X, XI, XII" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="jurusan" class="col-sm-2 control-label">Jurusan:</label>
                  <div class="col-sm-10">
                    <select name="jurusan" class="form-control" id="jurusan" required>
                      <option value="">Pilih jurusan</option>

                      <?php foreach ($listJurusan as $jurusan) { ?>
                        <option value="<?= $jurusan['id_jurusan']; ?>">
                          <?= $jurusan['nama_jurusan']; ?>
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
                  <label for="urutan" class="col-sm-2 control-label">Urutan:</label>
                  <div class="col-sm-10">
                    <input type="text" name="urutan" class="form-control" id="urutan" placeholder="1, 2, 3 atau A, B, C" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="wali" class="col-sm-2 control-label">Wali:</label>
                  <div class="col-sm-10">
                    <select name="wali" class="form-control" id="wali" required>
                      <option value="">Pilih wali</option>

                      <?php foreach ($listGuru as $wali) { ?>
                        <option value="<?= $wali['id_guru']; ?>">
                          <?= $wali['nama_guru']; ?>
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
                    <button type="submit" class="btn btn-primary">Buat</button>
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