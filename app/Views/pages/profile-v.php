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
          <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action"><a href="#akun">Akun</a></button>
            <!-- <button type="button" class="list-group-item list-group-item-action">Tampilan</button> -->
            <button type="button" class="list-group-item list-group-item-action"><a href="#keamanan">Keamanan</a></button>
            <button type="button" class="list-group-item list-group-item-action"><a href="#tokosaya">Toko Saya</a></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 p-5 card" id="profile-setting_content">
        <div id="akun" class="akun">
          <p class="fw-bold fs-5">Akun</p>
          <form action="" class="col-8">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" aria-describedby="emailHelp" readonly value="<?=session()->get('email'); ?>">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="<?= session()->get('nama') ?>">
            </div>
            <div class="mb-3">
              <label for="no_tlp" class="form-label">No Handphone</label>
              <input type="text" class="form-control" id="no_tlp" aria-describedby="emailHelp" placeholder="<?= session()->get('no_tlp') ?>">
            </div>
            <div class="mb-3">
              <label for="kota" class="form-label">Kota</label>
              <input type="text" class="form-control" id="kota" aria-describedby="emailHelp" placeholder="<?= session()->get('kota') ?>">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" aria-describedby="emailHelp" placeholder="<?= session()->get('alamat') ?>">
            </div>
            <button type="submit" class="btn btn-success mt-2">Update</button>

          </form>
        </div>
        <div id="keamanan" class="keamanan">
          <p class="mt-5 fw-bold fs-5">Keamanan</p>
          <div class="form col-8">
              <div class="mb-3">
                <label for="password" class="form-label">Password lama</label>
                <input type="password" class="form-control" id="password" aria-describedby="emailHelp" value="<?= session()->get('password') ?>" readonly>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="password" aria-describedby="emailHelp" >
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
              </div>
              <button type="submit" class="btn btn-danger mt-2">Update Password</button>
          </div>
        </div>
        <div id="tokosaya" class="tokosaya mt-5">
          <p class="fw-bold fs-5">Toko Saya</p>
          <button class="btn btn-success"><a href="" style="text-decoration: none; color: white;">ke halaman toko saya</a></button>
        </div>
  </div>
</div>

<?= $this->endSection(); ?>