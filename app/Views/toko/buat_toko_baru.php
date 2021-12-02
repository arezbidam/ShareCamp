<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Toko Saya
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Yeay, satu langkah lagi sebelum toko anda jadi.</h5>
                <p class="card-text text-center">Silahkan isi form dibawah ini.</p>
                <form action="" method="post">
                    <div class="d-flex flex-column">
                        <div class="mb-3 text-center">
                            <label for="idUser" class="form-label text-center">id_user</label>
                            <input type="text" class="form-control text-center" id="idUser" value="<?= $id_user; ?>" aria-placeholder="idUser" readonly required>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="namaToko" class="form-label">Apa Nama Toko Anda ?</label>
                            <input type="text" class="form-control text-center" id="namaToko" aria-placeholder="namaToko" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="alamatToko" class="form-label">Dimana Alamat Toko Anda ?</label>
                            <input type="text" class="form-control text-center" id="alamatToko" aria-placeholder="alamatToko" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="alamatToko" class="form-label">Jam Operasional ?</label>
                            <textarea name="" id="" class="form-control"></textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="termAndCondition">
                            <label class="form-check-label" for="termAndCondition">saya setuju dengan syarat ketentuan dan kebijakan privasi</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                ShareCamp
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>