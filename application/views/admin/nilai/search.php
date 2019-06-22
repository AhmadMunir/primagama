<div class="row">
  <?php foreach ($kelas as $k) {
    $jj = $k->id_jenjang;
    ?>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white <?php
    if ($jj == 1) {
      echo "bg-primary";
    }elseif ($jj == 2) {
      echo "bg-success";
    }elseif ($jj == 3) {
      echo "bg-warning";
    }else {
      echo "bg-danger";
    }
     ?> o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-comments"></i>
        </div>
        <div class="mr-5"><?php echo $k->nama_kelas; ?></div>
        <small><?php echo $k->jumlah; ?> siswa</small>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/nilai/detail/'.$k->id_kelas); ?>">
        <span class="float-left">Lihat Detail</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
<?php } ?>
</div>
