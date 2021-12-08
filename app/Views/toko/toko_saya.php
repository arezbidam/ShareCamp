<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="container mt-5">
        <?php if (isset($toko)) { ?>
            <div class="row">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="col-sm-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group mb-3">
                                <li class="list-group-item text-dark fw-bold bg-light"><i class="fas fa-home"></i> Toko <span style="color:#48af48">Saya</span></li>
                            </ul>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" id="profile-toko-tab" data-bs-toggle="tab" data-bs-target="#profile-toko" type="button" role="tab" aria-controls="profile-toko" aria-selected="true">Profile</button>
                                <button class="nav-link" id="v-pills-profile-tab" id="produk-saya-tab" data-bs-toggle="tab" data-bs-target="#produk-saya" type="button" role="tab" aria-controls="produk-saya" aria-selected="false">List Barang</button>
                                <button class="nav-link" id="v-pills-messages-tab" id="pesanan-tab" data-bs-toggle="tab" data-bs-target="#pesanan" type="button" role="tab" aria-controls="pesanan" aria-selected="false">List Pesanan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 mb-4">
                    <div class="tab-content mb-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile-toko" role="tabpanel" aria-labelledby="profile-toko-tab">
                            <div class="card">
                                <div class="card-header text-white" style="font-weight: 500;">
                                    Toko Saya
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">
                                            <?= $toko['nama_toko']; ?>
                                        </h5>
                                        <form action="<?= base_url('toko/edit'); ?>" method="post">
                                            <input type="hidden" name="id_user" value="<?= session()->get('id'); ?>">
                                            <button type="submit" name="edit_toko_submit" class="btn btn-sm btn-primary">Edit Toko</button>
                                        </form>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Deskripsi Toko :</h5>
                                                <p class="card-text"><?= $toko['deskripsi_toko']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card-body">
                                                <h5 class="card-title">No. Telp :</h5>
                                                <p class="card-text"><?= $toko['no_telp_toko']; ?></p>
                                                <h5 class="card-title">Alamat :</h5>
                                                <p class="card-text"><?= $toko['alamat_toko']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    ShareCamp
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="produk-saya" role="tabpanel" aria-labelledby="produk-saya-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h5>Tabel Barang</h5>
                                                <a href="<?= base_url('toko/barang/create'); ?>" class="btn btn-primary btn-icon btn-sm"><i class="fas fa-plus"></i> Tambah Barang Baru</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped text-center" id="simpleDataTable" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Foto Barang</th>
                                                            <th>Nama Barang</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (isset($barang)) { ?>
                                                            <?php foreach ($barang as $brg) { ?>
                                                                <tr>
                                                                    <td class="align-middle"><img src="<?= base_url('assets/img_barang/' . $brg['foto_barang_path']); ?>" alt="" width="50" height="50"></td>
                                                                    <td><?= $brg['nama_barang']; ?></td>
                                                                    <td class="align-middle">
                                                                        <form method="post">
                                                                            <input type="hidden" name="id_barang" value="<?= $brg['id_barang']; ?>">
                                                                            <button type="submit" name="detail_barang" formaction="<?= base_url('toko/barang/detail'); ?>" class="btn btn-info btn-sm btn-icon"><i class="fas fa-eye"></i></button>
                                                                            <button type="submit" name="edit_barang" formaction="<?= base_url('toko/barang/edit'); ?>" class="btn btn-warning btn-sm btn-icon"><i class="fas fa-edit"></i></button>
                                                                            <button type="button" onclick="hapusBarang('<?= $brg['id_barang']; ?>')" name="hapus_barang" formaction="#" class="btn btn-danger btn-sm btn-icon" data-bs-toggle="modal" data-bs-target="#modalHapusBarang"><i class="fas fa-trash"></i></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        } else { ?>
                                                            <tr>
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
                        <div class="tab-pane fade" id="pesanan" role="tabpanel" aria-labelledby="pesanan-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mx-auto mb-4" style="width: 18rem;">
                                        <img src="<?= base_url('assets/img/img1.jpg'); ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Sale title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php } else { ?>
            <div class="container mt-5" style="max-width: 800px;">
                <div class="card">
                    <div class="card-header text-white" style="font-weight: 500;">
                        Toko Saya
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Anda belum memiliki toko.</h5>
                        <p class="card-text">Apakah anda tertarik untuk membuat toko ?</p>
                        <form action="<?= base_url('toko/create'); ?>" method="post">
                            <input type="hidden" name="id_user" value="<?= session()->get('id'); ?>">
                            <button type="submit" name="create_toko_submit" class="btn btn-primary">Buat Toko Baru</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        ShareCamp
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalHapusBarang" tabindex="-1" aria-labelledby="modalHapusBarangLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalHapusBarangLabel"><i class="fas fa-campground"></i> Share<span style="color:#48af48">Camp</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus barang ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form action="<?= base_url("toko/barang/hapus"); ?>" method="post">
                        <input type="hidden" id="id-barang-hapus" name="id_barang">
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>