<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="container mt-5 mb-5" style="max-width: 800px;">
        <div class="card">
            <div class="card-header text-white" style="font-weight: 500;">
                Toko Saya
            </div>
            <div class="card-body">
                <a href="<?= base_url('/toko'); ?>" class="btn btn-primary btn-sm btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a>
                <h5 class="card-title text-center">Form Edit Toko</h5>
                <p class="card-text text-center">Silahkan perbarui data toko melalui form dibawah ini.</p>
                <form action="<?= base_url('toko/update'); ?>" method="POST">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id-user" name="id_user" value="<?= $toko['id_user']; ?>">
                        <input type="hidden" class="form-control" id="id-toko" name="id_toko" value="<?= $toko['id_toko']; ?>">
                        <label for="nama-toko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control" id="nama-toko" name="nama_toko" autofocus value="<?= $toko['nama_toko']; ?>">
                        <?= ($validation->hasError('nama_toko')) ? '<span class="badge bg-danger">' . $validation->getError('nama_toko') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp-toko" class="form-label">No Telp Toko</label>
                        <input type="text" class="form-control" id="no-telp-toko" name="no_telp_toko" value="<?= $toko['no_telp_toko']; ?>">
                        <?= ($validation->hasError('no_telp_toko')) ? '<span class="badge bg-danger">' . $validation->getError('no_telp_toko') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="alamat-toko" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="kota-toko" name="kota_toko" value="<?= $toko['kota_toko']; ?>">
                        <?= ($validation->hasError('kota_toko')) ? '<span class="badge bg-danger">' . $validation->getError('kota_toko') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="alamat-toko" class="form-label">Alamat Toko</label>
                        <textarea name="alamat_toko" id="alamat-toko" class="form-control"><?= $toko['alamat_toko']; ?></textarea>
                        <?= ($validation->hasError('alamat_toko')) ? '<span class="badge bg-danger">' . $validation->getError('alamat_toko') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi-toko" class="form-label">Deskripsi Toko</label>
                        <textarea name="deskripsi_toko" id="deskripsi-toko" class="form-control"><?= $toko['deskripsi_toko']; ?></textarea>
                        <?= ($validation->hasError('deskripsi_toko')) ? '<span class="badge bg-danger">' . $validation->getError('deskripsi_toko') . '</span>' : ''; ?>
                    </div>
                    <div class="col-12 text-center">
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