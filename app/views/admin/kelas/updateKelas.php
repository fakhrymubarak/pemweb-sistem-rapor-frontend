<?php
$kelas = $data['kelas'];
$listJurusan = $data['listJurusan'];
$listGuru = $data['listGuru'];


?>
<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Update Kelas</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>admin\dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Update Kelas</li>
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
                <h5>Update Kelas</h5>
              </div>
            </div>

            <div class="panel-body">
              <form class="form-horizontal" method="post" action="<?= BASE_URL; ?>admin\runUpdateKelas\<?= $kelas['id_kelas']; ?>">
                <div class="form-group">
                  <label for="jenjangKelas" class="col-sm-2 control-label">Kelas:</label>
                  <div class="col-sm-10">
                    <input type="text" name="jenjangKelas" class="form-control" id="jenjangKelas" value="<?= $kelas['jenjang_kelas']; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="jurusan" class="col-sm-2 control-label">Jurusan:</label>
                  <div class="col-sm-10">
                    <select name="jurusan" class="form-control" id="jurusan" required>
                      <option value="">Pilih jurusan</option>

                      <?php foreach ($listJurusan as $jurusan) {
                        if ($jurusan['id_jurusan'] == $kelas['id_jurusan']) { ?>
                          <option value="<?= $jurusan['id_jurusan']; ?> " selected>
                            <?= $jurusan['nama_jurusan']; ?>
                          </option>
                        <?php
                          continue;
                        } ?>
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
                    <input type="text" name="urutan" class="form-control" id="urutan" value="<?= $kelas['urutan_kelas']; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="wali" class="col-sm-2 control-label">Wali:</label>
                  <div class="col-sm-10">
                    <select name="wali" class="form-control" id="wali" required>
                      <option value="">Pilih wali</option>

                      <?php foreach ($listGuru as $guru) {
                        if ($guru['id_guru'] == $kelas['wali_kelas']) { ?>
                          <option value="<?= $guru['id_guru']; ?> " selected>
                            <?= $guru['nama_guru']; ?>
                          </option>
                        <?php
                          continue;
                        } ?>
                        <option value="<?= $guru['id_guru']; ?>">
                          <?= $guru['nama_guru']; ?>
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
                    <button type="submit" class="btn btn-primary">Update</button>
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