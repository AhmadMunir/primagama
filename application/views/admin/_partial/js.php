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

  <script>
        jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: 'Alert',
                        text: 'Hapus Data?',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
    </script>

    <script>
      $(document).ready(function(){
        function load_unseen_notif(view = '')
        {
          $.ajax({
            url:"<?php echo base_url() ?>admin/Notifadmin/getNotifReqJadwal",
            method:"POST",
            data: {view:view},
            dataType:"json",
            success:function(data)
            {
              $('.mu').html(data.notif);
          if(data.unseen > 0)
          {
           $('.count').html(data.unseen);
            }
          }
        });
      }
        load_unseen_notif();

      $(document).on('click', '.dropdown-toggle', function(){
        $('.count').html('');
        load_unseen_notif('view');
      });

      setInterval(function(){
       load_unseen_notif();
     }, 5000);
    });
    </script>
