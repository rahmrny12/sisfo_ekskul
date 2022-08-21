<div class="page-title">
    <div class="title_left">
        <h3>Ekstrakurikuler</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari ekstrakurikuler...">
                <span class="input-group-btn">
                    <button class="btn btn-secondary text-white" type="button">Cari!</button>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Ekstrakurikuler</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-2">
                            <?= $this->session->flashdata('message') ?>
                        </div>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Ekstrakurikuler</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ekskul as $data) : ?>
                                        <tr>
                                            <td><?= $data['nama_ekskul'] ?></td>
                                            <td><?= $data['deskripsi'] ?></td>
                                            <td>
                                                <img class="w-50" src="<?= base_url('assets/images/ekskul_images/') . $data['foto_ekskul'] ?>" alt="<?= $data['foto_ekskul'] ?>">
                                            </td>
                                            <td>
                                                <a class="btn btn-warning" href="<?= base_url('ekskul/detail/') . $data['id_ekskul'] ?>">
                                                    Detail
                                                </a>
                                                <a class="btn btn-warning" href="<?= base_url('ekskul/edit/') . $data['id_ekskul'] ?>">
                                                    Edit Ekskul
                                                </a>
                                                <button class="btn btn-secondary" onclick="deleteEkskulConfirm(<?= $data['id_ekskul'] ?>)">
                                                    Hapus Ekskul
                                                </button>
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