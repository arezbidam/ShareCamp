<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<body>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Kategori Barang</h1>
                <div class="section-header-breadcrumb">
                    <a href="<?= base_url('admin/kategori/add'); ?>" class="btn btn-primary btn-icon float-right"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <?= session()->getFlashdata('pesan'); ?>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-md table-hover text-center" id="dataTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th class=" text-center">No.</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center" style="width: 20%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($kategori) {
                                                $no = 1;
                                                foreach ($kategori as $key) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $key['nama_kategori']; ?></td>
                                                        <td><?= $key['keterangan_kategori']; ?></td>
                                                        <td>
                                                            <!-- <a href="#" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Detail"><i class="fas fa-eye"></i></a> -->
                                                            <form action="<?= base_url('admin/kategori/edit'); ?>" method="post">
                                                                <input type="hidden" name="id_kategori" value="<?= $key['id_kategori']; ?>">
                                                                <button type="submit" name="edit_button" class="btn btn-icon btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button>
                                                                <button type="button" class="btn btn-icon btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                        <tfoot class="font-weight-bolder">
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Delete Confirmation-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak dapat dipulihkan!</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Batal</button>
                        <a id="btn-delete" class="btn btn-danger" href="#"><i class="fas fa-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>