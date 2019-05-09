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
              Daftar Siswa Primagama</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Sekolah</th>
                      <th>Kelas</th>
                      <th>Program</th>
                      <th>Kelas Primagama</th>
                      <th>Pilihan</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      $no = 1;

                      foreach($view_siswa as $u){
                        $id = $u->id_siswa;
                        ?>
                        <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $u->nama_lengkap?></td>
                    <td><?php echo $u->sekolah?></td>
                    <td><?php echo $u->kelas?></td>
                    <td><?php echo $u->nama_program?></td>
                    <td><?php echo $u->nama_kelas?></td>
                    <td width="250">
                      <a href="#"
                       class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                      <a onclick="deleteConfirm('<?php echo site_url('admin/Siswa/delete/'. $id) ?>')"
                       href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>

        <?php $this->load->view('admin/_partial/footer.php') ?>

      </div>
      <!-- /.content-wrapper -->

    </div>h
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>

    <?php $this->load->view('admin/_partial/js.php') ?>
  </body>

</html>
