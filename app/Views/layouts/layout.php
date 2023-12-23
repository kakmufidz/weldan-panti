<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <link rel="icon" href="<?= base_url() ?>images/logo-smartpanti-black.png" type="image/png" />
  <!--plugins-->
  <link href="<?= base_url() ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/plugins/sweetalert2/dist/sweetalert2.min.css" />
  <!-- loader-->
  <link href="<?= base_url() ?>assets/css/pace.min.css" rel="stylesheet" />
  <script src="<?= base_url() ?>assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/app.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet">
  <!-- Theme Style CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/dark-theme.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/semi-dark.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/header-colors.css" />
  <?php
  $this->session = session();
  $id_panti = $this->session->get('ID_PANTI');
  $this->db = \Config\Database::connect();
  $panti = $this->db->table("panti")->select("*")->where("id", $id_panti)->get()->getRowArray();
  ?>
  <title><?= (isset($page_title)) ? $page_title . " " . $panti['nama_panti'] . " Smart Panti" : "Smart Panti"; ?></title>
</head>

<body>
  <!--wrapper-->
  <div class="wrapper">
    <!--sidebar wrapper -->
    <?= $this->include('layouts/sidebar') ?>
    <!--end sidebar wrapper -->
    <!--start header -->
    <?= $this->include('layouts/header') ?>
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
      <?= $this->renderSection('content') ?>
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
      <p class="mb-0">Copyright © <?= date("Y") ?>. All right reserved.</p>
    </footer>
  </div>
  <!--end wrapper-->
  <!-- Bootstrap JS -->
  <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="<?= base_url() ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?= base_url() ?>assets/plugins/chartjs/js/Chart.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/chartjs/js/Chart.extension.js"></script>
  <script src="<?= base_url() ?>assets/js/index.js"></script>
  <script src="<?= base_url() ?>assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <!--app JS-->
  <script src="<?= base_url() ?>assets/js/app.js"></script>
  <script type="text/javascript">
    function formatRupiah(angka) {
      var reverse = angka.toString().split('').reverse().join('');
      var ribuan = reverse.match(/\d{1,3}/g);
      var hasil = ribuan.join('.').split('').reverse().join('');
      return 'Rp ' + hasil;
    }
    $(document).ready(function() {
      $("body").tooltip({
        selector: '[data-bs-toggle="tooltip"]'
      });

    });
  </script>
  <?= $this->renderSection('script') ?>
</body>

</html>