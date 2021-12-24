<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Libraries -->
    <!-- Dropify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://datatables.net/release-datatables/media/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://datatables.net/release-datatables/extensions/FixedColumns/css/fixedColumns.bootstrap4.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/css/components.css'); ?>">
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/css/select2.min.css'); ?>">
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="<?= base_url(); ?>" class="navbar-brand sidebar-gone-hide"><i class="fas fa-campground" style="font-size: 14pt;"></i> Share<span style="color:#48af48">Camp</span></a>
                <div class="navbar-nav">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                </div>
                <form method="post" action="<?= base_url('shop/produk'); ?>" class="form-inline ml-auto">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" name="keyword" type="search" placeholder="Cari Nama Produk" aria-label="Search" data-width="250" required>
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <figure class="avatar mr-2 avatar-sm">
                                <img alt="image" src="<?= base_url('assets/img/avatar/avatar-1.png'); ?>" class="rounded-circle mr-1">
                                <?php if (session()->get('masuk')) { ?> <i class="avatar-presence online"></i> <?php } else { ?> <i class="avatar-presence offline"></i> <?php } ?>
                            </figure>
                            <div class="d-sm-none d-lg-inline-block"><?= session()->get('nama') ? session()->get('nama') : ""; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if (session()->get('masuk')) { ?>
                                <a href="<?= base_url('profile'); ?>" class="dropdown-item has-icon font-weight-600">
                                    <i class="far fas fa-user" style="font-size: 12pt;"></i> Profile
                                </a>
                                <a href="<?= base_url('logout'); ?>" class="dropdown-item has-icon font-weight-600 text-danger">
                                    <i class="far fas fa-sign-out-alt" style="font-size: 12pt;"></i> Logout
                                </a>
                            <?php } else { ?>
                                <a href="<?= base_url('login'); ?>" class="dropdown-item has-icon font-weight-600">
                                    <i class="far fas fa-sign-out-alt" style="font-size: 12pt;"></i> Login
                                </a>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
            </nav>
            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item <?= $pages == "home" ? "active" : ""; ?>">
                            <a href="<?= base_url(); ?>" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
                        </li>
                        <li class="nav-item <?= $pages == "sewa-produk" ? "active" : ""; ?>">
                            <a href="<?= base_url('shop/produk'); ?>" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Sewa Produk</span></a>
                        </li>
                        <li class="nav-item <?= $pages == "cari-teman" ? "active" : ""; ?>">
                            <a href="<?= base_url('cari-teman'); ?>" class="nav-link"><i class="fas fa-users"></i><span>Cari Teman Camping</span></a>
                        </li>
                        <?php if ($pages == "toko") { ?>
                            <li class="nav-item <?= $pages == "toko" ? "active" : ""; ?>">
                                <a href="<?= base_url('toko'); ?>" class="nav-link"><i class="fas fa-database"></i><span>Toko Saya</span></a>
                            </li>
                            <?php } else {

                            if (session()->get('masuk')) { ?>

                                <li class="nav-item <?= $pages == "keranjang" ? "active" : ""; ?>">
                                    <a href="<?= base_url('keranjang'); ?>" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Keranjang Saya</span></a>
                                </li>
                                <li class="nav-item <?= $pages == "pesanan" ? "active" : ""; ?>">
                                    <a href="<?= base_url('pesanan'); ?>" class="nav-link"><i class="fas fa-copy"></i><span>Pesanan Saya</span></a>
                                </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </nav>



            <?= $this->renderSection("content"); ?>


            <!-- Modal SignOut -->
            <div class="modal fade" id="modalSignOut" tabindex="-1" role="dialog" aria-labelledby="modalSignOutLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSignOutLabel">Sign-Out</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin sign-out ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="<?= base_url('frontend/sign-out'); ?>" class="btn btn-primary">Sign-Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/stisla.js"></script>


    <!-- JS Libraies -->
    <script src="https://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script src="https://datatables.net/release-datatables/media/js/dataTables.bootstrap4.js"></script>
    <script src="https://datatables.net/release-datatables/extensions/FixedColumns/js/dataTables.fixedColumns.js"></script>
    <script src="https://datatables.net/release-datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- Template JS File -->
    <script src="<?= base_url('assets/frontend/js/scripts.js'); ?>"></script>
    <script src="<?= base_url('assets/frontend/js/custom.js'); ?>"></script>
    <script>
        function passIdProdukToModalAlertDeleteProduk(idProduk) {
            $('#modal-delete-id-produk').attr('value', idProduk);
            $('#modalAlertDeleteProduk').modal();
        }

        function tambahKeKeranjang(idProduk) {
            $('#tambah-keranjang-id-produk').attr('value', idProduk);
            $('#modalTambahKeKeranjang').modal();
        }

        function bayarPesanan(noPesanan) {
            $('#bayar-pesanan-no-pesanan').attr('value', noPesanan);
            $('#modalBayarPesanan').modal();
        }

        function joinModalShareCamp(noShareCamp) {
            $('#join-sharecamp-no-sharecamp').attr('value', noShareCamp);
            $('#modalJoinShareCamp').modal();
        }

        function hapusModalShareCamp(noShareCamp) {
            $('#hapus-sharecamp-no-sharecamp').attr('value', noShareCamp);
            $('#modalHapusShareCamp').modal();
        }

        function modalKeluarShareCamp(idJoinShareCamp) {
            $('#keluar-sharecamp-id-join-sharecamp').attr('value', idJoinShareCamp);
            $('#modalKeluarShareCamp').modal();
        }

        function hapusPesanan(noPesanan) {
            $('#hapus-pesanan-no-pesanan').attr('value', noPesanan);
            $('#modalHapusPesanan').modal();
        }
        $(document).ready(function() {
            $('#dataTable').DataTable();
            $('.dropify').dropify({
                tpl: {
                    wrap: '<div class="dropify-wrapper"></div>',
                    loader: '<div class="dropify-loader"></div>',
                    message: '<div class="dropify-message"><span class="file-icon" /> <p style="font-size:14pt;">{{ default }}</p></div>',
                    preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                    filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                    clearButton: '<button type="button" class="dropify-clear">{{ remove }}</button>',
                    errorLine: '<p class="dropify-error">{{ error }}</p>',
                    errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
                }
            });
            $('.simple-select2').select2({
                placeholder: "-- Select an option --",
                allowClear: true,
            });
            $('#summernote').summernote({
                tabsize: 2,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                ]
            });
        });
    </script>