<?php $jbtn = $this->session->jabatan;
  switch ($jbtn) {
    case 'siswa':?>
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li class="active"><a href="<?php echo base_url('siswa/home'); ?>"><i class="menu-icon icon-dashboard"></i>Dashboard
            </a></li>
            <li><a href="activity.html"><i class="menu-icon icon-user"></i>Profil </a>
            </li>
            <li><a href="message.html"><i class="menu-icon icon-cog"></i>Pengaturan <b class="label green pull-right">
                11</b> </a></li>
        </ul>
        <!--/.widget-nav-->


        <ul class="widget widget-menu unstyled">
            <li><a href="<?php echo base_url('siswa/jadwaltetap') ?>"><i class="menu-icon icon-calendar"></i> Jadwal </a></li>
            <li><a href="<?php echo base_url('siswa/requestjadwal') ?>"><i class="menu-icon icon-pencil"></i> Request Jadwal </a></li>
            <li><a href="<?php echo base_url('siswa/nilai') ?>"><i class="menu-icon icon-hdd"></i>Nilai </a></li>
            <li><a href="<?php echo base_url('siswa/absen') ?>"><i class="menu-icon icon-hand-up"></i>Absen </a></li>

        </ul>
    </div>
      <?php
      break;
      case 'orangtua':?>
      <div class="sidebar">
          <ul class="widget widget-menu unstyled">
              <li class="active"><a href="<?php echo base_url('ortu/home'); ?>"><i class="menu-icon icon-dashboard"></i>Dashboard
              </a></li>
              <li><a href="activity.html"><i class="menu-icon icon-user"></i>Profil Anak</a>
              </li>
              <li><a href="activity.html"><i class="menu-icon icon-user"></i>Profil</a>
              </li>
              <li><a href="message.html"><i class="menu-icon icon-cog"></i>Pengaturan <b class="label green pull-right">
                  11</b> </a></li>
          </ul>
          <!--/.widget-nav-->


          <ul class="widget widget-menu unstyled">
              <li><a href="<?php echo base_url('ortu/jadwalanak') ?>"><i class="menu-icon icon-calendar"></i> Jadwal Anak</a></li>
              <li><a href="<?php echo base_url('ortu/pembayaran') ?>"><i class="menu-icon icon-pencil"></i> Pembayaran</a></li>
              <li><a href="<?php echo base_url('ortu/nilaianak') ?>"><i class="menu-icon icon-hdd"></i>Nilai Anak </a></li>
              <li><a href="<?php echo base_url('ortu/absenanak') ?>"><i class="menu-icon icon-hand-up"></i>Absen Anak</a></li>

          </ul>
      </div>
        <?php
        break;

    default:
      // code...
      break;
  }
?>
