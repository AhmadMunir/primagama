<!DOCTYPE hrml>
<html lang="en">
  <head>
    <?php $this->load->view('admin/_partial/head.php') ?>
    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
    <script>
    $(document).ready(function(){
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
    });
    </script>
  </head>
  <body>
    <?php $this->load->view('admin/_partial/navbar.php') ?>
    <div id="wrapper">


      <?php $this->load->view('admin/_partial/sidebar.php') ?>

      <div id="content-wrapper">

        <div class="container-fluid">


          <?php //$this->load->view('admin/_partial/breadcrumb.php')?>

          <div class="card-header">Input Absen
          <div style='color : green;'><small>*extensi file harus .xlsx dengan ukuran dibawah file 2MB</small></div>
          </div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url("admin/absen/input"); ?>" enctype="multipart/form-data">
              <!--
              -- Buat sebuah input type file
              -- class pull-left berfungsi agar file input berada di sebelah kiri
              -->
              <input type="file" name="file">

              <!--
              -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
              -->
              <input type="submit" name="preview" value="Preview">
            </form>

            <?php
            if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
              if(isset($upload_error)){ // Jika proses upload gagal
                echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                die; // stop skrip
              }

              // Buat sebuah tag form untuk proses import data ke database
              echo "<form method='post' action='".base_url("admin/absen/import")."'>";

              // Buat sebuah div untuk alert validasi kosong
              echo "<div style='color: red;' id='kosong'>
              Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
              </div>";

              echo "<table border='1' cellpadding='8'>
              <tr>
                <th colspan='6'>Preview Data</th>
              </tr>
              <tr>
                <th>NO</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jam Datang</th>
                <th>Jam Pulang</th>
                <th>Keterangan</th>

              </tr>";

              $numrow = 1;
              $kosong = 0;

              // Lakukan perulangan dari data yang ada kosong++di excel
              // $sheet adalah variabel yang dikirim dari controller
              foreach($sheet as $row){
                // Ambil data pada excel sesuai Kolom
                $id = $row['A'];
                $id_siswa = $row['B']; // Ambil data NIS
                $nama = $row['C']; // Ambil data nama
                $jgd = $row['D'];
                $jgp = $row['E'];
                $ket = $row['F'];

                // Cek jika semua data tidak diisi
                if(empty($id_siswa) && empty($jgd) && empty($jgp))
                  continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if($numrow > 1){
                  // Validasi apakah semua data telah diisi
                  $id_td = ( ! empty($id))? "" : " style='background: #E07171;'";
                  $id_siswa_td = ( ! empty($id_siswa))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                  $nama_td= ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                  $jgd_td= ( ! empty($jgd))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                  $jgp_td = ( ! empty($jgp))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah

                  // Jika salah satu data ada yang kosong
                  if(empty($id_siswa) or empty($jgd) or empty($jgp)){
                    $kosong++; // Tambah 1 variabel $kosong
                  }

                  echo "<tr>";
                  echo "<td".$id_td.">".$id."</td>";
                  echo "<td".$id_siswa_td.">".$id_siswa."</td>";
                  echo "<td".$nama_td.">".$nama."</td>";
                  echo "<td".$jgd_td.">".$jgd."</td>";
                  echo "<td".$jgp_td.">".$jgp."</td>";
                  echo "<td>".$ket."</td>";
                  echo "</tr>";
                }

                $numrow++; // Tambah 1 setiap kali looping
              }


              echo "</table>";



              // Cek apakah variabel kosong lebih dari 0
              // Jika lebih dari 0, berarti ada data yang masih kosong
              if($kosong > 0){
              ?>
                <script>
                $(document).ready(function(){
                  // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                  $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                  $("#kosong").show(); // Munculkan alert validasi kosong
                });
                </script>
              <?php
              }else{ // Jika semua data sudah diisi
                echo "<hr>";
                ?>

              <div class="form-group">
                                         <div class="form-row">
                                           <div class="col-md-2">
                                             <div class="form-label-group">
                                               Absen Tanggal :
                                           </div>
                                           </div>
                                           <div class="col-md-3">
                                             <input type="date" name="tgl" id="tgl" required>
                                           </div>
                                         </div>
                                       </div>
                            <?php
                // Buat sebuah tombol untuk mengimport data ke database
                echo "<button type='submit' name='import'>Import</button>";
                echo "<a href='".base_url("index.php/Siswa")."'>Cancel</a>";
              }


              echo "</form>";
            }
            ?>

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
