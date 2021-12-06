<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="container mt-5" style="max-width: 800px;">
        <div class="card">
            <div class="card-header text-white" style="font-weight: 500;">
                Toko Saya
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Yeay, satu langkah lagi sebelum toko anda jadi.</h5>
                <p class="card-text text-center">Silahkan isi form dibawah ini.</p>
                <form action="<?= base_url('toko/save'); ?>" method="POST">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id-user" name="id_user" value="<?= session()->get('id'); ?>">
                        <label for="nama-toko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control" id="nama-toko" name="nama_toko" autofocus value="<?= old('nama_toko'); ?>">
                        <?= ($validation->hasError('nama_toko')) ? '<span class="badge bg-danger">' . $validation->getError('nama_toko') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp-toko" class="form-label">No Telp Toko</label>
                        <input type="text" class="form-control" id="no-telp-toko" name="no_telp_toko" autofocus value="<?= old('no_telp_toko'); ?>">
                        <?= ($validation->hasError('no_telp_toko')) ? '<span class="badge bg-danger">' . $validation->getError('no_telp_toko') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="alamat-toko" class="form-label">Alamat Toko</label>
                        <textarea name="alamat_toko" id="alamat-toko" class="form-control"><?= old('alamat_toko'); ?></textarea>
                        <?= ($validation->hasError('alamat_toko')) ? '<span class="badge bg-danger">' . $validation->getError('alamat_toko') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi-toko" class="form-label">Deskripsi Toko</label>
                        <textarea name="deskripsi_toko" id="deskripsi-toko" class="form-control"><?= old('deskripsi_toko'); ?></textarea>
                        <?= ($validation->hasError('deskripsi_toko')) ? '<span class="badge bg-danger">' . $validation->getError('deskripsi_toko') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terms_and_conditions" value="" id="termAndCondition" aria-describedby="termAndConditionFeedback" required>
                            <label class="form-check-label" for="termAndCondition">
                                Agree to terms and conditions
                            </label>
                            <?= ($validation->hasError('terms_and_conditions')) ? '<span class="badge bg-danger">' . $validation->getError('terms_and_conditions') . '</span>' : ''; ?>
                            <div id="termAndConditionFeedback" class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                ShareCamp
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>