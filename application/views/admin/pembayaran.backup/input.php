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




          <div class="card-header">Input Pembayaran</div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url().'admin/siswa/tambah_siswa';?>">
              <!-- <input type="hidden" name="id_siswa" value="<?php echo $kode ?>"> -->
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="id" name="id" class="form-control" required>
                      <label for="namaLenkap">ID Siswa</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="nama" name="nama"class="form-control"  required="required">
                      <label for="namaPanggilan">Nama Siswa</label>
                    </div>
                  </div>
                </div>
              </div>

<br>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md 6">
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="sisaS" readonly name="sisaS" class="form-control" placeholder="Tempat" required="required">
                      <label for="tempat">Sisa Angsuran Sebelumnya</label>
                    </div>
                  </div>
                </div>
              </div>

                            <div class="form-group">
                              <div class="form-row">
                                <div class="col-md 6">
                                </div>
                                <div class="col-md-6">

                                  <div class="form-label-group">
                                    <input type="number" id="jml" name="jml" class="form-control"  required="required">
                                    <label for="tempat">Jumlah Angsuran</label>
                                  </div>
                                </div>
                              </div>
                            </div>

<hr class="col-md-12">
<div class="form-group">
  <div class="form-row">
    <div class="col-md-4">

    </div>
    <div class="col-md-2">
      <label for="Sisa">Sisa Angsuran :</label>
    </div>
    <div class="col-md-6">
      <div class="form-label-group">
        <input type="text" id="sisaL" name="sisaL" readonly class="form-control" placeholder="Tempat" required="required">
        <label for="tempat">Sisa Angsuran</label>
      </div>
    </div>
  </div>

</div>

      <div class="form-group">
        <div class="form-row">
      <div class="col-md-6">
        <input type="submit" class="btn-primary" value="Tambahkan">
      </div>
            </div>
          </div>
            </form>

          </div>

          </div>

        </div>



      </div>
      <!-- /.content-wrapper -->

    </div>
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>

    <?php $this->load->view('admin/_partial/js2.php') ?>
  </body>

</html>
