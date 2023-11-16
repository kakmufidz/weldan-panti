<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link href="<?= base_url() ?>/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Anak</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Anak Asuh</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body p-4">
      <h5 class="card-title">Tambah Anak Asuh</h5>
      <hr />
      <div class="form-body mt-4">
        <form id="formAnak" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-8">
              <div class="border border-3 p-4 rounded">
                <div class="mb-3">
                  <p class="text-danger">* Wajib diisi</p>
                  <label for="nipAnak" class="form-label">Nomor Induk Panti*</label>
                  <input type="text" class="form-control" id="nipAnak" name="nipAnak" placeholder="Masukkan NIP anak" required>
                  <div id="validation-nipAnak" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="namaAnak" class="form-label">Nama Anak*</label>
                  <input type="text" class="form-control" id="namaAnak" name="namaAnak" placeholder="Masukkan nama anak" required>
                  <div id="validation-namaAnak" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="tempatLahir" class="form-label">Tempat & Tanggal Lahir*</label>
                  <div class="row">
                    <div class="col-5">
                      <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Masukkan tempat lahir" required>
                    </div>
                    <div class="col-4">
                      <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Masukkan tanggal lahir" value="<?= date("Y-m-d") ?>" required>
                    </div>
                  </div>
                  <div id="validation-tempatLahir" class="invalid-feedback"></div>
                  <div id="validation-tanggalLahir" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-2">
                      <label for="rt" class="form-label">RT*</label>
                      <input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required>
                    </div>
                    <div class="col-2">
                      <label for="rw" class="form-label">RW*</label>
                      <input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required>
                    </div>
                  </div>
                  <div id="validation-rt" class="invalid-feedback"></div>
                  <div id="validation-rw" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-6">
                      <label for="desa" class="form-label">DESA*</label>
                      <input type="text" class="form-control" id="desa" name="desa" placeholder="Masukkan Desa" required>
                    </div>
                    <div class="col-6">
                      <label for="kecamatan" class="form-label">KECAMATAN*</label>
                      <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukkan Kecamatan" required>
                    </div>
                  </div>
                  <div id="validation-desa" class="invalid-feedback"></div>
                  <div id="validation-kecamatan" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-6">
                      <label for="kabupaten" class="form-label">KABUPATEN*</label>
                      <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Masukkan Kabupaten" required>
                    </div>
                    <div class="col-6">
                      <label for="provinsi" class="form-label">PROVINSI*</label>
                      <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Masukkan provinsi" required>
                    </div>
                  </div>
                  <div id="validation-kabupaten" class="invalid-feedback"></div>
                  <div id="validation-provinsi" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="kategoriAnak" class="form-label">KATEGORI ANAK</label>
                  <select class="form-select" id="kategoriAnak" name="kategoriAnak" aria-label="Default select example">
                    <option value="Yatim">Yatim</option>
                    <option value="Piatu">Piatu</option>
                    <option value="Yatim-Piatu">Yatim-Piatu</option>
                    <option value="Dhuafa">Dhuafa</option>
                  </select>
                  <div id="validation-kategoriAnak" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="statusPanti" class="form-label">STATUS PANTI</label>
                  <select class="form-select" id="statusPanti" name="statusPanti" aria-label="Default select example">
                    <option value="Anak Asuh Mukim">Anak Asuh Mukim</option>
                    <option value="Anak Asuh Luar">Anak Asuh Luar</option>
                  </select>
                  <div id="validation-statusPanti" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="statusAnak" class="form-label">STATUS ANAK</label>
                  <select class="form-select" id="statusAnak" name="statusAnak" aria-label="Default select example">
                    <option value="Aktif">Aktif</option>
                    <option value="Lulus">Lulus</option>
                    <option value="Keluar">Keluar</option>
                    <option value="Dikeluarkan">Dikeluarkan</option>
                  </select>
                  <div id="validation-statusAnak" class="invalid-feedback"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                  <div class="col-md-12">
                    <label for="fotoAnak" class="form-label">Foto Anak*</label>
                    <input id="fotoAnak" class="form-control" type="file" name="fotoAnak" accept="image/*">
                    <div id="validation-fotoAnak" class="invalid-feedback"></div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--end row-->
          <div class="col-12 mt-3">
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Simpan Data Anak</button>
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
<script type="text/javascript">
  $(document).ready(function() {
    $("#formAnak").on('submit', function(event) {
      event.preventDefault();
      var formdata = new FormData(this);
      $.ajax({
        url: '<?= base_url() ?>/anak/proses?act=add_anak',
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
              if (name[i] == "fotoAnak") {
                $("#validation-" + name[i]).attr("style", "display:block");
              }
              $("#validation-" + name[i]).html(result.errors[name[i]]);
            }
          } else {
            if (result.insert == true) {
              window.location.href = "<?= base_url('anak') ?>";
            }
          }
        },
      });
    });
  });
</script>
<?= $this->endSection() ?>