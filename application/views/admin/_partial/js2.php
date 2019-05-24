<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('assets/chart.js/Chart.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('js/sb-admin.min.js')?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('js/demo/datatables-demo.js')?>"></script>
  <script src="<?php echo base_url('js/demo/chart-area-demo.js')?>"></script>
  <script src="<?php echo base_url('js/jquery2.min.js') ?>" type="text/javascript"></script>
    <!-- dropdown -->
    <script>
  	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
  		// Kita sembunyikan dulu untuk loadingnya
  		$("#loading").hide();

  		$("#jenjang").change(function(){ // Ketika user mengganti atau memilih data provinsi
  			$("#kelas").hide(); // Sembunyikan dulu combobox kota nya
  			$("#loading").show(); // Tampilkan loadingnya

  			$.ajax({
  				type: "POST", // Method pengiriman data bisa dengan GET atau POST
  				url: "<?php echo base_url("admin/siswa/listkelas"); ?>", // Isi dengan url/path file php yang dituju
  				data: {id_jenjang : $("#jenjang").val()}, // data yang akan dikirim ke file yang dituju
  				dataType: "json",
  				beforeSend: function(e) {
  					if(e && e.overrideMimeType) {
  						e.overrideMimeType("application/json;charset=UTF-8");
  					}
  				},
  				success: function(response){ // Ketika proses pengiriman berhasil
  					$("#loading").hide(); // Sembunyikan loadingnya

  					// set isi dari combobox kota
  					// lalu munculkan kembali combobox kotanya
  					$("#kelas").html(response.list_kelas).show();
  				},
  				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
  					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
  				}
  			});
  		});
  	});
  	</script>
    <script>
    $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
      // Kita sembunyikan dulu untuk loadingnya
      $("#loading2").hide();

      $("#jenjang").change(function(){ // Ketika user mengganti atau memilih data provinsi
        $("#sekolah").hide(); // Sembunyikan dulu combobox kota nya
        $("#loading2").show(); // Tampilkan loadingnya

        $.ajax({
          type: "POST", // Method pengiriman data bisa dengan GET atau POST
          url: "<?php echo base_url("admin/siswa/listSekolah"); ?>", // Isi dengan url/path file php yang dituju
          data: {id_jenjang : $("#jenjang").val()}, // data yang akan dikirim ke file yang dituju
          dataType: "json",
          beforeSend: function(e) {
            if(e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response){ // Ketika proses pengiriman berhasil
            $("#loading2").hide(); // Sembunyikan loadingnya

            // set isi dari combobox kota
            // lalu munculkan kembali combobox kotanya
            $("#sekolah").html(response.list_sekolah).show();
          },
          error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
          }
        });
      });
    });
    </script>

    <script>
    $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
      // Kita sembunyikan dulu untuk loadingnya

      $("#program").change(function(){ // Ketika user mengganti atau memilih data provinsi

        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('admin/siswa/get_biaya')?>",
            dataType : "JSON",
            data : {kode: $("#program").val()},
            cache:false,
            success: function(data){
                $.each(data,function(biaya){
                    $('[name="biaya"]').val(data.biaya);
                });

            }
        });
      });
    });
    </script>



















    <!-- selec2 -->
    <script src="<?php echo base_url('js/select2/select2.min.js') ?>"></script>
    <script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
    </script>
