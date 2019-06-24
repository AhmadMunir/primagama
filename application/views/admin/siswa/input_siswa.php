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




          <div class="card-header">Input Data Siswa</div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url().'admin/siswa/tambah_siswa';?>">
              <input type="hidden" name="id_siswa" value="<?php echo $kodeunik ?>">
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="namaLenkap" name="namaLenkap" class="form-control" placeholder="Nama Lengkap" required="required" autofocus="autofocus">
                      <label for="namaLenkap">Nama Lengkap</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="namaPanggilan" name="namaPanggilan"class="form-control" placeholder="Nama Panggilan" required="required">
                      <label for="namaPanggilan">Nama Panggilan</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-3">
                    <div class="form-label-group">
                      <input type="text" id="tempat" name="tempat" class="form-control" placeholder="Tempat" required="required">
                      <label for="tempat">Tempat</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-label-group">
                      <input type="date" id="tanggalLahir" name="tanggalLahir" class="form-control" placeholder="Tanggal Lahir" required="required">
                      <label for="tanggalLahir">Tanggal Lahir</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="address" id="address" class="form-control" placeholder="Alamat" required="required">
                  <label for="address">Alamat</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">
                      Jenjang :
                  </div>
                  </div>
                  <div class="col-md-3">
                    <select name="jenjang" id="jenjang" style="width: 200px;">
                      <option value="">Pilih</option>
                      <?php
                      foreach ($jenjang as $data) { // Lakukan looping pada variabel siswa dari controller
                          echo "<option value='".$data->id_jenjang."'>".$data->jenjang."</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-1">
                    <div class="form-label-group">
                      Kelas :
                  </div>
                  </div>
                  <div class="col-md-3">
                    <select name="kelas" id="kelas" style="width: 200px;">
                      <option value="">Pilih</option>
                    </select>

                    <div id="loading" style="margin-top: 15px;">
                      <img src="images/loading.gif" width="18"> <small>Loading...</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">
                      Asal Sekolah :
                  </div>
                  </div>
                  <div class="col-md-6">
                    <select class="js-example-basic-single" name="sekolah" id="sekolah" style="width: 600px;">
                      <option value="">Pilih</option>
                    </select>

                    <div id="loading2" style="margin-top: 15px;">
                      <img src="images/loading.gif" width="18"> <small>Loading...</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">
                      Program :
                  </div>
                  </div>
                  <div class="col-md-3">
                    <select class="js-example-basic-single" name="program" id="program" style="width: 200px;">
                      <option value="">Pilih</option>
                      <?php
                      foreach ($program as $data) { // Lakukan looping pada variabel siswa dari controller
                          echo "<option value='".$data->id_program."'>".$data->nama_program."</option>";
                      }
                      ?>
                    </select>
                    <input type="hidden" name="biaya" id="biaya">
                    <input type="hidden" name="kode" id="kode" value="<?php echo $kode ?>">

                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
              <div class="col-md-2">
                <div class="form-label-group">
                  Jenis Kelamin :
                </div>
              </div>
              <div class="col-md-3">
                <select name="jk" id="jk" >
                  <option value="null">Pilih</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
          <div class="col-md-6">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="E" required="required">
              <label for="email">E-mail</label>
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
       </div></div>
  <!-- /.content-wrapper -->
    </div>
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>
   <?php $this->load->view('admin/_partial/modal.php') ?>
  <?php $this->load->view('admin/_partial/js2.php') ?>
 </body>
</html>
