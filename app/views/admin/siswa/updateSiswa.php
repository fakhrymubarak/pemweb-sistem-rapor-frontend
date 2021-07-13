<?php
$siswa = $data['siswa'];
$listKelas = $data['kelas'];

?>
<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Update Siswa</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>admin\dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li>Siswa</li>
          <li class="active">Update Siswa</li>
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
                <h5>Update Siswa</h5>
              </div>
            </div>

            <div class="panel-body">
              <form class="form-horizontal" method="post" action="<?= BASE_URL; ?>admin/runUpdateSiswa/<?= $siswa['nis']; ?>">
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $siswa['nama_siswa']; ?>" autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="gender" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">


                    <?php if ($siswa['jenkel'] == 'L') { ?>
                      <input type="radio" name="gender" value="L" required checked> Laki-laki
                      <input type="radio" name="gender" value="P" required> Perempuan
                    <?php } else { ?>
                      <input type="radio" name="gender" value="L" required> Laki-laki
                      <input type="radio" name="gender" value="P" required checked> Perempuan
                    <?php } ?>

                  </div>
                </div>

                <div class="form-group">
                  <label for="nis" class="col-sm-2 control-label">Nomor Induk (NIS)</label>
                  <div class="col-sm-10">
                    <input type="text" name="nis" class="form-control" id="nis" value="<?= $siswa['nis']; ?>" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email Siswa</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" value="<?= $siswa['email']; ?>" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="isActive" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">

                    <?php if ($siswa['isActive'] == '1') { ?>
                      <input type="radio" name="isActive" value="1" required checked> Aktif
                      <input type="radio" name="isActive" value="0" required> Tidak Aktif
                    <?php } else { ?>
                      <input type="radio" name="isActive" value="1" required checked> Aktif
                      <input type="radio" name="isActive" value="0" required> Tidak Aktif
                    <?php } ?>

                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <select name="kelas" class="form-control" id="kelas" required>
                      <option value="">Pilih Kelas</option>

                      <?php foreach ($listKelas as $kelas) {
                        if ($kelas['id_kelas'] == $kelas['id_kelas']) { ?>
                          <option value="<?= $kelas['id_kelas']; ?> " selected>
                            <?= $kelas['jenjang_kelas'] . " " . $kelas['nama_jurusan'] . " " . $kelas['urutan_kelas']; ?>
                          </option>
                        <?php
                          continue;
                        } ?>
                        <option value="<?= $kelas['id_kelas']; ?>">
                          <?= $kelas['jenjang_kelas'] . " " . $kelas['nama_jurusan'] . " " . $kelas['urutan_kelas']; ?>
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