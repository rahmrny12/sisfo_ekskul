<!DOCTYPE html>
<html lang="en">

<head>

    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="<?= base_url('vendor/digital_trend/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/digital_trend/') ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/digital_trend/') ?>css/aos.css">
    <link rel="stylesheet" href="<?= base_url('vendor/digital_trend/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('vendor/digital_trend/') ?>css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url('vendor/digital_trend/') ?>css/templatemo-digital-trend.css">

</head>

<body style="background-color: #057A8D;">

    <!-- CONTACT -->
    <div class="container mb-5">
        <div class="row">

            <div class="col-lg-8 mx-auto col-md-7 col-12 pt-5 text-center" data-aos="fade-up">

                <h1 class="mb-4 text-light">Halaman Login <strong>Sisfo Ekskul</strong></h1>

                <p class="text-light">Dengan <strong>login</strong>, Anda dapat melakukan pendaftaran pada ekstrakurikuler yang Anda <strong>minati</strong>.</a></p>
                <p class="text-light">Belum punya akun? <a href="<?= base_url('auth/registration') ?>" class="text-light">Registrasi disini</a></p>
            </div>

            <div class="col-lg-5 mx-auto col-md-10 col-12 mb-5">

                <?= $this->session->flashdata('message') ?>

                <form action="<?= base_url('auth') ?>" method="post" class="contact-form" role="form">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username atau NISN">
                        </div>
                        <?= form_error('username', '<div class="ml-4 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                        </div>
                        <?= form_error('password', '<div class="ml-4 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                    </div>
                    <button type="submit" class="form-control mt-4" id="submit-button" name="submit" style="background-color: #F1C111;">
                        <h6 class="font-weight-bold">Login Sekarang</h6>
                    </button>

                </form>
            </div>

        </div>
    </div>

    <h5><a href="<?= base_url('home') ?>" class="badge badge-info badge-pill font-weight-bold p-3 position-fixed float-right m-3" style="bottom: 5px;right: 0;">Kembali ke Home</a></h5>



    <!-- SCRIPTS -->
    <script src="<?= base_url('vendor/digital_trend/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('vendor/digital_trend/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('vendor/digital_trend/') ?>js/aos.js"></script>
    <script src="<?= base_url('vendor/digital_trend/') ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('vendor/digital_trend/') ?>js/custom.js"></script>

</body>

</html>