
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
            								<h3>Absen</h3>
            							</div>
                          <?php foreach ($siswa as $k){
                            $nama = $k->anak;
                            $program =  $k->program;
                            $kelas = $k->nama_kelas;
                          }


                          ?>
          							<div class="module-body table">
                             <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                               <thead>
                               <tr>
                                 <th>No</th>
                                 <th>Hari, Tanggal</th>
                                 <th>Jam Datang</th>
                                 <th>Jam Pulang</th>
                                 <th>Keterangan</th>
                               </tr>
                             </thead>
                               <tbody id="absen">

                               </tbody>
                               <tfoot>
                                 <tr>
                                   <th>No</th>
                                   <th>Hari, Tanggal</th>
                                   <th>Jam Datang</th>
                                   <th>Jam Pulang</th>
                                   <th>Keterangan</th>
                                 </tr>
                               </tfoot>
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
        <?php $this->load->view('client/_partials/modal') ?>

        <!-- ikut Modal-->


<script src="<?php echo base_url('js/jquery2.min.js') ?>" type="text/javascript"></script>

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
        <?php $this->load->view('client/_partials/script') ?>
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
