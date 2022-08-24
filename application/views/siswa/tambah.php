<div class="page-title">
    <div class="title_left">
        <h3>Tambah Siswa</h3>
    </div>
</div>
<div class="clearfix"></div>

<?= $this->session->flashdata('upload_error') ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Siswa Baru</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="<?= base_url('guru/tambah') ?>" method="post" novalidate>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="nama_siswa">Nama Siswa<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="nama_siswa" value="<?= set_value('nama_siswa') ?>" name="nama_siswa" placeholder="Masukkan nama siswa">
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="nama_siswa" aria-hidden="true"></label>
                        </div>
                        <?= form_error('nama_siswa', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="nisn">NISN<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="nisn" value="<?= set_value('nisn') ?>" name="nisn" placeholder="Masukkan NISN">
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="nisn" aria-hidden="true"></label>
                        </div>
                        <?= form_error('nisn', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="kelas">Kelas<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="kelas" value="<?= set_value('kelas') ?>" name="kelas" placeholder="Masukkan kelas">
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="kelas" aria-hidden="true"></label>
                        </div>
                        <?= form_error('kelas', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="alamat">Alamat<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="alamat" value="<?= set_value('alamat') ?>" name="alamat" placeholder="Masukkan alamat">
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="alamat" aria-hidden="true"></label>
                        </div>
                        <?= form_error('alamat', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="no_telp">No Telepon<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="no_telp" value="<?= set_value('no_telp') ?>" name="no_telp" placeholder="Masukkan nomor telepon">
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="no_telp" aria-hidden="true"></label>
                        </div>
                        <?= form_error('no_telp', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="ln_solid">
                        <div class="form-group">
                            <div class="col-md-6 offset-md-3 mt-4">
                                <button type="submit" class="btn btn-secondary">Tambah Siswa Baru</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>