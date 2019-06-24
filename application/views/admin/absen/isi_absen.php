<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin/_partial/head.php') ?>
</head>

<body id="page-top">


 <?php $this->load->view('admin/_partial/navbar.php') ?>
  <div id="wrapper">


    <?php $this->load->view('admin/_partial/sidebar.php') ?>

    <div id="content-wrapper">

      <div class="container-fluid">


        <?php $this->load->view('admin/_partial/breadcrumb.php') ?>

        <!-- Icon Cards-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Absensi Siswa Primagama</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jam Datang</th>
                    <th>Jam Pulang</th>
                      <th>Keterangan</th>
                      <th>Tanggal</th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                    $no = 1;

                    foreach($isi as $u){
                      $id = $u->id_siswa;
                      ?>
                      <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $u->nama_lengkap?></td>
                  <td><?php echo $u->jam_datang?></td>
                  <td><?php echo $u->jam_pulang?></td>
                  <td><?php echo $u->keterangan?></td>
                  <td><?php echo $u->tgl?></td>
                 
                <?php } ?>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>



      </div>

      <?php $this->load->view('admin/_partial/footer.php') ?>

    </div>
    <!-- /.content-wrapper -->

  </div>

  <?php $this->load->view('admin/_partial/scrolltop.php') ?>


    <?php $this->load->view('admin/_partial/modal.php') ?>

  <?php $this->load->view('admin/_partial/js.php') ?>
</body>

</html>
