<?php
$listSiswa = $data;

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
        <h2 class="title">Kelola Data Siswa</h2>
      </div>
    </div>

    <div class="row breadcrumb-div">
      <div class="col-md-6">
        <ul class="breadcrumb">
          <li><a href="<?= BASE_URL; ?>guru/dashboard"><i class="fa fa-home"></i> Home</a></li>
          <li> Siswa</li>
          <li class="active">Kelola Data Siswa</li>
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

              <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama </th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Tgl Registrasi</th>
                    <th>Status</th>
                    <th>Edit</th>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($listSiswa as $siswa) { ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $siswa['nama_siswa']; ?></td>
                      <td><?= $siswa['nis']; ?></td>
                      <td><?= $siswa['id_kelas']; ?></td>
                      <td><?= $siswa['reg_date']; ?></td>
                      <td><?= $siswa['isActive']; ?></td>
                      <td>
                        <a href="<?= BASE_URL; ?>guru/updateSiswa"><i class="fa fa-edit" title="Edit Record"></i> </a>
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