<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
  <div class="col">
    <div class="card radius-10 border-start border-0 border-3 border-success">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <p class="mb-0 text-secondary">Saldo</p>
            <h4 class="my-1 text-success">Rp. <span class="counter"><?= rp_count($saldo_sekarang) ?></span></h4>
            <p class="mb-0 font-13"><?= tgl_indo(date(("Y-m-d"))) ?></p>
          </div>
          <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-wallet'></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card radius-10 border-start border-0 border-3" style="border-color: #673ab7!important;">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <p class="mb-0 text-secondary">Total Pemasukan</p>
            <h4 class="my-1" style="color: #673ab7!important;">Rp. <span class="counter"><?= rp_count($total_pemasukan) ?></span></h4>
            <p class="mb-0 font-13">Sejak <?= (isset($first_pemasukan['tanggal_pemasukan']) ? tgl_indo(date("Y-m-d", strtotime($first_pemasukan['tanggal_pemasukan']))) : "1 Januari 2024") ?></p>
          </div>
          <div class="widgets-icons-2 rounded-circle bg-gradient-cosmic text-white ms-auto"><i class='bx bxs-bar-chart-alt-2'></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card radius-10 border-start border-0 border-3" style="border-color: #e10a1f!important;">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <p class="mb-0 text-secondary">Total Pengeluaran</p>
            <h4 class="my-1" style="color: #e10a1f!important;">Rp. <span class="counter"><?= rp_count($total_pengeluaran) ?></span></h4>
            <p class="mb-0 font-13">Sejak <?= (isset($first_pengeluaran['tgl_pengeluaran'])) ? tgl_indo(date("Y-m-d", strtotime($first_pengeluaran['tgl_pengeluaran']))) : "1 Januari 2024" ?></p>
          </div>
          <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-cart'></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!--end row-->