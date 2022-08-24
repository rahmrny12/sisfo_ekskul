<section style="background-color: var(--primary-color);">
    <div class="container mb-5">
        <div class="row">

            <div class="col-lg-8 mx-auto col-md-7 col-12 pt-5 text-center" data-aos="fade-up">

                <h1 class="mb-4 text-light">Halaman Login <strong>Sisfo Ekskul</strong></h1>

                <p class="text-light">Dengan <strong>login</strong>, Anda dapat melakukan pendaftaran pada ekstrakurikuler yang Anda <strong>minati</strong>.</a></p>
                <p class="text-light">Belum punya akun? <a href="<?= base_url('auth/registration') ?>" class="text-light">Registrasi disini</a></p>
            </div>

            <div class="col-lg-6 mx-auto col-md-10 col-12 mb-5">

                <?= $this->session->flashdata('message') ?>
                <?php $this->session->unset_userdata('message') ?>

                <form action="<?= base_url('landing/daftar_ekskul/') . $default_ekskul ?>" method="post" class="contact-form" role="form">
                    <div class="row">
                        <div class="col-lg-12">
                            <input class="form-control" value="<?= $this->session->userdata('nama_siswa') ?>" name="nama_siswa" id="nama_siswa" style="color: var(--primary-color);" readonly></input>
                        </div>
                        <?= form_error('alasan', '<div class="ml-4 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <select class="form-control has-feedback-left py-0 px-3" name="ekskul" id="ekskul" style="height: calc(3.25rem + 2px); color: var(--primary-color);">
                                <option value="">Pilih Ekskul</option>
                                <?php foreach ($ekskul as $data) : ?>
                                    <option value="<?= $data['id_ekskul'] ?>" <?= $data['id_ekskul'] == $default_ekskul ? "selected" : "" ?>>
                                        <?= $data['nama_ekskul'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('ekskul', '<div class="ml-2 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea class="form-control" name="alasan" placeholder="Masukkan alasan bergabung ekskul" id="alasan" rows="3"></textarea>
                        </div>
                        <?= form_error('alasan', '<div class="ml-4 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                    </div>
                    <button type="submit" class="form-control mt-4" id="submit-button" name="submit" style="background-color: var(--secondary-color);">
                        <h6 class="font-weight-bold">Login Sekarang</h6>
                    </button>

                </form>
            </div>

        </div>
    </div>

    <h5><a href="<?= base_url('siswa') ?>" class="badge badge-warning badge-pill font-weight-bold p-3 position-fixed float-right m-3" style="bottom: 5px;right: 0;">Kembali ke Home</a></h5>