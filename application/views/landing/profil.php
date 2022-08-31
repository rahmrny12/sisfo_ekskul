<section style="background-color: var(--primary-color);">
    <div class="container mb-5 py-5">
        <div class="col px-0">
            <h2 class="text-light font-weight-bold">Hai, <?= $this->session->userdata('nama_siswa') ?></h2>
            <div class="my-3">
                <?= $this->session->flashdata('message') ?>
                <?php $this->session->unset_userdata('message') ?>
            </div>
        </div>
        <form action="<?= base_url('landing/edit_profil/') . $siswa['id_siswa'] ?>" method="post" class="contact-form ml-0" role="form">
            <div class="row">
                <div class="col-lg-12">
                    <input type="text" class="form-control" name="nama_siswa" placeholder="Masukkan Nama" value="<?= $siswa['nama_siswa'] ?>">
                </div>
                <?= form_error('nama_siswa', '<div class="ml-4 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <input type="text" class="form-control" name="username" value="<?= $siswa['username'] ?>" placeholder="Masukkan Username" readonly>
                    <?= form_error('username', '<div class="ml-2 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                </div>

                <div class="col-lg-6 col-12">
                    <input type="text" class="form-control" name="nisn" placeholder="Nisn" value="<?= $siswa['nisn'] ?>">
                    <?= form_error('nisn', '<div class="ml-2 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12">
                    <select name="kelas" id="kelas" class="form-control py-0 px-3 text-secondary" style="height: calc(3.25rem + 2px);">
                        <option disabled selected>Pilih Kelas</option>
                        <option <?= ($siswa['kelas'] == 'XII RPL 1') ? 'selected' : '' ?>>XII RPL 1</option>
                        <option <?= ($siswa['kelas'] == 'XII RPL 2') ? 'selected' : '' ?>>XII RPL 2</option>
                        <option <?= ($siswa['kelas'] == 'XII TKJ 1') ? 'selected' : '' ?>>XII TKJ 1</option>
                        <option <?= ($siswa['kelas'] == 'XII TKJ 2') ? 'selected' : '' ?>>XII TKJ 2</option>
                        <option <?= ($siswa['kelas'] == 'XII MM 1') ? 'selected' : '' ?>>XII MM 1</option>
                        <option <?= ($siswa['kelas'] == 'XII MM 2') ? 'selected' : '' ?>>XII MM 2</option>
                    </select>
                    <?= form_error('kelas', '<div class="ml-2 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                </div>
                <div class="col-lg-3 col-12">
                    <input type="text" class="form-control" name="no_telp" placeholder="Masukkan Nomor Telepon" value="<?= $siswa['no_telp'] ?>">
                    <?= form_error('no_telp', '<div class="ml-2 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                </div>
                <div class="col-lg-6 col-12">
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="<?= $siswa['alamat'] ?>">
                    <?= form_error('alamat', '<div class="ml-2 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                </div>
            </div>

            <div class="col-md-5 mx-auto">
                <button type="submit" class="form-control mt-5" id="submit-button" name="submit" value="<?= set_value('submit') ?>" style="background-color: var(--secondary-color);">
                    <h6 class="font-weight-bold">Simpan Perubahan</h6>
                </button>
            </div>

        </form>

    </div>

    <h5><a href="<?= base_url('landing') ?>" class="badge badge-warning badge-pill font-weight-bold p-3 position-fixed m-3" style="bottom: 5px;right: 0;">Kembali ke Home</a></h5>