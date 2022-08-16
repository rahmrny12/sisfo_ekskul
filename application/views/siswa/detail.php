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
            <h6>Kelas : <?= $siswa['kelas'] ?></h6>
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
                        <span class="badge badge-pill badge-secondary py-3 px-4"><?= ucwords($data['nama_ekskul']) ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </h6>
        </li>
    </ul>

    <div class="clearfix"></div>

    <a class="btn btn-secondary mt-4 ml-2 float-right" href="<?= base_url('siswa') ?>">
        Kembali
    </a>
</div>