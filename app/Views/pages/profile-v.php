<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<h1><?= session()->get('email'); ?></h1>
<?= $this->endSection(); ?>