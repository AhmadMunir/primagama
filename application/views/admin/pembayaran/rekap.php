<!DOCTYPE html>
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
                    Rekap Tagihan Siswa Primagama</div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <a href="<?php echo base_url('admin/pembayaran/pdf') ?>"class="btn btn-small"><i class="fas fa-print"></i> &nbsp Cetak Rekap Pembayaran Siswa Primagama Bondowoso</a>
                      <br><br>
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>ID Pembayaran</th>
                            <th>Waktu Pembayaran</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Nama Program</th>
                            <th>Jumlah Bayar</th>
                            <th>Sisa Tagihan</th>
                          </tr>
                        </thead>


                        <tbody>
                          <?php
                            $no = 1;

                            foreach($view_angsuran as $ang){
                              $id = $ang->id_pembayaran;
                              ?>
                              <tr>
                          <td><?php echo $no++?></td>
                          <td><?php echo $ang->id_pembayaran?></td>
                          <td><?php echo $ang->waktu?></td>
                          <td><?php echo $ang->nama_lengkap?></td>
                          <td><?php echo $ang->kelas?></td>
                          <td><?php echo $ang->nama_program?></td>
                          <td><?php echo $ang->jumlah_bayar?></td>
                          <td><?php echo $ang->sisa_tagihan?></td>
                        <?php } ?>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>

          </div>



        </div>
        <!-- /.content-wrapper -->

      <?php $this->load->view('admin/_partial/footer.php') ?>
      <?php $this->load->view('admin/_partial/scrolltop.php') ?>


        <?php $this->load->view('admin/_partial/modal.php') ?>

        <?php $this->load->view('admin/_partial/js.php') ?>

    </body>
</html>
