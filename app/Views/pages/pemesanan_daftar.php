<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5 mb-5" style="max-width: 1024px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar Pesanan saya</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped text-center" id="simpleDataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>id pesanan</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($data_pemesanan)) { ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_pemesanan as $key) { ?>
                                        <tr>
                                            <!-- <td class="align-middle"><img src="<?= base_url('assets/img_barang/' . $key['foto_barang_path']); ?>" alt="" width="50" height="50"></td> -->
                                            <td><?= $i ?></td>
                                            <td><?= $key['id_pemesanan']; ?></td>
                                            <!-- <td><?= $key['harga']; ?></td> -->
                                            <td class="align-middle">
                                                <a href="/Pemesanan/detail/<?= $key['id_pemesanan'] ?>" class=" btn btn-sm btn-success">detail</a>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>