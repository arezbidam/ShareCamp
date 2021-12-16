<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/style/style.css">
  <link rel="stylesheet" href="/style/responsive.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

  <!-- Dropify -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

  <!-- Data Table -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- sweet alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


  <title><?= $title ?></title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand fw-bold" href="<?= base_url(); ?>"><i class="fas fa-campground"></i> Share<span style="color:#48af48">Camp</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/products">Products</a>
            </li>
            <?php if (!session()->get('id')) : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/login">LogIn</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= base_url('/keranjang'); ?>"><i class="fas fa-shopping-cart fa-xs"></i> Cart</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle fa-sm"></i> <?= session()->get('nama'); ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?= base_url(); ?>/profil">Profile</a></li>
                  <li><a class="dropdown-item" href="<?= base_url(); ?>/pemesanan_saya">Pesanan Saya</a></li>
                  <li><a class="dropdown-item" href="<?= base_url(); ?>/toko">Toko Saya</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="<?= base_url(); ?>/logout">Logout</a></li>
                </ul>
              </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <?= $this->renderSection('content'); ?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  <!-- Data Table -->
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#deskripsi-toko').summernote({
        placeholder: 'Deskripsi Toko Anda',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['fontsize', ['fontsize']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
        ]
      });
      $('#simpleDataTable').DataTable();
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
    });

    function hapusBarang(idBarang) {
      $('#id-barang-hapus').attr('value', idBarang);
      $('#modalHapusBarang').modal();
    }

    $(document).ready(function() {
      $('.simple-select2').select2({
        placeholder: "-- Select an option --",
        allowClear: true,
      });
    });
  </script>
</body>

</html>