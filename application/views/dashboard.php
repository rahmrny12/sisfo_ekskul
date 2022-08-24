<!-- top tiles -->
<div class="col-lg-12">
    <div class="my-4">
    <?= $this->session->flashdata('message') ?>
    <?php $this->session->unset_userdata('message') ?>

    </div>
    <div class="row" style="display: inline;">
        <div class="col-md-4 col-sm-3 tile_stats_count">
            <span class="count_top font-weight-bold"><i class="fa fa-user"></i> Total Ekstrakurikuler</span>
            <div class="h3 font-weight-bold"><?= $total_kuis ?> Ekskul</div>
            <a href="<?= base_url('ekskul') ?>">
                <span class="count_bottom font-weight-bold green">Lihat Daftar Ekskul</span>
                <!-- <i class="fas fa-arrow"></i> -->
            </a>
        </div>
    </div>
</div>
<!-- /top tiles -->