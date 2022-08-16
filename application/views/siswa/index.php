<div class="page-title">
    <div class="title_left">
        <h3>Siswa</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Siswa...">
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
                <h2>Daftar Siswa</h2>
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
                        <?= $this->session->flashdata('message') ?>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>NISN</th>
                                        <th>Kelas</th>
                                        <th>Ekskul Diikuti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($siswa as $data) : ?>
                                        <tr>
                                            <td><h6><?= ucwords($data['nama_siswa']) ?></h6></td>
                                            <td><h6><?= $data['nisn'] ?></h6></td>
                                            <td><h6><?= strtoupper($data['kelas']) ?></h6></td>
                                            <td>
                                                <h6>
                                                    <?php if ($data['ekskul'] == null) : ?>
                                                        Belum ada ekskul diikuti.
                                                    <?php else : ?>
                                                        <?php foreach ($data['ekskul'] as $ekskul) : ?>
                                                            <span class="badge badge-pill badge-secondary py-3 px-4"><?= ucwords($ekskul['nama_ekskul']) ?></span>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </h6>
                                            </td>
                                            <td>
                                                <a class="btn btn-secondary" href="<?= base_url('siswa/detail/') . $data['id_siswa'] ?>">
                                                    Detail Siswa
                                                </a>
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