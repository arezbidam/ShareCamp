<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<body>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Toko</h1>
                <div class="section-header-breadcrumb">
                    <a href="<?= base_url('admin/toko'); ?>" class="btn btn-primary btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Informasi Toko</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>Nama Toko</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['nama_toko']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['no_telp_toko']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Toko</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['alamat_toko']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kota</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['kota_toko']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['deskripsi_toko']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Toko</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['status_toko']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Informasi Pemilik Toko</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td>:</td>
                                            <td>+<?= $detail_toko['no_telp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Rek</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['no_rek']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Bank</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['nama_bank']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Atas Nama Bank</td>
                                            <td>:</td>
                                            <td><?= $detail_toko['atas_nama_bank']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
</body>

<?= $this->endSection(); ?>