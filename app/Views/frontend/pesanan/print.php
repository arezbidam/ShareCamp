<?= $this->extend('layout/template_print'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Invoice</h2>
                                <div class="invoice-number">No. Pesanan : <?= $pesanan->no_pesanan; ?></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Billed To:</strong><br>
                                        <?= $pesanan->nama; ?><br>
                                        <?= $pesanan->alamat; ?><br>
                                        <?= $pesanan->kota; ?><br>
                                        (<?= $pesanan->no_telp; ?>)
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>From To:</strong><br>
                                        <?= $pesanan->nama_toko; ?><br>
                                        <?= $pesanan->alamat_toko; ?><br>
                                        <?= $pesanan->kota_toko; ?><br>
                                        (<?= $pesanan->no_telp_toko; ?>)
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-title">Order Summary</div>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        <?= date("d M Y", strtotime($pesanan->tgl_pesanan)); ?><br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Item</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Lama Sewa</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach ($pesanan_detail as $detail) { ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?= $no++; ?></td>
                                            <td style="vertical-align: middle;">
                                                <?= $detail['nama_produk']; ?><br>
                                                ( Tgl Sewa : <?= date("d-m-Y", strtotime($detail['tgl_mulai_sewa'])); ?> s/d <?= date("d-m-Y", strtotime($detail['tgl_berakhir_sewa'])); ?> )
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center"><?= number_format($detail['harga_sewa_per_hari'], 0, ",", "."); ?></td>
                                            <td style="vertical-align: middle;" class="text-center"><?= $detail['jumlah_sewa']; ?></td>
                                            <td style="vertical-align: middle;" class="text-center"><?= $detail['lama_sewa']; ?></td>
                                            <td style="vertical-align: middle;" class="text-right"><?= number_format($detail['total_biaya_sewa'], 0, ",", "."); ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="section-title">Payment Method</div>
                                    <p class="section-lead">Rekening Toko / Virtual Account.</p>
                                    <table class="section-lead" width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="width: 20%;">No. Rek</td>
                                                <td>:</td>
                                                <td><?= $toko->no_rek; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bank</td>
                                                <td>:</td>
                                                <td><?= $toko->nama_bank; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Atas Nama :</td>
                                                <td>:</td>
                                                <td><?= $toko->atas_nama_bank; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total Biaya Sewa</div>
                                        <div class="invoice-detail-value">Rp. <?= number_format($pesanan->total_biaya_pesanan, 0, ",", "."); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </section>
</div>
<script>
    window.addEventListener("load", window.print());
</script>
<?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
<?php endif; ?>

<?= $this->endSection(); ?>