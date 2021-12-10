<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<body>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kategori</h1>
                <div class="section-header-breadcrumb">
                    <a href="<?= base_url('admin/category'); ?>" class="btn btn-primary btn-icon"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Form Edit Data Kategori</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('admin/category/update'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <div class="input-group">
                                                    <input type="text" name="id_categories" value="<?= $category['id_categories']; ?>" class="form-control" required>
                                                    <input type="text" name="nama_categories" value="<?= $category['nama_categories']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan / Deskripsi</label>
                                                <div class="input-group">
                                                    <textarea name="keterangan_categories" class="form-control" style="height: 100px;"><?= $category['keterangan_categories']; ?></textarea>
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