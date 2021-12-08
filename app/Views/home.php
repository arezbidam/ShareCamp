<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>
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
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        <!-- <img id="searchbar__img" src="/icons/magnifier.png" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-3 mb-4">
                <ul class="list-group mb-3">
                    <li class="list-group-item">Product Categories</li>
                </ul>
                <ul class="list-group">
                    <?php foreach ($categories as $category) { ?>
                        <a href="#" class="list-group-item list-group-item-action"><?= $category['nama_categories']; ?></a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-sm-6 mb-4">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('assets/img/img1.jpg'); ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url('assets/img/img2.jpg'); ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url('assets/img/img3.jpg'); ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="d-flex flex-column justify-content-between">
                    <img src="<?= base_url('assets/img/img1.jpg'); ?>" alt="" class="d-block w-100 mb-3">
                    <img src="<?= base_url('assets/img/img1.jpg'); ?>" alt="" class="d-block w-100 mb-4">
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="true">Featured</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Promo</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Recent</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mx-auto mt-4 mb-4" style="width: 18rem;">
                            <img src="<?= base_url('assets/img/img1.jpg'); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Featured title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mx-auto mt-4 mb-4" style="width: 18rem;">
                            <img src="<?= base_url('assets/img/img1.jpg'); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Sale title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mx-auto mt-4 mb-4" style="width: 18rem;">
                            <img src="<?= base_url('assets/img/img1.jpg'); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Recent title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
</body>

<?= $this->endSection(); ?>