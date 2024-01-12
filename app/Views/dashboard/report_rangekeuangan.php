<?php
$start = date("Y-m-d", strtotime($startDate));
$end = date("Y-m-d", strtotime($endDate));
?>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
  <div class="col">
    <div class="card radius-10 border-start border-0 border-3" style="border-color: #673ab7!important;">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <p class="mb-0 text-secondary">Pemasukan</p>
            <h4 class="my-1" style="color: #673ab7!important;">Rp. <span class="counterup"><?= rp_count($total_pemasukan) ?></span></h4>
            <p class="mb-0 font-13"><?= tgl_indo($start) . " - " . tgl_indo($end) ?></p>
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
            <p class="mb-0 text-secondary">Pengeluaran</p>
            <h4 class="my-1" style="color: #e10a1f!important;">Rp. <span class="counterup"><?= rp_count($total_pengeluaran) ?></span></h4>
            <p class="mb-0 font-13"><?= tgl_indo($start) . " - " . tgl_indo($end) ?></p>
          </div>
          <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-cart'></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!--end row-->