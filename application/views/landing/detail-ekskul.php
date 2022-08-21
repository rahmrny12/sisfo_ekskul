<!-- PROJECT DETAIL -->
<section class="project-detail section-padding-half">
    <div class="container">
        <?= $this->session->flashdata('message') ?>

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
            </div>

            <div class="col-lg-5 col-md-6 mr-lg-auto col-12" data-aos="fade-up" data-aos-delay="200">

                <h2><?= $ekskul['nama_ekskul'] ?></h2>

                <p class="mt-3 mb-4"><?= $ekskul['deskripsi'] ?></p>
            </div>
        </div>
    </div>

    <section class="section-padding-half mx-auto">
        <?php if ($sudah_daftar) : ?>
            <div class="container text-center">
                <h3>Anda sudah terdaftar <strong><?= $ekskul['nama_ekskul'] ?></strong></h3>
            </div>
        <?php else : ?>
            <div class="container text-center">
                <h3>Tertarik untuk bergabung?</h3>
                <?php if ($this->session->has_userdata('id_siswa')) : ?>
                    <a href="<?= base_url('home/daftar_ekskul/') . $ekskul['id_ekskul'] ?>" class="btn btn-lg mt-3 text-white" style="background-color: var(--primary-color);">Daftar Sekarang</a>
                <?php else : ?>
                    <a href="<?= base_url('auth') ?>" class="btn btn-lg mt-3 text-white" style="background-color: var(--primary-color);">Login dulu untuk mendaftar</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>
</section>