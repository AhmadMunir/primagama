
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
      <link href="<?php echo base_url('css/admin/profile.css')?>" rel="stylesheet" type="text/css">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php echo SITE_NAME; ?></title>
      <link type="text/css" href="<?php echo base_url('assets/bootstrap/client/css/bootstrapprofil.min.css') ?>" rel="stylesheet">

      <link type="text/css" href="<?php echo base_url('assets/bootstrap/client/css/bootstrap-responsive.min.css')?>" rel="stylesheet">
      <link type="text/css" href="<?php echo base_url('css/client/theme.css') ?>" rel="stylesheet">
      <link type="text/css" href="<?php echo base_url('images/icons/css/font-awesome.css') ?>" rel="stylesheet">
      <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'rel='stylesheet'>


    </head>
    <body>
      <!-- <?php //$this->load->view('client/_partials/navbar') ?>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <?php $this->load->view('client/_partials/sidebar') ?>
                        <!--/.sidebar-->
                    </div>
                    <div class="module-body">
                    
                    <!--/.span3-->
                    <div class="span8">
                        <div class="module">
                          <div class="module-head">
                            <h3></h3>
                          </div>
                         

                          
                        <div class="module-body">
                          <div class="container emp-profile">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-img">
                                               

                                                  
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="profile-head">
                                                        <h5>
                                                       
                                                        <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="ayah-tab" data-toggle="tab" href="#ayah" role="tab" aria-controls="ayah" aria-selected="true">Ayah</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="ibu-tab" data-toggle="tab" href="#ibu" role="tab" aria-controls="ibu" aria-selected="false">Ibu</a>
                                                    </li>
                                                    <li class="nav-item">
                                                    
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- <div class="profile-work">
                                                
                                                <p>Id Mapel</p>
                                                <p><?php echo $id_mapelx?></p>
                                               <br/>
                                            </div> -->
                                        </div>
                                        <div class="col-md-8">
                                            <div class="tab-content profile-tab" id="myTabContent">
                                                <div class="tab-pane fade show active" id="ayah" role="tabpanel" aria-labelledby="ayah-tab">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Nama Ayah</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                  <p><> </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Pekerjaan Ayah</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>No Hp Ayah</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><></p>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="tab-pane fade show" id="ibu" role="tabpanel" aria-labelledby="ibu-tab">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Nama Ibu</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Pekerjaan Ibu</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>No HP Ibu</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><></p>
                                                                </div>
                                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                                
                                                
                                                  
                                                    <tbody>
                                                      <tr>
                                                        <td class="align-middle"></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end profile -->

                          </div>
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
        <script src="<?php echo base_url('js/client/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>

       <script src="<?php echo base_url('js/client/jquery-ui-1.10.1.custom.min.js')?>" type="text/javascript"></script>
       <!-- <script src="<?php echo base_url('assets/bootstrap/client/js/bootstrap.min.js')?>" type="text/javascript"></script> -->
       <script src="<?php echo base_url('js/client/flot/jquery.flot.js')?>" type="text/javascript"></script>
       <script src="<?php echo base_url('js/client/flot/jquery.flot.resize.js')?>" type="text/javascript"></script>
       <script src="<?php echo base_url('js/client/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
       <script src="<?php echo base_url('js/client/common.js')?>" type="text/javascript"></script>


       <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
       <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
       <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
        <div class="modal fade" id="updatefoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ganti Foto Profil</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('tentor/profile/editfoto') ?>" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="id" value="<?php  echo $id ?>">
                <input type="file" name="foto">
            </div>
            <div class="modal-footer">
              <input type="submit" value="Simpan">
            </form>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
        </div>


    </body>
    </html>
