<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="filter-produk">
        <p>
          <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-funnel"></i> Terapkan FIlter
          </a>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            <form action="products/filter_city" method="get">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">Urutkan dari harga termurah</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="<?= $data_user['kota'] ?>" name="city_check">
                <label class="form-check-label" for="inlineCheckbox2">Urutakan dari kota <?= $data_user['kota'] ?> </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
                <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
              </div>
              <!-- <a href="" type="submit" class="btn btn-success">Terapkan</a> -->
              <button type="submit" class="btn btn-success">Terapkan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9 p-4" style="height: 1000px;">
      <h1>Temukan kebutuhanmu</h1>
      <?php if ($filter_title != null) : ?>
        <div class="alert alert-warning" role="alert">
          <a href="/products" arial-label="Close"><button class="btn-close"></button></a>
          menampilkan hasil filter dari <?= $filter_title ?>
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