
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
            								<h3>Nilai Try Out Kamu</h3>
                            <?php foreach ($siswa as $k){
                              $id_prog = $k->id_program;
                              $id_sis= $k->id_siswa;
                              $id_grade= $k->id_grade;
                            }
                               ?>

            							</div>
            							<div class="module-body">
                            <table class="table">
                              <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>TO 1</th>
                                <th>TO 2</th>
                                <th>TO 3</th>
                                <th>TO 4</th>
                                <th>TO 5</th>
                              </tr>
                              <tbody id="nilai">

                              </tbody>
                            </table>



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


        <script src="<?php echo base_url('js/jquery2.min.js') ?>" type="text/javascript"></script>
      <script>
      	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)

      			$.ajax({
      				type: "POST", // Method pengiriman data bisa dengan GET atau POST
      				url: "<?php echo base_url("siswa/nilai/shownilaikamu"); ?>", // Isi dengan url/path file php yang dituju
      				data: {id_siswa :'<?php echo $k->id_siswa; ?>'}, // data yang aka n dikirim ke file yang dituju
      				dataType: "json",
      				beforeSend: function(e) {
      					if(e && e.overrideMimeType) {
      						e.overrideMimeType("application/json;charset=UTF-8");
      					}
      				},
      				success: function(response){ // Ketika proses pengiriman berhasil


      					// set isi dari combobox kota
      					// lalu munculkan kembali combobox kotanya
      					$("#nilai").html(response.nilai).show();
      				},
      				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
      					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
      				}
      			});
      		});
      	</script>




    </body>
