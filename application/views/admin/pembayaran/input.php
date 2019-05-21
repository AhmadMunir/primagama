<?php

$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . '..' . $DS . '..' . $DS . '..' . $DS . '..' . $DS . 'js' . $DS . 'als' . $DS . 'core' . $DS . 'Handler.php') ?
  require_once __DIR__ . $DS . '..' . $DS . '..' . $DS . '..' . $DS . '..' . $DS . 'js' . $DS . 'als' . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . '..' . $DS . '..' . $DS . '..' . $DS . '..' . $DS . 'js' . $DS . 'als' . $DS . 'core' . $DS .  'Config.php') ?
  require_once __DIR__ . $DS . '..' . $DS . '..' . $DS . '..' . $DS . '..' . $DS . 'js' . $DS . 'als' . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');

use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

    $handler = new Handler();
    $handler->getJavascriptAntiBot();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <?php $this->load->view('admin/_partial/head.php') ?>
</head>
<body>

<!-- Search Form Demo -->
<!-- <div style="clear: both">
    <input type="text" class='mySearch' id="ls_query" placeholder="Type to start searching ...">
</div> -->
<!-- /Search Form Demo -->


<!-- content -->
<?php $this->load->view('admin/_partial/navbar.php') ?>
<div id="wrapper">


  <?php $this->load->view('admin/_partial/sidebar.php') ?>

  <div id="content-wrapper">

    <div class="container-fluid">




      <div class="card-header">Input Pembayaran</div>
      <div class="card-body">
        <form method="post" action="<?php echo base_url().'admin/pembayaran/tambah_bayar';?>">
          <input type="hidden" name="id" value="<?php echo $kode ?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <!-- <div class="form-label-group"> -->
                  Nama Siswa :
                <!-- </div> -->
              </div>

            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" class="mySearch" id="ls_query"  required>
                  <input type="hidden" id="id_sis" name="id_sis" required>
                </div>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="id_sis" name="id_sis"class="form-control" readonly required="required">
                  <label for="id_sis">ID Siswa</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="kls" name="kls" class="form-control" readonly required="required">
                  <label for="kls">Kelas</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="prog" name="prog" class="form-control" readonly required="required">
                  <label for="prog">Program</label>
                </div>
              </div>
            </div>
          </div>

<br>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md 6">
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="sisaS" readonly name="sisaS" class="form-control" placeholder="Tempat" required="required">
                  <label for="sisaS">Sisa Angsuran Sebelumnya</label>
                </div>
              </div>
            </div>
          </div>

                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-md 6">
                            </div>
                            <div class="col-md-6">

                              <div class="form-label-group">
                                <input type="number" onkeyup="kurang()" id="jml"value="" name="jml" class="form-control"  required="required">
                                <label for="jml">Jumlah Angsuran</label>
                              </div>
                            </div>
                          </div>
                        </div>

<hr class="col-md-12">
<div class="form-group">
<div class="form-row">
<div class="col-md-4">

</div>
<div class="col-md-2">
  <label for="Sisa">Sisa Angsuran :</label>
</div>
<div class="col-md-6">
  <div class="form-label-group">
    <input type="text" id="sisaL" name="sisaL" value="" readonly class="form-control" placeholder="Tempat" required="required">
    <label for="sisaL">Sisa Angsuran</label>
  </div>
</div>
</div>

</div>

  <div class="form-group">
    <div class="form-row">
  <div class="col-md-6">
    <input type="submit" class="btn-primary" value="Tambahkan">
  </div>
        </div>
      </div>
        </form>

      </div>

      </div>

    </div>



  </div>
  <!-- /.content-wrapper -->

</div>
<?php $this->load->view('admin/_partial/scrolltop.php') ?>


  <?php $this->load->view('admin/_partial/modal.php') ?>

<!-- <?php //$this->load->view('admin/_partial/js2.php') ?> -->

<!-- ENDCONTENT -->




<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('js/als/js/jquery-1.11.1.min.js')?>"></script>

<!-- Live Search Script -->
<script type="text/javascript" src="<?php echo base_url('js/als/js/ajaxlivesearch.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

<script>
jQuery(document).ready(function(){
    jQuery(".mySearch").ajaxlivesearch({
        loaded_at: <?php echo time(); ?>,
        token: <?php echo "'" . $handler->getToken() . "'"; ?>,
        max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
        onResultClick: function(e, data) {
            // get the index 0 (first column) value
            var selectedOne = jQuery(data.selected).find('td').eq('0').text();
            var selectedtwo = jQuery(data.selected).find('td').eq('1').text();
            // set the input value
            jQuery('#ls_query').val(selectedtwo);
            // hide the result
            jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');

              $.ajax({
                  type : "POST",
                  url  : "<?php echo base_url('admin/pembayaran/get_dtl')?>",
                  dataType : "JSON",
                  data : {kode: selectedOne},
                  cache:false,
                  success: function(data){
                      $.each(data,function(id_siswa, nama_lengkap, kelas, nama_program , sisa_tagihan){
                          $('[name="id_sis"]').val(data.id_siswa);
                          // $('[name="nama"]').val(data.id_siswa);
                          $('[name="kls"]').val(data.kelas);
                          $('[name="prog"]').val(data.nama_program);
                          $('[name="sisaS"]').val(data.sisa_tagihan);

                      });

                  }
              });
              return false;

        },
        onResultEnter: function(e, data) {
            // do whatever you want
            // jQuery("#ls_query").trigger('ajaxlivesearch:search', {query: 'test'});
        },
        onAjaxComplete: function(e, data) {

        }
    });
})
</script>

<script language="javascript">
                                 function kurang(){

                                   var txtFirstNumberValue = document.getElementById('sisaS').value;
                                   var txtSecondNumberValue = document.getElementById('jml').value;
                                   var result = parseInt (txtFirstNumberValue) - parseInt(txtSecondNumberValue);
                                   if (!isNaN(result)){
                                    document.getElementById('sisaL').value=result;

                              }
                               }
                            </script>

</body>
</html>
