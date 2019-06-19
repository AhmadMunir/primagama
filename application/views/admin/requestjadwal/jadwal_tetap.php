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

          <?php foreach ($kelas as $k){
            $id = $k->id_kelas;
            ?>

            <!-- DataTables Example -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Jadwal Kelas <?php echo $k->nama_kelas ?></div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Mapel</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Ruang</th>
                        <th>Tentor</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php
                        $no = 1;
                        $koneksi = mysqli_connect('localhost', 'root', '', 'primagama');
                        $query = mysqli_query($koneksi, "SELECT * FROM view_jadwal WHERE id_kelas =".$id." ORDER BY hari DESC, jam asc");

                      while ($a = mysqli_fetch_array($query)) {
                           // $id = $u->id_jadwal;
                          ?>
                          <tr>
                      <td><?php echo $no?></td>
                      <td><?php echo $a['nama_mapel']?></td>
                      <td><?php echo $a['hari']?></td>
                      <td><?php echo $a['jam']?></td>
                      <td><?php echo $a['nama_ruang']?></td>
                      <td><?php echo $a['nama']?></td>

                    <?php } ?>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <br><br><br>

            <?php
          }  ?>



          <!-- DataTables Example -->
          <!-- <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Jadwal Tetap Siswa di Primagama</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Mapel</th>
                      <th>Hari</th>
                      <th>Jam</th>
                      <th>Kelas</th>
                      <th>Tentor</th>
                      <th>Ruang</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      $no = 1;

                      foreach($view_jadwal as $u){
                         $id = $u->id_jadwal;
                        ?>
                        <tr>
                    <td><?php echo $u->nama_mapel?></td>
                    <td><?php echo $u->hari?></td>
                    <td><?php echo $u->jam?></td>
                    <td><?php echo $u->nama_kelas?></td>
                    <td><?php echo $u->nama?></td>
                    <td><?php echo $u->nama_ruang?></td>





                  <?php } ?>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div> -->

        </div>


      </div>
      <!-- <?php //$this->load->view('admin/_partial/footer.php') ?> -->
      <!-- /.content-wrapper -->

    </div>

    
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>

    <?php $this->load->view('admin/_partial/js.php') ?>
  </body>

</html>
