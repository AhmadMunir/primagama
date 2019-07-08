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
            $id_siss = $this->uri->segment('4');
            $id_sis = decrypt_url($id_siss);

            $ortu = $this->db->query("call getOrtu('".$id_sis."')");
            $raw = $ortu->row();

            $id_ortu = $raw->id_ortu;
            $bpk = $raw->nama_ayah;
            $pbpk = $raw->pekerjaan_ayah;
            $nbpk = $raw->no_hpayah;
            $ibu = $raw->nama_ibu;
            $pibu = $raw->pekerjaan_ibu;
            $nibu = $raw->no_hpibu;

          ?>


          <div class="card-header">Input Data Orangtua Siswa</div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url().'admin/orangtua/update'; ?>">
              <input type="hidden" name="id" value="<?php echo $id_sis; ?>">
              <div class="form-group">

                <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">

                      Nama :


                    </div>
                  </div>
                  <div class="col-md-5 input_ortu">
                    <div class="form-label-group">

                      <input type="text" name="namaayah" value="<?php echo $bpk; ?>">
                      <label for="namaLenkap">Nama Ayah</label>

                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-label-group">

                      <input type="text" name="namaibu" value="<?php echo $ibu; ?>">
                      <label for="namaLenkap">Nama Ibu</label>

                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">

                      Pekerjaan :


                    </div>
                  </div>
                  <div class="col-md-5 input_ortu">
                    <div class="form-label-group">

                      <input type="text" name="payah" value="<?php echo $pbpk; ?>">
                      <label for="namaLenkap">Pekerjaan Ayah</label>

                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-label-group">

                      <input type="text" name="pibu" value="<?php echo $pibu; ?>">
                      <label for="namaLenkap">Pekerjaan Ibu</label>

                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">

                <div class="form-row">
                  <div class="col-md-2">
                    <div class="form-label-group">

                      Nomor Hp :


                    </div>
                  </div>
                  <div class="col-md-5 input_ortu">
                    <div class="form-label-group">

                      <input type="text" name="noayah" value="<?php echo $nbpk; ?>">
                      <label for="namaLenkap">Nomor Hp Ayah</label>

                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-label-group">

                      <input type="text" name="noibu" value="<?php echo $nibu; ?>">
                      <label for="namaLenkap">Nomor Hp Ibu</label>

                    </div>
                  </div>
                </div>
              </div>
              <input type="submit" value="SIMPAN">
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
