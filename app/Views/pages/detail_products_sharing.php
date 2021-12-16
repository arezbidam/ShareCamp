<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<body>
    <div class="container mt-5 mb-5" style="max-width: 1024px;">
        <div class="card">
            <div class="card-body" style="font-weight: 500;">
                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('products'); ?>" class="btn btn-primary btn-sm btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <form method="post">
                        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
                        <!-- <button type="submit" name="edit_barang" formaction="<?= base_url('products/keranjang/add'); ?>" class="btn btn-primary btn-sm btn-icon"><i class="fas fa-shopping-cart"> Add Keranjang</i></button> -->
                    </form>
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
                                <div class="banner">
                                    <div class="alert alert-success" role="alert">
                                        <!-- <h5 class="alert-heading">Hi, ayo pesan bersama <strong>Nama orang 1</strong></h5> -->
                                        <h6>
                                            <p class="mb-0">Orang yang memesan produk ini adalah <a href="" class="alert-link">Nama orang 1</a>
                                        </h6>
                                        <div class="row">
                                            <div class="col-1 ms-2">
                                                <div class="user-1">
                                                    <!-- <a href=""><i class="bi bi-person-circle text-dark" style="font-size: 40px;"></i></a> -->
                                                </div>
                                            </div>
                                            <div class="col-1 ms-3">

                                                <div class="user-you">
                                                    <form method="post" action="<?= base_url('/pemesanan/share_Add_2') ?>">
                                                        <input type="hidden" name="id_barang" id="" type="hidden" value="<?= $barang['id_barang'] ?>">
                                                        <button type="submit" class="btn btn-outline-secondary">
                                                            <i class="bi bi-plus-circle-fill text-dark" style="font-size:30px"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="mb-0">pastikan anda sudah menghubungi Nama orang 1 untuk melanjutkan pesanan, silahkan hubungi melalui Whatsapp <a href="" class="alert-link">di sini,</a></p>
                                    </div>
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