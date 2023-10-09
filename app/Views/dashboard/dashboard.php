<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="page-content">

  <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
      <div class="card radius-10 border-start border-0 border-3 border-info">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <?php
            $start = date("d/m/Y");
            $end = date("d/m/Y");
            if ($start == $end) {
              $tanggal = $start;
            } else {
              $tanggal = $start . " - " . $end;
            }
            ?>
            <div>
              <p class="mb-0 text-secondary">Anak Asuh</p>
              <h4 class="my-1 text-info"><span class="counter">27</span></h4>
              <p class="mb-0 font-13">Tanggal <?= $tanggal ?></p>
            </div>
            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bxs-cart'></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10 border-start border-0 border-3 border-success">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div>
              <p class="mb-0 text-secondary">Penerima Manfaat</p>
              <h4 class="my-1 text-success"><span class="counter">4,369</span></h4>
              <p class="mb-0 font-13">Tanggal <?= $tanggal ?></p>
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
              <p class="mb-0 text-secondary">Donatur</p>
              <h4 class="my-1" style="color: #673ab7!important;"><span class="counter">539</span></h4>
              <p class="mb-0 font-13">Tanggal <?= $tanggal ?></p>
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
              <p class="mb-0 text-secondary">Partnership</p>
              <h4 class="my-1" style="color: #e10a1f!important;"><span class="counter">30</h4>
              <p class="mb-0 font-13">Tanggal <?= $tanggal ?></p>
            </div>
            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-group'></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!--end row-->

</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url() ?>assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/counterup/jquery.counterup.min.js"></script>
<script>
  $(document).ready(function() {
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });
  })
</script>
<?= $this->endSection() ?>