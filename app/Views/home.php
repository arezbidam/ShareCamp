<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
  <div class="row" id="home-banner">
    <div class="col">
      <h1 class="text-center">Temukan Barang <span style="color:#48af48">terbaik</span> Pilihanmu</h1>
      <h2 class="text-center">Cari barang keperluanmu menggunakan fitur filter, kamu juga dapat mencari teman satu destinasi untuk melakukan pemesanan bersama!</h2>
    </div>
  </div>
  <div class="row">
    <div class="container d-flex justify-content-center">
      <div class="row">
        <div class="col d-flex" id="search-bar__container">
            <input type="text" id="search-bar" placeholder=" Cari barang...">
            <i class="bi bi-search"></i>
            <svg id="searchbar__img" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
            <!-- <img id="searchbar__img" src="/icons/magnifier.png" alt=""> -->
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>