<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
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
      <div class="d-flex align-items-center mb-3">
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
      <div id="filter" class="mb-3">
        <div class="card">
          <div class="card-body">
            <form id="formFilter" enctype="multipart/form-data">
              <h5 class="form-title">Filter Data</h5>
              <div class="row">
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label for="kategoriAnak" class="form-label">Kategori Anak</label>
                    <select class="form-select mb-3" id="kategoriAnak" name="kategoriAnak">
                      <option value="Semua Data">Semua Data</option>
                      <option value="Yatim-Piatu">Yatim-Piatu</option>
                      <option value="Yatim">Yatim</option>
                      <option value="Piatu">Piatu</option>
                      <option value="Dhuafa">Dhuafa</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label for="statusPanti" class="form-label">Status Panti</label>
                    <select class="form-select mb-3" id="statusPanti" name="statusPanti">
                      <option value="Semua Data">Semua Data</option>
                      <option value="Anak Asuh Mukim">Anak Asuh Mukim</option>
                      <option value="Anak Asuh Luar">Anak Asuh Luar</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label for="statusAnak" class="form-label">Status Anak</label>
                    <select class="form-select mb-3" id="statusAnak" name="statusAnak">
                      <option value="Semua Data">Semua Data</option>
                      <option value="Aktif">Aktif</option>
                      <option value="Lulus">Lulus</option>
                      <option value="Keluar">Keluar</option>
                      <option value="Dikeluarkan">Dikeluarkan</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary px-5 radius-30">Tampilkan Data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div id="show_tabelAnak"></div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url() ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  function get_anak() {
    var kategoriAnak = $("#kategoriAnak").val();
    var statusPanti = $("#statusPanti").val();
    var statusAnak = $("#statusAnak").val();
    $.ajax({
      url: '<?= base_url() ?>anak/get_data?act=tabel-anak',
      type: 'POST',
      data: {
        kategoriAnak: kategoriAnak,
        statusPanti: statusPanti,
        statusAnak: statusAnak
      },
      success: function(result) {
        $('#show_tabelAnak').html(result);
        $('#dataAnak').DataTable();
      },
    });
  }

  $(document).ready(function() {
    get_anak();

    $("#btn-refresh").on('click', function() {
      $('#show_tabelAnak').html("");
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

    $("#formFilter").on('submit', function(event) {
      event.preventDefault();
      $('#show_tabelAnak').html("");
      Pace.restart();
      Pace.on('done', function() {
        get_anak();
      });
    });
  });
</script>
<?= $this->endSection() ?>