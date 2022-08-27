<div class="page-title">
    <div class="title_left">
        <h3>Daftar Guru</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="flex">
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
                                        <th>Nama Guru</th>
                                        <th>No Telepon</th>
                                        <th>Ekskul Dibimbing</th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody id="siswa_table">
                                    <?php foreach ($guru as $data) : ?>
                                        <tr>
                                            <td>
                                                <h6><?= ucwords($data['nama_guru']) ?></h6>
                                            </td>
                                            <td>
                                                <h6><?= $data['no_telp'] ?></h6>
                                            </td>
                                            <td>
                                                <?php if ($data['nama_ekskul'] == null) : ?>
                                                    <h6 class="text-secondary">Belum Ada Ekskul Dibimbing</h6>
                                                <?php else : ?>
                                                    <h6><?= $data['nama_ekskul'] ?> -
                                                        <a href="<?= base_url('ekskul/hapus_pembimbing/') . $data['id_ekskul'] ?>"><small class="text-danger">Berhentikan</small></a>
                                                    </h6>
                                                <?php endif; ?>
                                            </td>
                                            <!-- <td>
                                                <a class="btn btn-secondary" href="<?= base_url('guru/detail/') . $data['id_guru_pembimbing'] ?>">
                                                    Detail Guru
                                                </a>
                                            </td> -->
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