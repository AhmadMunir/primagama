<!DOCTYPE html>
<html lang="en">
<head>
    <head>
      <?php $this->load->view('client/_partials/head') ?>
    </head>
    <body>
      <?php $this->load->view('client/_partials/navbar') ?>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <?php $this->load->view('client/_partials/sidebar') ?>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                              <table class="span12">
                                <tr >
                                  <td class="span4">
                                    <img src="<?php echo base_url('images/foto/profile/siswa/default.png'); ?>" id="foto" alt="foto_profile"/>
                                    <?php foreach ($siswa as $k){
                                      $nama = $k->anak;
                                      $program =  $k->program;
                                      $kelas = $k->nama_kelas;
                                    } ?>
                                    <label for="nama">Nama Anak Anda : <?php echo $nama ?></label><br>
                                    <label for="nama">Program : <?php echo $program ?></label><br>
                                    <label for="nama">Kelas : <?php echo $kelas ?></label><br>
                                  </td>
                                  <td >
                                    <a href="<?php echo base_url('ortu/jadwalanak'); ?>" class="btn-box small span5"><i class="icon-calendar"></i><b>Lihat Jadwal</b></a>
                                    <a href="<?php echo base_url('ortu/pembayaran'); ?>" class="btn-box small span5"><i class="icon-dollar"></i><b>Lihat Pembayaran</b></a>
                                    <a href="<?php echo base_url('ortu/nilaianak'); ?>" class="btn-box small span5"><i class="icon-hdd"></i><b>Lihat Nilai</b></a>
                                    <a href="<?php echo base_url('ortu/absenanak'); ?>" class="btn-box small span5"><i class="icon-hand-up"></i><b>Lihat Absen</b></a>
                                  </td>
                                </tr>
                              </table>
                            </div>
                            <!--/#btn-controls-->

                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <!-- footer -->
        <?php $this->load->view('client/_partials/footer') ?>
        <!-- /footer -->
        <!-- script -->
          <?php $this->load->view('client/_partials/script') ?>
        <!-- /script -->
          <?php $this->load->view('client/_partials/modal') ?>

    </body>
