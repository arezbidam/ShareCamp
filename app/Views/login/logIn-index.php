<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class=" card col-11 col-lg-6 m-auto mt-4">
      <div class="card-header">
        <h1 class="text-center mt-3">Login</h1>
      </div>
      <div class="card-body">
        <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
          <?= session()->getFlashdata('error'); ?>
        </div>
        <?php endif ?>
        <?php if(session()->getFlashdata('errLoginReq')) : ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('errLoginReq'); ?>
          </div>
        <?php endif ?>
        <form action="Login/signIn" method="POST" class="">
          <?= csrf_field(); ?>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
              placeholder="Masukan Email">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
              placeholder="Masukan Password">
          </div>
          <div id="" class="form-text">Belum punya akun? <a href="/signUp">Sign Up</a></div>
          <br>
          <button type="submit" class="btn btn-primary" name="login" value="1">LogIn</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>