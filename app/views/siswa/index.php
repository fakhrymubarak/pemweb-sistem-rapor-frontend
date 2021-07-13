<?php
$listKelas = $data['kelas'];
$listPeriode = $data['periode'];
$founded = $data['founded'];
?>

<div class="container main-wrapper mt-50" align="center">
  <h1>Sistem Informasi Akademik Sekolah</h1>
  <div class="panel-body p-20 mt-50">
    <form action="<?= BASE_URL; ?>siswa/runLoginRapor" method="post">
      <div class="form-group">
        <label for="nis">Masukkan Nomor Induk Siswa</label>
        <input type="text" class="form-control" id="nis" placeholder="Masukkan Nomor Induk Siswa (NIS)" autocomplete="off" name="nis" required>
      </div>


      <div class="form-group">
        <label for="idKelas">Kelas</label>
        <select name="idKelas" class="form-control" id="idKelas" required>
          <option value="">Pilih Kelas</option>

          <?php foreach ($listKelas as $kelas) { ?>

            <option value="<?= $kelas['id_kelas']; ?>">
              <?= $kelas['jenjang_kelas'] . " " . $kelas['nama_jurusan'] . " " . $kelas['urutan_kelas']; ?>
            </option>

          <?php } ?>

        </select>
      </div>

      <div class="form-group">
        <label for="idPeriode">Periode</label>
        <select name="idPeriode" class="form-control" id="idPeriode" required>
          <option value="">Pilih Periode</option>

          <?php foreach ($listPeriode as $periode) { ?>
            <option value="<?= $periode['id']; ?>">
              <?= $periode['tahun_ajaran'] . " - " . $periode['semester']; ?>
            </option>
          <?php } ?>

        </select>
      </div>


      <?php if ($founded == false) { ?>
        <div class="p-3 mb-2 bg-danger text-white">NIS atau Kelas Salah!</div>
      <?php } ?>


      <div class=" form-group mt-20">
        <div class="">
          <button type="submit" class="btn btn-success btn-labeled pull-right">Lihat Hasil<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
          <div class="clearfix"></div>
        </div>
      </div>
    </form>
  </div>
</div>