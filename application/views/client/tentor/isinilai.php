
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
          								<h3>Kelas</h3>
          							</div>
                          <?php foreach ($siswa as $k){
                            $nama = $k->nama;
                            $mapel =  $k->nama_mapel;
                            $alamat = $k->alamat;
                          } ?>
                      <div class="module-body table">
        								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
        									<thead>
        										<tr>
        											<th>No</th>

        											<th>Nama Siswa</th>
        											<th>Mata Pelajaran</th>
        											<th>TO 1</th>
                              <th>TO 2</th>
                              <th>TO 3</th>
                              <th>TO 4</th>
                              <th>TO 5</th>
        										</tr>
        									</thead>
                          <?php
                          $no=1;
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
                            </tr>
                          <?php } ?>
        									<tbody>

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


        <!-- <script src="<?php echo base_url('js/jquery2.min.js') ?>" type="text/javascript"></script> -->
<!--
        <script type="text/javascript">
      	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)

      			$.ajax({
      				type: "POST", // Method pengiriman data bisa dengan GET atau POST
      				url: "<?php echo base_url("tentor/kelas/getkelas"); ?>", // Isi dengan url/path file php yang dituju
      				data: {username :'<?php echo $this->session->nama;; ?>' }, // data yang aka n dikirim ke file yang dituju
      				dataType: "json",
      				beforeSend: function(e) {
      					if(e && e.overrideMimeType) {
      						e.overrideMimeType("application/json;charset=UTF-8");
      					}
      				},
      				success: function(response){ // Ketika proses pengiriman berhasil


      					// set isi dari combobox kota
      					// lalu munculkan kembali combobox kotanya
      					$("#kelas").html(response.kls).show();
      				},
      				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
      					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
      				}
      			});
      		});
      	</script> -->


    </body>
