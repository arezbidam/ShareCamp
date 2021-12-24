<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1 style="padding-left: 20px;">Dashboard Admin</h1>
                <div class="section-header-breadcrumb">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Toko</h4>
                            </div>
                            <div class="card-body">
                                <?= $total_toko; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-copy"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Produk</h4>
                            </div>
                            <div class="card-body">
                                <?= $total_produk; ?>
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