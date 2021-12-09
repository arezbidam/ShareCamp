<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid" id="profile-banner">
  <div class="row bg-danger">
    <div class="col">

    </div>
  </div>
</div>
<div class="container mt-4" id="profile-content">
  <div class="row">
    <div class="col-lg-3">
      <div class="card profile-menu rounded-3" id="profile-menu">
        <div class="profile-menu__header">
          <img class="mt-4" src="assets/img/avatar.png" alt="">
          <p class="mt-2 fw-bold fs-5"><?= session()->get('nama') ?></p>
        </div>
        <div class="profile-menu__tabs p-2">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-akun-tab" data-bs-toggle="pill" data-bs-target="#v-pills-akun" type="button" role="tab" aria-controls="v-pills-akun" aria-selected="true">akun</button>
            <button class="nav-link" id="v-pills-keamanan-tab" data-bs-toggle="pill" data-bs-target="#v-pills-keamanan" type="button" role="tab" aria-controls="v-pills-keamanan" aria-selected="false">keamanan</button>
            <button class="nav-link" id="v-pills-keuangan-tab" data-bs-toggle="pill" data-bs-target="#v-pills-keuangan" type="button" role="tab" aria-controls="v-pills-keuangan" aria-selected="false">keuangan</button>
            <button class="nav-link" id="v-pills-toko-saya-tab" data-bs-toggle="pill" data-bs-target="#v-pills-toko-saya" type="button" role="tab" aria-controls="v-pills-toko-saya" aria-selected="false">toko-saya</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 p-5 card" id="profile-setting_content">
      <form action="/profile/update/<?= session()->get('id'); ?>" method="post" class="col-8">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-akun" role="tabpanel" aria-labelledby="v-pills-akun-tab">
            <div id="akun" class="akun">
              <p class="fw-bold fs-5">Akun</p>
              <?php if (session()->getFlashdata('err_pass_confrm')) : ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('err_pass_confrm'); ?>
                </div>
              <?php endif ?>
              <?php if (session()->getFlashdata('profile_updated')) : ?>
                <div class="alert alert-success">
                  <?= session()->getFlashdata('profile_updated'); ?>
                </div>
              <?php endif ?>
              <?php if (session()->getFlashdata('err_profile_updated')) : ?>
                <div class="alert alert-success">
                  <?= session()->getFlashdata('err_profile_updated'); ?>
                </div>
              <?php endif ?>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" readonly value="<?= session()->get('email'); ?>">
                <div id="emailHelp" class="form-text mt-2 fst-italic">*Anda tidak bisa mengubah Email.</div>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="<?= $data_user['nama'] ? $data_user['nama'] : 'null' ?>" onfocus="this.value=''" value="<?= $data_user['nama'] ?>" name="nama">
              </div>
              <div class="mb-3">
                <label for="no_tlp" class="form-label">No Handphone</label>
                <input type="text" class="form-control" id="no_tlp" aria-describedby="emailHelp" placeholder="<?= $data_user['no_tlp'] ? $data_user['no_tlp'] : 'anda belum mengisi' ?>" onfocus="this.value=''" value="<?= $data_user['no_tlp'] ?>" name="no_tlp" name="no_tlp">
              </div>
              <div class=" mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="kota" aria-describedby="emailHelp" placeholder="<?= $data_user['kota'] ? $data_user['kota'] : 'anda belum mengisi' ?>" onfocus="this.value=''" value="<?= $data_user['kota'] ?>" name="kota" name="kota">
              </div>
              <div class=" mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" aria-describedby="emailHelp" placeholder="<?= $data_user['alamat'] ? $data_user['alamat'] : 'anda belum mengisi' ?>" onfocus="this.value=''" value="<?= $data_user['alamat'] ?>" name="alamat" name="alamat ">
              </div>

              <!-- <button type="submit" class="btn btn-success mt-2">Perbarui</button> -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Simpan
              </button>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-keamanan" role="tabpanel" aria-labelledby="v-pills-keamanan-tab">
            <div id="keamanan" class="keamanan">
              <p class=" fw-bold fs-5">Keamanan</p>
              <div class="form col-8">
                <div class="mb-3">
                  <label for="password" class="form-label">Password lama</label>
                  <input type="password" class="form-control" id="password" aria-describedby="emailHelp" value="<?= session()->get('password') ?>" readonly>
                  <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password Baru</label>
                  <input type="password" class="form-control" id="password" aria-describedby="emailHelp">
                  <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                  <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="password-confirm" aria-describedby="emailHelp">
                  <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <button type="submit" class="btn btn-danger mt-2">Update Password</button>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-toko-saya" role="tabpanel" aria-labelledby="v-pills-toko-saya-tab">
            <div id="tokosaya" class="tokosaya">
              <p class="fw-bold fs-5">Toko Saya</p>
              <button class="btn btn-success"><a href="" style="text-decoration: none; color: white;">ke halaman toko saya</a></button>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-keuangan" role="tabpanel" aria-labelledby="v-pills-keuangan-tab">
            <div id="akun" class="akun">
              <p class="fw-bold fs-5">keuangan</p>
              <div class="mb-3">
                <label for="no_rek" class="form-label">No Rekening</label>
                <input type="text" class="form-control" id="no_rek" aria-describedby="emailHelp" placeholder="<?= $data_user['no_rek'] ? $data_user['no_rek'] : 'anda belum mengisi' ?>" onfocus="this.value=''" value="<?= $data_user['no_rek'] ?>" name="no_rek">
              </div>
              <div class="mb-3">
                <label for="atas_nama_bank" class="form-label">Atas nama bank</label>
                <input type="text" class="form-control" id="atas_nama_bank" aria-describedby="emailHelp" placeholder="<?= $data_user['atas_nama_bank'] ? $data_user['atas_nama_bank'] : 'anda belum mengisi' ?>" onfocus="this.value=''" value="<?= $data_user['atas_nama_bank'] ?>" name="atas_nama_bank">
              </div>
              <div class=" mb-3">
                <label for="nama_bank" class="form-label">Nama Bank</label>
                <input type="text" class="form-control" id="nama_bank" aria-describedby="emailHelp" placeholder="<?= $data_user['nama_bank'] ? $data_user['nama_bank'] : 'anda belum mengisi' ?>" onfocus="this.value=''" value="<?= $data_user['nama_bank'] ?>" name="nama_bank">
              </div>
              <!-- <button type="submit" class="btn btn-success mt-2">Perbarui</button> -->

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Simpan
              </button>
            </div>
            <!-- Modal -->
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Masukan Password</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class=" mb-3">
                    <!-- <label for="passwordConfirmation" class="form-label">Masukan Password</label> -->
                    <input type="password" class="form-control" id="passwordConfirmation" aria-describedby="" name="passwordConfirmation">
                    <div id="emailHelp" class="form-text mt-2 fst-italic">*Kami memastikan hanya pemilik yang dapat melakukan pembaruan.</div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
              </div>
            </div>
          </div>  
      </form>
    </div>
  </div>
</div>
</div>
</div>



<?= $this->endSection(); ?>