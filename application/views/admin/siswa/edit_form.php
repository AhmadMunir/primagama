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




          <div class="card-header">Edit Data Siswa</div>
          <div class="card-body">

            <form action="<?php echo base_url('admin/siswa/edit') ?>" method="post" enctype="multipart/form-data" >
            <form method="post" action="<?php echo base_url().'admin/siswa/edit_siswa';?>">

              <input type="hidden" name="id_siswa" value="<?php echo $view_siswa->id_siswa; ?>">

              <div class="form-group">
                <label for="name">Nama Lengkap*</label>
                <input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
                 type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $siswa->nama_lengkap ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_lengkap') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Sekolah*</label>
                <input class="form-control <?php echo form_error('sekolah') ? 'is-invalid':'' ?>"
                 type="text" name="sekolah" placeholder="Sekolah" value="<?php echo $siswa->sekolah ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('sekolah') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">kelas*</label>
                <input class="form-control <?php echo form_error('kelas') ? 'is-invalid':'' ?>"
                 type="text" name="kelas" placeholder="Kelas" value="<?php echo $siswa->kelas ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('kelas') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Nama Program*</label>
                <input class="form-control <?php echo form_error('nama_program') ? 'is-invalid':'' ?>"
                 type="text" name="nama_program" placeholder="Nama Program" value="<?php echo $siswa->nama_program ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_program') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="name">Nama Kelas*</label>
                <input class="form-control <?php echo form_error('nama_kelas') ? 'is-invalid':'' ?>"
                 type="text" name="nama_lengkap" placeholder="Nama Kelas" value="<?php echo $siswa->nama_kelas ?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('nama_kelas') ?>
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
