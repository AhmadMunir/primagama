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


          <?php $this->load->view('admin/_partial/breadcrumb.php')?>

          <div class="card-header">Input jadwal</div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url().'admin/requestjadwal/buatreqkelas';?>">
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-2">
                  <div class="form-label-group">
                    Mapel :
                </div>
                </div>
                <div class="col-md-3">
                  <input type="text" name="mapel" value="<?php echo $mapel ?>" required>
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
                      <select class="jam" name="jam" required>
                        <option value="">-----Pilih-----</option>
                        <option value="13:00-14:30">13:00-14:30</option>
                        <option value="15:00-16:30">15:00-16:30</option>
                        <option value="18:00-20:30">18:00-20:30</option>
                      </select>
                    </div>
                  </div>
             </div>
             <div class="form-group">
             <div class="form-row">
               <div class="col-md-2">
                 <div class="form-label-group">
                   Tanggal :
               </div>
               </div>
               <div class="col-md-3">
                 <input type="date" name="tanggal">
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
                    <select name="tentor" id="tentor" style="width: 200px;" required>
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
                    <select name="ruang" id="ruang" style="width: 200px;" required>
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
    <?php $this->load->view('admin/_partial/footer.php') ?>
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>

    <?php $this->load->view('admin/_partial/js.php') ?>
  </body>

</html>
