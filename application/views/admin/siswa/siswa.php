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
              <i class="fas fa-table"></i>
              Daftar Siswa Primagama</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Sekolah</th>
                      <th>Kelas</th>
                      <th>Program</th>
                      <th>Kelas Primagama</th>
                      <th>Detail</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      $no = 1;

                      foreach($view_siswa as $u){
                        $id = $u->id_siswa;
                        ?>
                        <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $u->nama_lengkap?></td>
                    <td><?php echo $u->nama_sekolah?></td>
                    <td><?php echo $u->kelas?></td>
                    <td><?php echo $u->nama_program?></td>
                    <td><?php $kls = $u->nama_kelas;
                        if ($kls == 'null') {
                          echo "Belum Masuk Kelas";
                        }else {
                          echo $kls;
                        }
                    ?></td>
                    <td width="250">
                      <a href="<?php echo site_url('admin/siswa/edit/'.$id) ?>"
                       class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                      <a href="<?php echo base_url('admin/siswa/detail/'.$u->id_siswa) ?>"
                       class="btn btn-small"><i class="fas fa-grip-horizontal"></i> Details</a>
                      <a href="<?php echo site_url ('admin/siswa/delete/'.$id )?>" 
                        class="btn btn-small text-danger"><i class="fas fa-trash" data-toggle="modal" data-target="#deleteModal"></i> Hapus</a>
                      <a href="<?php echo base_url('admin/siswa/detail/'.$u->id_siswa) ?>"
                       class="btn btn-small"><i class="fas fa-grip-horizontal"></i> Details</a>
                      
                    </td>
                  <?php } ?>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>

          <!-- Sticky Footer -->


      </div>
      <?php 

      <?php
        $this->load->view('admin/_partial/footer.php')
      ?>

      </div>
      <?php
      $this->load->view('admin/_partial/footer.php')
      ?>


      </div>



      </div>

    </div>
    <?php $this->load->view('admin/_partial/scrolltop.php') ?>


      <?php $this->load->view('admin/_partial/modal.php') ?>

    <?php $this->load->view('admin/_partial/js.php') ?>
  </body>

</html>
