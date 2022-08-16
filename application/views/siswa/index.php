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
                <select onchange="filterSiswa()" class="form-control col-md-3" name="ekskul" id="ekskul">
                    <option value="-">Filter Siswa</option>
                    <option value="terbaru">Terbaru</option>
                    <option value="belum_mengikuti">Belum Mengikuti Ekskul</option>
                </select>
                <ul class="nav navbar-right panel_toolbox">
                    <div class="top_search">
                        <div class="input-group">
                            <input onkeyup="searchSiswaByName()" id="search_siswa" type="text" class="form-control" placeholder="Cari Siswa...">
                        </div>
                    </div>
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