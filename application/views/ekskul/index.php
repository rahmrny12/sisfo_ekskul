<div class="page-title">
    <div class="title_left">
        <h3>Ekstrakurikuler</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Ekstrakurikuler</h2>
                <div class="col-md-4 col-sm-4 col-xs-10 float-right form-group pull-right top_search">
                    <div class="input-group">
                        <input onkeyup="searchEkskul('<?= base_url('ekskul/cari_ekskul') ?>')" type="text" id="search_ekskul" class="form-control" placeholder="Cari ekstrakurikuler...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary text-white" type="button">Cari!</button>
                        </span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-2">
                            <?= $this->session->flashdata('message') ?>
                            <?php $this->session->unset_userdata('message') ?>
                        </div>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Ekstrakurikuler</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Guru Pembimbing</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="ekskul_table">
                                    <?php foreach ($ekskul as $data) : ?>
                                        <tr>
                                            <td class="col-2">
                                                <h6><?= ucwords($data['nama_ekskul']) ?></h6>
                                            </td>
                                            <td>
                                                <h6 class="d-inline-block text-truncate" style="max-width: 350px;"><?= ucfirst($data['deskripsi']) ?></h6>
                                            </td>
                                            <!-- <td><h6 class="d-inline-block text-truncate" style="max-width: 400px;"><?= ucfirst($data['deskripsi']) ?></h6></td> -->
                                            <td>
                                                <img class="w-75" src="<?= base_url('assets/images/ekskul_images/') . $data['foto_ekskul'] ?>" alt="<?= $data['foto_ekskul'] ?>">
                                            </td>
                                            <td class="col-2">
                                                <?php if ($data['nama_guru'] != null) : ?>
                                                    <h6><?= ucwords($data['nama_guru']) ?></h6>
                                                <?php else : ?>
                                                    <h6 class="text-secondary">Belum Ada Guru Pembimbing</h6>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-warning" href="<?= base_url('ekskul/detail/') . $data['id_ekskul'] ?>">
                                                    Detail
                                                </a>
                                                <!-- <button class="btn btn-secondary" onclick="deleteEkskulConfirm(<?= base_url('ekskul/hapus/') . $data['id_ekskul'] ?>)">
                                                    Hapus Ekskul
                                                </button> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>