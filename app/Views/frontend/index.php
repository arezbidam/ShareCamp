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
                                        <a href="#" class="btn btn-outline-white btn-lg ml-2 mt-2 mb-2">Cari Teman</a>
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
                                <!-- data-background="../assets/img_produk/<?= $produk['img_path']; ?>" -->
                                <div class="article-image d-flex justify-content-center bg-white">
                                    <img src="<?= base_url('assets/img_produk/' . $produk['img_path']); ?>" alt="" class="img-fluid" width="200px" height="200px">
                                </div>
                                <div class="col-md-12 d-flex justify-content-center" style="position: absolute;bottom: 10px;">
                                    <button class="btn btn-primary mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Tambah Ke Kranjang"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-primary mr-1 ml-1" data-toggle="tooltip" data-placement="top" title="Tambah Ke Kranjang"><i class="fas fa-shopping-cart"></i></button>
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
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
<?php endif; ?>

<?= $this->endSection(); ?>