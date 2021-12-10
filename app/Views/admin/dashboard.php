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
        </section>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
</body>

<?= $this->endSection(); ?>