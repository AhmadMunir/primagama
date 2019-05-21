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
      <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
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
                          foreach ($tbl_tentor as $k) {
                            $id = $k->id_tentor;
                          }?>
                          <?php
                               $sek = $this->db->query("call get_detailtentor('".$id."')");
                               $raw = $sek->row();

                              $foto = $raw->foto;
                              $nama = $raw->nama;
                              $kelas = $raw->alamat;
                              $email = $raw->email;
                              $notel = $raw->no_hp;
                              $mapel = $raw->nama_mapel;
                              $tmpt = $raw->tempat;
                              $tgl = $raw->tanggal_lahir;
                              ?>
                            <img src="<?php echo base_url("images/foto/profile/tentor/"); echo $foto;?>" alt=""/>
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
                                        Tentor | <?php echo $mapel; ?>
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
                        <a href="<?php echo base_url('admin/tentor/edit/'.$k->id_tentor) ?>"
                         class="btn btn-small"><i class="fas fa-pencil-alt"></i> &nbspEdit Data</a>
                         <a class="btn btn-small" href="#" data-toggle="modal" data-target="#delete"><i class="fas fa-trash"></i> &nbsp Hapus</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Pengampu Mapel</p>
                            <?php echo ucwords($mapel)?><br/>

                            <p>Email</p>
                            <?php echo ucwords($email)?><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Id Tentor</label>
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
                            <!-- tab tambahan letakkan disini -->
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
        <a class="btn btn-primary" href="<?php echo base_url('admin/tentor/delete/'.$id) ?>">Hapus</a>
      </div>
    </div>
  </div>
  </div>

<style>
  .input_ortu{
    margin-right: 20px;
  }
</style>
</body>

</html>
