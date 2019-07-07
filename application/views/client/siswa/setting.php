<!DOCTYPE hrml>
<html lang="en">
 <head>
      <?php $this->load->view('client/_partials/head') ?>
    </head>
    <body>
      <?php $this->load->view('client/_partials/navbar') ?>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <?php $this->load->view('client/_partials/sidebar') ?>
                        <!--/.sidebar-->
                    </div>


            <div class="card-body">
              <?php foreach ($tbl_siswa as $u) {
    $name = $u->username; ?>

              <div class="span8">
                <?php if ($this->session->flashdata('sukses')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('sukses'); ?>
                </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error1')): ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $this->session->flashdata('error1'); ?>
                </div>
                <?php endif; ?>
                <div class="module">
                  <div class="module-head">
                    <h3>Pengaturan</h3>
                  </div>
                  <div class="module-body">
                    <form method="post" action="<?php echo base_url().'siswa/setting/updateprofile'; ?>">

                      <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                            <div class="form-label-group">
                         <center>     <label for="namaLenkap">Username</label></center>
                          <center>   <input type="text" id="name" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Username" required="required" autofocus="autofocus"></center>


                            </div>

                        </div>
                      </div>

                       <div class="col-md-6">
                            <div class="form-label-group">
                             <center>  <label for="namaPanggilan">Email</label></center>
                <center>  <input type="text" id="email" name="email" value="<?php echo $u->email; ?>"class="form-control" placeholder="Email" required="required"></center>

                            </div>
                          </div>
                          <div class="form-label-group">
                           <center>  <label for="namaPanggilan">Nomor HP</label></center>
              <center>  <input type="text" id="nohp" name="nohp" value="<?php echo $u->no_hp; ?>"class="form-control" placeholder="No Hp"></center>

                          </div>

                  <div class="form-group">
                   <center>  <label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" placeholder="Password Baru" name="passBaru">  </center>
                    </div>
                  </div>
                  <div class="form-group">
                   <center>  <label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">   </center>
                    </div>
                    <div class="form-group">
    <center><label for="passLama" class="col-sm-2 control-label">Password Lama</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" placeholder="Password Lama" name="passLama" required>  </center>
    </div>
  </div>

              <div class="form-group">
                <div class="form-row">
              <div class="col-md-6">
             <center><input type="submit" class="btn-primary col-md-4" value="Simpan Perubahan"></center>
              </div>
                    </div>
                  </div>






                  </div>
                    </form>
                  <?php
} ?>
                  </div>
                </div>

              </div>


            </div>

          </div>

          <!-- <?php// $this->load->view('admin/_partial/footer.php') ?> -->
        </div>



      </div>
      <!-- /.content-wrapper -->
 <?php $this->load->view('client/_partials/footer') ?>
        <!-- /footer -->
        <!-- script -->
          <?php $this->load->view('client/_partials/script') ?>
        <!-- /script -->
        <?php $this->load->view('client/_partials/modal') ?>


    </div>
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>

    <?php $this->load->view('admin/_partial/js2.php') ?>
  </body>

</html>
