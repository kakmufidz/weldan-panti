<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pengeluaran</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body p-4">
      <h5 class="card-title">Edit Data</h5>
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
                        <input type="text" id="idPengeluaran" name="idPengeluaran" value="<?= $pengeluaran['id'] ?>" hidden>
                        <input class="result form-control" type="text" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pengeluaran" value="<?= date("d/m/Y", strtotime($pengeluaran['tgl_pengeluaran'])) ?>" required> <span class="input-group-text" id="basic-addon2"><i class="bx bx-calendar-exclamation"></i></span>
                      </div>
                    </div>
                  </div>
                  <div id="validation-tanggal" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="judul" class="form-label">Judul Pengeluaran<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul pengeluaran" value="<?= $pengeluaran['judul'] ?>" required>
                  <div id="validation-judul" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="kategori" class="form-label">Kategori Pengeluaran</label>
                  <select class="form-select" id="kategori" name="kategori" required>
                    <?php if (!empty($kategori[0]['kategori'])) :
                      foreach ($kategori as $item) :
                        $select = ($item['kategori'] == $pengeluaran['kategori']) ? "selected" : "";
                    ?>
                        <option value="<?= $item['kategori'] ?>" <?= $select ?>><?= $item['kategori'] ?></option>
                    <?php endforeach;
                    endif; ?>
                    <option value="newKategori" class="text-primary">Kategori Baru</option>
                  </select>
                  <div id="newKat"></div>
                  <div id="validation-kategori_baru" class="invalid-feedback"></div>
                  <div id="validation-kategori" class="invalid-feedback"></div>
                </div>
                <div class="mb-3" id="listPengeluaran">
                  <label for="listPengeluaran" class="form-label">List Pengeluaran<span class="text-danger">*</span></label>
                  <?php $no = 1;
                  foreach ($dataItem as $item) : ?>
                    <div class="row  mx-3 mt-1" id="itemPengeluaran<?= $no ?>">
                      <div class="col-4">
                        <?php if ($no <= 1) : ?>
                          <label for="item" class="form-label">Item<span class="text-danger">*</span></label>
                        <?php endif; ?>
                        <input type="text" id="idItemPengeluaran" name="idItemPengeluaran[]" value="<?= $item['id'] ?>" hidden>
                        <input type="text" class="form-control" id="item" name="item[]" placeholder="Masukkan item pengeluaran" value="<?= $item['item'] ?>" required>
                      </div>
                      <div class="col-2">
                        <?php if ($no <= 1) : ?>
                          <label for="harga" class="form-label">Harga Satuan<span class="text-danger">*</span></label>
                        <?php endif; ?>
                        <input type="number" class="form-control num_validation" id="harga" name="harga[]" placeholder="Rp. 0" value="<?= $item['harga'] ?>" required>
                      </div>
                      <div class="col-2">
                        <?php if ($no <= 1) : ?>
                          <label for="jumlah" class="form-label">Jumlah<span class="text-danger">*</span></label>
                        <?php endif; ?>
                        <input type="number" class="form-control num_validation" id="jumlah" name="jumlah[]" placeholder="0" value="<?= $item['jumlah'] ?>" required>
                      </div>
                      <div class="col-2">
                        <?php if ($no <= 1) : ?>
                          <label for="totalHarga" class="form-label">Total Harga<span class="text-danger">*</span></label>
                        <?php endif; ?>
                        <input type="number" class="form-control num_validation" style="background-color: #cdcdcd;" id="totalHarga" name="totalHarga[]" placeholder="Rp. 0" value="<?= $item['total_harga'] ?>" required readonly>
                      </div>
                      <?php if ($no > 1) : ?>
                        <div class="col-2 d-flex align-items-center">
                          <a href="javascript:;" class="text-danger ms-3 btnHapusItem" data-id="<?= $item['id'] ?>" data-no="<?= $no ?>" database="true"><i class="bx bx-x"></i> Hapus</a>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php $no++;
                  endforeach; ?>
                  <div class="row ms-3">
                    <div class="col-6">
                      <div id="validation-item" class="invalid-feedback"></div>
                    </div>
                    <div class="col-6">
                      <div id="validation-jumlah" class="invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="row ms-3 mt-2">
                    <div class="col-6">
                      <a href="javascript:;" class="btn btn-primary" id="btnAddItem"><i class="bx bx-plus me-0"></i> Tambah Item</a>
                    </div>
                    <div class="col-2 d-flex align-items-center">
                      <h4>Total</h4>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                      <h4 id="totalItem"><?= rupiah($pengeluaran['total_pengeluaran']) ?></h4>
                      <input type="hidden" id="totalPengeluaran" name="totalPengeluaran" value="<?= $pengeluaran['total_pengeluaran'] ?>">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-12">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"><?= $pengeluaran['keterangan'] ?></textarea>
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
                <?php $file = json_decode($pengeluaran['file']);
                if (isset($file)) :
                  if (sizeof($file) != 0) : ?>
                    <div class="imageuploadify well" id="listFile" style="min-height: 0;">
                      <div class="imageuploadify-images-list">
                        <?php $i = 1;
                        foreach ($file as $itemFile) : ?>
                          <?php $extension = pathinfo($itemFile, PATHINFO_EXTENSION); ?>
                          <div class="imageuploadify-container" style="margin: 9px;" id="file<?= $i ?>">
                            <button type="button" class="btn btn-danger bx bx-x btnFile" data-id="<?= $pengeluaran['id'] ?>" data-file="<?= $itemFile ?>" data-no="<?= $i ?>"></button>
                            <?php if (in_array($extension, ["jpg", "png", "jpeg", "webp"])) : ?>
                              <a target="_blank" href="<?= base_url() ?>uploads/pengeluaran/<?= $itemFile ?>"><img src="<?= base_url() ?>uploads/pengeluaran/<?= $itemFile ?>" alt="File pengeluaran"></a>
                            <?php else : ?>
                              <a href="<?= base_url() ?>uploads/pengeluaran<?= $itemFile ?>"><img src="<?= base_url() ?>uploads/file_pemasukan/document.jpg" alt="File pengeluaran"></a>
                            <?php endif; ?>
                          </div>
                        <?php $i++;
                        endforeach; ?>
                      </div>
                    </div>
                <?php endif;
                endif; ?>
              </div>
            </div>
          </div><!--end row-->
          <div class="row mt-3">
            <div class="col-6 d-grid">
              <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
            <div class="col-6 d-grid">
              <button type="submit" class="btn btn-secondary">Batalkan</button>
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

  function kategori() {
    var kategori = $('#kategori').val();
    if (kategori == "newKategori") {
      var input = '<input type="text" class="form-control mt-3" id="kategori_baru" name="kategori_baru" placeholder="Masukan kategori baru" required>';
    } else {
      var input = '';
    }
    $('#newKat').html(input);
  }

  $(document).ready(function() {
    $('#tanggal').bootstrapMaterialDatePicker({
      format: 'DD/MM/YYYY',
      time: false,
    });

    $('#kategori').on('change', function() {
      kategori();
    });

    $('#btnAddItem').on('click', function() {
      var items = $('input[name="item[]"]').map(function() {
        return $(this).val();
      }).get();
      var next_item = items.length + 1;
      var html = '<div class="row mx-3 mt-1" id="itemPengeluaran' + next_item + '">';
      html += '<div class="col-4">';
      html += '<input type="text" id="idItemPengeluaran" name="idItemPengeluaran[]" value="new" hidden>';
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
      html += '<a href="javascript:;" class="text-danger ms-3 btnHapusItem" data-no="' + next_item + '" database="false"><i class="bx bx-x"></i> Hapus</a>';
      html += '</div>';
      html += '</div>';
      $('#itemPengeluaran' + items.length).after(html);
      count_total();
      num_validation();
    });

    $('#listPengeluaran').on('keyup', 'input[name="jumlah[]"]', function() {
      count_total();
    });

    $("#listPengeluaran").on("change", ".num_validation", function() {
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

    $("#listPengeluaran").on("click", ".btnHapusItem", function() {
      var database = $(this).attr("database");
      var nomor = $(this).attr("data-no");
      if (database == 'false') {
        $('#itemPengeluaran' + nomor).remove();
        count_total()
      } else {
        Swal.fire({
          html: `Data ini ada di database, Apakah Anda yakin menghapus data ini?`,
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
              url: '<?= base_url('keuangan/proses?act=delete_itemPengeluaran') ?>',
              type: 'POST',
              data: {
                id: id,
              },
              dataType: 'JSON',
              success: function(result) {
                console.log(nomor)
                $('#itemPengeluaran' + nomor).remove();
                count_total()
              }
            });
          }
        });
      }
    });

    $('#listFile').on('click', ".btnFile", function(event) {
      event.preventDefault();
      Swal.fire({
        html: `Apakah Anda yakin menghapus gambar ini?`,
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
          var file = $(this).attr("data-file");
          var no = $(this).attr("data-no");
          $.ajax({
            url: '<?= base_url() ?>keuangan/proses?act=delete_file',
            type: 'POST',
            data: {
              id: id,
              file: file
            },
            dataType: 'JSON',
            success: function(result) {
              $('#file' + no).remove();
            }
          });
        }
      });
    });

    $("#formPengeluaran").on('submit', function(event) {
      event.preventDefault();
      var formdata = new FormData(this);
      $.ajax({
        url: '<?= base_url() ?>keuangan/proses?act=update_pengeluaran',
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
              if (name[i] == "fileUpload") {
                $("#validation-" + name[i]).attr("style", "display:block");
              }
              $("#validation-" + name[i]).html(result.errors[name[i]]);
            }
          } else {
            if (result.update == true) {
              var idPengeluaran = $('#idPengeluaran').val();
              window.location.href = "<?= base_url() ?>keuangan/view?id=" + idPengeluaran;
            }
          }
        },
      });
    });
  });
</script>
<?= $this->endSection() ?>