
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
      <link href="<?php echo base_url('css/admin/profile.css')?>" rel="stylesheet" type="text/css">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo SITE_NAME; ?></title>
      <link type="text/css" href="<?php echo base_url('assets/bootstrap/client/css/bootstrapprofil.min.css') ?>" rel="stylesheet">

      <link type="text/css" href="<?php echo base_url('assets/bootstrap/client/css/bootstrap-responsive.min.css')?>" rel="stylesheet">
      <link type="text/css" href="<?php echo base_url('css/client/theme.css') ?>" rel="stylesheet">
      <link type="text/css" href="<?php echo base_url('images/icons/css/font-awesome.css') ?>" rel="stylesheet">
      <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'rel='stylesheet'>


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
                    <div class="span8">
                        <div class="module">
            							<div class="module-head">
            								<h3>Absen</h3>
            							</div>
                          <?php foreach ($siswa as $k){
                            $id_prog = $k->id_program;
                            $id_sis= $k->id_siswa;
                            $id_grade= $k->id_grade;
                            $kls = $k->nama_kelas;
                          }


                          ?>
          							<div class="module-body">
                          <div class="container emp-profile">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-img">
                                              <?php
                                              foreach ($tbl_siswa as $k) {
                                                $id = $k->id_siswa;
                                              }?>
                                              <?php
                                                   $sek = $this->db->query("call get_detailsiswa('".$id."')");
                                                   $raw = $sek->row();

                                                  $foto = $raw->foto;
                                                  $nama = $raw->nama_lengkap;
                                                  $kelas = $raw->nama_kelas;
                                                  $program = $raw->nama_program;
                                                  $sekolah = $raw->nama_sekolah;
                                                  $grade = $raw->kelas;
                                                  $id = $raw->id_siswa;
                                                  $tmpt = $raw->tempat;
                                                  $tgl = $raw->tanggal_lahir;
                                                  $email = $raw->email;
                                                  $notel = $raw->no_hp;
                                                  $bpk = $raw->nama_ayah;
                                                  $pbpk = $raw->pekerjaan_ayah;
                                                  $nbpk = $raw->no_hpayah;
                                                  $ibu = $raw->nama_ibu;
                                                  $pibu = $raw->pekerjaan_ibu;
                                                  $nibu = $raw->no_hpibu;
                                                  ?>
                                                <img src="<?php echo base_url("images/foto/profile/siswa/"); echo $foto;?>" alt=""/>
                                                <div class="file btn btn-lg btn-primary">
                                                    Change Photo
                                                    <input type="file" name="file"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-head">
                                                        <h5>
                                                          <?php
                                                                echo $nama;
                                                             ?>
                                                        </h5>
                                                        <h6>
                                                            Siswa | <?php
                                                              if ($kelas == 'null') {
                                                                echo "Belum Masuk kelas";
                                                                  ?>
                                                                  <a class="btn btn-small" href="#" data-toggle="modal" data-target="#kelasModal"><small style="color:red" >Masukkan Ke kelas</small></a>

                                                                <?php
                                                              }else {
                                                                echo $kelas;
                                                              }
                                                             ?>
                                                        </h6>
                                                        <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Orang Tua</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="angsuran-tab" data-toggle="tab" href="#angsuran" role="tab" aria-controls="angsuran" aria-selected="false">Angsuran</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-work">
                                                <p>Asal Sekolah</p>
                                                <?php echo ucwords($sekolah)?><br/>
                                                <p>Kelas</p>
                                                <?php echo ucwords($grade)?><br/>
                                                <p>Program yang diikuti</p>
                                                <?php echo ucwords($program)?><br/>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="tab-content profile-tab" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>User Id</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $id; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Nama</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo ucwords($nama); ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Tempat, Tanggal Lahir</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $tmpt; echo ", "; echo $tgl; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $email?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Nomor Telepon</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $notel ?></p>
                                                                </div>
                                                            </div>

                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Nama Ayah</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php if ($bpk == null) {?><a class="btn btn-small" href="#" data-toggle="modal" data-target="#updateortu">
                                                                      <?php echo "Klik Disini Untuk Melengkapi Data";?>
                                                                    </a>
                                                                  <?php } else {
                                                                      echo $bpk;
                                                                    } ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Pekerjaan ayah</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                  <p><?php if ($ibu == null) {?><a class="btn btn-small" href="#" data-toggle="modal" data-target="#updateortu">
                                                                    <?php echo "Klik Disini Untuk Melengkapi Data";?>
                                                                  </a>
                                                                <?php } else {
                                                                      echo $pbpk;
                                                                    } ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Nomor Hp Ayah</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                  <p><?php if ($nbpk == null) {?><a class="btn btn-small" href="#" data-toggle="modal" data-target="#updateortu">
                                                                    <?php echo "Klik Disini Untuk Melengkapi Data";?>
                                                                  </a>
                                                                <?php } else {
                                                                      echo $nbpk;
                                                                    } ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Nama Ibu</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                   <p><?php if ($nibu == null) {?><a class="btn btn-small" href="#" data-toggle="modal" data-target="#updateortu">
                                                                        <?php echo "Klik Disini Untuk Melengkapi Data";?>
                                                                      </a>
                                                                    <?php } else {
                                                                      echo $ibu;
                                                                    } ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Pekerjaan Ibu</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                  <p><?php if ($pbpk == null) {?><a class="btn btn-small" href="#" data-toggle="modal" data-target="#updateortu">
                                                                    <?php echo "Klik Disini Untuk Melengkapi Data";?>
                                                                  </a>
                                                                <?php } else {
                                                                      echo $pibu;
                                                                    } ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Pekerjaan Ibu</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                  <p><?php if ($pibu == null) {?><a class="btn btn-small" href="#" data-toggle="modal" data-target="#updateortu">
                                                                    <?php echo "Klik Disini Untuk Melengkapi Data";?>
                                                                  </a>
                                                                <?php } else {
                                                                      echo $nibu;
                                                                    } ?></p>
                                                                </div>
                                                            </div>

                                                </div>
                                                <div class="tab-pane fade" id="angsuran" role="tabpanel" aria-labelledby="angsuran-tab">
                                                            <!-- angsuran disini -->

                                                  <table class="col-md-12 table table-bordered align-bottom">
                                                    <thead>
                                                      <tr>
                                                        <th scope="row">Angsuran Ke -</th>
                                                        <th>Waktu</th>
                                                        <th>Jumlah Bayar</th>
                                                        <th>Sisa Angsuran</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php $no = 1;

                                                      foreach ($angByID as $ang) {
                                                      ?>
                                                      <tr>
                                                        <td class="align-middle"><?php echo $no++ ?></td>
                                                        <td><?php echo $ang->waktu ?></td>
                                                        <td><?php echo rupiah($ang->jumlah_bayar) ?></td>
                                                        <td><?php echo rupiah($ang->sisa_tagihan) ?></td>
                                                      </tr>
                                                      <?php } ?>
                                                    </tbody>
                                                  </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end profile -->

                          </div>
                        </div>
                      </div>

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
        <?php $this->load->view('client/_partials/modal') ?>

        <!-- ikut Modal-->


        <script type="text/javascript">
      	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)

      			$.ajax({
      				type: "POST", // Method pengiriman data bisa dengan GET atau POST
      				url: "<?php echo base_url("siswa/absen/absen"); ?>", // Isi dengan url/path file php yang dituju
      				data: {id_siswa :'<?php echo $k->id_siswa; ?>' }, // data yang aka n dikirim ke file yang dituju
      				dataType: "json",
      				beforeSend: function(e) {
      					if(e && e.overrideMimeType) {
      						e.overrideMimeType("application/json;charset=UTF-8");
      					}
      				},
      				success: function(response){ // Ketika proses pengiriman berhasil


      					// set isi dari combobox kota
      					// lalu munculkan kembali combobox kotanya
      					$("#absen").html(response.absen).show();
      				},
      				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
      					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
      				}
      			});
      		});
      	</script>
        <!-- script -->
        <script src="<?php echo base_url('js/client/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>

       <script src="<?php echo base_url('js/client/jquery-ui-1.10.1.custom.min.js')?>" type="text/javascript"></script>
       <!-- <script src="<?php echo base_url('assets/bootstrap/client/js/bootstrap.min.js')?>" type="text/javascript"></script> -->
       <script src="<?php echo base_url('js/client/flot/jquery.flot.js')?>" type="text/javascript"></script>
       <script src="<?php echo base_url('js/client/flot/jquery.flot.resize.js')?>" type="text/javascript"></script>
       <script src="<?php echo base_url('js/client/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
       <script src="<?php echo base_url('js/client/common.js')?>" type="text/javascript"></script>


       <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
       <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
       <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- /script -->

        <script>
          $(document).ready(function() {
            $('.datatable-1').dataTable();
            $('.dataTables_paginate').addClass("btn-group datatable-pagination");
            $('.dataTables_paginate > a').wrapInner('<span />');
            $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
            $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
          } );
        </script>



    </body>
