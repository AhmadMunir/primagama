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
          <?php if ($this->session->flashdata('gagal')): ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('gagal'); ?>
          </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('sukses')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('sukses'); ?>
          </div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('gagal2')): ?>
          <div class="alert alert-warning" role="alert">
            <?php echo $this->session->flashdata('gagal2'); ?>
          </div>
          <?php endif; ?>

          <div class="card-header">Input jadwal</div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url().'admin/jadwaltetap/tambah_jadwal';?>">
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-2">
                  <div class="form-label-group">
                    Mapel :
                </div>
                </div>
                <div class="col-md-3">
                  <select class="js-example-basic-single" name="mapel" id="mapel" style="width: 200px;">
                    <option value="">Pilih</option>
                    <?php
                    foreach ($mapel as $data) { // Lakukan looping pada variabel siswa dari controller
                        echo "<option value='".$data->id_mapel."'>".$data->nama_mapel."</option>";
                    }
                    ?>
                  </select>
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
                    <select  name="hari" id="hari" style="width: 200px;">
                      <option value="">Pilih</option>
                      <option value="Senin">Senin</option>
                      <option value="Selasa">Selasa</option>
                      <option value="Rabu">Rabu</option>
                      <option value="Kamis">Kamis</option>
                      <option value="Jumat">Jumat</option>

                    </select>
                  </div>
                </div>
              </div>
             <div class="form-group">
             <div class="form-row">
               <div class="col-md-2">
                 <div class="form-label-group">
                   Kelas :
               </div>
               </div>
               <div class="col-md-3">
                 <select name="kelas" id="kelas" style="width: 200px;">
                   <option value="">Pilih</option>
                   <?php
                   foreach ($kelas as $data) { // Lakukan looping pada variabel siswa dari controller
                       echo "<option value='".$data->id_kelas."'>".$data->nama_kelas."</option>";
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
                  Jam:
                </div>
              </div>
              <div class="col-md-3">
                  <select class="jam" name="jam" id="jam">
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
                  <div class="col-md-12">
                    <div id="notif">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div id="notiff">

                    </div>
                  </div>
                  <style>
                  #notif,#notiff{
                    color: red;
                  }
                  </style>
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

    <?php $this->load->view('admin/_partial/js.php') ?>

    <script>
    $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
      // Kita sembunyikan dulu untuk loadingnya
      $("#loading").hide();

      $("#ruang").change(function(){ // Ketika user mengganti atau memilih data provinsi
         // Sembunyikan dulu combobox kota nya
        $("#loading").show(); // Tampilkan loadingnya
          var hari = $("#hari").val();
          var jam = $("#jam").val();
          var ruang = $("#ruang").val();
        $.ajax({

          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?php echo base_url("admin/Jadwaltetap/cekJadwal"); ?>", // Isi dengan url/path file php yang dituju
          data: {hari : hari, jam : jam, ruang : ruang}, // data yang akan dikirim ke file yang dituju
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ // Ketika proses pengiriman berhasil

            $("#notif").html(response.response).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
        });
      });
    });
    </script>
    <script>
    $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
      // Kita sembunyikan dulu untuk loadingnya
      $("#loading").hide();

      $("#jam").change(function(){ // Ketika user mengganti atau memilih data provinsi
         // Sembunyikan dulu combobox kota nya
        $("#loading").show(); // Tampilkan loadingnya
          var hari = $("#hari").val();
          var jam = $("#jam").val();
          var kelas = $("#kelas").val();
        $.ajax({

          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?php echo base_url("admin/Jadwaltetap/cekJadwalkelas"); ?>", // Isi dengan url/path file php yang dituju
          data: {hari : hari, jam : jam, kelas : kelas}, // data yang akan dikirim ke file yang dituju
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ // Ketika proses pengiriman berhasil

            $("#notiff").html(response.responsee).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
        });
      });
    });
    </script>
  </body>

</html>
