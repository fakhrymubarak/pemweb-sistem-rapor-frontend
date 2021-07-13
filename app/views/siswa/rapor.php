<?php
$siswa = $data['siswa'];
$listRapor = $data['listRapor'];
$controller = $data['controller'];

?>

<div class="container-fluid">
  <div class="row page-title-div">
    <div class="col-md-12">
      <h2 class="title" align="center">Result Management System</h2>
    </div>
  </div>
</div>

<section class="section" id="printed">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-10 col-md-offset-1">

        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title">
              <h3 align="center">Student Result Details</h3>
              <hr>

              <div class="row">
                <div class="col-md-7">
                  <div class="col-md-3">
                    <b>Tahun Ajaran</b>
                    <br><br>
                    <b>NIS</b>
                    <br><br>
                    <b>Kelas</b>
                    <br><br>
                  </div>

                  <div class="col-md-4">
                    <b>: <?= $siswa['nama_siswa']; ?></b>
                    <br><br>
                    <b>: <?= $siswa['nis']; ?></b>
                    <br><br>
                    <b>: <?= $siswa['jenjang_kelas'] . " " . $siswa['nama_jurusan'] . " " . $siswa['urutan_kelas']; ?></b>
                    <br><br>
                  </div>
                </div>


                <div class="col-md-5">
                  <div class="col-md-5">
                    <b>Tahun Ajaran</b>
                    <br><br><br>
                    <b>Semester</b>
                    <br><br>
                  </div>

                  <div class="col-md-7">
                    <b>: <?= $listRapor[0]['tahun_ajaran']; ?></b>
                    <br><br><br>
                    <b>: <?= $listRapor[0]['semester']; ?></b>
                    <br>
                  </div>
                </div>
              </div>

            </div>

            <div class="panel-body p-20">
              <table class="table table-hover table-bordered" border="1" width="100%">
                <thead>
                  <tr style="text-align: center">
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">Mata Pelajaran</th>
                    <th style="text-align: center">Nilai</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $i = 1;
                  $totalNilai = 0;
                  foreach ($listRapor as $hasil) {
                    $totalNilai += (int)$hasil['nilai']; ?>

                    <tr>
                      <th scope="row" style="text-align: center"><?= $i; ?></th>
                      <td style="text-align: left"><?= $hasil['nama_mapel']; ?></td>
                      <td style="text-align: center"><?= $hasil['nilai']; ?></td>
                    </tr>

                  <?php $i++;
                    $percentage = $totalNilai / ($i - 1);
                  } ?>

                  <tr>
                    <th scope="row" colspan="2" style="text-align: center">Total Nilai</th>
                    <td style="text-align: center"><b><?= $totalNilai . "/" . ($i - 1) * 100; ?></b></td>
                  </tr>

                  <tr>
                    <th scope="row" colspan="2" style="text-align: center">Persentasi</th>
                    <td style="text-align: center"><b><?= $percentage; ?> %</b></td>
                  </tr>

                  <tr>

                    <td colspan="3" align="center"><i class="fa fa-print fa-2x" aria-hidden="true" style="cursor:pointer" OnClick="CallPrint(this.value)"></i></td>
                  </tr>

                </tbody>
              </table>

            </div>
          </div>
        </div>


        <div class="col-sm-6">
          <?php if ($controller == "admin") { ?>
            <a href="<?= BASE_URL; ?>admin\rapor">Back to List Rapor</a>
          <?php } elseif ($controller == "guru") { ?>
            <a href="<?= BASE_URL; ?>guru\rapor">Back to List Rapor</a>
          <?php } elseif ($controller == "siswa") { ?>
            <a href="<?= BASE_URL; ?>siswa\index">Back to Home</a>
          <?php }  ?>


        </div>

      </div>

    </div>
</section>