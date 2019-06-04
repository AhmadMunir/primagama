
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
                      <?php if ($this->session->flashdata('success')): ?>
                      <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                      </div>
                      <?php endif; ?>
                      <?php if ($this->session->flashdata('gagal')): ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('gagal'); ?>
                      </div>
                      <?php endif; ?>
                      <div class="module">
          							<div class="module-head">
          								<h3>Jadwal kelas kamu</h3>
          							</div>
          							<div class="module-body">
                          <?php foreach ($siswa as $k){
                            $id_prog = $k->id_program;
                            $id_sis= $k->id_siswa;
                            $id_grade= $k->id_grade;
                          }
                             ?>
<!-- content -->
asdsa
<!-- /content -->


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
        <!-- script -->
          <?php $this->load->view('client/_partials/script') ?>
        <!-- /script -->
        <?php $this->load->view('client/_partials/modal') ?>

        <!-- ikut Modal-->
          <div class="modal fade" id="ikutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ikutan request jadwal ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>

              <div class="modal-body" id="modal-body">
                <div class="modal-content"></div>
              </div>

              <div class="modal-footer">
                <form>
                <input type="submit" class="btn btn-primary" value="Ikut"></button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <script src="<?php echo base_url('js/jquery2.min.js') ?>" type="text/javascript"></script>



    </body>
