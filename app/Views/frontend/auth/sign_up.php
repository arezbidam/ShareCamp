<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.9.2/bootstrap-social.min.css" integrity="sha512-3CYhYJnb7/677SX8kzxL2+gW6vVzXiVEC6ZhK0S4tGVp7dTlMjSZPVvA79aH8YMU0xuKn2tLZIFaBctUi4Cb/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/components.css'); ?>">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="app">
        <section class="section">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <?= session()->getFlashdata('pesan'); ?>
            <?php endif; ?>
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-8 col-12 order-lg-1 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" style="background-image: url('<?= base_url('assets/img/unsplash/login-bg.jpg'); ?>');">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">Share Camp</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Bandung, Indonesia</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 order-lg-2 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <i class="fas fa-campground"></i>
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Share<span style="color:#48af48">Camp</span></span></h4>
                        <p class="text-muted">Before you get started, you must register. <br> Already have an account? <a href="<?= base_url('login'); ?>" class="text-success">Login here</a> </p>
                        <ul class="nav nav-pills justify-content-between" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="stepOne-tab" data-toggle="tab" href="#stepOne" role="tab" aria-controls="stepOne" aria-selected="true">Step 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="stepTwo-tab" data-toggle="tab" href="#stepTwo" role="tab" aria-controls="stepTwo" aria-selected="false">Step 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="stepThree-tab" data-toggle="tab" href="#stepThree" role="tab" aria-controls="stepThree" aria-selected="false">Step 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="stepFour-tab" data-toggle="tab" href="#stepFour" role="tab" aria-controls="stepFour" aria-selected="false">Step 4</a>
                            </li>
                        </ul>
                        <form method="POST" action="<?= base_url('/register'); ?>">
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="stepOne" role="tabpanel" aria-labelledby="stepOne-tab">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="stepTwo" role="tabpanel" aria-labelledby="stepTwo-tab">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input id="text" type="text" class="form-control" name="nama" tabindex="3" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="noktp" class="control-label">No Ktp</label>
                                        </div>
                                        <input id="no-ktp" type="text" class="form-control" name="no_ktp" tabindex="4" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="no_telp" class="control-label">No. Telp</label>
                                        </div>
                                        <input id="no-telp" type="number" class="form-control" name="no_telp" tabindex="5" required>
                                        <span class="badge">*Ganti angka 0 diawal dengan 62 (tidak perlu +)</span>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="stepThree" role="tabpanel" aria-labelledby="stepThree-tab">
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="kota" class="control-label">Kota</label>
                                        </div>
                                        <input id="kota" type="text" class="form-control" name="kota" tabindex="6" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="alamat" class="control-label">Alamat</label>
                                        </div>
                                        <textarea name="alamat" class="form-control" id="" tabindex="7" style="height: 100px;"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="stepFour" role="tabpanel" aria-labelledby="stepFour-tab">
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="no_rek" class="control-label">No. Rekening</label>
                                        </div>
                                        <input id="no-rekening-bank" type="text" class="form-control" name="no_rek" tabindex="8" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="nama_bank" class="control-label">Nama Bank</label>
                                        </div>
                                        <input id="nama-bank" type="text" class="form-control" name="nama_bank" tabindex="9" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="atas_nama_bank" class="control-label">Atas Nama</label>
                                        </div>
                                        <input id="atas-nama" type="text" class="form-control" name="atas_nama_bank" tabindex="10" required>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-success btn-icon"><i class="fas fa-paper-plane"></i> Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="text-center mt-1 text-small">
                            <div class="mt-1">
                                <a href="#" class="text-success">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#" class="text-success">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('assets/admin/js/stisla.js'); ?>"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url('assets/admin/js/scripts.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/custom.js'); ?>"></script>


    <!-- Page Specific JS File -->
</body>

</html>