<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="container" style="max-width: 800px;">
            <div class="card">
                <div class="hero text-white hero-bg-image img-fluid" data-background="../assets/img/login-banner.jpg">
                    <div class="hero-inner">
                        <h2>#Share<span style="color:#48af48">CampStore</span></h2>
                        <p class="lead">You almost arrived, complete the information about your store to complete registration.</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('toko/save'); ?>" method="POST">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="id-user" name="id_user" value="<?= session()->get('id'); ?>" required>
                            <label for="nama-toko" class="form-label">Nama Toko</label>
                            <input type="text" class="form-control" id="nama-toko" name="nama_toko" autofocus value="<?= old('nama_toko'); ?>" required>
                            <?= ($validation->hasError('nama_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('nama_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="mb-3">
                            <label for="no-telp-toko" class="form-label">No Telp Toko</label>
                            <input type="number" class="form-control" id="no-telp-toko" name="no_telp_toko" autofocus value="<?= old('no_telp_toko'); ?>" required>
                            <span class="badge">*Ganti angka 0 diawal dengan 62 (tidak perlu +)</span>
                            <?= ($validation->hasError('no_telp_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('no_telp_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="mb-3">
                            <label for="alamat-toko" class="form-label">Alamat Toko</label>
                            <textarea name="alamat_toko" id="alamat-toko" class="form-control" style="height: 100px;" required><?= old('alamat_toko'); ?></textarea>
                            <?= ($validation->hasError('alamat_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('alamat_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="mb-3">
                            <label for="kota-toko" class="form-label">Kota</label>
                            <select name="kota_toko" class="form-control select2" id="" required>
                                <option value="">Pilih Kota</option>
                                <?php foreach ($kota as $key) { ?>
                                    <option value="<?= $key['nama_kota']; ?>"><?= $key['nama_kota']; ?></option>
                                <?php } ?>
                            </select>
                            <?= ($validation->hasError('kota_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('kota_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi-toko" class="form-label">Deskripsi Toko</label>
                            <textarea name="deskripsi_toko" id="deskripsi-toko" class="form-control" style="height: 100px;" required><?= old('deskripsi_toko'); ?></textarea>
                            <?= ($validation->hasError('deskripsi_toko')) ? '<span class="badge bg-danger text-white">' . $validation->getError('deskripsi_toko') . '</span>' : ''; ?>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms_and_conditions" value="" id="termAndCondition" aria-describedby="termAndConditionFeedback" onchange="document.getElementById('buttonSubmit').disabled = !this.checked;" required>
                                <label class="form-check-label" for="termAndCondition">
                                    Agree to terms and conditions
                                </label>
                                <?= ($validation->hasError('terms_and_conditions')) ? '<span class="badge bg-danger text-white">' . $validation->getError('terms_and_conditions') . '</span>' : ''; ?>
                                <div id="termAndConditionFeedback" class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary" id="buttonSubmit" type="submit" disabled>Submit form</button>
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