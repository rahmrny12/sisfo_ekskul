<!-- PROJECT DETAIL -->
<section class="project-detail section-padding-half">
    <div class="container">
        <?= $this->session->flashdata('message') ?>
        <?php $this->session->unset_userdata('message') ?>

        <div class="row">
            <div class="col-lg-9 mx-auto col-md-10 col-12 mt-lg-5 text-center" data-aos="fade-up">

                <h4>Detail Ekstrakurikuler</h4>

                <h1><?= $ekskul['nama_ekskul'] ?></h1>
            </div>
        </div>
    </div>
</section>

<!-- PROJECT DETAIL -->
<section class="project-detail section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <img src="<?= base_url('assets/images/ekskul_images/') . $ekskul['foto_ekskul'] ?>" class="img-fluid" alt="personal website" data-aos="fade-up">
                <section class="section-padding-half mx-auto">
                    <?php if ($sudah_daftar) : ?>
                        <div class="container text-center col-md-8">
                            <?php if ($sudah_daftar['dikonfirmasi']) : ?>
                                <h3>Anda sudah terdaftar <strong><?= $ekskul['nama_ekskul'] ?></strong></h3>
                            <?php else : ?>
                                <h3>Anda sudah mendaftar <strong><?= $ekskul['nama_ekskul'] ?></strong> dan menunggu konfirmasi dari gurumu.</h3>
                            <?php endif; ?>
                            <a class="btn mt-5 text-center pt-3 px-4" style="background-color: var(--secondary-color);" href="<?= base_url('landing#ekskul') ?>">
                                <h6 class="font-weight-bold">Lihat Ekskul Lainnya</h6>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="container text-center">
                            <h3>Tertarik untuk bergabung?</h3>
                            <?php if ($this->session->has_userdata('id_siswa')) : ?>
                                <a href="<?= base_url('landing/daftar_ekskul/') . $ekskul['id_ekskul'] ?>" class="btn btn-lg mt-3 text-white" style="background-color: var(--primary-color);">Daftar Sekarang</a>
                            <?php else : ?>
                                <a href="<?= base_url('auth') ?>" class="btn btn-lg mt-3 text-white" style="background-color: var(--primary-color);">Login dulu untuk mendaftar</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </section>
            </div>

            <div class="col-lg-5 col-md-6 mr-lg-auto col-12" data-aos="fade-up" data-aos-delay="200">

                <h2><?= $ekskul['nama_ekskul'] ?></h2>

                <?php if ($ekskul['guru_pembimbing'] != null) : ?>
                    <h6 class="mb-3"><?= $ekskul['guru_pembimbing']['nama_guru'] ?></h6>
                <?php endif; ?>
                <p class="mt-3 mb-4"><?= $ekskul['deskripsi'] ?></p>
                <button class="btn btn-info p-3" data-toggle="modal" data-target="#anggotaModal">
                    <span>Jumlah Anggota : <?= count($anggota) ?></span>
                </button>
                <?php if ($jadwal != null) : ?>
                    <ul class="list-group mt-4">
                        <h5 class="mb-3">Jadwal Pelaksanaan</h5>
                        <?php foreach ($jadwal as $data) : ?>
                            <li class="list-group-item d-flex justify-content-between pb-2">
                                <h6><?= ucfirst($data['hari']) ?></h6>
                                <div class="row mr-2">
                                    <h6>
                                        <?= date('H:i', strtotime($data['jam_dimulai'])) ?>
                                        <span style="color: var(--primary-color);"> - </span>
                                        <?= date('H:i', strtotime($data['jam_selesai'])) ?>
                                    </h6>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- modal jadwal -->
<div class="modal fade" id="anggotaModal" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="anggotaModalLabel">Anggota Aktif Ekskul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <?php foreach ($anggota as $data) : ?>
                        <li class="list-group-item list-group-item-action">
                            <span><?= $data['nama_siswa'] ?></span>
                            <span class="float-right"><?= $data['kelas'] ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>