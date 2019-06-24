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
<div class="row">
        <div class="col-md-3">
        <input type="text" id="keyword" name="keyword">
        </div>
        <div class="col-md-3">
          <button type="button" class="btn btn-secondary" name="btn_search" id="btn-search">Search</button>
          <a href="<?php echo base_url('admin/kelas'); ?>"><small>Reset</small></a><br>
        </div>
</div>

<br>
        <!-- Icon Cards-->
        <div class="view" id="view">
        <?php $this->load->view('admin/absen/search', array('view_kelas'=>$kelas)); ?>
      </div>



      </div>

      <?php $this->load->view('admin/_partial/footer.php') ?>

    </div>
    <!-- /.content-wrapper -->

  </div>

  <?php $this->load->view('admin/_partial/scrolltop.php') ?>


    <?php $this->load->view('admin/_partial/modal.php') ?>

  <?php $this->load->view('admin/_partial/js.php') ?>

  <script>
  $(document).ready(function(){

    $("#btn-search").click(function(){
      $(this).html("SEARCHING........").attr("disable", "disable");

      $.ajax({
        url: "<?php echo base_url('admin/absen/search'); ?>",
        type: 'POST',
        data: {keyword: $("#keyword").val()},
        dataType: "json",
        beforeSend: function(e){
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){
          $("#btn-search").html("SEARCH").removeAttr("disable");

          $("#view").html(response.hasil);
        },
        error: function(xhr, ajaxOptions, thrownError){
          alert(xhr.responseText);
        }
      });
    });
  });
  </script>
</body>

</html>
