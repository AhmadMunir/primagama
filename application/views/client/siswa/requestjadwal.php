
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
          								<h3>Request jadwal</h3>
          							</div>
          							<div class="module-body">
                          <?php foreach ($siswa as $k){
                            $id_prog = $k->id_program;
                            $id_sis= $k->id_siswa;
                            $id_grade= $k->id_grade;
                          }
                             ?>


                          <form method="post" action="<?php echo base_url().'siswa/requestjadwal/requestjadwal';?>">
                            <input type="hidden" name="id_program" id="id_program" value="<?php echo $id_prog ?>">
                            <input type="hidden" name="id_siswa" id="id_siswa" value="<?php echo $id_sis ?>">
                            <input type="hidden" name="id_grade" id="id_grade" value="<?php echo $id_grade ?>">
                              <div class="row">
                                <div class="span2">
                                  <label for="Mapel">Mapel</label>
                                </div>
                                <div class="span3">
                                  <select name="mapel" id="mapel" style="width: 200px;">
                                    <option value="">Pilih</option>
                                  </select>
                                </div>

                              </div>
                              <div class="row">
                                <div class="span2">
                                  <label for="Mapel">Tangal</label>
                                </div>
                                <div class="span3">
                                    <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" required="required">
                                </div>

                              </div>

                    <div class="c">
                      <input type="submit" class="btn-primary" value="Tambahkan">
                    </div>

                          </form>
                        </div>
                      </div>
                      <div class="module">
          							<div class="module-head">
          								<h3>Request dari program yang kamu ikuti</h3>
          							</div>
          							<div class="module-body">
                          <table class="table">
                            <tr>
                              <th>No</th>
                              <th>Id Mapel</th>
                              <th>Mapel</th>
                              <th>Total</th>
                              <th>Tindakan</th>
                            </tr>
                            <tbody id="reqjdl">

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
        <script type="text/javascript">
      	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)

      			$.ajax({
      				type: "POST", // Method pengiriman data bisa dengan GET atau POST
      				url: "<?php echo base_url("siswa/requestjadwal/listMapel"); ?>", // Isi dengan url/path file php yang dituju
      				data: {id_program :<?php echo $k->id_program; ?>}, // data yang aka n dikirim ke file yang dituju
      				dataType: "json",
      				beforeSend: function(e) {
      					if(e && e.overrideMimeType) {
      						e.overrideMimeType("application/json;charset=UTF-8");
      					}
      				},
      				success: function(response){ // Ketika proses pengiriman berhasil


      					// set isi dari combobox kota
      					// lalu munculkan kembali combobox kotanya
      					$("#mapel").html(response.list_mapel).show();
      				},
      				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
      					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
      				}
      			});
      		});
      	</script>
        <script type="text/javascript">
      	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)

      			$.ajax({
      				type: "POST", // Method pengiriman data bisa dengan GET atau POST
      				url: "<?php echo base_url("siswa/requestjadwal/showreqjadwalkamu"); ?>", // Isi dengan url/path file php yang dituju
      				data: {id_program :<?php echo $k->id_program; ?>, id_siswa :<?php echo $k->id_siswa; ?> }, // data yang aka n dikirim ke file yang dituju
      				dataType: "json",
      				beforeSend: function(e) {
      					if(e && e.overrideMimeType) {
      						e.overrideMimeType("application/json;charset=UTF-8");
      					}
      				},
      				success: function(response){ // Ketika proses pengiriman berhasil


      					// set isi dari combobox kota
      					// lalu munculkan kembali combobox kotanya
      					$("#reqjdl").html(response.req).show();
      				},
      				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
      					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
      				}
      			});
      		});
      	</script>
        <script>
        $(document).on("click", ".ikut", function () {
          var id_mapel = $(this).data('id');
          $.ajax({
            url: "<?php echo base_url('siswa/requestjadwal/ikut'); ?>",
            type: 'POST',
            data: { id_mapel: id_mapel },
            success: function(data) {
              $('#modal-content').html();
            }
          });
        });
        </script>


    </body>
