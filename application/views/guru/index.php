<div class="page-title">
    <div class="title_left">
        <h3>Daftar Siswa</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="flex">
                <select onchange="filterSiswa()" class="form-control col-md-3 mr-2" name="filter_siswa" id="filter_siswa">
                    <option value="">Filter Siswa</option>
                    <option value="baru_daftar">Baru Saja Daftar</option>
                    <option value="belum_mengikuti">Belum Mengikuti Ekskul</option>
                </select>
                <select onchange="filterSiswa()" class="form-control col-md-3" name="filter_ekskul" id="filter_ekskul">
                    <option value="">Filter Ekstrakurikuler</option>
                    <?php foreach ($ekskul as $data) : ?>
                        <option value="<?= $data['id_ekskul'] ?>"><?= $data['nama_ekskul'] ?></option>
                    <?php endforeach; ?>
                </select>
                <ul class="nav navbar-right panel_toolbox">
                    <div class="top_search">
                        <div class="input-group">
                            <input onkeyup="filterSiswa()" id="search_siswa" type="text" class="form-control" placeholder="Cari Siswa...">
                        </div>
                    </div>
                </ul>
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
                                        <th>Nama Siswa</th>
                                        <th>NISN</th>
                                        <th>Kelas</th>
                                        <th>Ekskul Diikuti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="siswa_table">
                                    <?php foreach ($siswa as $data) : ?>
                                        <tr>
                                            <td>
                                                <h6><?= ucwords($data['nama_siswa']) ?></h6>
                                            </td>
                                            <td>
                                                <h6><?= $data['nisn'] ?></h6>
                                            </td>
                                            <td>
                                                <h6><?= strtoupper($data['kelas']) ?></h6>
                                            </td>
                                            <td>
                                                <h6>
                                                    <?php if ($data['ekskul'] == null) : ?>
                                                        Belum ada ekskul diikuti.
                                                    <?php else : ?>
                                                        <?php foreach ($data['ekskul'] as $ekskul) : ?>
                                                            <span class="badge badge-pill badge-secondary py-3 px-4 mb-1"><?= ucwords($ekskul['nama_ekskul']) ?></span>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </h6>
                                            </td>
                                            <td>
                                                <a class="btn btn-secondary" href="<?= base_url('guru/detail_siswa/') . $data['id_siswa'] ?>">
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