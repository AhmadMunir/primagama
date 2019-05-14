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


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-pen"></i>
              Edit Siswa Primagama</div>
            <div class="card-body">
              <?php foreach ($tbl_siswa as $u) {
                $name = $u->nama_lengkap;
                ?>

              <form method="post" action="<?php echo base_url().'admin/siswa/update';?>">
                <input type="hidden" name="id_siswa" value=<?php echo $u->id_siswa; ?>>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="text" id="namaLenkap" name="namaLenkap" value="<?php echo $name;?>" class="form-control" placeholder="Nama Lengkap" required="required" autofocus="autofocus">
                        <label for="namaLenkap">Nama Lengkap</label>

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-label-group">
                        <input type="text" id="namaPanggilan" name="namaPanggilan" value=<?php echo $u->nama_panggilan; ?> class="form-control" placeholder="Nama Panggilan" required="required">
                        <label for="namaPanggilan">Nama Panggilan</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-3">
                      <div class="form-label-group">
                        <input type="text" id="tempat" name="tempat" class="form-control" value=<?php echo $u->tempat; ?> placeholder="Tempat" required="required">
                        <label for="tempat">Tempat</label>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-label-group">
                        <input type="date" id="tanggalLahir" name="tanggalLahir" class="form-control" value=<?php echo $u->tanggal_lahir; ?> placeholder="Tanggal Lahir" required="required">
                        <label for="tanggalLahir">Tanggal Lahir</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" name="address" id="address" class="form-control" value=<?php echo $u->alamat; ?> placeholder="Alamat" required="required">
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
                        <option value="<?php echo $u->id_grade; ?>"><?php
                          $grade = $u->id_grade;
                          if ($grade < 7) {
                            echo "SD";
                          }elseif ($grade < 10) {
                          echo "SMP";
                        }elseif ($grade < 13) {
                          echo "SMA";
                        }else {
                          echo "Lain-Lain";
                        }
                         ?></option>
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
                        <option value="<?php echo $u->id_kelas; ?>">
                          <?php
                          $kls = $u->id_grade;
                          if ($kls<13) {
                            echo $kls;
                          }else{
                            echo "LL";
                          }
                           ?>
                        </option>
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
                    <?php
                      $id = $u->id_siswa;

                      $sek = $this->db->query("call lihatnamasekolah('".$id."')");

                      $raw = $sek->row();
                      $sekol = $raw->nama_sekolah;
                      $prog = $raw->nama_program;

                     ?>
                    </div>
                    <div class="col-md-6">
                      <select name="sekolah" id="sekolah" style="width: 600px;">
                        <option value="<?php echo $u->id_sekolah;?>">
                        <?php echo $sekol ?>
                        </option>
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
                      <select name="program" id="program" style="width: 200px;">
                        <option value="<?php $program =  $u->id_program; echo $program; ?>">
                          <?php echo $prog ?>
                        </option>
                        <?php
                        foreach ($program as $data) { // Lakukan looping pada variabel siswa dari controller
                            echo "<option value='".$data->id_program."'>".$data->nama_program."</option>";
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
                    Jenis Kelamin :
                  </div>
                </div>
                <div class="col-md-3">
                  <select name="jk" id="jk" >
                    <option value="<?php echo $u->jenis_kelamin; ?>"><?php echo $u->jenis_kelamin; ?></option>
                    <option value="null"></option>
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
                <input type="email" value="<?php echo $u->email ?>" id="email" name="email" class="form-control" placeholder="E" required="required">
                <label for="email">E-mail</label>
              </div>
            </div>
                  </div>
        </div>
        <div class="form-group">
          <div class="form-row">
        <div class="col-md-6">
          <input type="submit" class="btn-primary col-md-4" value="Simpan Perubahan">
        </div>
              </div>
            </div>
              </form>
            <?php } ?>

            </div>




          </div>

          <!-- <?php// $this->load->view('admin/_partial/footer.php') ?> -->
        </div>


      </div>
      <!-- /.content-wrapper -->

    </div>
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>

    <?php $this->load->view('admin/_partial/js2.php') ?>
  </body>

</html>
