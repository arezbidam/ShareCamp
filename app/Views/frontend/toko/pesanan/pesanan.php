<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">

    <section class="section">
        <div class="section-header" id="my-content-top">
            <h1 class="navbar-brand text-dark"><i class="fas fa-campground" style="font-size: 16pt;"></i> Share<span style="color:#48af48">Camp</span></h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Daftar Pesanan Toko Saya</h4>
            </div>
            <div class="card-body">
                <table class="table-sm table-striped" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">Id Toko</td>
                            <td>:</td>
                            <td><?= $toko['id_toko']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Toko</td>
                            <td>:</td>
                            <td><?= $toko['nama_toko']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $toko['alamat_toko']; ?></td>
                        </tr>
                        <tr>
                            <td>Kota</td>
                            <td>:</td>
                            <td><?= $toko['kota_toko']; ?></td>
                        </tr>
                    </tbody>
                </table>
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
                                        <table class="table-sm" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No. Pesanan :</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $key['no_pesanan']; ?><br><?= $key['nama']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=" col-md-2">
                                        <table class="table-sm" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Pesanan :</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= date("d-m-Y", strtotime($key['tgl_pesanan'])); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table-sm" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Total :</th>
                                                    <th>Sudah Bayar :</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Rp. <?= number_format($key['total_biaya_pesanan'], 0, ',', '.'); ?></td>
                                                    <td>Rp. <?= number_format($key['sudah_bayar'], 0, ',', '.'); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <button type="button" data-toggle="collapse" data-target="#collapse<?= $key['no_pesanan']; ?>" aria-expanded="false" aria-controls="collapse<?= $key['no_pesanan']; ?>" class="btn btn-info mt-3"><i class="fas fa-eye"></i></button>
                                        <button type="button" onclick="bayarPesanan('<?= $key['no_pesanan']; ?>')" data-toggle="modal" data-target="#modalBayarPesanan" class="btn btn-primary mt-3"><i class="fas"></i>Rp</button>
                                        <a href="https://wa.me/<?= $key['no_telp']; ?>" target="_blank" class="btn btn-success mt-3"><i class="fab fa-whatsapp"></i></a>
                                        <button type="button" onclick="hapusPesanan('<?= $key['no_pesanan']; ?>')" data-toggle="modal" data-target="#modalHapusPesanan" class="btn btn-danger mt-3"><i class="fas fa-window-close"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapse<?= $key['no_pesanan']; ?>">
                                <div class="card-body">
                                    <h4 class="border-bottom border-primary">Detail Customer</h4>
                                    <table width=100% class="table-sm mb-1">
                                        <tbody>
                                            <tr>
                                                <th>Id Customer</th>
                                                <th>:</th>
                                                <th><?= $key['id_user']; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Nama Customer</th>
                                                <th>:</th>
                                                <th><?= $key['nama']; ?></th>
                                            </tr>
                                            <tr>
                                                <th>No. Telp</th>
                                                <th>:</th>
                                                <th><?= $key['no_telp']; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <th>:</th>
                                                <th><?= $key['alamat']; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Kota</th>
                                                <th>:</th>
                                                <th><?= $key['kota']; ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <h4 class="border-bottom border-primary">Detail Pesanan</h4>
                                    <?php
                                    $no = 1;
                                    foreach ($detail_pesanan as $detail) {
                                        if ($detail['no_pesanan'] == $key['no_pesanan']) {
                                    ?>
                                            <table width=100% class="table-sm mb-1">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"><?= $no++; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Produk</th>
                                                        <th><?= $detail['nama_produk']; ?></th>
                                                    </tr>
                                                </thead>
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
<!-- Modal Bayar Pesanan -->
<div class="modal fade" id="modalBayarPesanan" tabindex="-1" role="dialog" aria-labelledby="modalBayarPesananLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('toko/pesanan/update-pembayaran'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBayarPesananLabel">Update Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table-sm" width="100%">
                        <tbody>
                            <tr>
                                <td>No. Pesanan</td>
                                <td>:</td>
                                <td> <input type="text" class="form-control" name="no_pesanan" id="bayar-pesanan-no-pesanan" required readonly></td>
                            </tr>
                            <tr>
                                <td>Jumlah Bayar</td>
                                <td>:</td>
                                <td><input type="number" min="0" class="form-control" name="jumlah_bayar" required></td>
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
<!-- Modal Hapus Pesanan -->
<div class="modal fade" id="modalHapusPesanan" tabindex="-1" role="dialog" aria-labelledby="modalHapusPesananLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('toko/pesanan/delete'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusPesananLabel">Batalkan / Hapus Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus pesanan ini ?</p>
                    <table class="table-sm" width="100%">
                        <tbody>
                            <tr>
                                <td>No. Pesanan</td>
                                <td>:</td>
                                <td> <input type="text" class="form-control" name="no_pesanan" id="hapus-pesanan-no-pesanan" required readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
<?php endif; ?>

<?= $this->endSection(); ?>