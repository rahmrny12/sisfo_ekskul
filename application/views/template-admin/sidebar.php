<!-- menu profile quick info -->
<div class="profile clearfix mx-3">
    <div class="profile_info">
        <span>Selamat Datang,</span>
        <h2><?= $this->session->userdata('nama') ?></h2>
    </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu" style="background-color: #24394d;">
            <li><a href="<?= base_url('siswa/dashboard') ?>">
                    <i class="fa fa-tachometer "></i>
                    Dashboard</a></li>
        </ul>
        <ul class="nav side-menu" style="background-color: #24394d;">
            <li><a href="<?= base_url('siswa') ?>">
                    <i class="fa fa-users "></i>
                    Daftar Siswa</a></li>
        </ul>
        <ul class="nav side-menu">
            <li>
                <a>
                    <i class="fa fa-futbol-o "></i>Ekstrakurikuler
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('ekskul') ?>">Daftar Ekskul</a></li>
                    <li><a href="<?= base_url('ekskul/tambah') ?>">Tambah Ekskul</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav side-menu">
            <li>
                <a>
                    <i class="fa fa-users "></i>Guru
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('guru') ?>">Daftar Guru</a></li>
                    <li><a href="<?= base_url('guru/tambah') ?>">Tambah Guru</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->
</div>
</div>