<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css" />
<div class="page-content">
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
        </ol>
      </nav>
    </div>

  </div>

  <div id="show_reportData"></div>
  <h5 class="mb-3">Report Keuangan</h5>
  <div id="show_reportKeuangan"></div>
  <div class="ms-auto mb-3">
    <div class="btn-group">
      <div type="button" class="btn btn-primary" id="datefilter">
        <i class='bx bxs-calendar'></i>
        &nbsp;<span></span>
      </div>
      <div class="btn btn-primary split-bg-primary"></div>
    </div>
  </div>
  <div id="show_reportRangeKeuangan"></div>

  <h5 class="mb-3">Trending Keuangan</h5>
  <div class="row">
    <div class="col-12 col-lg-6">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div>
              <h6 class="mb-0">Trending Pemasukan</h6>
            </div>
          </div>
          <div class="chart-container-2 mt-4">
            <canvas id="chart_pemasukan"></canvas>
          </div>
        </div>
        <ul class="list-group list-group-flush" id="trendingPemasukan"></ul>
      </div>
    </div>
    <div class="col-12 col-lg-6">
      <div class="card radius-10">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div>
              <h6 class="mb-0">Trending Pengeluaran</h6>
            </div>
          </div>
          <div class="chart-container-2 mt-4">
            <canvas id="chart_pengeluaran"></canvas>
          </div>
        </div>
        <ul class="list-group list-group-flush" id="trendingPengeluaran"></ul>
      </div>
    </div>
  </div><!--end row-->

</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url() ?>assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/counterup/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script>
  function counterup() {
    $('.counterup').counterUp({
      delay: 10,
      time: 1000
    });
  }

  function counter() {
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });
  }

  function date_range() {
    $('#datefilter').daterangepicker({
      autoUpdateInput: false,
      locale: {
        cancelLabel: 'Clear'
      }
    });

    $('#datefilter').on('apply.daterangepicker', function(ev, picker) {
      $(this).find('span').html(picker.startDate.format('DD MMMM YYYY') + ' - ' + picker.endDate.format('DD MMMM YYYY'));
    });

    $('#datefilter').on('cancel.daterangepicker', function(ev, picker) {
      $(this).find('span').html('');
    });
  }

  function get_reportData() {
    $.ajax({
      url: '<?= base_url() ?>dashboard/get_data?act=reportData',
      type: 'GET',
      success: function(result) {
        $("#show_reportData").html(result);
      }
    });
  }

  function get_reportKeuangan() {
    $.ajax({
      url: '<?= base_url() ?>dashboard/get_data?act=reportKeuangan',
      type: 'GET',
      success: function(result) {
        $("#show_reportKeuangan").html(result);
        counter();
      }
    });
  }

  function get_reportRangeKeuangan(startDate, endDate) {
    var startDate = startDate;
    var endDate = endDate;
    $.ajax({
      url: '<?= base_url() ?>dashboard/get_data?act=reportRangeKeuangan',
      type: 'POST',
      data: {
        startDate: startDate,
        endDate: endDate,
      },
      success: function(result) {
        $("#show_reportRangeKeuangan").html(result);
        counterup();
      }
    });
  }

  function chart_pemasukan() {
    $.ajax({
      url: '<?= base_url('dashboard/get_data?act=chart_pemasukan') ?>',
      type: 'GET',
      dataType: "JSON",
      success: function(result) {
        var ctx = document.getElementById("chart_pemasukan").getContext("2d");

        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, "#fc4a1a");
        gradientStroke1.addColorStop(1, "#f7b733");

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, "#4776e6");
        gradientStroke2.addColorStop(1, "#8e54e9");

        var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke3.addColorStop(0, "#ee0979");
        gradientStroke3.addColorStop(1, "#ff6a00");

        var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke4.addColorStop(0, "#42e695");
        gradientStroke4.addColorStop(1, "#3bb2b8");

        var myChart = new Chart(ctx, {
          type: "doughnut",
          data: {
            labels: result.nama,
            datasets: [{
              backgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3,
                gradientStroke4,
              ],
              hoverBackgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3,
                gradientStroke4,
              ],
              data: result.jumlah,
              borderWidth: [1, 1, 1, 1],
            }, ],
          },
          options: {
            maintainAspectRatio: false,
            cutoutPercentage: 75,
            legend: {
              position: "bottom",
              display: false,
              labels: {
                boxWidth: 8,
              },
            },
            tooltips: {
              displayColors: false,
            },
          },
        });
        var html = "";
        var color = ["#fc4a1a", "#4776e6", "#ee0979", "#42e695"];
        for (i = 0; i < result.trending_pemasukan.length; i++) {
          var sumber = (result.trending_pemasukan[i].sumber == "sumber-donatur") ? "Donatur" : "Lainnya";
          html += '<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">' + sumber + ' <span class="badge rounded-pill" style="background-color:' + color[i] + '">' + result.trending_pemasukan[i].count + '</span></li>';
        }
        $("#trendingPemasukan").html(html);
      }
    });
  }

  function chart_pengeluaran() {
    $.ajax({
      url: '<?= base_url('dashboard/get_data?act=chart_pengeluaran') ?>',
      type: 'GET',
      dataType: "JSON",
      success: function(result) {
        var ctx = document.getElementById("chart_pengeluaran").getContext("2d");

        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, "#fc4a1a");
        gradientStroke1.addColorStop(1, "#f7b733");

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, "#4776e6");
        gradientStroke2.addColorStop(1, "#8e54e9");

        var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke3.addColorStop(0, "#ee0979");
        gradientStroke3.addColorStop(1, "#ff6a00");

        var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke4.addColorStop(0, "#42e695");
        gradientStroke4.addColorStop(1, "#3bb2b8");

        var myChart = new Chart(ctx, {
          type: "doughnut",
          data: {
            labels: result.nama,
            datasets: [{
              backgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3,
                gradientStroke4,
              ],
              hoverBackgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3,
                gradientStroke4,
              ],
              data: result.jumlah,
              borderWidth: [1, 1, 1, 1],
            }, ],
          },
          options: {
            maintainAspectRatio: false,
            cutoutPercentage: 75,
            legend: {
              position: "bottom",
              display: false,
              labels: {
                boxWidth: 8,
              },
            },
            tooltips: {
              displayColors: false,
            },
          },
        });
        var html = "";
        var color = ["#fc4a1a", "#4776e6", "#ee0979", "#42e695"];
        for (i = 0; i < result.trending_pengeluaran.length; i++) {
          html += '<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">' + result.trending_pengeluaran[i].kategori + ' <span class="badge rounded-pill" style="background-color:' + color[i] + '">' + result.trending_pengeluaran[i].count + '</span></li>';
        }
        $("#trendingPengeluaran").html(html);
      }
    });
  }

  $(document).ready(function() {
    date_range();
    get_reportData();
    get_reportKeuangan();
    get_reportRangeKeuangan();
    chart_pemasukan();
    chart_pengeluaran();

    // Mendapatkan tanggal saat ini
    var date = moment();
    var fullTextDate = date.format("DD MMMM YYYY");
    // Menampilkan tanggal saat ini ke console
    $('#datefilter').find('span').html(fullTextDate);

    $('#datefilter').on('apply.daterangepicker', function(ev, picker) {
      var startDate = picker.startDate.format('YYYY-MM-DD');
      var endDate = picker.endDate.format('YYYY-MM-DD');
      get_reportRangeKeuangan(startDate, endDate);
    });
  })
</script>
<?= $this->endSection() ?>