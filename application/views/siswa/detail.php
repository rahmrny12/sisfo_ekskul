<div class="clearfix"></div>

<div class="col-md-6">
    <ul class="list-group">
        <li class="list-group-item pt-3 pb-2 bg-secondary text-light">
            <h3><?= ucwords($siswa['nama_siswa']) ?></h3>
        </li>
        <li class="list-group-item pt-3 pb-2">
            <h6>NISN : <?= $siswa['nisn'] ?></h6>
        </li>
        <li class="list-group-item pt-3 pb-2">
            <h6>Kelas : <?= strtoupper($siswa['kelas']) ?></h6>
        </li>
        <li class="list-group-item pt-3 pb-2">
            <h6>Alamat : <?= ucwords($siswa['alamat']) ?></h6>
        </li>
        <li class="list-group-item pt-3 pb-2">
            <h6>Nomor Telepon : <?= $siswa['no_telp'] ?></h6>
        </li>
        <li class="list-group-item pt-3 pb-2">
            <h5>Ekstrakurikuler : </h5>
            <h6>
                <?php if ($ekskul == null) : ?>
                    Belum ada ekskul diikuti.
                <?php else : ?>
                    <?php foreach ($ekskul as $data) : ?>
                        <div class="badge <?= ($data['dikonfirmasi']) ? 'badge-info' : 'badge-secondary' ?> d-block mb-1 pt-3 pb-2 px-4 text-light">
                            <a onclick="removeSiswaFromEkskul('<?= base_url('ekskul/keluarkan_siswa?id_ekskul=') . $data['id_ekskul'] . '&id_siswa=' . $siswa['id_siswa'] ?>', '<?= $data['nama_ekskul'] ?>', '<?= $siswa['nama_siswa'] ?>')">
                                <h4 class="float-right"><i class="fa fa-sign-out"></i></h4>
                            </a>
                            <h6 class="font-weight-bold">Nama ekskul : <?= ucwords($data['nama_ekskul']) ?></h6>
                            <h6>Tanggal pendaftaran : <?= date('d-m-Y', strtotime($data['waktu_pendaftaran'])) ?></h6>
                            <h6>Waktu pendaftaran : <?= date('H:i', strtotime($data['waktu_pendaftaran'])) ?></h6>
                            <?php if ($data['dikonfirmasi'] == false) : ?>
                                <a class="btn btn-info col-6" href="<?= base_url('siswa/') . 'konfirmasi_ekskul?id_ekskul=' . $data['id_ekskul'] . '&id_siswa=' . $data['id_siswa'] ?>">
                                    Konfirmasi Pendaftaran
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </h6>
        </li>
    </ul>

    <div class="clearfix"></div>

    <!-- <a class="btn btn-secondary mt-4 ml-2 float-right" href="<?= base_url('siswa/daftar_ekskul') ?>">
        Daftar Ekskul Baru
    </a> -->
    <a class="btn btn-outline-secondary mt-4 ml-2 float-right" href="<?= base_url('siswa') ?>">
        Kembali
    </a>