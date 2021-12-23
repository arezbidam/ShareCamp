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
                                    <h2>Pesanan <span style="color:#48af48">Saya</span> </h2>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <div class="section-header justify-content-between">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari No. Pesanan" aria-label="Cari No. Pesanan" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary" type="button"><i class="fas fa-search"></i> Search</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <?php if (isset($pesanan)) { ?>
                <?php
                $i = 1 + (6 * ($currentPage - 1));
                foreach ($pesanan as $key) { ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>No. Pesanan :</label>
                                        <h4><?= $key['no_pesanan']; ?></h4>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal :</label>
                                        <h4><?= date("d-m-Y", strtotime($key['tgl_pesanan'])); ?></h4>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Total :</label>
                                        <h4>Rp. <?= number_format($key['total_biaya_pesanan'], 0, ',', '.'); ?></h4>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <button type="button" data-toggle="collapse" data-target="#collapse<?= $key['no_pesanan']; ?>" aria-expanded="false" aria-controls="collapse<?= $key['no_pesanan']; ?>" class="btn btn-info mt-3"><i class="fas fa-eye"></i></button>
                                        <a href="<?= base_url('pesanan/print/' . $key['no_pesanan']); ?>" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapse<?= $key['no_pesanan']; ?>">
                                <div class="card-body">
                                    <h4 class="border-bottom border-primary"><?= $key['nama_toko']; ?></h4>
                                    <?php
                                    $no = 1;
                                    foreach ($detail_pesanan as $detail) {
                                        if ($detail['no_pesanan'] == $key['no_pesanan']) {
                                    ?>
                                            <table width=100% class="table-sm">
                                                <th>
                                                    <tr>
                                                        <th colspan="2"><?= $no++; ?>. <?= $detail['nama_produk']; ?></th>
                                                    </tr>
                                                </th>
                                                <tbody>
                                                    <tr>
                                                        <td>Tanggal Sewa</td>
                                                        <td><?= date("d M Y", strtotime($detail['tgl_mulai_sewa'])); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Kembali</td>
                                                        <td><?= date("d M Y", strtotime($detail['tgl_berakhir_sewa'])); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lama Sewa</td>
                                                        <td><?= $detail['lama_sewa']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Sewa</td>
                                                        <td><?= $detail['jumlah_sewa']; ?></td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td>Harga Sewa Per Hari</td>
                                                        <td><?= number_format($detail['harga_sewa_per_hari'], 0, ',', '.'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Sewa Per Hari</td>
                                                        <td class="text-right">Rp. <?= number_format($detail['total_biaya_sewa'], 0, ',', '.'); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                    <?php }
                                    } ?>
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