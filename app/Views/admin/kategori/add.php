<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<body>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Kategori</h1>
                <div class="section-header-breadcrumb">
                    <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-primary btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Form Tambah Data Kategori</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('admin/kategori/save'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <div class="input-group">
                                                    <input type="text" name="nama_kategori" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan / Deskripsi</label>
                                                <div class="input-group">
                                                    <textarea name="keterangan_kategori" class="form-control" style="height: 100px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" style="text-align: center;">
                                            <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
                                        </div>
                                    </div>
                                </form>
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