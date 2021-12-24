<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">

    <section class="section">
        <div class="section-header" id="my-content-top">
            <h1 class="navbar-brand text-dark"><i class="fas fa-campground" style="font-size: 16pt;"></i> Share<span style="color:#48af48">Camp</span></h1>
        </div>
        <div class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="hero text-white hero-bg-image img-fluid" data-background="../assets/img/login-banner.jpg">
                            <div class="hero-inner">
                                <center>
                                    <h2>#ShareCamp Bantu Kamu Temukan <span style="color:#48af48">Kebutuhan</span> dan <span style="color:#48af48">Teman</span> Camping Kamu</h2>
                                    <!-- <p class="lead">Cari produk keperluanmu menggunakan fitur filter, kamu juga dapat mencari teman satu destinasi untuk melakukan pemesanan bersama!</p> -->
                                    <div class="mt-4">
                                        <a href="<?= base_url('shop/produk'); ?>" class="btn btn-outline-white btn-lg mr-2 ml-2 mt-2 mb-2">Cari Produk</a>
                                        <a href="<?= base_url('cari-teman'); ?>" class="btn btn-outline-white btn-lg ml-2 mt-2 mb-2">Cari Teman</a>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Produk Terbaru</h2>
            <div class="row">
                <?php foreach ($produk_terbaru as $produk) { ?>
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image d-flex justify-content-center bg-white" data-background="../assets/img_produk/<?= $produk['img_path']; ?>">
                                    <!-- <img src="<?= base_url('assets/img_produk/' . $produk['img_path']); ?>" alt="" class="img-fluid" width="200px" height="200px"> -->
                                </div>
                                <div class="col-md-12 d-flex justify-content-center" style="position: absolute;bottom: 10px;">
                                    <button class="btn btn-primary mr-1 ml-1" data-toggle="collapse" data-target="#collapse<?= $produk['id_produk']; ?>" aria-expanded="false" aria-controls="collapse<?= $produk['id_produk']; ?>"><i class="fas fa-eye"></i></button>
                                    <?php if (session()->get('id')) { ?>
                                        <button type="button" onclick="tambahKeKeranjang('<?= $produk['id_produk']; ?>')" data-toggle="modal" data-target="#modalTambahKeKeranjang" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></button>
                                    <?php } else { ?>
                                        <button type="button" data-toggle="modal" data-target="#modalAndaHarusLogin" class="card-cta btn btn-primary"><i class="fas fa-shopping-cart"></i></button>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h2><a href="#"><?= $produk['nama_produk']; ?></a></h2>
                                </div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td><?= $produk['harga']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td><?= $produk['stok']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kota</td>
                                            <td>:</td>
                                            <td><?= $produk['kota_toko']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="collapse" id="collapse<?= $produk['id_produk']; ?>">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Deskripsi</td>
                                                <td>:</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <?= $produk['deskripsi']; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
<!-- Modal Tambah ke Keranjang -->
<div class="modal fade" id="modalTambahKeKeranjang" tabindex="-1" role="dialog" aria-labelledby="modalTambahKeKeranjangLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('shop/keranjang/add'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahKeKeranjangLabel">Tambah Ke Keranjang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id_produk" id="tambah-keranjang-id-produk">
                    <table class="table-sm" width="100%">
                        <tbody>
                            <tr>
                                <td>Jumlah Sewa</td>
                                <td>:</td>
                                <td><input type="number" min="1" class="form-control" value="1" name="jumlah_sewa" required></td>
                            </tr>
                            <tr>
                                <td>Mulai Sewa</td>
                                <td>:</td>
                                <td><input type="date" class="form-control" name="tgl_mulai_sewa" required></td>
                            </tr>
                            <tr>
                                <td>Akhir Sewa</td>
                                <td>:</td>
                                <td><input type="date" class="form-control" name="tgl_berakhir_sewa" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Anda Harus Login -->
<div class="modal fade" id="modalAndaHarusLogin" tabindex="-1" role="dialog" aria-labelledby="modalAndaHarusLoginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('shop/keranjang/add'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAndaHarusLoginLabel">Peringatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda harus login terlebih dahulu
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('login'); ?>" class="btn btn-primary">Login Here</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
<?php endif; ?>

<?= $this->endSection(); ?>