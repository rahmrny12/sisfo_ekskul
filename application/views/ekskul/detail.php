<ul class="list-group">
    <li class="list-group-item bg-secondary text-light text-left">
        <h3><?= ucwords($ekskul['nama_ekskul']) ?></h3>
    </li>
    <li class="list-group-item text-left">
        <h6>NISN : <?= $ekskul['deskripsi'] ?></h6>
    </li>
    <li class="list-group-item text-left">
        <img src="<?= base_url('assets/images/ekskul_images/') . $ekskul['foto_ekskul'] ?>">
    </li>
    <!-- <li class="list-group-item text-left">
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
    </li> -->
</ul>