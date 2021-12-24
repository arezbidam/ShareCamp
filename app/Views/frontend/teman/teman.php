<?= $this->extend('layout/template_frontend'); ?>
<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">

    <section class="section">
        <div class="section-header" id="my-content-top">
            <h1 class="navbar-brand text-dark"><i class="fas fa-campground" style="font-size: 16pt;"></i> Share<span style="color:#48af48">Camp</span></h1>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-dark">#Share<span style="color:#48af48">Camp</span>With<span style="color:#48af48">Friends</span></h5>
                <p class="card-text">Kamu suka camping tapi ga punya temen yang satu hobi ? tenang, disini kamu bisa cari teman camping atau join rencana camping orang lain.</p>
                <?php if (session()->get('masuk')) { ?>
                    <a href="<?= base_url('cari-teman/add'); ?>" class="btn btn-primary">Buat Thread Baru</a>
                <?php } else { ?>
                    <button type="button" data-toggle="modal" data-target="#modalAndaHarusLogin" class="btn btn-primary">Buat Thread Baru</button>
                <?php } ?>
            </div>
        </div>
        <form action="" method="post">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Filter Berdasarkan</h4>
                    <button data-toggle="collapse" href="#collapseFilterProduk" role="button" aria-expanded="false" aria-controls="collapseFilterProduk" class="btn btn-outline-primary" type="button"><i class="fas fa-arrow-down"></i> Filter</button>
                </div>
                <div class="collapse" id="collapseFilterProduk">
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kota">Kota Tujuan</label>
                                            <select name="filter_kota" id="" class="form-control select2" required>
                                                <option value="">Pilih Kota</option>
                                                <?php foreach ($kota as $keyKota) { ?>
                                                    <option value="<?= $keyKota['nama_kota']; ?>"><?= $keyKota['nama_kota']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <center>
                                            <button class="btn btn-primary"><i class="fas fa-search"></i> Tampilkan</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        <div class="row">
            <?php if (isset($sharecamp)) { ?>
                <?php
                $i = 1 + (6 * ($currentPage - 1));
                foreach ($sharecamp as $key) { ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if (session()->get('masuk')) { ?>
                                            <a href="https://wa.me/<?= $key['no_telp']; ?>" target="_blank" class="btn btn-success btn-sm float-right mr-1 ml-1"><i class="fab fa-whatsapp"></i></a>
                                        <?php } else { ?>
                                            <button type="button" data-toggle="modal" data-target="#modalAndaHarusLogin" class="btn btn-success btn-sm float-right mr-1 ml-1" type="button"><i class="fab fa-whatsapp"></i></button>
                                        <?php } ?>
                                        <button type="button" data-toggle="collapse" data-target="#collapse<?= $key['no_sharecamp']; ?>" aria-expanded="false" aria-controls="collapse<?= $key['no_sharecamp']; ?>" class="float-right btn btn-info btn-sm mr-1 ml-1"><i class="fas fa-eye"></i></button>
                                        <?php if ($key['id_user'] == session()->get('id')) { ?>
                                            <button type="button" onclick="hapusModalShareCamp('<?= $key['no_sharecamp']; ?>')" data-toggle="modal" data-target="#modalHapusShareCamp" class="float-right btn btn-danger btn-sm mr-1 ml-1">Hapus</button>
                                        <?php } else { ?>
                                            <?php if (session()->get('masuk')) { ?>
                                                <button onclick="joinModalShareCamp('<?= $key['no_sharecamp']; ?>')" data-toggle="modal" data-target="#modalJoinShareCamp" class="float-right btn btn-primary btn-sm mr-1 ml-1">Join</button>
                                            <?php } else { ?>
                                                <button data-toggle="modal" data-target="#modalAndaHarusLogin" class="btn btn-primary btn-sm float-right mr-1 ml-1" type="button">Join</button>

                                        <?php }
                                        } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td>Tujuan</td>
                                                    <td>:</td>
                                                    <th><?= $key['tujuan']; ?></th>
                                                </tr>
                                                <tr>
                                                    <td>Kota</td>
                                                    <td>:</td>
                                                    <th><?= $key['kota']; ?></th>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <th><?= $key['nama']; ?></th>
                                                </tr>
                                                <tr>
                                                    <td>Tgl Mulai</td>
                                                    <td>:</td>
                                                    <th><?= date("d-m-Y", strtotime($key['dari_tgl'])); ?></th>
                                                </tr>
                                                <tr>
                                                    <td>Tgl Selesai</td>
                                                    <td>:</td>
                                                    <th><?= date("d-m-Y", strtotime($key['sampai_tgl'])); ?></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapse<?= $key['no_sharecamp']; ?>">
                                <div class="card-body">
                                    <p class="card-title">Deskripsi :</p>
                                    <p class="card-text"><?= $key['keterangan']; ?></p>
                                </div>
                                <div class="card-body">
                                    <p class="card-title">Yang Sudah Join :</p>
                                    <table width="100%" class="table table-striped table-sm mb-5 text-center">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Nama</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($join_sharecamp as $yang_sudah_join) { ?>
                                                <tr>
                                                    <td style="vertical-align: middle;width: 8%;"><?= $no++; ?></td>
                                                    <td style="vertical-align: middle;text-align: left;"><?= $yang_sudah_join['nama']; ?></td>
                                                    <td>
                                                        <?php if (session()->get('id') == $yang_sudah_join['id_user']) { ?>
                                                            <button onclick="modalKeluarShareCamp('<?= $yang_sudah_join['id_join_sharecamp']; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalKeluarShareCamp"><i class="fas fa-trash"></i></button>
                                                        <?php  } ?>
                                                        <?php if (session()->get('masuk')) { ?>
                                                            <a href="https://wa.me/<?= $yang_sudah_join['no_telp']; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
        <div class="card">
            <div class="card-footer text-muted">
                <div style="float: right">
                    <?= $pager->links('sharecamp', 'produk_pagination') ?>
                </div>
                <p class="text-dark font-weight-600 mb-0">Share<span style="color:#48af48">CampStore</span></p>
            </div>
        </div>
    </section>
</div>
<!-- Modal Join ShareCamp -->
<div class="modal fade" id="modalJoinShareCamp" tabindex="-1" role="dialog" aria-labelledby="modalJoinShareCampLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('cari-teman/join-sharecamp'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalJoinShareCampLabel">Join ShareCamp ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="no_sharecamp" id="join-sharecamp-no-sharecamp">
                    Apakah anda yakin ingin bergabung dengan camping ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya, Bergabung</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Hapus ShareCamp -->
<div class="modal fade" id="modalHapusShareCamp" tabindex="-1" role="dialog" aria-labelledby="modalHapusShareCampLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('cari-teman/hapus-sharecamp'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusShareCampLabel">Hapus ShareCamp ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="no_sharecamp" id="hapus-sharecamp-no-sharecamp">
                    Apakah anda yakin ingin hapus Thread ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Keluar ShareCamp -->
<div class="modal fade" id="modalKeluarShareCamp" tabindex="-1" role="dialog" aria-labelledby="modalKeluarShareCampLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('cari-teman/keluar-sharecamp'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKeluarShareCampLabel">Keluar dari ShareCamp ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id_join_sharecamp" id="keluar-sharecamp-id-join-sharecamp">
                    Apakah anda yakin ingin keluar dari Thread ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Keluar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal Anda Harus Login -->
<div class="modal fade" id="modalAndaHarusLogin" tabindex="-1" role="dialog" aria-labelledby="modalAndaHarusLoginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('shop/keranjang/add'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAndaHarusLoginLabel">Peringatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda harus login terlebih dahulu
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('login'); ?>" class="btn btn-primary">Login Here</a>
                </div>
            </div>
        </form>
    </div>
</div>


<?php if (session()->getFlashdata('pesan')) : ?>
    <?= session()->getFlashdata('pesan'); ?>
<?php endif; ?>

<?= $this->endSection(); ?>