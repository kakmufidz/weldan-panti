<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
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
          <li class="breadcrumb-item active" aria-current="page"><?= $anak['nama'] ?></li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body p-4">
      <h5 class="card-title">Edit Orang Tua <?= $anak['nama'] ?></h5>
      <hr />
      <div class="form-body mt-4">
        <form id="formOrtu" enctype="multipart/form-data">
          <input type="hidden" id="idAnak" name="idAnak" value="<?= $anak['id'] ?>" required>
          <input type="hidden" id="nipAnak" name="nipAnak" value="<?= $anak['nip'] ?>" required>
          <input type="hidden" id="idOrtu" name="idOrtu" value="<?= (isset($orangtua['id'])) ? $orangtua['id'] : "" ?>" required>
          <div class="row">
            <p class="text-danger">* Wajib diisi</p>
            <div class="col-lg-6 p-3 border rounded">
              <h5 class="card-title">Ayah</h5>
              <div class="mb-3">
                <label for="namaAyah" class="form-label">Nama Ayah<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="namaAyah" name="namaAyah" value="<?= (isset($orangtua['nama_ayah'])) ? $orangtua['nama_ayah'] : "" ?>" required>
                <div id="validation-namaAyah" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label for="pekerjaanAyah" class="form-label">Pekerjaan Ayah</label>
                <input type="text" class="form-control" id="pekerjaanAyah" name="pekerjaanAyah" value="<?= (isset($orangtua['pekerjaan_ayah'])) ? $orangtua['pekerjaan_ayah'] : "" ?>">
                <div id="validation-pekerjaanAyah" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label for="agamaAyah" class="form-label">Agama Ayah</label>
                <input type="text" class="form-control" id="agamaAyah" name="agamaAyah" value="<?= (isset($orangtua['agama_ayah'])) ? $orangtua['agama_ayah'] : "" ?>">
                <div id="validation-agamaAyah" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label for="hpAyah" class="form-label">Nomor HP Ayah</label>
                <input type="text" class="form-control" id="hpAyah" name="hpAyah" value="<?= (isset($orangtua['hp_ayah'])) ? $orangtua['hp_ayah'] : "" ?>">
                <div id="validation-hpAyah" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label for="tempatLahirAyah" class="form-label">Tempat & Tanggal Lahir</label>
                <div class="row">
                  <div class="col-5">
                    <input type="text" class="form-control" id="tempatLahirAyah" name="tempatLahirAyah" value="<?= (isset($orangtua['tempatlahir_ayah'])) ? $orangtua['tempatlahir_ayah'] : "" ?>">
                  </div>
                  <div class="col-4">
                    <div class="input-group mb-3">
                      <input class="result form-control tanggal" type="text" id="tanggalLahirAyah" name="tanggalLahirAyah" placeholder="Tanggal" value="<?= (isset($orangtua['tgllahir_ayah'])) ? date("d/m/Y", strtotime($orangtua['tgllahir_ayah'])) : "" ?>"> <span class="input-group-text" id="basic-addon2"><i class="bx bx-calendar-exclamation"></i></span>
                    </div>
                  </div>
                </div>
                <div id="validation-tempatLahirAyah" class="invalid-feedback"></div>
                <div id="validation-tanggalLahirAyah" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-2">
                    <label for="rtAyah" class="form-label">RT</label>
                    <input type="text" class="form-control" id="rtAyah" name="rtAyah" value="<?= (isset($orangtua['rt_ayah'])) ? $orangtua['rt_ayah'] : "" ?>">
                  </div>
                  <div class="col-2">
                    <label for="rwAyah" class="form-label">RW</label>
                    <input type="text" class="form-control" id="rwAyah" name="rwAyah" value="<?= (isset($orangtua['rw_ayah'])) ? $orangtua['rw_ayah'] : "" ?>">
                  </div>
                </div>
                <div id="validation-rtAyah" class="invalid-feedback"></div>
                <div id="validation-rwAyah" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-6">
                    <label for="desaAyah" class="form-label">DESA</label>
                    <input type="text" class="form-control" id="desaAyah" name="desaAyah" value="<?= (isset($orangtua['desa_ayah'])) ? $orangtua['desa_ayah'] : "" ?>">
                  </div>
                  <div class="col-6">
                    <label for="kecamatanAyah" class="form-label">KECAMATAN</label>
                    <input type="text" class="form-control" id="kecamatanAyah" name="kecamatanAyah" value="<?= (isset($orangtua['kecamatan_ayah'])) ? $orangtua['kecamatan_ayah'] : "" ?>">
                  </div>
                </div>
                <div id="validation-desaAyah" class="invalid-feedback"></div>
                <div id="validation-kecamatanAyah" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-6">
                    <label for="kabupatenAyah" class="form-label">KABUPATEN</label>
                    <input type="text" class="form-control" id="kabupatenAyah" name="kabupatenAyah" value="<?= (isset($orangtua['kabupaten_ayah'])) ? $orangtua['kabupaten_ayah'] : "" ?>">
                  </div>
                  <div class="col-6">
                    <label for="provinsiAyah" class="form-label">PROVINSI</label>
                    <input type="text" class="form-control" id="provinsiAyah" name="provinsiAyah" value="<?= (isset($orangtua['provinsi_ayah'])) ? $orangtua['provinsi_ayah'] : "" ?>">
                  </div>
                </div>
                <div id="validation-kabupatenAyah" class="invalid-feedback"></div>
                <div id="validation-provinsiAyah" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="col-lg-6 p-3 border rounded">
              <h5 class="card-title">Ibu</h5>
              <div class="mb-3">
                <label for="namaIbu" class="form-label">Nama Ibu<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="namaIbu" name="namaIbu" value="<?= (isset($orangtua['nama_ibu'])) ? $orangtua['nama_ibu'] : "" ?>" required>
                <div id="validation-namaIbu" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label for="pekerjaanIbu" class="form-label">Pekerjaan Ibu</label>
                <input type="text" class="form-control" id="pekerjaanIbu" name="pekerjaanIbu" value="<?= (isset($orangtua['pekerjaan_ibu'])) ? $orangtua['pekerjaan_ibu'] : "" ?>">
                <div id="validation-pekerjaanIbu" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label for="agamaIbu" class="form-label">Agama Ibu</label>
                <input type="text" class="form-control" id="agamaIbu" name="agamaIbu" value="<?= (isset($orangtua['agama_ibu'])) ? $orangtua['agama_ibu'] : "" ?>">
                <div id="validation-agamaIbu" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label for="hpIbu" class="form-label">Nomor HP Ibu</label>
                <input type="text" class="form-control" id="hpIbu" name="hpIbu" value="<?= (isset($orangtua['hp_ibu'])) ? $orangtua['hp_ibu'] : "" ?>">
                <div id="validation-hpIbu" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label for="tempatLahirIbu" class="form-label">Tempat & Tanggal Lahir</label>
                <div class="row">
                  <div class="col-5">
                    <input type="text" class="form-control" id="tempatLahirIbu" name="tempatLahirIbu" value="<?= (isset($orangtua['tempatlahir_ibu'])) ? $orangtua['tempatlahir_ibu'] : "" ?>">
                  </div>
                  <div class="col-4">
                    <div class="input-group mb-3">
                      <input class="result form-control tanggal" type="text" id="tanggalLahirIbu" name="tanggalLahirIbu" placeholder="Tanggal" value="<?= (isset($orangtua['tgllahir_ibu'])) ? date("d/m/Y", strtotime($orangtua['tgllahir_ibu'])) : "" ?>"> <span class="input-group-text" id="basic-addon2"><i class="bx bx-calendar-exclamation"></i></span>
                    </div>
                  </div>
                </div>
                <div id="validation-tempatlahir_ibu" class="invalid-feedback"></div>
                <div id="validation-tanggalLahirIbu" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-2">
                    <label for="rtIbu" class="form-label">RT</label>
                    <input type="text" class="form-control" id="rtIbu" name="rtIbu" value="<?= (isset($orangtua['rt_ibu'])) ? $orangtua['rt_ibu'] : "" ?>">
                  </div>
                  <div class="col-2">
                    <label for="rwIbu" class="form-label">RW</label>
                    <input type="text" class="form-control" id="rwIbu" name="rwIbu" value="<?= (isset($orangtua['rw_ibu'])) ? $orangtua['rw_ibu'] : "" ?>">
                  </div>
                </div>
                <div id="validation-rtIbu" class="invalid-feedback"></div>
                <div id="validation-rwIbu" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-6">
                    <label for="desaIbu" class="form-label">DESA</label>
                    <input type="text" class="form-control" id="desaIbu" name="desaIbu" value="<?= (isset($orangtua['desa_ibu'])) ? $orangtua['desa_ibu'] : "" ?>">
                  </div>
                  <div class="col-6">
                    <label for="kecamatanIbu" class="form-label">KECAMATAN</label>
                    <input type="text" class="form-control" id="kecamatanIbu" name="kecamatanIbu" value="<?= (isset($orangtua['kecamatan_ibu'])) ? $orangtua['kecamatan_ibu'] : "" ?>">
                  </div>
                </div>
                <div id="validation-desaIbu" class="invalid-feedback"></div>
                <div id="validation-kecamatanIbu" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-6">
                    <label for="kabupatenIbu" class="form-label">KABUPATEN</label>
                    <input type="text" class="form-control" id="kabupatenIbu" name="kabupatenIbu" value="<?= (isset($orangtua['kabupaten_ibu'])) ? $orangtua['kabupaten_ibu'] : "" ?>">
                  </div>
                  <div class="col-6">
                    <label for="provinsiIbu" class="form-label">PROVINSI</label>
                    <input type="text" class="form-control" id="provinsiIbu" name="provinsiIbu" value="<?= (isset($orangtua['provinsi_ibu'])) ? $orangtua['provinsi_ibu'] : "" ?>">
                  </div>
                </div>
                <div id="validation-kabupatenIbu" class="invalid-feedback"></div>
                <div id="validation-provinsiIbu" class="invalid-feedback"></div>
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
<script src="<?= base_url() ?>assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.tanggal').bootstrapMaterialDatePicker({
      format: 'DD/MM/YYYY',
      time: false,
    });

    $("#formOrtu").on('submit', function(event) {
      event.preventDefault();
      var formdata = new FormData(this);
      $.ajax({
        url: '<?= base_url() ?>/anak/proses?act=update_ortu',
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
              $("#validation-" + name[i]).html(result.errors[name[i]]);
            }
          } else {
            if (result.update == true) {
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