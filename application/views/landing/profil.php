<section style="background-color: var(--primary-color);">
    <div class="container mb-5 py-5">
        <div class="row">
            <h2 class="text-light font-weight-bold">Hai, <?= $this->session->userdata('nama_siswa') ?></h2>
        </div>
    </div>

    <h5><a href="<?= base_url('landing') ?>" class="badge badge-warning badge-pill font-weight-bold p-3 position-fixed m-3" style="bottom: 5px;right: 0;">Kembali ke Home</a></h5>