<?php
$guru = $data;

?>
<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Update Guru</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>admin\dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Update Guru</li>
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
                <h5>Update Guru</h5>
              </div>
            </div>

            <div class="panel-body">

              <form class="form-horizontal" method="post" action="<?= BASE_URL; ?>admin\runUpdateGuru\<?= $guru['id_guru']; ?>">
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Guru:</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $guru['nama_guru']; ?>" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="nip" class="col-sm-2 control-label">Nomor Induk Pegawai (NIP):</label>
                  <div class="col-sm-10">
                    <input type="text" name="nip" class="form-control" id="nip" value="<?= $guru['nip']; ?>" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Username:</label>
                  <div class="col-sm-10">
                    <input type="username" name="username" class="form-control" id="username" value="<?= $guru['username']; ?>" minlength="5" required autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password:</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password guru" minlength="6" autocomplete="off">
                  </div>
                </div>

                <div class="form-group">
                  <label for="isWaliKelas" class="col-sm-2 control-label">Status Wali Guru:</label>
                  <div class="col-sm-10">

                    <?php if ($guru['isWaliKelas'] == '1') { ?>
                      <input type="radio" name="isWaliKelas" value="1" required checked> Wali Kelas
                      <input type="radio" name="isWaliKelas" value="0" required> Bukan Wali Kelas
                    <?php } else { ?>
                      <input type="radio" name="isWaliKelas" value="1" required> Wali Guru
                      <input type="radio" name="isWaliKelas" value="0" required checked> Bukan Wali Guru
                    <?php } ?>

                  </div>
                </div>

                <div class="form-group">
                  <label for="isActive" class="col-sm-2 control-label">Status Pegawai:</label>
                  <div class="col-sm-10">

                    <?php if ($guru['isActive'] == '1') { ?>
                      <input type="radio" name="isActive" value="1" required checked> Aktif
                      <input type="radio" name="isActive" value="0" required> Tidak Aktif
                    <?php } else { ?>
                      <input type="radio" name="isActive" value="1" required> Aktif
                      <input type="radio" name="isActive" value="0" required checked> Tidak Aktif
                    <?php } ?>
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