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
                                <h6>
                                    <p class="mb-0">Jadilah yang pertama memesan barang ini!</p>
                                </h6>
                                <div class="user-you">
                                    <form method="post" action="<?= base_url('/pemesanan/share_Add') ?>">
                                        <input type="hidden" name="id_barang" id="" type="hidden" value="<?= $barang['id_barang'] ?>">
                                        <button type="submit" class="btn btn-outline-secondary">
                                            <i class="bi bi-plus-circle-fill text-dark" style="font-size:30px"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="alert alert-warning mt-4" role="alert">
                                    <p class="mb-0">pastikan anda sudah menghubungi Nama orang 1 untuk melanjutkan pesanan, silahkan hubungi melalui Whatsapp <a href="" class="alert-link">di sini,</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="col md-4">
                        <div class="table-responsive">
                            <h4 class="mb-3">Daftar orang yang memesan produk ini melalui share bill</h4>
                            <table class="table table-sm table-striped text-center" id="simpleDataTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>id pesanan</th>
                                        <th>Destinasi</th>
                                        <th>User 1</th>
                                        <th>User 2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($data_sharing)) { ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data_sharing as $key) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $key['id_share'] ?></td>
                                                <td>Belum diset</td>
                                                <?php if ($key['id_user_1'] == session()->get('id')) : ?>

                                                    <td>
                                                        <?php if ($key['id_user_1'] == session()->get('id')) : ?>
                                                            <?= '<strong> Anda </strong>' ?>
                                                        <?php else : ?>
                                                            <?= $key['id_user_1'] ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?= $key['id_user_2'] ?>
                                                    </td>
                                                    <?php if ($key['id_user_2'] == null) : ?>
                                                        <td>
                                                            <span class="badge bg-warning text-dark">Menunggu user 2</span>
                                                        </td>
                                                    <?php else : ?>
                                                        <td>
                                                            <button class="btn btn-sm btn-success">Detail</button>
                                                        </td>
                                                    <?php endif ?>

                                                <?php else : ?>
                                                    <td>
                                                        <?php if ($key['id_user_1'] == session()->get('id')) : ?>
                                                            <?= '<strong> Anda </strong>' ?>
                                                        <?php else : ?>
                                                            <?= $key['id_user_1'] ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($key['id_user_2'] == session()->get('id')) : ?>
                                                            <?= '<strong> Anda </strong>' ?>
                                                        <?php else : ?>
                                                            <?= $key['id_user_2'] ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td class="d-flex justify-content-evenly">
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="<?= base_url('/') ?>" class="btn btn-sm btn-success"><i class="bi bi-whatsapp"></i></a>
                                                            </div>
                                                            <div class="col">
                                                                <form method="post" action="<?= base_url('/pemesanan/share_Add_2') ?>">
                                                                    <input type="hidden" name="id_share" id="" type="hidden" value="<?= $key['id_share'] ?>">
                                                                    <input type="hidden" name="id_barang" id="" type="hidden" value="<?= $barang['id_barang'] ?>">
                                                                    <button type="submit" class="btn btn-sm btn-success">
                                                                        Join
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php endif ?>

                                            </tr>
                                            <?php $i++; ?>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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