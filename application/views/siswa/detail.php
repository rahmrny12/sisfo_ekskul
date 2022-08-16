<div class="clearfix"></div>

<div class="col-md-6">
    <ul class="list-group list-group-flush">
        <li class="list-group-item text-left">
            <h3><?= ucwords($siswa['nama_siswa']) ?></h3>
        </li>
        <li class="list-group-item text-left">
            <h6><?= $siswa['nisn'] ?></h6>
        </li>
        <li class="list-group-item text-left">
            <h6><?= $siswa['kelas'] ?></h6>
        </li>
        <li class="list-group-item text-left">
            <h6><?= ucwords($siswa['alamat']) ?></h6>
        </li>
        <li class="list-group-item text-left">
            <h6><?= $siswa['no_telp'] ?></h6>
        </li>
        <li class="list-group-item text-left">
            <h6>
                <?php foreach ($ekskul as $data) : ?>
                    <span class="badge badge-pill badge-primary py-3 px-4"><?= ucwords($data['nama_ekskul']) ?></span>
                <?php endforeach; ?>
            </h6>
        </li>
    </ul>

    <div class="clearfix"></div>

    <a class="btn btn-secondary mt-4 ml-2 float-right" href="<?= base_url('siswa') ?>">
        Kembali
    </a>
</div>