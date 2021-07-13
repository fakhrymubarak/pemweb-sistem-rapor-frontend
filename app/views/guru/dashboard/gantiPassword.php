<?php
$success = $data;


?>
<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Ganti Password Guru</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>guru/dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li>Guru</li>
          <li class="active">Ganti Password Guru</li>
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
                <h5>Ganti Password</h5>
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


              <form class="form-horizontal" method="post" action="<?= BASE_URL; ?>guru/runGantiPassword">
                <div class="form-group">
                  <label for="oldPassword" class="col-sm-2 control-label">Password Lama:</label>
                  <div class="col-sm-10">
                    <input type="password" name="oldPassword" class="form-control" id="oldPassword" placeholder="Masukkan Password Lama" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="newPassword" class="col-sm-2 control-label">Password Baru:</label>
                  <div class="col-sm-10">
                    <input type="password" name="newPassword" class="form-control" id="newPassword" onchange="check_pass()" placeholder=" Masukkan Password Baru" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="confirmPassword" class="col-sm-2 control-label">Re-Password Baru:</label>
                  <div class="col-sm-10">
                    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" onchange="check_pass()" placeholder=" Masukkan Kembali Password Baru" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id="submit" class="btn btn-primary">Update</button>
                    <i id="warn" hidden="true">Password baru tidak sama!</i>
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

<script>
  function check_pass() {
    if (document.getElementById('newPassword').value ==
      document.getElementById('confirmPassword').value) {
      document.getElementById('submit').disabled = false;
      document.getElementById('warn').hidden = true;

    } else {
      document.getElementById('submit').disabled = true;
      document.getElementById('warn').hidden = false;

    }
  }
</script>