<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Keuangan</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body p-4">
      <h5 class="card-title">Tambah Data</h5>
      <hr />
      <div class="form-body mt-4">
        <form id="formPengeluaran" enctype="multipart/form-data">
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
                  <label for="judul" class="form-label">Judul Pengeluaran<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul pengeluaran" required>
                  <div id="validation-judul" class="invalid-feedback"></div>
                </div>
                <div class="mb-3" id="listPengeluaran">
                  <label for="listPengeluaran" class="form-label">List Pengeluaran<span class="text-danger">*</span></label>
                  <div class="row mx-3" id="itemPengeluaran1">
                    <div class="col-4">
                      <label for="item" class="form-label">Item<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="item" name="item[]" placeholder="Masukkan item pengeluaran" required>
                    </div>
                    <div class="col-2">
                      <label for="harga" class="form-label">Harga Satuan<span class="text-danger">*</span></label>
                      <input type="number" class="form-control num_validation" id="harga" name="harga[]" placeholder="Rp. 0" required>
                    </div>
                    <div class="col-2">
                      <label for="jumlah" class="form-label">Jumlah<span class="text-danger">*</span></label>
                      <input type="number" class="form-control num_validation" id="jumlah" name="jumlah[]" placeholder="0" required>
                    </div>
                    <div class="col-2">
                      <label for="totalHarga" class="form-label">Total Harga<span class="text-danger">*</span></label>
                      <input type="number" class="form-control num_validation" style="background-color: #cdcdcd;" id="totalHarga" name="totalHarga[]" placeholder="Rp. 0" required readonly>
                    </div>
                  </div>
                  <div class="row ms-3">
                    <div class="col-6">
                      <div id="validation-item" class="invalid-feedback"></div>
                    </div>
                    <div class="col-6">
                      <div id="validation-jumlah" class="invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="row ms-3 mt-2">
                    <div class="col-4">
                      <a href="javascript:;" class="btn btn-primary" id="btnAddItem"><i class="bx bx-plus me-0"></i> Tambah Item</a>
                    </div>
                    <div class="col-2 d-flex align-items-center">
                      <h4>Total</h4>
                    </div>
                    <div class="col-6 d-flex align-items-center">
                      <h3 id="totalItem">Rp 0</h3>
                      <input type="hidden" id="totalPengeluaran" name="totalPengeluaran">
                    </div>
                  </div>
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
                    <input id="fileUpload" class="form-control" type="file" name="fileUpload[]" multiple>
                    <div id="validation-fileUpload" class="invalid-feedback"></div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--end row-->
          <div class="col-12 mt-3">
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Simpan Data Donatur</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url() ?>/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
<script type="text/javascript">
  function count_total() {
    var jumlah = $('input[name="totalHarga[]"]').map(function() {
      return $(this).val();
    }).get();

    var total = jumlah.reduce(function(acc, val) {
      if (val !== '' && !isNaN(val)) {
        return acc + parseFloat(val);
      }
      return acc;
    }, 0);

    $('#totalItem').html(formatRupiah(total));
    $('#totalPengeluaran').val(total);
  }

  function num_validation() {
    $('.num_validation').on('change', function() {
      let inputValue = $(this).val();
      if (inputValue < 1) {
        $(this).val('1');
      }

      var idItem = $(this).parent().parent().attr('id');
      let harga = $('#' + idItem).find('#harga').val();
      let jumlah = $('#' + idItem).find('#jumlah').val();
      var totalHarga = harga * jumlah
      $('#' + idItem).find('#totalHarga').val(totalHarga);
      count_total();
    });
  }

  $(document).ready(function() {
    $('#tanggal').bootstrapMaterialDatePicker({
      format: 'DD/MM/YYYY',
      time: false,
    });

    $('#btnAddItem').on('click', function() {
      var items = $('input[name="item[]"]').map(function() {
        return $(this).val();
      }).get();
      var next_item = items.length + 1;
      var html = '<div class="row mx-3 mt-1" id="itemPengeluaran' + next_item + '">';
      html += '<div class="col-4">';
      html += '<input type="text" class="form-control" id="item" name="item[]" placeholder="Masukkan item pengeluaran" required>';
      html += '</div>';
      html += '<div class="col-2">';
      html += '<input type="number" class="form-control num_validation" id="harga" name="harga[]" placeholder="Rp. 0" required>';
      html += '</div>';
      html += '<div class="col-2">';
      html += '<input type="number" class="form-control num_validation" id="jumlah" name="jumlah[]" placeholder="0" required>';
      html += '</div>';
      html += '<div class="col-2">';
      html += '<input type="number" class="form-control num_validation" style="background-color: #cdcdcd;" id="totalHarga" name="totalHarga[]" placeholder="Rp. 0" required readonly>';
      html += '</div>';
      html += '<div class="col-2 d-flex align-items-center">';
      html += '<a href="javascript:;" class="text-danger ms-3 btnHapusItem" data-id="' + next_item + '"><i class="bx bx-x"></i> Hapus</a>';
      html += '</div>';
      html += '</div>';
      $('#itemPengeluaran' + items.length).after(html);
      count_total();
      num_validation();
    });

    $('#listPengeluaran').on('click', '.btnHapusItem', function() {
      var nomor = $(this).attr("data-id");
      $('#itemPengeluaran' + nomor).remove();
      count_total()
    });

    $('#listPengeluaran').on('keyup', 'input[name="jumlah[]"]', function() {
      count_total();
    });

    $('.num_validation').on('change', function() {
      num_validation();
    });

    $("#formPengeluaran").on('submit', function(event) {
      event.preventDefault();
      var formdata = new FormData(this);
      $.ajax({
        url: '<?= base_url() ?>keuangan/proses?act=add_pengeluaran',
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
            }
            for (i = 0; i < name.length; i++) {
              $("[name=" + name[i] + "]").attr("class", "form-control is-invalid");
              $("#validation-" + name[i]).attr("class", "invalid-feedback");
              if (name[i] == "fotoDonatur") {
                $("#validation-" + name[i]).attr("style", "display:block");
              }
              $("#validation-" + name[i]).html(result.errors[name[i]]);
            }
          } else {
            if (result.insert == true) {
              window.location.href = "<?= base_url('keuangan') ?>";
            }
          }
        },
      });
    });
  });
</script>
<?= $this->endSection() ?>