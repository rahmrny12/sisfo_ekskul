<div class="page-title">
    <div class="title_left">
        <h3>Edit Guru</h3>
    </div>
</div>
<div class="clearfix"></div>

<?= $this->session->flashdata('upload_error') ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_content">
                <form action="<?= base_url('guru/edit/') . $guru['id_guru_pembimbing'] ?>" method="post" novalidate>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="nama_guru">Nama Guru<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="nama_guru" value="<?= $guru['nama_guru'] ?>" name="nama_guru" placeholder="Masukkan nama ekskul">
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="nama_guru" aria-hidden="true"></label>
                        </div>
                        <?= form_error('nama_guru', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="no_telp">Nomor Telepon<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="no_telp" value="<?= $guru['no_telp'] ?>" name="no_telp" placeholder="Masukkan nama ekskul">
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="no_telp" aria-hidden="true"></label>
                        </div>
                        <?= form_error('no_telp', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="ln_solid">
                        <div class="form-group">
                            <div class="col-md-6 offset-md-3 mt-4">
                                <button type="submit" class="btn btn-secondary">Edit Guru</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>