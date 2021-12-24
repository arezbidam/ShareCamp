<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="container" style="max-width: 800px;">
            <div class="card">
                <div class="hero text-white hero-bg-image img-fluid" data-background="../assets/img/login-banner.jpg">
                    <div class="hero-inner">
                        <h2>#Share<span style="color:#48af48">Camp</span>With<span style="color:#48af48">Friend</span></h2>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('cari-teman/save'); ?>" method="POST">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="id-user" name="id_user" value="<?= session()->get('id'); ?>" required>
                            <label for="dari-tgl" class="form-label">Tanggal Mulai Camping</label>
                            <input type="date" class="form-control" id="dari-tgl" name="dari_tgl" autofocus value="<?= old('dari_tgl'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="sampai-tgl" class="form-label">Tanggal Selesai Camping</label>
                            <input type="date" class="form-control" id="sampai-tgl" name="sampai_tgl" autofocus value="<?= old('sampai_tgl'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="tujuan-camping" class="form-label">Tujuan Camping</label>
                            <input type="text" class="form-control" id="tujuan-camping" name="tujuan" autofocus value="<?= old('no_telp_toko'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <select name="kota" class="form-control select2" id="" required>
                                <option value="">Pilih Kota</option>
                                <?php foreach ($kota as $key) { ?>
                                    <option value="<?= $key['nama_kota']; ?>"><?= $key['nama_kota']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" style="height: 100px;" required><?= old('deskripsi_toko'); ?></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <p class="text-dark font-weight-600 mb-0">Share<span style="color:#48af48">Camp</span>With<span style="color:#48af48">Friend</span></p>
                </div>
            </div>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>

<?= $this->endSection(); ?>