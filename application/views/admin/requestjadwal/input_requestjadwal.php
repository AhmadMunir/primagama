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


          <?php //$this->load->view('admin/_partial/breadcrumb.php')?>

          <div class="card-header">Input Request jadwal</div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url().'admin/inputrequestjadwal/request_jadwal';?>">
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="namalenkap" name="namalenkap" class="form-control" placeholder="Nama lengkap" required="required" autofocus="autofocus">
                      <label for="namalengkap">Nama Lengkap</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="mapel" name="mapel"class="form-control" placeholder="mapel" required="required">
                      <label for="mapel">Mapel</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="form-group">
                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                  <label for="inputEmail">Email address</label>
                </div>
              </div> -->
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-3">
                    <div class="form-label-group">
                      <input type="text" id="mapel" name="tempat" class="form-control" placeholder="mapel" required="required">
                      <label for="mapel">Tanggal</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-label-group">
                      <input type="date" id="kelas" name="kelas" class="form-control" placeholder="kelas" required="required">
                      <label for="kelas">kelas</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="ruang" id="ruang" class="form-control" placeholder="ruang" required="required">
                  <label for="ruang">Ruang</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="jam" name="jam" class="form-control" placeholder="jam" required="required">
                  <label for="jam">Jam</label>
                </div>
              </div>
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
