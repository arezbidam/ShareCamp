<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <?php if (isset($toko)) {
            if ($toko['status_toko'] == "APPROVED") { ?>
                <div class="card">
                    <div class="hero text-white hero-bg-image img-fluid" data-background="../assets/img/login-banner.jpg">
                        <div class="hero-inner">
                            <h2>Welcome, <?= ucfirst(strtolower(session()->get('nama'))); ?>!</h2>
                            <p class="lead">This page is a place to manage your #Share<span style="color:#48af48">CampStore</span>.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header d-flex justify-content-between">
                                <h4><?= $toko['nama_toko']; ?></h4>
                                <form method="post">
                                    <input type="hidden" name="id_toko" value="<?= $toko['id_toko']; ?>">
                                    <button type="submit" formaction="<?= base_url('toko/edit'); ?>" name="edit_toko_submit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Toko</button>
                                    <button type="button" name="hapus_toko_submit" class="btn btn-danger" data-toggle="modal" data-target="#modalHapusToko"><i class="fas fa-trash"></i> Hapus Toko</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <p>Deskripsi Toko : <br> <?= $toko['deskripsi_toko']; ?></p>
                            </div>
                            <div class="card-body">
                                <p>Alamat Toko : <br> <?= $toko['alamat_toko']; ?></p>
                                <p>Kota : <br> <?= $toko['kota_toko']; ?></p>
                                <p>No. Telp. Toko : <br> <?= $toko['no_telp_toko']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Produk Anda</h4>
                            </div>
                            <div class="card-body">
                                <p>Lihat dan Kelola Produk Toko Anda Disini.</p>
                                <a href="<?= base_url('toko/produk'); ?>" class="btn btn-primary">Kelola Produk Anda</a>
                            </div>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Pesanan Toko Anda</h4>
                            </div>
                            <div class="card-body">
                                <p>Lihat dan Kelola Pesanan Toko Anda Disini.</p>
                                <form action="<?= base_url('toko/pesanan'); ?>" method="post">
                                    <input type="hidden" name="id_toko" value="<?= $toko['id_toko']; ?>">
                                    <button type="submit" name="kelola_pesanan_toko_submit" class="btn btn-primary">Kelola Pesanan Toko</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } elseif ($toko['status_toko'] == "DITOLAK") { ?>
                <div class="card">
                    <div class="hero text-white hero-bg-image img-fluid" data-background="../assets/img/login-banner.jpg">
                        <div class="hero-inner">
                            <center>
                                <h2>#Share<span style="color:#48af48">CampStore</span></h2>
                            </center>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Mohon maaf karena suatu hal Pendaftaran Toko Anda Kami tolak</h5>
                        <p class="card-text">Silahkan hubungi kami lewat email <span style="color:black" class="font-weight-600">sharecamp_cs@gmail.com</span> untuk informasi lebih lanjut.</p>

                        <a href="<?= base_url(); ?>" class="btn btn-primary"> Contact To Home</a>

                    </div>
                    <div class="card-footer text-muted">
                        <p class="text-dark font-weight-600 mb-0">Share<span style="color:#48af48">CampStore</span></p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card">
                    <div class="hero text-white hero-bg-image img-fluid" data-background="../assets/img/login-banner.jpg">
                        <div class="hero-inner">
                            <center>
                                <h2>#Share<span style="color:#48af48">CampStore</span></h2>
                            </center>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Anda berhasil melakukan pendaftaran Toko.</h5>
                        <p class="card-text">Silahkan tunggu 1x24 jam sebelum permintaan toko anda di konfirmasi.</p>

                        <a href="<?= base_url(); ?>" class="btn btn-primary"> Back To Home</a>

                    </div>
                    <div class="card-footer text-muted">
                        <p class="text-dark font-weight-600 mb-0">Share<span style="color:#48af48">CampStore</span></p>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="card">
                <div class="hero text-white hero-bg-image img-fluid" data-background="../assets/img/login-banner.jpg">
                    <div class="hero-inner">
                        <center>
                            <h2>#Share<span style="color:#48af48">CampStore</span></h2>
                        </center>
                    </div>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Anda belum memiliki toko.</h5>
                    <p class="card-text">Apakah anda tertarik untuk membuat toko ?</p>
                    <form action="<?= base_url('toko/create'); ?>" method="post">
                        <input type="hidden" name="id_user" value="<?= session()->get('id'); ?>">
                        <button type="submit" name="create_toko_submit" class="btn btn-primary">Buat Toko Baru</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <p class="text-dark font-weight-600 mb-0">Share<span style="color:#48af48">CampStore</span></p>
                </div>
            </div>
        <?php } ?>
        <div class="section-body">
        </div>
    </section>
</div>


<!-- Modal -->
<div class="modal fade" id="modalHapusBarang" tabindex="-1" aria-labelledby="modalHapusBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalHapusBarangLabel"><i class="fas fa-campground"></i> Share<span style="color:#48af48">Camp</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus barang ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <form action="<?= base_url("toko/barang/hapus"); ?>" method="post">
                    <input type="hidden" id="id-barang-hapus" name="id_barang">
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalHapusToko" tabindex="-1" aria-labelledby="modalHapusTokoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalHapusTokoLabel"><i class="fas fa-campground"></i> Share<span style="color:#48af48">Camp</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Note : <br>
                Hal ini akan menghapus seluruh data produk dan pesanan anda.
                Apakah anda yakin ingin menghapus toko anda ? <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="<?= base_url("toko/delete"); ?>" method="post">
                    <input type="hidden" name="id_toko" value="<?= $toko['id_toko']; ?>">
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
<?php endif; ?>

<?= $this->endSection(); ?>