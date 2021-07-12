<?php
$founded = $data['founded'];
?>

<div class="main-wrapper">
  <div class="">
    <div class="row">
      <h1 align="center">Sistem Informasi Akademik Sekolah</h1>
      <section class="section">
        <div class="row mt-40">
          <div class="col-md-6 col-md-offset-3 pt-30">

            <div class="row mt-30 ">
              <div class="col-md-12 ">
                <div class="panel">
                  <div class="panel-heading ">
                    <div class="panel-title text-center">
                      <h4>Login Sebagai Guru</h4>
                    </div>
                  </div>
                  <div class="panel-body p-20">

                    <form class="form-horizontal" method="post" action="<?= BASE_URL; ?>guru/runLogin">
                      <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Usename" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" required>
                        </div>
                      </div>

                      <?php if ($founded == false) { ?>
                        <div class="p-3 mb-2 bg-danger text-white text-center">Username atau Password Salah!</div>
                      <?php } ?>

                      <div class="form-group mt-20">
                        <div class="col-sm-offset-2 col-sm-10">

                          <button type="submit" class="btn btn-success btn-labeled pull-right">Login<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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