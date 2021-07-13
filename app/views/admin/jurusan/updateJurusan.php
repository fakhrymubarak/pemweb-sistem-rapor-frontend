<?php
$jurusan = $data;

?>
<div class="main-page">
  <div class="container-fluid">
    <div class="row page-title-div">
      <div class="col-md-6">
        <h2 class="title">Update Jurusan</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>admin\dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Update Jurusan</li>
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
                <h5>Update Jurusan</h5>
              </div>
            </div>

            <div class="panel-body">
              <form class="form-horizontal" method="post" action="<?= BASE_URL; ?>admin\runUpdateJurusan\<?= $jurusan['id_jurusan']; ?>">
                <div class="form-group">
                  <label for="jurusan" class="col-sm-2 control-label">Nama Jurusan:</label>
                  <div class="col-sm-10">
                    <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?= $jurusan['nama_jurusan']; ?>" required>
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