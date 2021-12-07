<?= $this->extend('layout/template-pra'); ?>
<?= $this->section('content'); ?>
<div class="container" id="signUp">
  <div class="row">
    <div class="card col-11 col-lg-7 p-0 m-auto mt-1 mb-5">
      <div class="card-header" style="height: 250px;"></div>
      <div class="card-body">
        <div class="judul">
          <p class="fs-3 fw-light">Sign Up</p>
        </div>
        <form action="/register" method="POST">
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-light"
                  >Email</label
                >
                <input
                  type="text"
                  class="form-control fw-light"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  name="email"
                />
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-light"
                  >Nama</label
                >
                <input
                  type="text"
                  class="form-control fw-light"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  name="nama"
                />
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-light"
                  >Password</label
                >
                <input
                  type="password"
                  class="form-control fw-light"
                  id="exampleInputPassword1"
                  name="password"
                />
              </div>
              <div class="mb-3">
                <label for="no_tlp" class="form-label fw-light"
                  >No Handphone</label
                >
                <input
                  type="text"
                  class="form-control fw-light"
                  id="no_tlp"
                  name="no_tlp"
                />
              </div>
              
            </div>
            <div class="col">
              <div class="mb-3">
                <label for="kota" class="form-label fw-light">Kota</label>
                <input
                type="text"
                class="form-control fw-light"
                id="kota"
                name="kota"
                />
              </div>
              <label for="" class="form-label fw-light">Alamat</label>
              <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 120px"></textarea>
                <!-- <label for="floatingTextarea2">Isi dengan alamat lengkap</label> -->
              </div>
            </div>
          </div>

          <div id="" class="form-text">
            Sudah punya akun? <a href="login">Login</a>
          </div>
          <br />
          <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> -->
          <button type="submit" class="btn btn-success">SignUp</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>