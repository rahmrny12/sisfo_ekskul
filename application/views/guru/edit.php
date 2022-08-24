<div class="page-title">
    <div class="title_left">
        <h3>Edit Ekstrakurikuler</h3>
    </div>
</div>
<div class="clearfix"></div>

<?= $this->session->flashdata('upload_error') ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Ekstrakurikuler</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="<?= base_url('ekskul/edit/') . $ekskul['id_ekskul'] ?>" method="post" enctype="multipart/form-data" novalidate>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="nama_ekskul">Nama Ekstrakurikuler<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control has-feedback-left" id="nama_ekskul" value="<?= $ekskul['nama_ekskul'] ?>" name="nama_ekskul" placeholder="Masukkan nama ekskul">
                            <label class="fa fa-wheelchair-alt form-control-feedback left" for="nama_ekskul" aria-hidden="true"></label>
                        </div>
                        <?= form_error('nama_ekskul', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="deskripsi">Deskripsi<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <textarea class="col" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi ekskul"><?= $ekskul['deskripsi'] ?></textarea>
                        </div>
                        <?= form_error('deskripsi', '<div class="font-weight-bold text-danger">', '</div>') ?>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="foto_ekskul">Foto Ekstrakurikuler<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <img class="w-25" src="<?= base_url('assets/images/ekskul_images/') . $ekskul['foto_ekskul'] ?>" alt="$ekskul['foto_ekskul']">
                            <input class="form-control" type="file" id="foto_ekskul" name="foto_ekskul">
                        </div>
                        <!-- <?= form_error('foto_ekskul', '<div class="font-weight-bold text-danger">', '</div>') ?> -->
                    </div>
                    <div class="ln_solid">
                        <div class="form-group">
                            <div class="col-md-6 offset-md-3 mt-4">
                                <button type="submit" class="btn btn-secondary">Edit Ekskul</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>