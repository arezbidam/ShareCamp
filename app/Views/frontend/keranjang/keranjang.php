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
                        <div class="hero text-white hero-bg-image img-fluid" data-background="../../assets/img/login-banner.jpg">
                            <div class="hero-inner">
                                <center>
                                    <h2>Keranjang <span style="color:#48af48">Saya</span> </h2>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Filter Berdasarkan</h4>
                    <button data-toggle="collapse" href="#collapseFilterProduk" role="button" aria-expanded="false" aria-controls="collapseFilterProduk" class="btn btn-outline-primary" type="button"><i class="fas fa-arrow-down"></i> Filter</button>
                </div>
                <div class="collapse" id="collapseFilterProduk">
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <select name="filter_kategori" id="" class="form-control" required>
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($kategori as $keyKategori) { ?>
                                                    <option value="<?= $keyKategori['id_kategori']; ?>"><?= $keyKategori['nama_kategori']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kota">Kota</label>
                                            <select name="filter_kota" id="" class="form-control select2" required>
                                                <option value="">Pilih Kota</option>
                                                <?php foreach ($kota as $keyKota) { ?>
                                                    <option value="<?= $keyKota['nama_kota']; ?>"><?= $keyKota['nama_kota']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kota">Harga</label>
                                            <select name="filter_harga" id="" class="form-control" required>
                                                <option value="ASC">Rendah ke Tinggi</option>
                                                <option value="DESC">Tinggi ke Rendah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <center>
                                            <button class="btn btn-primary"><i class="fas fa-search"></i> Tampilkan</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        <form action="" method="post">
            <div class="section-header justify-content-between">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari Nama Produk" aria-label="Cari Nama Produk" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary" type="button"><i class="fas fa-search"></i> Search</button>
                    </div>
                </div>
            </div>
        </form>
        <form action="<?= base_url('keranjang/checkout'); ?>" method="post">

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
                                    <input type="checkbox" name="checked_id_produk[]" value="<?= $key['id_keranjang']; ?>" style="float: right;width: 34px;height: 34px;">
                                    <h4 class="border-bottom border-primary"><?= $key['nama_produk']; ?>
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table-sm table mb-2 text-dark" width="100%">
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
                                                        <td>Deskripsi</td>
                                                        <td>:</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-sm mr-1 ml-1" data-toggle="collapse" data-target="#collapse<?= $key['id_keranjang']; ?>" aria-expanded="false" aria-controls="collapse<?= $key['id_keranjang']; ?>"><i class="fas fa-eye"></i></button>
                                                            <div class="collapse" id="collapse<?= $key['id_keranjang']; ?>">
                                                                <?= $key['deskripsi']; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-md-6">
                                            <table class="table-sm table mb-2 text-dark" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td>Toko</td>
                                                        <td>:</td>
                                                        <td><?= $key['nama_toko']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Sewa</td>
                                                        <td>:</td>
                                                        <td><?= $key['jumlah_sewa']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tgl Mulai Sewa</td>
                                                        <td>:</td>
                                                        <td><?= $key['tgl_mulai_sewa']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tgl Berakhir Sewa</td>
                                                        <td>:</td>
                                                        <td><?= $key['tgl_berakhir_sewa']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td>:</td>
                                                        <td><?= number_format($key['harga'] * $key['jumlah_sewa'], 0, ',', '.'); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
            <div class="card">
                <div class="card-footer">
                    <button class="btn btn-primary float-right">Checkout</button>
                </div>
            </div>
        </form>
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


<?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
<?php endif; ?>

<?= $this->endSection(); ?>