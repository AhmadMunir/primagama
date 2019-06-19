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
      <?php if ($this->session->flashdata('successbayar')): ?>
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('successbayar'); ?>
      </div>
      <?php endif; ?>
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
                    <div class="col-md-2">
                        <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
                        <a href="<?php echo base_url('admin/siswa/edit/'.$k->id_siswa) ?>"
                         class="btn btn-small"><i class="fas fa-pencil-alt"></i> &nbspEdit Data</a>
                         <a class="btn btn-small" href="#" data-toggle="modal" data-target="#delete"><i class="fas fa-trash"></i> &nbsp Hapus</a>
                         <a href="<?php echo base_url('admin/pembayaran/bayarbysiswa/'.$id) ?>"class="btn btn-small"><i class="fas fa-print"></i> &nbsp Cetak Bukti</a>
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
                                    <th>Cetak</th>
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
                                    <td>
                                      <a href="<?php echo base_url('admin/pembayaran/bayarbyid/'.$ang->id_pembayaran) ?>"class="btn btn-small"><i class="fas fa-print"></i> &nbsp Print</a>
                                    </td>
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

      <?php $this->load->view('admin/_partial/footer.php') ?>

    </div>
    <!-- /.content-wrapper -->

  </div>

  <?php $this->load->view('admin/_partial/scrolltop.php') ?>


    <?php $this->load->view('admin/_partial/modal.php') ?>

  <?php $this->load->view('admin/_partial/js.php') ?>

  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">INGAT !!! Data yang sudah terhapus tidak dapat di kembalikan lagi.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo base_url('admin/siswa/delete/'.$id) ?>">Hapus</a>
      </div>
    </div>
  </div>
  </div>

  <div class="modal fade modal-ortu" id="updateortu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data Orang Tua</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url().'admin/orangtua/update'; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="modal-body">
        <div class="form-group">
          Nama :
          <div class="form-row">
            <div class="col-md-5 input_ortu">
              <div class="form-label-group">

                <input type="text" name="namaayah" value="<?php echo $bpk; ?>">
                <label for="namaLenkap">Nama Ayah</label>

              </div>
            </div>
            <div class="col-md-4">
              <div class="form-label-group">

                <input type="text" name="namaibu" value="<?php echo $ibu; ?>">
                <label for="namaLenkap">Nama Ibu</label>

              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          Pekerjaan :
          <div class="form-row">
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
          Nomor Hp :
          <div class="form-row">
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
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn-success" value="SIMPAN">
      </div>

    </form>
    </div>
  </div>
  </div>

  <!-- Update Kelas Modal-->
    <div class="modal fade" id="kelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Siswa Masuk Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Ke Kelas mana Siswa Akan Masuk ? ? ? ?</div>
        <form action="<?php echo base_url('admin/siswa/updatekls') ?>" method="post" >
            <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="col-md-6">
            <select id="kelsa" name="kelsa">
            <option value="99">Pilih Kelas</option>
            <?php
            foreach ($keles as $data) { // Lakukan looping pada variabel siswa dari controller
                echo "<option value='".$data->id_kelas."'>".$data->nama_kelas."</option>";
            }
            ?>
          </select>
          </div>
        <div class="modal-footer">
          <input type="submit" name="update" value="Update">
        </div>
        <form>
      </div>
    </div>
  </div>
<style>
  .input_ortu{
    margin-right: 20px;
  }
</style>
<?php
  function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
  }
 ?>
</body>

</html>
