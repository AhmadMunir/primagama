<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin/_partial/head.php') ?>
</head>

<body id="page-top">


 <?php $this->load->view('admin/_partial/navbar.php') ?>
  <div id="wrapper">


    <?php $this->load->view('admin/_partial/sidebar.php') ?>

    <div id="content-wrapper">

      <div class="container-fluid">


        <?php $this->load->view('admin/_partial/breadcrumb.php') ?>

        <!-- Icon Cards-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Nilai Siswa Primagama</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Nama Mapel</th>
                        <th>Try Out 1</th>
                        <th>Try Out 2</th>
                        <th>Try Out 3</th>
                        <th>Try Out 4</th>
                        <th>Try Out 5</th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                    $no = 1;

                    foreach($isi as $u){
                      $id = $u->id_siswa;
                      ?>
                      <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $u->nama_lengkap?></td>
                  <td><?php echo $u->nama_mapel?></td>
                  <td><?php echo $u->to1?></td>
                  <td><?php echo $u->to2?></td>
                  <td><?php echo $u->to3?></td>
                  <td><?php echo $u->to4?></td>
                  <td><?php echo $u->to5?></td>
           



                  </td>
                  </tr>
                <?php } ?>
                
                </tbody>
              </table>
            </div>
          </div>
    </div>



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
