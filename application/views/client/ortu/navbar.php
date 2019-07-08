<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="<?php echo base_url('siswa/home'); ?>">Primagama </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">

                <ul class="nav pull-right">
                    <?php $jbtn = $this->session->jabatan; ?>
                    <li><a href="#"><?php foreach ($siswa as $m) {
                      // echo ucwords($m->nama_panggilan);
                      switch ($jbtn) {
                        case 'siswa':
                          echo ucwords($m->nama_panggilan);
                          break;
                        case 'orangtua':
                          echo "Orang tua ".ucwords($m->panak);
                          break;
                        case 'tentor':
                          echo ucwords($m->nama);
                          break;
                        default:
                          // code...
                          break;
                      }
                    } ?> </a></li>
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <?php foreach ($siswa as $m) {
                        // echo ucwords($m->nama_panggilan);
                        switch ($jbtn) {
                          case 'siswa':
                          $ft = $m->foto;
                            ?><img src="<?php echo base_url('images/foto/profile/siswa/'.$ft); ?>" class="nav-avatar" /><?php
                            break;
                          case 'orangtua':
                            ?><img src="<?php echo base_url('images/foto/profile/siswa/default.png'); ?>" class="nav-avatar" /><?php
                            break;
                          case 'tentor':
                          $ft = $m->foto;
                            ?><img src="<?php echo base_url('images/foto/profile/tentor/'.$ft); ?>" class="nav-avatar" /><?php
                            break;
                          default:
                            // code...
                            break;
                        }
                      } ?>

                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="
                              <?php foreach ($siswa as $m) {
                                // echo ucwords($m->nama_panggilan);
                                switch ($jbtn) {
                                  case 'siswa':
                                  $ids = $m->id_siswa;
                                    echo base_url('siswa/profil/detail/'.encrypt_url($ids));
                                    break;
                                  case 'orangtua':
                                  $ids = $m->id_siswa;
                                    echo base_url('ortu/profileanak/anak/'.encrypt_url($ids));
                                    break;
                                  case 'tentor':
                                  $idt = $m->id_tentor;
                                    echo base_url('tentor/profile/detail/'.encrypt_url($idt));
                                    break;
                                  default:
                                    // code...
                                    break;
                                }
                              } ?>

                              ">Your Profile</a></li>
                            <li><a href="
                              <?php foreach ($siswa as $m) {
                                // echo ucwords($m->nama_panggilan);
                                switch ($jbtn) {
                                  case 'siswa':
                                  $ids = $m->id_siswa;
                                    echo base_url('siswa/setting/index/'.encrypt_url($ids));
                                    break;
                                  case 'orangtua':
                                  $ids = $m->id_siswa;
                                    echo base_url('ortu/profileanak/anak/'.encrypt_url($ids));
                                    break;
                                  case 'tentor':
                                  $idt = $m->id_tentor;
                                    echo base_url('tentor/setting/index/'.encrypt_url($idt));
                                    break;
                                  default:
                                    // code...
                                    break;
                                }
                              } ?>
                              ">Account Settings</a></li>
                            <li class="divider"></li>
                            <li>  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>
