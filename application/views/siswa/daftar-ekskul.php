<div class="page-title">
    <div class="title_left">
        <h3>Pendaftaran Ekstrakurikuler Siswa</h3>
    </div>
</div>
<div class="clearfix"></div>

<?= $this->session->flashdata('message') ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pendaftaran Ekskul</h2>
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
                <form name="formPendaftaran" action="<?= base_url('siswa/daftar_ekskul') ?>" method="post" enctype="multipart/form-data" novalidate>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="nisn">NISN Siswa<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input onkeyup="searchSiswaByNISN()" type="text" class="form-control has-feedback-left" id="nisn" value="<?= set_value('nisn') ?>" name="nisn" placeholder="Masukkan nisn siswa">
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="nisn" aria-hidden="true"></label>
                        </div>
                        <?= form_error('nisn', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <input type="hidden" name="id_siswa" id="id_siswa">
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="nama_siswa">Nama Siswa<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="nama_siswa" value="<?= set_value('nama_siswa') ?>" name="nama_siswa" readonly>
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="nama_siswa" aria-hidden="true"></label>
                        </div>
                        <?= form_error('nama_siswa', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="kelas">kelas<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="kelas" value="<?= set_value('kelas') ?>" name="kelas" readonly>
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="kelas" aria-hidden="true"></label>
                        </div>
                        <?= form_error('kelas', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="alamat">Alamat<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="alamat" value="<?= set_value('alamat') ?>" name="alamat" readonly>
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="alamat" aria-hidden="true"></label>
                        </div>
                        <?= form_error('alamat', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="no_telp">No Telepon<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="no_telp" value="<?= set_value('no_telp') ?>" name="no_telp" readonly>
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="no_telp" aria-hidden="true"></label>
                        </div>
                        <?= form_error('no_telp', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group mt-4">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="ekskul">Ekstrakurikuler<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control has-feedback-left" name="ekskul" id="ekskul">
                                <option value="-">Pilih Ekskul</option>
                                <?php foreach ($ekskul as $data) : ?>
                                    <option value="<?= $data['id_ekskul'] ?>"><?= $data['nama_ekskul'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="ekskul" aria-hidden="true"></label>
                        </div>
                        <?= form_error('nama_siswa', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3 mt-4">
                            <button type="button" onclick="daftarEkskulConfirm()" class="btn btn-secondary">Daftarkan Siswa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>