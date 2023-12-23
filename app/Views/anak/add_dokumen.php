<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Anak</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Dokumen <?= $anak['nama'] ?></li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body p-4">
      <h5 class="card-title">Tambah Dokumen <?= $anak['nama'] ?></h5>
      <hr />
      <div class="form-body mt-4">
        <form id="formAnak" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-8">
              <div class="border border-3 p-4 rounded">
                <div class="mb-3">
                  <p class="text-danger">* Wajib diisi</p>
                  <label for="nipAnak" class="form-label">Nomor Induk Panti<span class="text-danger">*</span></label>
                  <input type="hidden" class="form-control" id="idAnak" name="idAnak" placeholder="Masukkan NIP anak" value="<?= $anak['id'] ?>" required>
                  <input type="text" class="form-control" id="nipAnak" name="nipAnak" placeholder="Masukkan NIP anak" value="<?= $anak['nip'] ?>" required readonly>
                  <div id="validation-nipAnak" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="namaAnak" class="form-label">Nama Anak<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="namaAnak" name="namaAnak" placeholder="Masukkan nama anak" value="<?= $anak['nama'] ?>" required readonly>
                  <div id="validation-namaAnak" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="judulDokumen" class="form-label">Judul Dokumen<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="judulDokumen" name="judulDokumen" placeholder="Masukkan judul dokumen" required>
                  <div id="validation-judulDokumen" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="file" class="form-label">File<span class="text-danger">*</span></label>
                  <input id="file" class="form-control" type="file" name="file">
                  <div id="validation-file" class="invalid-feedback"></div>
                </div>
              </div>
            </div>
          </div><!--end row-->
          <div class="col-12 mt-3">
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Simpan Data Dokumen</button>
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
  $(document).ready(function() {
    $('#tanggalDokumen').bootstrapMaterialDatePicker({
      format: 'DD/MM/YYYY',
      time: false,
    });

    $("#formAnak").on('submit', function(event) {
      event.preventDefault();
      var formdata = new FormData(this);
      $.ajax({
        url: '<?= base_url() ?>anak/proses?act=add_dokumen',
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
              if (name[i] == "file") {
                $("#validation-" + name[i]).attr("style", "display:block");
              }
              $("#validation-" + name[i]).html(result.errors[name[i]]);
            }
          } else {
            if (result.insert == true) {
              var nipAnak = $('#nipAnak').val();
              window.location.href = "<?= base_url() ?>anak/profile?nip=" + nipAnak;
            }
          }
        },
      });
    });
  });
</script>
<?= $this->endSection() ?>