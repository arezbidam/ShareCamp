<?= $this->extend('layout/template-pra'); ?>
<?php $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class=" card col-11 col-lg-3 p-0 m-auto mt-1 rounded-5 mt-5">
      <div class="card-header">
      </div>
      <div class="card-body mt-3">
        <div class="judul">
          <p class="fs-3 fw-light">Sign In</p>
        </div>
        <?php if (session()->getFlashdata('error')) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
          </div>
        <?php endif ?>
        <?php if (session()->getFlashdata('errLoginReq')) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('errLoginReq'); ?>
          </div>
        <?php endif ?>
        <?php if (session()->getFlashdata('Registerred')) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('Registerred'); ?>
          </div>
        <?php endif ?>
        <form action="Login/signIn" method="POST" class="">
          <?= csrf_field(); ?>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label fw-light">Email</label>
            <input type="text" class="form-control fw-light outline-success" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Masukan Email">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label fw-light">Password</label>
            <input type="password" class="form-control fw-light" id="exampleInputPassword1" name="password" placeholder="Masukan Password">
          </div>
          <div id="" class="form-text">Belum punya akun? <a href="/signUp" class="">Sign Up</a></div>
          <br>
          <button type="submit" class="btn btn-success" name="login" value="1" style="width: 100%;">LogIn</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php if (session()->getFlashdata('pesan')) : ?>
  <?= session()->getFlashdata('pesan'); ?>
<?php endif ?>

<?= $this->endSection('content'); ?>