<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="card col-11 col-lg-6 m-auto mt-5">
      <div class="card-header text-center">
        <h1>Pendaftaran</h1>
      </div>
      <div class="card-body">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div id="" class="form-text">Sudah punya akun? <a href="login">Login</a></div>
          <br>
          <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> -->
          <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>