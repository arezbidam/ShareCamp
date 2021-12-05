<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
  <div class="row bg-danger">
    <div class="col">
      <p class="fw-bold fs-5">Profil</p>
    </div>
  </div>
</div>
<div class="container mt-4">
<div class="row">
    <div class="col-lg-3">
      <div class="card profile-menu rounded-3">
        <div class="profile-menu__header">
          <img class="mt-4" src="assets/img/avatar.png" alt="">
          <p class="mt-2 fw-bold fs-5"><?= session()->get('nama') ?></p>
        </div>
        <div class="profile-menu__tabs p-2">
          <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action">Akun</button>
            <button type="button" class="list-group-item list-group-item-action">Tampilan</button>
            <button type="button" class="list-group-item list-group-item-action">Keamanan</button>
            <button type="button" class="list-group-item list-group-item-action">Toko saya</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 p-5 card">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit omnis repellat inventore, amet et consequatur vero asperiores porro atque quibusdam nam officia, nisi, perspiciatis quas voluptatem? Error quod ea assumenda?
      </div>
  </div>
</div>

<?= $this->endSection(); ?>