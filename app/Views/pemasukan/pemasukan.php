<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3"><?= $page_title ?></div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <!--end breadcrumb-->
  <div class="card">
    <div class="accordion accordion-flush">
      <div class="accordion-item">
        <h2 class="card-title accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <h5 class="card-title">Tambah Data Pemasukan</h5>
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <form id="formPemasukan" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-12">
                  <div class="border border-3 p-4 rounded">
                    <div class="mb-3">
                      <p class="text-danger">* Wajib diisi</p>
                    </div>
                    <div class="mb-3">
                      <div class="row">
                        <div class="col-4">
                          <label for="tanggal" class="form-label">Tanggal<span class="text-danger">*</span></label>
                          <div class="input-group mb-3">
                            <input class="result form-control" type="text" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pemasukan" value="<?= date("d/m/Y") ?>" required> <span class="input-group-text" id="basic-addon2"><i class="bx bx-calendar-exclamation"></i></span>
                          </div>

                        </div>
                      </div>
                      <div id="validation-tanggal" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Sumber Pemasukan<span class="text-danger">*</span></label>
                      <select class="form-control" id="sumberPemasukan" name="sumberPemasukan" required="true">
                        <option value="sumber-donatur">Donatur</option>
                        <option value="sumber-lain">Sumber Lainnya</option>
                      </select>
                      <div id="validation-sumberPemasukan" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3" id="formSumberLainnya" style="display: none;">
                      <div class="row">
                        <div class="col-12">
                          <input type="text" class="form-control" id="sumberLainnya" name="sumberLainnya" placeholder="Masukkan sumber lainnya">
                        </div>
                      </div>
                      <div id="validation-sumberLainnya" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3" id="formSumberDonatur" style="display: block;">
                      <label class="form-label">Nama Donatur<span class="text-danger">*</span></label>
                      <select class="single-select" id="idDonatur" name="idDonatur">
                        <option></option>
                        <option value="donatur-baru">Tambah Donatur Baru (jika belum tersedia)</option>
                        <?php foreach ($donatur as $data) : ?>
                          <option value="<?= $data['id'] ?>">
                            <?= $data['nama'] . " (" . $data['nohp'] . ") - " ?>
                            <?= (isset($data['desa']) ? $data['desa'] : "")
                              . (isset($data['rt']) ? " RT" . $data['rt'] : "")
                              . (isset($data['rw']) ? " RW" . $data['rw'] : "")
                              . (isset($data['kecamatan']) ? ", Kec. " . $data['kecamatan'] : "")
                              . (isset($data['kabupaten']) ? ", Kab. " . $data['kabupaten'] : "")
                              . " - "
                              . (isset($data['provinsi']) ? "" . $data['provinsi'] : "");
                            ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3" id="btnTambahDonatur" style="display: none;">
                      <a href="<?= base_url() ?>donatur/tambah_donatur" class="btn btn-primary px-5 radius-30">Tambah Donatur Baru</a>
                    </div>
                    <div class="mb-3">
                      <div class="row">
                        <div class="col-6">
                          <label for="jumlah" class="form-label">Jumlah<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah pemasukan" required>
                        </div>
                      </div>
                      <div id="validation-jumlah" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                      <div class="row">
                        <div class="col-12">
                          <label for="keterangan" class="form-label">Keterangan</label>
                          <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
                        </div>
                      </div>
                      <div id="validation-Keterangan" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                      <div class="col-md-12">
                        <label for="fileUpload" class="form-label">File Upload</label>
                        <input id="fileUpload" class="form-control" type="file" name="fileUpload">
                        <div id="validation-fileUpload" class="invalid-feedback"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!--end row-->
              <div class="col-12 mt-3">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card radius-10">
    <div class="card-body">
      <div id="show_tabelPemasukan">

      </div>
    </div>
  </div>

</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
<script>
  function get_pemasukan() {
    $.ajax({
      type: 'GET',
      url: '<?= base_url() ?>pemasukan/get_data?act=tabel-pemasukan',
      success: function(result) {
        $('#show_tabelPemasukan').html(result);
      },
    });
  }

  function sumber_pemasukan() {
    var selectedValue = $("#sumberPemasukan").val();
    if (selectedValue == "sumber-lain") {
      $("#formSumberDonatur").css("display", "none")
      $("#idDonatur").attr("required", false);
      $("#sumberLainnya").attr("required", true);
      $("#formSumberLainnya").css("display", "block")
    } else {
      $("#formSumberDonatur").css("display", "block")
      $("#idDonatur").attr("required", true);
      $("#sumberLainnya").attr("required", false);
      $("#formSumberLainnya").css("display", "none")
    }
  }

  $(document).ready(function() {
    get_pemasukan();
    sumber_pemasukan();

    $('#tanggal').bootstrapMaterialDatePicker({
      format: 'DD/MM/YYYY',
      time: false,
    });

    $('#sumberPemasukan').select2({
      theme: 'bootstrap4',
      width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });

    $('#idDonatur').select2({
      theme: 'bootstrap4',
      width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
      placeholder: "Pilih Donatur",
      allowClear: true,
    });

    $("#sumberPemasukan").on("change", function(e) {
      sumber_pemasukan();
    });

    $("#idDonatur").on("change", function(e) {
      var selectedValue = $(this).val();
      if (selectedValue == "donatur-baru") {
        $("#btnTambahDonatur").css("display", "block")
      } else {
        $("#btnTambahDonatur").css("display", "none")
      }
    });

    $("#formPemasukan").on('submit', function(event) {
      event.preventDefault();
      var formdata = new FormData(this);
      $.ajax({
        url: '<?= base_url() ?>pemasukan/proses?act=add_pemasukan',
        type: 'POST',
        data: formdata,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(result) {
          if (result.errors) {
            var name = Object.keys(result.errors);
            var notempty = result.notempty;
            var html = '';
            for (i = 0; i < notempty.length; i++) {
              $("[name=" + notempty[i] + "]").attr("class", "form-control");
              $("#validation-" + notempty[i]).html('');
              $("#validation-" + name[i]).css("display", "none");
            }
            for (i = 0; i < name.length; i++) {
              $("[name=" + name[i] + "]").attr("class", "form-control is-invalid");
              $("#validation-" + name[i]).attr("class", "invalid-feedback");
              if (name[i] == "fileUpload") {
                $("#validation-" + name[i]).attr("style", "display:block");
              }
              $("#validation-" + name[i]).html(result.errors[name[i]]);
              $("#validation-" + name[i]).css("display", "block");
            }
            $('select').css("display", "none");
          } else {
            if (result.insert == true) {
              window.location.href = "<?= base_url('pemasukan') ?>";
            }
          }
        },
      });
    });

    $("#show_tabelPemasukan").on("click", ".btnHapus", function() {
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
          var id = $(this).attr("data-id");
          $.ajax({
            url: '<?= base_url('pemasukan/proses?act=delete_pemasukan') ?>',
            type: 'POST',
            data: {
              id: id,
            },
            dataType: 'JSON',
            success: function(result) {
              window.location.href = "<?= base_url('pemasukan') ?>";
            }
          });
        }
      });
    });
  })
</script>
<?= $this->endSection() ?>