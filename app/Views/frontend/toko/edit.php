<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="container" style="max-width: 800px;">
            <div class="section-header justify-content-between">
                <h1 class="navbar-brand text-dark">Edit<span style="color:#48af48"> Toko</span></h1>
                <a href="<?= base_url('toko'); ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('toko/update'); ?>" method="POST">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="id-user" name="id_user" value="<?= old('id_user') ? old('id_user') : $toko['id_user']; ?>" required>
                            <input type="hidden" class="form-control" id="id-toko" name="id_toko" value="<?= old('id_toko') ? old('id_toko') : $toko['id_toko']; ?>" required>
                            <label for="nama-toko" class="form-label">Nama Toko</label>
                            <input type="text" class="form-control" id="nama-toko" name="nama_toko" autofocus value="<?= old('nama_toko') ? old('nama_toko') : $toko['nama_toko']; ?>" required>
                            <?= ($validation->hasError('nama_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('nama_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="mb-3">
                            <label for="no-telp-toko" class="form-label">No Telp Toko</label>
                            <input type="text" class="form-control" id="no-telp-toko" name="no_telp_toko" autofocus value="<?= old('no_telp_toko') ? old('nama_toko') : $toko['no_telp_toko']; ?>" required>
                            <?= ($validation->hasError('no_telp_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('no_telp_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="mb-3">
                            <label for="alamat-toko" class="form-label">Alamat Toko</label>
                            <textarea name="alamat_toko" id="alamat-toko" class="form-control" style="height: 100px;" required><?= old('alamat_toko') ? old('alamat_toko') : $toko['alamat_toko']; ?></textarea>
                            <?= ($validation->hasError('alamat_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('alamat_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="mb-3">
                            <label for="kota-toko" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="kota-toko" name="kota_toko" autofocus value="<?= old('kota_toko') ? old('kota_toko') : $toko['kota_toko']; ?>" required>
                            <?= ($validation->hasError('kota_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('kota_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi-toko" class="form-label">Deskripsi Toko</label>
                            <textarea name="deskripsi_toko" id="deskripsi-toko" class="form-control" style="height: 100px;" required><?= old('deskripsi_toko') ? old('deskripsi_toko') : $toko['deskripsi_toko']; ?></textarea>
                            <?= ($validation->hasError('deskripsi_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('deskripsi_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary" id="buttonSubmit" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <p class="text-dark font-weight-600 mb-0">Share<span style="color:#48af48">CampStore</span></p>
                </div>
            </div>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>

<?= $this->endSection(); ?>