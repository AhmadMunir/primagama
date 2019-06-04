<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'siswa' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-fingerprint"></i>
            <span>Absen</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo site_url('admin/absen/') ?>">Lihat Absen</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/absen/input') ?>">Input Absen</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">List Product</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'siswa' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Siswa</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo site_url('admin/siswa') ?>">Lihat Siswa</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/siswa/input') ?>">Tambah Siswa</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">List Product</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'siswa' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Jadwal</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/Jadwaltetap') ?>">Lihat Jadwal Tetap</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/jadwaltetap/input') ?>">Kelola Jadwal Tetap</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/Jadwal') ?>">Lihat Request Jadwal</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/Requestjadwal') ?>">Request Jadwal</a>

        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'jadwal' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Kelas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo site_url('admin/kelas') ?>">Lihat Kelas</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/inputsiswa') ?>">Tambah Jadwal</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">List Jadwal</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'mapel' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Tentor</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo site_url('admin/tentor') ?>">Lihat Tentor</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/tentor/input') ?>">Tambah Tentor</a>
        </div>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'mapel' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-calculator"></i>
            <span>Nilai</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo site_url('admin/nilai') ?>">Lihat Nilai</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/nilai/form') ?>">Input Nilai</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'Pembayaran' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Pembayaran</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo site_url('admin/pembayaran/input') ?>">Tambah Pembayaran</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/pembayaran') ?>">Rekap Pembayaran</a>
        </div>
    </li>



    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
</ul>
