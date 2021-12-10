<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="container-fluid">
  <div class="row pt-3">

  </div>
</div>
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-12" style="height: 1000px;">
      <h1>Temukan kebutuhanmu</h1>
      <div class=" fw-bold col-lg-12 d-flex mt-3 ps-2">
        <div>
          <form action="/products/filter_asc" method="get">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="true" name="asc_check" onChange="this.form.submit()">
              <label class="form-check-label" for="inlineCheckbox1">Urutkan dari harga termurah</label>
            </div>
          </form>
        </div>
        <div class="">
          <form action="/products/filter_city/<?= $data_user['kota'] ?>" method="get">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="<?= $data_user['kota'] ?>" name="city_check" onChange="this.form.submit()">
              <label class="form-check-label" for="inlineCheckbox2">Urutakan dari kota <?= $data_user['kota'] ?> </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
              <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
            </div>
          </form>
        </div>
      </div>
      <?php if ($filter_title != null) : ?>
        <div class="alert alert-warning mt-3 mb-3" role="alert">
          <a href="/products" arial-label="Close"><button class="btn-close"></button></a>
          <?= $filter_title ?>
        </div>
      <?php endif ?>

      <div class="lists mt-3 d-flex flex-row justify-content-start">
        <?php foreach ($barang as $barang) : ?>
          <div class="card mx-auto ms-4 mb-4" style="width: 15rem;">
            <div class="p-4">
              <img src="<?= base_url('assets/img_barang/' . $barang['foto_barang_path']); ?>" class="card-img-top" alt="<?= $barang['foto_barang_path'] ?>">
            </div>
            <div class="card-body">
              <h5 class="card-title"><?= $barang['nama_barang'] ?></h5>
              <div class="description">
                <p class="card-text">Rp. <?= $barang['harga'] ?></p>
              </div>
              <a href="" class="btn btn-primary mt-3">Cek detail</a>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>