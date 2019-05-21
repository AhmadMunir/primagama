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

          <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>
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
                      <th>Alamat</th>
                      <th>Nomor Telepon</th>
                      <th>Email</th>
                      <th>Pengampu</th>
                      <th>Detail</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      $no = 1;

                      foreach($view_tentor as $u){
                        $id = $u->id_tentor;
                        ?>
                        <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $u->nama?></td>
                    <td><?php echo $u->alamat?></td>
                    <td><?php echo $u->no_hp?></td>
                    <td><?php echo $u->email?></td>
                    <td><?php echo $u->nama_mapel;
                    ?></td>
                    <td width="250">


                      <a href="<?php echo base_url('admin/tentor/detail/'.$u->id_tentor) ?>"
                       class="btn btn-small"><i class="fas fa-grip-horizontal"></i> Details</a>

                    </td>
                  <?php } ?>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>

          <!-- Sticky Footer -->


      </div>
<!--
      <?php
//        $this->load->view('admin/_partial/footer.php')
      ?> -->

      </div>

<!--
      <?php
    //  $this->load->view('admin/_partial/footer.php')
      ?>
 -->


      </div>

    </div>
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>

    <?php $this->load->view('admin/_partial/js.php') ?>
  </body>

</html>
