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
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
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
                                                <img class="w-75" src="<?= base_url('assets/images/ekskul_images/') . $data['foto_ekskul'] ?>" alt="<?= $data['foto_ekskul'] ?>">
                                            </td>
                                            <td>
                                                <a class="btn btn-warning" href="<?= base_url('ekskul/edit') ?>">
                                                    Edit Ekskul
                                                </a>
                                                <button class="btn btn-secondary" onclick="deleteEkskulConfirm()">
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