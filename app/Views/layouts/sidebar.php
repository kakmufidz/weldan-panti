<div class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <a href="<?= base_url('dashboard') ?>">
      <img src="<?= base_url() ?>images/logo-panti.jpg" class="logo-icon" alt="logo icon">
    </a>
    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <?php
    $currentURL = "http" . (isset($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url = explode('/', $currentURL);
    ?>
    <li <?= ($url[3] == "dashboard") ? "class='mm-active'" : "" ?>>
      <a href="<?= base_url('dashboard') ?>">
        <div class="parent-icon"><i class='bx bx-home-circle'></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li <?= ($url[3] == "anak") ? "class='mm-active'" : "" ?>>
      <a href="<?= base_url('anak') ?>">
        <div class="parent-icon"><i class="bx bx-group"></i>
        </div>
        <div class="menu-title">Anak Asuh</div>
      </a>
    </li>
    <li <?= ($url[3] == "donatur") ? "class='mm-active'" : "" ?>>
      <a href="<?= base_url('donatur') ?>">
        <div class="parent-icon"><i class="bx bx-coin-stack"></i></i>
        </div>
        <div class="menu-title">Data Donatur</div>
      </a>
    </li>
    <li <?= ($url[3] == "pemasukan") ? "class='mm-active'" : "" ?>>
      <a href="<?= base_url('pemasukan') ?>">
        <div class="parent-icon"><i class="bx bx-donate-heart"></i></i>
        </div>
        <div class="menu-title">Donasi & Pemasukan</div>
      </a>
    </li>
    <li <?= ($url[3] == "keuangan") ? "class='mm-active'" : "" ?>>
      <a href="<?= base_url('keuangan') ?>">
        <div class="parent-icon"><i class="bx bx-dollar-circle"></i></i>
        </div>
        <div class="menu-title">Penggunaan Keuangan</div>
      </a>
    </li>
  </ul>
  <!--end navigation-->
</div>