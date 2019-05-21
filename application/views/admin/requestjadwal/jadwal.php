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


          <?php $this->load->view('admin/_partial/breadcrumb.php') ?>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Jadwal Siswa di Primagama</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Mapel</th>
                      <th>tanggal</th>
                      <th>Kelas</th>
                    </tr>
                  </thead>


                  <tbody>
                   <?php
                      $no = 1;

                      foreach($request_jadwal as $u){?>
                  <tr>
                    <td><?php echo $u->mapel?></td>
                    <td><?php echo $u->tanggal?></td>
                    <td><?php echo $u->id_grade?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>


    <?php $this->load->view('admin/_partial/js.php') ?>

  </body>

</html>
