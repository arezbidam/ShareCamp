<?php if(session()->getFlashdata('errLogged')) : ?>
  <?php $isi_pesan = session()->getFlashdata('errLogged') ?>
  <script>
    const alertLogged = alert('<?= $isi_pesan ?>');
    window.location.href = "/";
  </script>
<?php endif ?>