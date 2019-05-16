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
            <i class="fas fa-fw fa-users"></i>
            <span>Jadwal</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">

            <a class="dropdown-item" href="<?php echo site_url('admin/Jadwal') ?>">Lihat Jadwal</a>
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
          <a class="dropdown-item" href="<?php echo site_url('admin/siswa') ?>">Lihat Jadwal</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/inputsiswa') ?>">Tambah Jadwal</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">List Jadwal</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'mapel' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Mapel</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo site_url('admin/mapel') ?>">Lihat Mapel</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/inputsiswa') ?>">Tambah Mapel</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">List Mapel</a>
        </div>
    </li>
    
    <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>&nbsp;Siswa</span></a>
    </li> -->

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
</ul>
