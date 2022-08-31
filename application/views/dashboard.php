<!-- top tiles -->
<div class="col-lg-12">
    <div class="my-4">
        <?= $this->session->flashdata('message') ?>
        <?php $this->session->unset_userdata('message') ?>
    </div>
    <div class="row" style="display: inline;">
        <div class="col">
            <div class="col-md-2 col-sm-3 mb-2 tile_stats_count mr-4 rounded py-2 px-3 text-light" style="background-color: #057a8d;">
                <span class="count_top font-weight-bold"><i class="fa fa-user"></i> Total Ekstrakurikuler</span>
                <div class="h3 font-weight-bold"><?= $total_ekskul ?> Ekskul</div>
                <a href="<?= base_url('ekskul') ?>">
                    <span class="count_bottom font-weight-bold text-light"><u>Lihat Daftar Ekskul</u></span>
                </a>
            </div>
            <div class="col-md-2 col-sm-3 mb-2 tile_stats_count mr-4 rounded py-2 px-3 text-light" style="background-color: #057a8d;">
                <span class="count_top font-weight-bold"><i class="fa fa-user"></i> Total Siswa</span>
                <div class="h3 font-weight-bold"><?= $total_siswa ?> Siswa</div>
                <a href="<?= base_url('siswa') ?>">
                    <span class="count_bottom font-weight-bold text-light"><u>Lihat Daftar Siswa</u></span>
                </a>
            </div>
            <div class="col-md-2 col-sm-3 mb-2 tile_stats_count mr-4 rounded py-2 px-3 text-light" style="background-color: #057a8d;">
                <span class="count_top font-weight-bold"><i class="fa fa-user"></i> Total Guru</span>
                <div class="h3 font-weight-bold"><?= $total_guru ?> Guru</div>
                <a href="<?= base_url('guru') ?>">
                    <span class="count_bottom font-weight-bold text-light"><u>Lihat Daftar Guru</u></span>
                </a>
            </div>
        </div>
        <?php if ($ekskul_favorit != null) : ?>
            <ul class="list-group mr-4 mb-5 col-md-4">
                <h4 class="ml-2">Ekskul Paling Diminati</h4>
                <?php foreach ($ekskul_favorit as $data) : ?>
                    <li class="list-group-item d-flex justify-content-between pt-3 pb-2">
                        <h6 class="font-weight-bold col pl-0"><?= ucwords($data['nama_ekskul']) ?></h6>
                        <h6>Total : <?= $data['total_anggota'] ?></h6>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<!-- /top tiles -->