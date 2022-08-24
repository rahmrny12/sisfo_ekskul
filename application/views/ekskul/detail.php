<div class="clearfix"></div>

<div class="col-md-6">
    <?= $this->session->flashdata('message') ?>
    <?php $this->session->unset_userdata('message') ?>
    <ul class="list-group">
        <li class="list-group-item bg-secondary text-light text-left">
            <div class="row">
                <div class="col">
                    <h3><?= ucwords($ekskul['nama_ekskul']) ?></h3>
                    <?php if ($ekskul['guru_pembimbing'] != null) : ?>
                        <div class="d-flex align-items-center">
                            <h6 class="mr-2"><?= ucwords($ekskul['guru_pembimbing']['nama_guru']) ?></h6>
                            <a class="text-light ml-2" data-toggle="modal" data-target="#tambahGuruModal">
                                <h4><i class="fa fa-pencil"></i></h4>
                            </a>
                            <a class="text-light ml-3" onclick="deleteGuruFromEkskul('<?= base_url('ekskul/hapus_pembimbing/') . $ekskul['id_ekskul'] ?>', '<?= $ekskul['nama_ekskul'] ?>', '<?= $ekskul['guru_pembimbing']['nama_guru'] ?>')">
                                <h4><i class="fa fa-trash"></i></h4>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="d-flex">
                            <h6 class="mr-2">Belum Ada Guru Pembimbing</h6>
                            <a class="text-light" data-toggle="modal" data-target="#tambahGuruModal">
                                <h5><i class="fa fa-plus"></i></h5>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <a class="btn btn-warning h-25" href="<?= base_url('ekskul/edit/') . $ekskul['id_ekskul'] ?>">
                    Edit Ekskul
                </a>
            </div>
        </li>
        <li class="list-group-item text-light text-left">
            <h6 class="text-dark"><?= ucfirst($ekskul['deskripsi']) ?></h6>
        </li>
        <li class="list-group-item text-light text-left">
            <button class="btn btn-info" data-toggle="modal" data-target="#jadwalModal">
                Atur Jadwal
            </button>
        </li>
    </ul>

    <div class="clearfix"></div>

    <a class="btn btn-outline-secondary mt-4 ml-2 float-right" href="<?= base_url('ekskul') ?>">
        Kembali
    </a>
</div>
<div class="col-md-6">
    <img class="col" src="<?= base_url('assets/images/ekskul_images/') . $ekskul['foto_ekskul'] ?>" alt="<?= $ekskul['foto_ekskul'] ?>">
</div>

<!-- modal tambah guru -->
<div class="modal fade" id="tambahGuruModal" tabindex="-1" role="dialog" aria-labelledby="tambahGuruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahGuruModalLabel">Tambah Guru untuk Ekskul <strong><?= $ekskul['nama_ekskul'] ?></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('ekskul/tambah_pembimbing/') . $ekskul['id_ekskul'] ?>" method="post">
                <div class="modal-body">
                    <div class="field item form-group my-4">
                        <div class="col">
                            <select class="form-control has-feedback-left" name="guru" id="guru">
                                <option value="">Pilih Guru Pembimbing</option>
                                <?php foreach ($guru as $data) : ?>
                                    <?php if ($data['nama_ekskul'] == null) : ?>
                                        <option value="<?= $data['id_guru_pembimbing'] ?>"><?= $data['nama_guru'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="ekskul" aria-hidden="true"></label>
                        </div>
                        <?= form_error('guru', '<div class="ml-4 font-weight-bold" style="color: #f59fa5;">', '</div>') ?>
                    </div>
                    <a href="<?= base_url('guru') ?>">
                        <h6 class="mx-3">Lihat Guru Tersedia</h6>
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Pilih Guru</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal jadwal -->
<div class="modal fade" id="jadwalModal" tabindex="-1" role="dialog" aria-labelledby="tambahGuruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahGuruModalLabel">Jadwal Produktif Ekskul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group date" id="myDatepicker3">
                        <input type="text" class="form-control">
                        <span class="input-group-addon">
                            <span class="fa fa-wheelchair-alt"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Atur Jadwal</button>
            </div>
        </div>
    </div>
</div>