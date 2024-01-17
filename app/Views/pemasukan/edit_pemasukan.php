<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pemasukan</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Edit Data Pemasukan</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body p-4">
      <h5 class="card-title">Edit Data Pemasukan</h5>
      <hr />
      <div class="form-body mt-4">
        <form id="formPemasukan" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12">
              <div class="border border-3 p-4 rounded">
                <div class="mb-3">
                  <div class="row">
                    <div class="col-4">
                      <p class="text-danger">* Wajib diisi</p>
                      <label for="tanggal" class="form-label">Tanggal<span class="text-danger">*</span></label>
                      <div class="input-group mb-3">
                        <input type="text" id="idPemasukan" name="idPemasukan" value="<?= $pemasukan['id'] ?>" hidden>
                        <input class="result form-control" type="text" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pemasukan" value="<?= date("d/m/Y", strtotime($pemasukan['tanggal_pemasukan'])) ?>" required> <span class="input-group-text" id="basic-addon2"><i class="bx bx-calendar-exclamation"></i></span>
                      </div>
                    </div>
                  </div>
                  <div id="validation-tanggal" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <?php
                  $sumber = ($pemasukan == "sumber")
                  ?>
                  <label class="form-label">Sumber Pemasukan<span class="text-danger">*</span></label>
                  <select class="form-control" id="sumberPemasukan" name="sumberPemasukan" required="true">
                    <option value="sumber-donatur" <?= ($pemasukan['sumber'] == "sumber-donatur") ? "selected" : ""; ?>>Donatur</option>
                    <option value="sumber-lain" <?= ($pemasukan['sumber'] != "sumber-donatur") ? "selected" : ""; ?>>Sumber Lainnya</option>
                  </select>
                  <div id="validation-sumberPemasukan" class="invalid-feedback"></div>
                </div>
                <div class="mb-3" id="formSumberLainnya">
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="sumberLainnya" name="sumberLainnya" placeholder="Masukkan sumber lainnya" value="<?= $pemasukan['nama'] ?>">
                    </div>
                  </div>
                  <div id="validation-sumberLainnya" class="invalid-feedback"></div>
                </div>
                <div class="mb-3" id="formSumberDonatur" style="display: block;">
                  <label class="form-label">Nama Donatur<span class="text-danger">*</span></label>
                  <select class="single-select form-control" id="idDonatur" name="idDonatur">
                    <option></option>
                    <option value="donatur-baru">Tambah Donatur Baru (jika belum tersedia)</option>
                    <?php foreach ($alldonatur as $data) : ?>
                      <option value="<?= $data['id'] ?>" <?= ($data['id'] == $pemasukan['id_donatur']) ? "selected" : "" ?>>
                        <?= $data['nama'] .  ((isset($data['nohp']) && !empty($data['nohp'])) ? " (" . $data['nohp'] . ") " : "") . " - "  ?>
                        <?= ((isset($data['alamat']) && !empty($data['alamat'])) ? $data['alamat'] : "")
                          . ((isset($data['desa']) && !empty($data['desa'])) ? $data['desa'] : "")
                          . ((isset($data['rt']) && !empty($data['rt'])) ? " RT" . $data['rt'] : "")
                          . ((isset($data['rw']) && !empty($data['rw']))  ? " RW" . $data['rw'] : "")
                          . ((isset($data['kecamatan']) && !empty($data['kecamatan']))  ? ", Kec. " . $data['kecamatan'] : "")
                          . ((isset($data['kabupaten']) && !empty($data['kabupaten']))  ? ", Kab. " . $data['kabupaten'] : "")
                          . ((isset($data['provinsi']) && !empty($data['provinsi']))  ? " - " . $data['provinsi'] : "");
                        ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div id="validation-idDonatur" class="invalid-feedback"></div>
                </div>
                <div class="mb-3" id="btnTambahDonatur" style="display: none;">
                  <a href="<?= base_url() ?>donatur/tambah_donatur" class="btn btn-primary px-5 radius-30">Tambah Donatur Baru</a>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-6">
                      <label for="jumlah" class="form-label">Jumlah<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah pemasukan" value="<?= $pemasukan['jumlah'] ?>" required>
                    </div>
                  </div>
                  <div id="validation-jumlah" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-12">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"><?= $pemasukan['keterangan'] ?></textarea>
                    </div>
                  </div>
                  <div id="validation-Keterangan" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="col-md-12">
                    <label for="fileUpload" class="form-label">File Upload</label>
                    <?php $file = json_decode($pemasukan['file']);
                    if (isset($file)) :
                      if (sizeof($file) != 0) : ?>
                        <div class="imageuploadify well" id="listFile" style="min-height: 0;">
                          <div class="imageuploadify-images-list">
                            <?php $no = 1;
                            foreach ($file as $item) : ?>
                              <?php $extension = pathinfo($item, PATHINFO_EXTENSION); ?>
                              <div class="imageuploadify-container" style="margin: 9px;" id="file<?= $no ?>">
                                <button type="button" class="btn btn-danger bx bx-x btnimage" data-id="<?= $pemasukan['id'] ?>" data-file="<?= $item ?>" data-no="<?= $no ?>"></button>
                                <?php if (in_array($extension, ["jpg", "png", "jpeg", "webp"])) : ?>
                                  <a target="_blank" href="<?= base_url() ?>uploads/file_pemasukan/<?= $item ?>"><img src="<?= base_url() ?>uploads/file_pemasukan/<?= $item ?>" alt="File Pemasukan"></a>
                                <?php else : ?>
                                  <a href="<?= base_url() ?>uploads/file_pemasukan/<?= $item ?>"><img src="<?= base_url() ?>uploads/file_pemasukan/document.jpg" alt="File Pemasukan"></a>
                                <?php endif; ?>
                              </div>
                            <?php $no++;
                            endforeach; ?>
                          </div>
                        </div>
                    <?php endif;
                    endif; ?>
                    <input id="fileUpload" class="form-control <?= (isset($file)) ? ((sizeof($file) != 0) ? "mt-3" : "") : "" ?>" type="file" name="fileUpload">
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
<script src="<?= base_url() ?>assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
<script type="text/javascript">
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


    $('#listFile').on('click', ".btnimage", function(event) {
      event.preventDefault();
      Swal.fire({
        html: `Apakah Anda yakin menghapus file ini?`,
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
            url: '<?= base_url() ?>pemasukan/proses?act=delete_file',
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

    $("#formPemasukan").on('submit', function(event) {
      event.preventDefault();
      var formdata = new FormData(this);
      $.ajax({
        url: '<?= base_url() ?>pemasukan/proses?act=update_pemasukan',
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
              $("#validation-" + name[i]).html(result.errors[name[i]]);
              $("#validation-" + name[i]).css("display", "block");
            }
            $('select').css("display", "none");
          } else {
            if (result.update == true) {
              window.location.href = "<?= base_url('pemasukan') ?>";
            }
          }
        },
      });
    });
  });
</script>
<?= $this->endSection() ?>