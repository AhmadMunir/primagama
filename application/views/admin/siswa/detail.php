<!DOCTYPE html>
<html lang="en">

<head>
  <link href="<?php echo base_url('css/admin/profile.css')?>" rel="stylesheet" type="text/css">
  <?php $this->load->view('admin/_partial/head.php') ?>
</head>

<body id="page-top">
 <?php $this->load->view('admin/_partial/navbar.php') ?>
  <div id="wrapper">
    <?php $this->load->view('admin/_partial/sidebar.php') ?>

    <div id="content-wrapper">

      <div class="container-fluid">
      <!-- profile -->
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
                                        Siswa | <?php echo $program; ?>
                                    </h6>
                                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Orang Tua</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
                        <a href="<?php echo base_url('admin/siswa/edit/'.$k->id_siswa) ?>"
                         class="btn btn-small"><i class="fas fa-pencil-alt"></i> Edit Data</a>
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
                                                <p><?php if ($bpk == null) {
                                                  echo "Data tidak Lengkap";
                                                }else {
                                                  echo $bpk;
                                                } ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pekerjaan ayah</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if ($bpk == null) {
                                                  echo "Data tidak Lengkap";
                                                }else {
                                                  echo $pbpk;
                                                } ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nomor Hp Ayah</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if ($bpk == null) {
                                                  echo "Data tidak Lengkap";
                                                }else {
                                                  echo $nbpk;
                                                } ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama Ibu</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if ($ibu == null) {
                                                  echo "Data tidak Lengkap";
                                                }else {
                                                  echo $ibu;
                                                } ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pekerjaan Ibu</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if ($ibu == null) {
                                                  echo "Data tidak Lengkap";
                                                }else {
                                                  echo $pibu;
                                                } ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pekerjaan Ibu</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if ($ibu == null) {
                                                  echo "Data tidak Lengkap";
                                                }else {
                                                  echo $nibu;
                                                } ?></p>
                                            </div>
                                        </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- end profile -->

      </div>

      <?php $this->load->view('admin/_partial/footer.php') ?>

    </div>
    <!-- /.content-wrapper -->

  </div>

  <?php $this->load->view('admin/_partial/scrolltop.php') ?>


    <?php $this->load->view('admin/_partial/modal.php') ?>

  <?php $this->load->view('admin/_partial/js.php') ?>
</body>

</html>
