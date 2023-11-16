<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> -->
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Anak</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card radius-10">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <div>
          <h6 class="mb-0">Data Anak Asuh</h6>
        </div>
        <div class="d-flex align-items-center">
          <div class="">
            <button type="button" id="btn-refresh" class="btn btn-primary ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh Data"><i class="bx bx-refresh me-0"></i></button>
          </div>
          <div class="">
            <a href="<?= base_url() ?>anak/tambah_anak" class="btn btn-primary ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Anak Asuh"><i class="bx bx-user-plus me-0"></i></a>
          </div>
        </div>
      </div>
      <div id="show_tabelAnak"></div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script type="text/javascript">
  function get_anak() {
    $.ajax({
      type: 'GET',
      url: '<?= base_url() ?>anak/get_data?act=tabel-anak',
      success: function(result) {
        $('#show_tabelAnak').html(result);
      },
    });
  }

  $(document).ready(function() {
    get_anak();

    $("#btn-refresh").on('click', function() {
      Pace.restart();
      Pace.on("start", function() {
        get_anak();
      });
    });

    $("#show_tabelAnak").on("click", ".btnHapus", function() {
      Swal.fire({
        html: `Apakah Anda yakin menghapus data ini?`,
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Hapus",
        cancelButtonText: 'Batal',
        customClass: {
          confirmButton: "btn btn-danger m-1",
          cancelButton: 'btn btn-secondary m-1'
        }
      }).then((result) => {
        if (result.isConfirmed) {
          var nip = $(this).attr("data-nip");
          $.ajax({
            url: '<?= base_url('anak/proses?act=delete_anak') ?>',
            type: 'POST',
            data: {
              nip: nip,
            },
            dataType: 'JSON',
            success: function(result) {
              window.location.href = "<?= base_url('anak') ?>";
            }
          });
        }
      });
    });

  });
</script>
<?= $this->endSection() ?>