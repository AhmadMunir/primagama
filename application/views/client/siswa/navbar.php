<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="<?php echo base_url('siswa/home'); ?>">Primagama </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav nav-icons">
                    <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                    <li><a href="#"><i class="icon-eye-open"></i></a></li>
                    <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                </ul>
                <form class="navbar-search pull-left input-append" action="#">
                <input type="text" class="span3">
                <button class="btn" type="button">
                    <i class="icon-search"></i>
                </button>
                </form>
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Item No. 1</a></li>
                            <li><a href="#">Don't Click</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Example Header</li>
                            <li><a href="#">A Separated link</a></li>
                        </ul>
                    </li>
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
                        <img src="<?php echo base_url('images/foto/profile/siswa/default.png'); ?>" class="nav-avatar" />
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Your Profile</a></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Account Settings</a></li>
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
<script src="<?php echo base_url('assets/bootstrap/client/js/bootstrap.min.js')?>" type="text/javascript"></script>
