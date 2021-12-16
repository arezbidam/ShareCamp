<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="container mt-5 mb-5" style="max-width: 1024px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5>Tabel Keranjang</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped text-center" id="simpleDataTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($keranjang)) { ?>
                                        <?php foreach ($keranjang as $key) { ?>
                                            <tr>
                                                <td class="align-middle"><img src="<?= base_url('assets/img_barang/' . $key['foto_barang_path']); ?>" alt="" width="50" height="50"></td>
                                                <td><?= $key['nama_barang']; ?></td>
                                                <td><?= $key['harga']; ?></td>
                                                <td class="align-middle">
                                                    <form method="post">
                                                        <input type="hidden" name="id_barang" value="<?= $key['id_barang']; ?>">
                                                        <button type="button" class="btn btn-primary btn-sm">Checkout</button>
                                                        <!-- <button type="submit" name="detail_barang" formaction="<?= base_url('toko/barang/detail'); ?>" class="btn btn-info btn-sm btn-icon"><i class="fas fa-eye"></i></button>
                                                        <button type="submit" name="edit_barang" formaction="<?= base_url('toko/barang/edit'); ?>" class="btn btn-warning btn-sm btn-icon"><i class="fas fa-edit"></i></button>
                                                        <button type="button" onclick="hapusBarang('<?= $key['id_barang']; ?>')" name="hapus_barang" formaction="#" class="btn btn-danger btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#modalHapusBarang"><i class="fas fa-trash"></i></button> -->
                                                    </form>
                                                </td>
                                            </tr>
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
</body>

<?= $this->endSection(); ?>