<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<body>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Toko</h1>
                <div class="section-header-breadcrumb">
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
                                                <th class="text-center">Nama Toko</th>
                                                <th class="text-center">Status Toko</th>
                                                <th class="text-center" style="width: 20%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($toko) {
                                                $no = 1;
                                                foreach ($toko as $key) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $key['nama_toko']; ?></td>
                                                        <td><?= $key['status_toko']; ?></td>
                                                        <td>
                                                            <!-- <a href="#" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Detail"><i class="fas fa-eye"></i></a> -->
                                                            <form method="post">
                                                                <input type="hidden" name="id_toko" value="<?= $key['id_toko']; ?>">
                                                                <?php if ($key['status_toko'] == "APPROVED") { ?>
                                                                    <button type="submit" formaction="<?= base_url('admin/toko/tolak'); ?>" name="tolak_button" class="btn btn-icon btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tolak"><i class="fas fa-window-close"></i></button>
                                                                <?php  } else { ?>
                                                                    <button type="submit" formaction="<?= base_url('admin/toko/acc'); ?>" name="acc_button" class="btn btn-icon btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Setujui"><i class="fas fa-check"></i></button>
                                                                <?php } ?>
                                                                <a href="<?= base_url('admin/toko/' . $key['id_toko']); ?>" class="btn btn-icon btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                                                <button type="button" onclick="hapusToko('<?= $key['id_toko']; ?>')" class="btn btn-icon btn-danger btn-sm" data-toggle="modal" data-target="#modalHapusToko"><i class="fas fa-trash"></i></button>
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
        <div class="modal fade" id="modalHapusToko" tabindex="-1" role="dialog" aria-labelledby="modalHapusTokoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalHapusTokoLabel">Apakah anda yakin?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak dapat dipulihkan!</div>
                    <div class="modal-footer">
                        <form method="post" action="<?= base_url('admin/delete/toko'); ?>">
                            <input type="hidden" name="id_toko" id="hapus-id-toko-admin" class="form-control">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Batal</button>
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>