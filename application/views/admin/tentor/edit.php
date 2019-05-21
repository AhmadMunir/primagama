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

    <?php
    foreach ($tbl_tentor as $k) {
      $id = $k->id_tentor;
    }?>
    <?php
         $sek = $this->db->query("call get_detailtentor('".$id."')");
         $raw = $sek->row();


        $nama = $raw->nama;
        $kelas = $raw->alamat;
        $email = $raw->email;
        $id_mapel = $raw->id_mapel;
        $mapel = $raw->nama_mapel;
        $alamat = $raw->alamat;
        $jenis_kelamin = $raw->jenis_kelamin;
        $tmpt = $raw->tempat;
        $tgl = $raw->tanggal_lahir;
        ?>



          <div class="card-header">Edit Data Tentor</div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url().'admin/tentor/update';?>">
              <input type="hidden" name="id_tentor" value="<?php echo $id ?>">
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-label-group">
                      <input type="text" id="namaLenkap" value="<?php echo $nama; ?>" name="namaLenkap" class="form-control" placeholder="Nama Lengkap" required="required" autofocus="autofocus">
                      <label for="namaLenkap">Nama Lengkap</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-3">
                    <div class="form-label-group">
                      <input type="text" id="tempat" value="<?php echo $tmpt ?>"name="tempat" class="form-control" placeholder="Tempat" required="required">
                      <label for="tempat">Tempat</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-label-group">
                      <input type="date" id="tanggalLahir" value="<?php echo $tgl ?>" name="tanggalLahir" class="form-control" placeholder="Tanggal Lahir" required="required">
                      <label for="tanggalLahir">Tanggal Lahir</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="address" value="<?php echo $alamat ?>" id="address" class="form-control" placeholder="Alamat" required="required">
                  <label for="address">Alamat</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">
                      Pengampu Mapel :
                  </div>
                  </div>
                  <div class="col-md-3">
                    <select name="mapel" id="mapel" style="width: 200px;" required="required">
                      <option value="<?php echo $id_mapel; ?>"><?php echo $mapel ?></option>
                      <?php
                      foreach ($tbl_mapel as $data) { // Lakukan looping pada variabel siswa dari controller
                          echo "<option value='".$data->id_mapel."'>".$data->nama_mapel."</option>";
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
                <select name="jk" id="jk" required="required">
                  <option value="<?php echo $jenis_kelamin ?>"><?php echo $jenis_kelamin ?></option>
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
              <input type="email" id="email" value="<?php echo $email ?>"name="email" class="form-control" placeholder="E" required="required">
              <label for="email">E-mail</label>
            </div>
          </div>
                </div>
      </div>
      <div class="form-group">
        <div class="form-row">
      <div class="col-md-6">
        <input type="submit" class="btn-primary" value="Simpan Perubahan">
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
