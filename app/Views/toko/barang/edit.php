<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="container mt-5 mb-5" style="max-width: 800px;">
        <div class="card">
            <div class="card-body" style="font-weight: 500;">
                <div class="d-flex justify-content-between mb-3">
                    <a href="<?= base_url('toko'); ?>" class="btn btn-primary btn-sm btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <h5 class="card-title text-center navbar-brand fw-bold"><i class="fas fa-campground"></i> Edit<span style="color:#48af48"> Barang</span></h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('toko/barang/update'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id-barang" name="id_barang" value="<?= $barang['id_barang']; ?>">
                        <input type="hidden" class="form-control" id="id-toko" name="id_toko" value="<?= $barang['id_toko']; ?>">
                        <label for="nama-barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama-barang" name="nama_barang" autofocus value="<?= $barang['nama_barang']; ?>">
                        <?= ($validation->hasError('nama_barang')) ? '<span class="badge bg-danger">' . $validation->getError('nama_barang') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="kategori-barang" class="form-label">Kategori Barang</label>
                        <select name="kategori_barang" id="" class="form-control simple-select2" required>
                            <option></option>
                            <?php foreach ($categories as $kategori) { ?>
                                <option value="<?= $kategori['id_categories']; ?>" <?= $barang['kategori_barang'] == $kategori['id_categories'] ? "selected" : ""; ?>><?= $kategori['nama_categories']; ?></option>
                            <?php } ?>
                        </select>
                        <?= ($validation->hasError('kategori_barang')) ? '<span class="badge bg-danger">' . $validation->getError('kategori_barang') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="foto-barang" class="form-label">Foto Barang</label>
                        <input type="file" name="foto_barang_path" class="dropify" style="font-size: 12pt;" data-default-file="<?= base_url('assets/img_barang/' . $barang['foto_barang_path']); ?>" data-max-file-size="2M" data-allowed-formats="square" data-allowed-file-extensions="jpg png jpeg" />
                        <span class="badge bg-secondary">Max File Size : 2 Mb</span>
                        <span class="badge bg-secondary">File Allowed Format : square</span>
                        <span class="badge bg-secondary">File Allowed Extension : jpg | jpeg | png</span>
                        <?= ($validation->hasError('foto_barang_path')) ? '<span class="badge bg-danger">' . $validation->getError('foto_barang_path') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" value="<?= $barang['stok']; ?>">
                        <?= ($validation->hasError('stok')) ? '<span class="badge bg-danger">' . $validation->getError('stok') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>">
                        <?= ($validation->hasError('harga')) ? '<span class="badge bg-danger">' . $validation->getError('harga') . '</span>' : ''; ?>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"><?= $barang['deskripsi']; ?></textarea>
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