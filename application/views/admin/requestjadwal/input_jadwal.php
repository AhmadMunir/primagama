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

          <div class="card-header">Input jadwal</div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url().'admin/inputjadwal/tambah_jadwal';?>">
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="Mapel" name="mapel" class="form-control" placeholder="Mapel" required="required" autofocus="autofocus">
                      <label for="Mapel">Mapel</label>
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
                  <div class="col-md-2">
                    <div class="form-label-group">
                      Hari :
                  </div>
                  </div>
                  <div class="col-md-3">
                    <select name="hari" id="hari" style="width: 200px;">
                      <option value="">Pilih</option>
                      <option value="1">Senin</option>
                      <option value="2">Selasa</option>
                      <option value="3">Rabu</option>
                      <option value="4">Kamis</option>
                      <option value="5">Jumat</option>

                    </select>
                  </div>
                </div>
              </div>
            
               <div class="form-group">
              
               <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">
                      Jam:
                    </div>
                  </div>
                  <div class="col-md-3">
                      <input type="time" id="jam" name="jam" class="form-control" placeholder="Jam" required="required">
                    </div>
                  </div>
             </div>
                  <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <input type="text" id="kelas" name="kelas" class="form-control" placeholder="kelas" required="required" autofocus="autofocus">
                      <label for="kelas">Kelas</label>
                    </div>
                  </div>
                 
                </div>
              </div>
                <div class="form-group">
                <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">
                      Tentor :
                  </div>
                  </div>
                  <div class="col-md-3">
                    <select name="tentor" id="tentor" style="width: 200px;">
                      <option value="">Pilih</option>
                      <?php
                      foreach ($tentor as $data) { // Lakukan looping pada variabel siswa dari controller
                          echo "<option value='".$data->id_tentor."'>".$data->nama."</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
               <div class="form-group">
                <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">
                      Ruang :
                  </div>
                  </div>
                  <div class="col-md-3">
                    <select name="ruang" id="ruang" style="width: 200px;">
                      <option value="">Pilih</option>
                      <?php
                      foreach ($ruang as $data) { // Lakukan looping pada variabel siswa dari controller
                          echo "<option value='".$data->id_ruang."'>".$data->nama_ruang."</option>";
                      }
                      ?>
                    </select>
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
