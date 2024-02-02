<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Akun</div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body p-4">
      <div class="form-body">
        <form id="formAkun" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12">
              <div class="border border-3 p-4 rounded">
                <div class="mb-3">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" required>
                      <div id="validation-nama" class="invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
                      <div id="validation-email" class="invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <label for="no_hp" class="form-label">No HP<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $user['telp'] ?>" required>
                      <div id="validation-no_hp" class="invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <label for="password_lama" class="form-label">Password Lama<span class="text-danger">*</span></label>
                      <input type="password" class="form-control password" id="password_lama" name="password_lama" required>
                      <div id="validation-password_lama" class="invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <label for="password_baru" class="form-label">Password Baru<span class="text-danger">*</span></label>
                      <input type="password" class="form-control password" id="password_baru" name="password_baru" required>
                      <div id="validation-password_baru" class="invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-lg-6 col-md-12">
                      <label for="password_ulang" class="form-label">Ulangi Password Baru<span class="text-danger">*</span></label>
                      <input type="password" class="form-control password" id="password_ulang" name="password_ulang" required>
                      <div id="validation-password_ulang" class="invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <input type="checkbox" class="form-check-input" id="showHidePassword">
                  <label class="form-check-label" for="showHidePassword">Lihat password</label>
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
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script type="text/javascript">
  $(document).ready(function() {
    $("#showHidePassword").on('change', function(event) {
      var isChecked = $(this).prop('checked');
      if (isChecked == true) {
        $('.password').attr('type', 'text');
      } else {
        $('.password').attr('type', 'password');
      }
    });

    $("#formAkun").on('submit', function(event) {
      event.preventDefault();

      $(".password").attr("class", "form-control password");
      $(".invalid-feedback").attr("style", "display:block");
      $(".invalid-feedback").html("");

      var password = $("#password_baru").val();
      var re_password = $("#password_ulang").val();
      if (password != re_password) {
        $("[name=password_ulang]").attr("class", "form-control password is-invalid");
        $("#validation-password_ulang").attr("style", "display:block");
        $("#validation-password_ulang").html("Password tidak cocok");
        $("[name=password_baru]").attr("class", "form-control password is-invalid");
        $("#validation-password_baru").attr("style", "display:block");
        $("#validation-password_baru").html("Password tidak cocok");
      } else {
        var formdata = new FormData(this);
        $.ajax({
          url: '<?= base_url() ?>akun/proses?act=update',
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
                if (notempty[i] == "password_lama" || notempty[i] == "password_baru" || notempty[i] == "password_ulang") {
                  $("[name=" + notempty[i] + "]").attr("class", "form-control password");
                } else {
                  $("[name=" + notempty[i] + "]").attr("class", "form-control");
                }
                $("#validation-" + notempty[i]).html('');
                $("#validation-" + name[i]).css("display", "none");
              }
              for (i = 0; i < name.length; i++) {
                if (notempty[i] == "password_lama" || notempty[i] == "password_baru" || notempty[i] == "password_ulang") {
                  $("[name=" + name[i] + "]").attr("class", "form-control password is-invalid");
                } else {
                  $("[name=" + name[i] + "]").attr("class", "form-control is-invalid");
                }
                $("#validation-" + name[i]).attr("class", "invalid-feedback");
                if (name[i] == "fileUpload") {
                  $("#validation-" + name[i]).attr("style", "display:block");
                }
                $("#validation-" + name[i]).html(result.errors[name[i]]);
                $("#validation-" + name[i]).css("display", "block");
              }
            } else {
              if (result.update == true) {
                window.location.href = "<?= base_url('akun') ?>";
              }
            }
          },
        });
      }
    });
  });
</script>
<?= $this->endSection() ?>