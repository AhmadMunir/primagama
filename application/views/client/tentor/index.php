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
                                    <?php foreach ($siswa as $k){
                                      $nama = $k->nama;
                                      $mapel =  $k->nama_mapel;
                                      $alamat = $k->alamat;
                                      $foto = $k->foto;

                                    } ?>
                                    <img src="<?php echo base_url('images/foto/profile/tentor/'.$foto); ?>" id="foto" alt="foto_profile"/>
                                    <label for="nama">Nama : <?php echo $nama ?></label><br>
                                    <label for="nama">Pengampu : <?php echo $mapel ?></label><br>
                                    <label for="nama">Kelas : <?php echo $alamat ?></label><br>
                                  </td>
                                  <td >
                                    <a href="<?php echo base_url('tentor/jadwalmengajar'); ?>" class="btn-box small span5"><i class="icon-calendar"></i><b>Lihat Jadwal Mengajar</b></a>
                                    <a href="<?php echo base_url('tentor/kelas'); ?>" class="btn-box small span5"><i class="icon-pencil"></i><b>Lihat Kelas</b></a>
                                    <a href="<?php echo base_url('tentor/kelas/kelasnilai'); ?>" class="btn-box small span5"><i class="icon-hdd"></i><b>Lihat Nilai</b></a>

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
