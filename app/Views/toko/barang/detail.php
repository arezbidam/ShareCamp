<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="container mt-5 mb-5" style="max-width: 1024px;">
        <div class="card">
            <div class="card-body" style="font-weight: 500;">
                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('toko'); ?>" class="btn btn-primary btn-sm btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <a href="#" class="btn btn-warning btn-sm btn-icon"><i class="fas fa-edit"></i> Edit Barang</a>
                </div>
                <h5 class="card-title text-center navbar-brand fw-bold"><i class="fas fa-campground"></i> Detail<span style="color:#48af48"> Barang</span></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-body">
                            <img src="<?= base_url('assets/img_barang/' . $barang['foto_barang_path']); ?>" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mx-auto mb-4" style="max-width: 600px;">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><?= $barang['nama_barang']; ?></h5>

                                <p class="card-text">Harga : <?= $barang['harga']; ?></p>

                                <p class="card-text">Stok : <?= $barang['stok']; ?></p>
                                <div class="card-text mb-4">
                                    <p class="card-text">Deskripsi :</p>
                                    <?= $barang['deskripsi']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                ShareCamp
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>