
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

                      <div class="module">
          							<div class="module-head">
          								<h3>Jadwal Kelas Kamu</h3>
          							</div>
          							<div class="module-body">
                          <?php foreach ($siswa as $k){
                            $nama = $k->anak;
                            $program =  $k->program;
                            $kelas = $k->nama_kelas;
                          }
                             ?>
                             <table class="table">
                               <tr>
                                 <th>No</th>
                                 <th>Hari</th>
                                 <th>Mata Pelajaran</th>
                                 <th>Jam</th>
                                 <th>Tentor</th>
                               </tr>
                               <tbody id="jadwaltetap">

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

        <!-- ikut Modal-->


        <script src="<?php echo base_url('js/jquery2.min.js') ?>" type="text/javascript"></script>

        <script type="text/javascript">
      	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)

      			$.ajax({
      				type: "POST", // Method pengiriman data bisa dengan GET atau POST
      				url: "<?php echo base_url("siswa/jadwaltetap/listjadwal"); ?>", // Isi dengan url/path file php yang dituju
      				data: {nama_kelas :'<?php echo $k->nama_kelas; ?>' }, // data yang aka n dikirim ke file yang dituju
      				dataType: "json",
      				beforeSend: function(e) {
      					if(e && e.overrideMimeType) {
      						e.overrideMimeType("application/json;charset=UTF-8");
      					}
      				},
      				success: function(response){ // Ketika proses pengiriman berhasil


      					// set isi dari combobox kota
      					// lalu munculkan kembali combobox kotanya
      					$("#jadwaltetap").html(response.jdl).show();
      				},
      				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
      					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
      				}
      			});
      		});
      	</script>


    </body>
