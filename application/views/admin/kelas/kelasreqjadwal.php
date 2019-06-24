<!DOCTYPE hrml>
<html lang="en">
  <head>
    <?php $this->load->view('admin/_partial/head.php') ?>
  </head>
  <body>
    <?php $this->load->view('admin/_partial/navbar.php') ?>
    <div id="wrapper">


      <?php $this->load->view('admin/_partial/sidebar.php') ?>

      <div id="content-wrapper">

        <div class="container-fluid">


          <?php $this->load->view('admin/_partial/breadcrumb.php')?>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Kelas Request Jadwal</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Mapel</th>
                      <th>Nama Tentor</th>
                      <th>Ruang</th>
                      <th>Tanggal</th>
                      <th>Jam</th>

                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      $no = 1;

                      foreach($kelasreq as $u){

                        ?>
                        <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $u->nama_mapel;?></td>
                    <td><?php echo $u->nama_tentor;?></td>
                    <td><?php echo $u->nama_ruang;?></td>
                    <td><?php echo $u->tanggal;?></td>
                    <td><?php echo $u->jam;?></td>

</tr>
                  <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          </div>

        </div>



      </div>
      <!-- /.content-wrapper -->


    <!-- <?php// $this->load->view('admin/_partial/footer.php') ?> -->
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>

    <?php $this->load->view('admin/_partial/js2.php') ?>
  </body>

</html>
