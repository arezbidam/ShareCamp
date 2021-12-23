<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="container">
            <div class="section-header justify-content-between">
                <h1 class="navbar-brand text-dark">Edit<span style="color:#48af48"> Produk</span></h1>
                <div>
                    <a href="<?= base_url('toko/produk'); ?>" name="kelola_produk_toko_submit" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('toko/produk/update'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="foto-barang" class="form-label">Gambar Produk</label>
                                <input type="file" name="img_path" class="dropify" style="font-size: 12pt;" data-default-file="<?= base_url('assets/img_produk/' . $produk['img_path']); ?>" data-max-file-size="2M" data-allowed-formats="square" data-allowed-file-extensions="jpg png jpeg" />
                                <span class="badge text-dark">*Max File Size : 2 Mb</span>
                                <span class="badge text-dark">*File Allowed Format : square</span>
                                <span class="badge text-dark">*File Allowed Extension : jpg | jpeg | png</span>
                                <?= ($validation->hasError('img_path')) ? '<span class="badge bg-danger">' . $validation->getError('img_path') . '</span>' : ''; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="id-toko" name="id_toko" value="<?= $id_toko; ?>">
                                    <input type="hidden" class="form-control" id="id-produk" name="id_produk" value="<?= $produk['id_produk']; ?>">
                                    <label for="nama-barang" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama-barang" name="nama_produk" autofocus value="<?= $produk['nama_produk']; ?>" required>
                                    <?= ($validation->hasError('nama_produk')) ? '<span class="badge bg-danger">' . $validation->getError('nama_produk') . '</span>' : ''; ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label for="kategori-barang" class="form-label">Kategori</label>
                                        <select name="kategori_produk" id="" class="form-control simple-select2" required>
                                            <option></option>
                                            <?php foreach ($kategori as $key) { ?>
                                                <option value="<?= $key['id_kategori']; ?>" <?= $key['id_kategori'] == $produk['kategori_produk'] ? "selected" : ""; ?>><?= $key['nama_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= ($validation->hasError('kategori_produk')) ? '<span class="badge bg-danger">' . $validation->getError('kategori_produk') . '</span>' : ''; ?>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="number" class="form-control" min="0" id="stok" name="stok" value="<?= $produk['stok']; ?>" required>
                                        <?= ($validation->hasError('stok')) ? '<span class="badge bg-danger">' . $validation->getError('stok') . '</span>' : ''; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" min="0" id="harga" name="harga" value="<?= number_format($produk['harga'], 0, '', ''); ?>" required>
                                    <?= ($validation->hasError('harga')) ? '<span class="badge bg-danger">' . $validation->getError('harga') . '</span>' : ''; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="summernote" style="height: 100px;" class="form-control summernote" required><?= $produk['deskripsi']; ?></textarea>
                                    <?= ($validation->hasError('deskripsi')) ? '<span class="badge bg-danger">' . $validation->getError('deskripsi') . '</span>' : ''; ?>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer text-muted">
                    <p class="text-dark font-weight-600 mb-0">Share<span style="color:#48af48">CampStore</span></p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
<?php endif; ?>
<?= $this->endSection(); ?>