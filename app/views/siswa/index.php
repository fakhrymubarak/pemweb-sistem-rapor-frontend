<div class="main-wrapper" align="center">
  <h1>Sistem Informasi Akademik Sekolah</h1>
  <br>
  <div class="panel-body p-20">

    <form action="<?= BASE_URL; ?>" method="post">
      <div class="form-group">
        <label for="rollid">Masukkan Nomor Induk Siswa</label>
        <input type="text" class="form-control" id="rollid" placeholder="NIS" autocomplete="off" name="rollid">
      </div>

      <div class="form-group">
        <label for="default">Kelas</label>
        <select name="class" class="form-control" id="default" required="required">
          <option value="">Pilih Kelas</option>
          <option value=""></option>
        </select>
      </div>

      <div class=" form-group mt-20">
        <div class="">
          <button type="submit" class="btn btn-success btn-labeled pull-right">Lihat Hasil<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
          <div class="clearfix"></div>
        </div>
      </div>
    </form>

    <hr>
  </div>
</div>