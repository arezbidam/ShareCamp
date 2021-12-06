<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="container mt-5 mb-5" style="max-width: 800px;">
        <div class="card">
            <div class="card-body" style="font-weight: 500;">
                <h5 class="card-title text-center navbar-brand fw-bold"><i class="fas fa-campground"></i> Form Tambah<span style="color:#48af48"> Barang</span></h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('toko/barang/save'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id-toko" name="id_toko" value="<?= $id_toko; ?>">
                        <label for="nama-barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama-barang" name="nama_barang" autofocus value="<?= old('nama_barang'); ?>">
                        <?= ($validation->hasError('nama_barang')) ? '<span class="badge bg-danger">' . $validation->getError('nama_barang') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="foto-barang" class="form-label">Foto Barang</label>
                        <input type="file" name="foto_barang_path" class="dropify" style="font-size: 12pt;" data-max-file-size="2M" data-allowed-formats="square" data-allowed-file-extensions="jpg png jpeg" required />
                        <span class="badge bg-secondary">Max File Size : 2 Mb</span>
                        <span class="badge bg-secondary">File Allowed Format : square</span>
                        <span class="badge bg-secondary">File Allowed Extension : jpg | jpeg | png</span>
                        <?= ($validation->hasError('foto_barang_path')) ? '<span class="badge bg-danger">' . $validation->getError('foto_barang_path') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" value="<?= old('stok'); ?>">
                        <?= ($validation->hasError('stok')) ? '<span class="badge bg-danger">' . $validation->getError('stok') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>">
                        <?= ($validation->hasError('harga')) ? '<span class="badge bg-danger">' . $validation->getError('harga') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"><?= old('deskripsi'); ?></textarea>
                        <?= ($validation->hasError('deskripsi')) ? '<span class="badge bg-danger">' . $validation->getError('deskripsi') . '</span>' : ''; ?>
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