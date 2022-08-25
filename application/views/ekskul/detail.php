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
                            <a class="text-light ml-2" data-toggle="modal" data-target="#tambahGuruModal" style="cursor: pointer;">
                                <h4><i class="fa fa-pencil"></i></h4>
                            </a>
                            <a class="text-light ml-3" onclick="deleteGuruFromEkskul('<?= base_url('ekskul/hapus_pembimbing/') . $ekskul['id_ekskul'] ?>', '<?= $ekskul['nama_ekskul'] ?>', '<?= $ekskul['guru_pembimbing']['nama_guru'] ?>')" style="cursor: pointer;">
                                <h4><i class="fa fa-trash"></i></h4>
                            </a>
                        </div>
                    <?php else : ?>
                        <div class="d-flex">
                            <h6 class="mr-2">Belum Ada Guru Pembimbing</h6>
                            <a class="text-light" data-toggle="modal" data-target="#tambahGuruModal" style="cursor: pointer;">
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
        <?php if ($jadwal != null) : ?>
            <li class="list-group-item text-light text-left">
                <h6 class="text-dark font-weight-bold">Jadwal Ekstrakurikuler</h6>
                <?php foreach ($jadwal as $data) : ?>
                    <div class="badge badge-info mb-1 pt-3 pb-2">
                        <h4 class="float-right mr-2 text-light" onclick="deleteJadwalFromEkskul('<?= base_url('ekskul/hapus_jadwal?id_ekskul=') . $ekskul['id_ekskul'] . '&id_jadwal=' .  $data['id_jadwal'] ?>')" style="cursor: pointer;"><i class="fa fa-trash"></i></h4>
                        <div class="px-4">
                            <h6 class="text-light font-weight-bold"><?= ucfirst($data['hari']) ?></h6>
                            <div class="col">
                                <h6 class="text-light">Dimulai jam : <?= date('H:i', strtotime($data['jam_dimulai'])) ?></h6>
                                <h6 class="text-light">Selesai jam : <?= date('H:i', strtotime($data['jam_selesai'])) ?></h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </li>
        <?php endif; ?>
        <li class="list-group-item text-light text-left">
            <button class="btn btn-info mt-2" data-toggle="modal" data-target="#jadwalModal">
                Tambah Jadwal
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
                                        <li><?= $data['hari'] ?></li>
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
                <form action="<?= base_url('ekskul/tambah_jadwal/') . $ekskul['id_ekskul'] ?>" method="post">
                    <div class="field item form-group mt-4">
                        <div class="col">
                            <select class="form-control has-feedback-left" name="hari" id="hari">
                                <option value="">Pilih Hari</option>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                                <option value="sabtu">Sabtu</option>
                            </select>
                            <label class="fa fa-calendar form-control-feedback left" for="hari" aria-hidden="true"></label>
                        </div>
                    </div>
                    <div class="field item form-group mt-4">
                        <div class="col">
                            <input type="time" class="form-control has-feedback-left" name="jam_dimulai" id="jam_dimulai" value="07:00" placeholder="Masukkan Jam Dimulai">
                            <label class="fa fa-calendar form-control-feedback left" for="jam_dimulai" aria-hidden="true"></label>
                        </div>
                    </div>
                    <div class="field item form-group mt-4">
                        <div class="col">
                            <input type="time" class="form-control has-feedback-left" name="jam_selesai" id="jam_selesai" value="17:00" placeholder="Masukkan Jam Selesai">
                            <label class="fa fa-calendar form-control-feedback left" for="jam_selesai" aria-hidden="true"></label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Atur Jadwal</button>
                </form>
            </div>
        </div>
    </div>
</div>