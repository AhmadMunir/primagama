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
          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Area Chart Example</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id Produk</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Gambar</th>
                      <th>Deskripsi</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      $no = 1;
                      foreach($tbl_products as $u){?>
                        <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $u->nama?></td>
                    <td><?php echo $u->harga?></td>
                    <td><?php echo $u->gambar?></td>
                    <td><?php echo $u->deskripsi?></td>
                    <!-- <td width="250">
                      <a href="<?php echo base_url('admin/product/edit/'.$product->id_product)?>"
                        class="btn btn-small"><i class="fas fa-edit"></i>Edit</a>
                      <a onclick="deleteConfirm('<?php echo base_url('admin/product/delete/'.$product->id_product)?>')"
                        href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i>Hapus</a>
                    </td> -->

                  </tbody>
                <?php } ?>
                </table>
              </div>
            </div>
          
          </div>

        </div>

        <?php $this->load->view('admin/_partial/footer.php') ?>

      </div>
      <!-- /.content-wrapper -->

    </div>

  </body>

</html>
