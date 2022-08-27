<!-- top tiles -->
<div class="col-lg-12">
    <div class="my-4">
        <?= $this->session->flashdata('message') ?>
        <?php $this->session->unset_userdata('message') ?>

    </div>
    <div class="row" style="display: inline;">
        <div class="col-md-2 col-sm-1 tile_stats_count mr-4" style="background-color: var(--primary-color);">
            <span class="count_top font-weight-bold"><i class="fa fa-user"></i> Total Ekstrakurikuler</span>
            <div class="h3 font-weight-bold"><?= $total_ekskul ?> Ekskul</div>
            <a href="<?= base_url('ekskul') ?>">
                <span class="count_bottom font-weight-bold green">Lihat Daftar Ekskul</span>
            </a>
        </div>
        <div class="col-md-2 col-sm-1 tile_stats_count mr-4" style="background-color: var(--primary-color);">
            <span class="count_top font-weight-bold"><i class="fa fa-user"></i> Total Siswa</span>
            <div class="h3 font-weight-bold"><?= $total_siswa ?> Siswa</div>
            <a href="<?= base_url('siswa') ?>">
                <span class="count_bottom font-weight-bold green">Lihat Daftar Siswa</span>
            </a>
        </div>
        <div class="col-md-2 col-sm-1 tile_stats_count mr-4" style="background-color: var(--primary-color);">
            <span class="count_top font-weight-bold"><i class="fa fa-user"></i> Total Guru</span>
            <div class="h3 font-weight-bold"><?= $total_guru ?> Guru</div>
            <a href="<?= base_url('guru') ?>">
                <span class="count_bottom font-weight-bold green">Lihat Daftar Guru</span>
            </a>
        </div>
    </div>
</div>
<!-- /top tiles -->

<div class="col-lg-12 my-5">
    <ul class="list-group mr-4 mb-5 col-md-5">
        <h4 class="ml-2">Ekskul Paling Diminati</h4>
        <?php foreach ($ekskul_favorit as $data) : ?>
            <li class="list-group-item d-flex justify-content-between pt-3 pb-2">
                <h6 class="font-weight-bold"><?= ucwords($data['nama_ekskul']) ?></h6>
                <h6>Total : <?= $data['total_anggota'] ?></h6>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="x_panel col-md-6">
        <div class="x_title">
            <h2>Grafik Ekskul Paling Diminati</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div id="grafikEkskul" style="width: 100%; height: 280px; position: relative;"><svg height="280" version="1.1" width="306" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; top: -0.600006px;">
                    
            </div>
        </div>
    </div>
</div>