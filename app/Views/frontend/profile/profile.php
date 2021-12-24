<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, <?= session()->get('nama'); ?>!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card profile-widget border-top border-primary">
                        <div class="profile-widget-header">
                            <div class="profile-widget-header">
                                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-value"><?= $data_user['nama']; ?></div>
                                        <div class="profile-widget-item-label"><?= $data_login['email']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="data-pribadi-tab" data-toggle="tab" href="#data-pribadi" role="tab" aria-controls="datapribadi" aria-selected="true">Data Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="data-rekening-tab" data-toggle="tab" href="#data-rekening" role="tab" aria-controls="datarekening" aria-selected="false">Data Rekening</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel" aria-labelledby="data-pribadi-tab">
                                    <form action="<?= base_url('profile/update-data-pribadi'); ?>" method="post">
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>User ID</label>
                                                <input type="text" class="form-control" name="id_user" value="<?= $data_user['id_user']; ?>" required readonly>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama" value="<?= $data_user['nama']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>No. KTP</label>
                                                <input type="text" class="form-control" name="no_ktp" value="<?= $data_user['no_ktp']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-7 col-12">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="<?= $data_login['email']; ?>" required readonly>
                                                <span class="badge">*anda tidak dapat mengubah email</span>
                                            </div>
                                            <div class="form-group col-md-5 col-12">
                                                <label>No. Telp</label>
                                                <input type="text" class="form-control" name="no_telp" value="<?= $data_user['no_telp']; ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="alamat" style="height: 150px;"><?= $data_user['alamat']; ?></textarea>
                                            </div>
                                            <div class="form-group col-12">
                                                <label>Kota</label>
                                                <input type="text" class="form-control" name="kota" value="<?= $data_user['kota']; ?>">
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="data-rekening" role="tabpanel" aria-labelledby="data-rekening-tab">
                                    <form action="<?= base_url('profile/update-data-rekening'); ?>" method="post">
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label>No. Rekening</label>
                                                <input type="hidden" class="form-control" name="id_user" value="<?= $data_user['id_user']; ?>" required readonly>
                                                <input type="text" class="form-control" name="no_rek" value="<?= $data_user['no_rek']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-12 col-12">
                                                <label>Nama Bank</label>
                                                <input type="text" class="form-control" name="nama_bank" value="<?= $data_user['nama_bank']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-12 col-12">
                                                <label>Atas Nama Bank</label>
                                                <input type="text" class="form-control" name="atas_nama_bank" value="<?= $data_user['atas_nama_bank']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor.
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card border-top border-primary">
                        <div class="card-header">
                            <h4>Keranjang</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Menampilkan semua produk dalam keranjang anda.</p>
                            <a href="<?= base_url('keranjang'); ?>" class="btn btn-primary">Lihat Keranjang</a>
                        </div>
                    </div>
                    <div class="card border-top border-primary">
                        <div class="card-header">
                            <h4>Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Menampilkan semua pesanan anda.</p>
                            <a href="<?= base_url('pesanan'); ?>" class="btn btn-primary">Lihat Pesanan</a>
                        </div>
                    </div>
                    <?php if (!$toko) { ?>
                        <div class="card border-top border-primary">
                            <div class="card-header">
                                <h4>Toko Saya</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Anda belum memiliki Toko.</p>
                                <a href="<?= base_url('toko'); ?>" class="btn btn-primary">Daftar disini</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card border-top border-primary">
                            <div class="card-header">
                                <h4>Toko Saya</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Menampilkan halaman Toko anda.</p>
                                <a href="<?= base_url('toko'); ?>" class="btn btn-primary">Lihat Toko</a>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card border-top border-primary">
                        <div class="card-header">
                            <h4>Keamanan</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Ubah password anda disini.</p>
                            <button type="button" data-toggle="modal" data-target="#modalUbahPassword" class="btn btn-primary">Ubah Password</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Modal Ubah Password -->
    <div class="modal fade" id="modalUbahPassword" tabindex="-1" role="dialog" aria-labelledby="modalUbahPasswordLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('profile/ubah-password'); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalUbahPasswordLabel">Form Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table-sm" width="100%">
                            <tbody>
                                <tr>
                                    <td>Password Baru</td>
                                    <td>:</td>
                                    <td><input type="password" class="form-control" name="password_baru" required></td>
                                </tr>
                                <tr>
                                    <td>Ulangi Password Baru</td>
                                    <td>:</td>
                                    <td><input type="password" class="form-control" name="ulangi_password_baru" required></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>