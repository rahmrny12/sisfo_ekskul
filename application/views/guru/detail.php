<div class="clearfix"></div>

<div class="col-md-6">
    <ul class="list-group">
        <li class="list-group-item bg-secondary text-light text-left">
            <h3><?= ucwords($siswa['nama_siswa']) ?></h3>
        </li>
        <li class="list-group-item text-left">
            <h6>NISN : <?= $siswa['nisn'] ?></h6>
        </li>
        <li class="list-group-item text-left">
            <h6>Kelas : <?= strtoupper($siswa['kelas']) ?></h6>
        </li>
        <li class="list-group-item text-left">
            <h6>Alamat : <?= ucwords($siswa['alamat']) ?></h6>
        </li>
        <li class="list-group-item text-left">
            <h6>Nomor Telepon : <?= $siswa['no_telp'] ?></h6>
        </li>
        <li class="list-group-item text-left">
            <h5>Ekstrakurikuler : </h5>
            <h6>
                <?php if ($ekskul == null) : ?>
                    Belum ada ekskul diikuti.
                <?php else : ?>
                    <?php foreach ($ekskul as $data) : ?>
                        <div class="badge badge-info d-block mb-1 pt-3 pb-2 px-4 text-light">
                            <h6 class="font-weight-bold">Nama ekskul : <?= ucwords($data['nama_ekskul']) ?></h6>
                            <h6>Tanggal pendaftaran : <?= date('d-m-Y', strtotime($data['waktu_pendaftaran'])) ?></h6>
                            <h6>Waktu pendaftaran : <?= date('H:i', strtotime($data['waktu_pendaftaran'])) ?></h6>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </h6>
        </li>
    </ul>

    <div class="clearfix"></div>

    <a class="btn btn-secondary mt-4 ml-2 float-right" href="<?= base_url('guru/daftar_ekskul') ?>">
        Daftar Ekskul Baru
    </a>
    <a class="btn btn-outline-secondary mt-4 ml-2 float-right" href="<?= base_url('siswa') ?>">
        Kembali
    </a>
</div>