<section style="background-color: var(--primary-color);">
    <div class="container mb-5">
        <div class="row">

            <div class="col-lg-8 mx-auto col-md-7 col-12 pt-5 text-center" data-aos="fade-up">

                <h1 class="mb-4 text-light">Login Sebagai <strong>Guru</strong></h1>

                <p class="text-light">Belum punya akun? <a href="<?= base_url('auth/registration_guru') ?>" class="text-light">Registrasi disini</a></p>
            </div>

            <div class="col-lg-5 mx-auto col-md-10 col-12 mb-5">

                <?= $this->session->flashdata('message') ?>
                <?php $this->session->unset_userdata('message') ?>

                <form action="<?= base_url('auth/login_guru') ?>" method="post" class="contact-form" role="form">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                        </div>
                        <?= form_error('username', '<div class="ml-4 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                        </div>
                        <?= form_error('password', '<div class="ml-4 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                    </div>
                    <button type="submit" class="form-control mt-4" id="submit-button" name="submit" style="background-color: var(--secondary-color);">
                        <h6 class="font-weight-bold">Login Sekarang</h6>
                    </button>

                </form>
            </div>

        </div>
    </div>

    <h6><a href="<?= base_url('auth') ?>" class="font-weight-bold p-3 position-fixed ml-2 text-light" style="top: 5px;left: 0;">Login Sebagai Siswa</a></h6>
    <h5><a href="<?= base_url('landing') ?>" class="badge badge-warning badge-pill font-weight-bold p-3 position-fixed m-3" style="bottom: 5px;right: 0;">Kembali ke Home</a></h5>