<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="container">
            <div class="section-header justify-content-between">
                <h1 class="navbar-brand text-dark">List<span style="color:#48af48"> Produk</span></h1>
                <div class="section-header-breadcrumb">
                    <a href="<?= base_url('toko'); ?>" class="btn btn-primary mr-1 ml-1"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <a href="<?= base_url('toko/produk'); ?>" class="btn btn-primary mr-1 ml-1"><i class="fas fa-undo"></i> Reset Pencarian</a>
                    <a href="<?= base_url('toko/produk/create'); ?>" class="btn btn-primary mr-1 ml-1"><i class="fas fa-plus"></i> Tambah Produk</a>
                </div>
            </div>
            <form action="" method="post">
                <div class="section-header justify-content-between">
                    <div class="input-group mr-2 ml-2">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari Nama Produk" aria-label="Cari Nama Produk" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-primary" type="button"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <?php if (isset($produk)) { ?>
                    <?php
                    $i = 1 + (6 * ($currentPage - 1));
                    foreach ($produk as $key) { ?>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card card-large-icons card-primary">
                                <div class="card-icon text-white">
                                    <img src="<?= base_url('assets/img_produk/' . $key['img_path']); ?>" alt="" srcset="" style="min-width: 100px;min-height: 100px;max-width: 120px;max-height: 120px;">
                                </div>
                                <div class="card-body">
                                    <h4 class="border-bottom border-primary"><?= $key['nama_produk']; ?></h4>
                                    <table class="table-sm table-striped mb-2" width="100%">
                                        <tbody>
                                            <tr>
                                                <td>Stok</td>
                                                <td>:</td>
                                                <td><?= $key['stok']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td>:</td>
                                                <td><?= $key['nama_kategori']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Harga</td>
                                                <td>:</td>
                                                <td><?= number_format($key['harga'], 0, ',', '.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td><?= $key['status']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Aksi</td>
                                                <td>:</td>
                                                <td>
                                                    <a href="<?= base_url('toko/produk/edit/' . $key['id_produk']); ?>" class="card-cta btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    <button type="button" onclick="passIdProdukToModalAlertDeleteProduk('<?= $key['id_produk']; ?>')" class="card-cta btn btn-danger btn-sm" data-toggle="modal" data-target="#modalAlertDeleteProduk"><i class="fas fa-trash"></i> Hapus</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="card">
                <div class="card-footer text-muted">
                    <div style="float: right">
                        <?= $pager->links('produk', 'produk_pagination') ?>
                    </div>
                    <p class="text-dark font-weight-600 mb-0">Share<span style="color:#48af48">CampStore</span></p>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal Alert Delete Produk -->
<div class="modal fade" id="modalAlertDeleteProduk" tabindex="-1" role="dialog" aria-labelledby="modalAlertDeleteProdukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAlertDeleteProdukLabel">Peringatan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin hapus produk ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="<?= base_url('toko/produk/delete'); ?>" method="post">
                    <input type="hidden" name="id_produk" id="modal-delete-id-produk">
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