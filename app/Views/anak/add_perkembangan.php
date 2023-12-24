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
          <li class="breadcrumb-item active" aria-current="page"><?= $anak['nama'] ?></li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body p-4">
      <h5 class="card-title">Tambah Perkembangan <?= $anak['nama'] ?></h5>
      <hr />
      <div class="form-body mt-4">
        <form id="formAnak" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12">
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
                  <div class="row">
                    <div class="col-lg-4">
                      <label for="tanggal" class="form-label">Tanggal dan Waktu<span class="text-danger">*</span></label>
                      <div class="input-group">
                        <input class="result form-control" type="text" id="tanggal" name="tanggal" placeholder="Masukkan tanggal dan waktu" value="<?= date("d/m/Y H:m") ?>" required> <span class="input-group-text" id="basic-addon2"><i class="bx bx-calendar-exclamation"></i></span>
                      </div>
                    </div>
                  </div>
                  <div id="validation-tanggal" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="tempat" class="form-label">Tempat<span class="text-danger">*</span></label>
                  <div class="row">
                    <div class="col-lg-6">
                      <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan tempat" required>
                    </div>
                  </div>
                  <div id="validation-tempat" class="invalid-feedback"></div>
                </div>
                <h5 class="card-title">Keadaan Fisik</h5>
                <div class="row">
                  <div class="col-lg-4 mb-3">
                    <label for="tinggiFisik" class="form-label">Tinggi Badan<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tinggiFisik" name="tinggiFisik" placeholder="Masukkan tinggi badan" required>
                    <div id="validation-tinggiFisik" class="invalid-feedback"></div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <label for="beratFisik" class="form-label">Berat Badan<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="beratFisik" name="beratFisik" placeholder="Masukkan berat badan" required>
                    <div id="validation-beratFisik" class="invalid-feedback"></div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <label for="tekananDarahFisik" class="form-label">Tekanan Darah</label>
                    <input type="text" class="form-control" id="tekananDarahFisik" name="tekananDarahFisik" placeholder="Masukkan tekanan darah">
                    <div id="validation-tekananDarahFisik" class="invalid-feedback"></div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <label for="gulaDarahFisik" class="form-label">Gula Darah</label>
                    <input type="text" class="form-control" id="gulaDarahFisik" name="gulaDarahFisik" placeholder="Masukkan gula darah">
                    <div id="validation-gulaDarahFisik" class="invalid-feedback"></div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <label for="kolesterolFisik" class="form-label">Kolesterol</label>
                    <input type="text" class="form-control" id="kolesterolFisik" name="kolesterolFisik" placeholder="Masukkan kolesterol">
                    <div id="validation-kolesterolFisik" class="invalid-feedback"></div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <label for="fungsiParuFisik" class="form-label">Fungsi Paru</label>
                    <input type="text" class="form-control" id="fungsiParuFisik" name="fungsiParuFisik" placeholder="Masukkan fungsi paru">
                    <div id="validation-fungsiParuFisik" class="invalid-feedback"></div>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <label for="keteranganFisik" class="form-label">Keterangan Fisik</label>
                    <textarea name="keteranganFisik" id="keteranganFisik" class="form-control" rows="3" placeholder="Masukkan keterangan fisik"></textarea>
                    <div id="validation-keteranganFisik" class="invalid-feedback"></div>
                  </div>
                </div>
                <h5 class="card-title">Kondisi Mental Pskologis</h5>
                <div class="mb-3">
                  <label for="percayadiri" class="form-label">Kepercayaan Diri</label>
                  <textarea name="percayadiri" id="percayadiri" class="form-control" rows="2" placeholder="Masukkan kepercayaan diri"></textarea>
                  <div id="validation-percayadiri" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="mandiri" class="form-label">Kemandirian Diri</label>
                  <textarea name="mandiri" id="mandiri" class="form-control" rows="2" placeholder="Masukkan kemandirian diri"></textarea>
                  <div id="validation-mandiri" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="disiplin" class="form-label">Kedisiplinan</label>
                  <textarea name="disiplin" id="disiplin" class="form-control" rows="2" placeholder="Masukkan kedisiplinan"></textarea>
                  <div id="validation-disiplin" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="tanggungjawab" class="form-label">Tanggung Jawab</label>
                  <textarea name="tanggungjawab" id="tanggungjawab" class="form-control" rows="2" placeholder="Masukkan tanggung jawab"></textarea>
                  <div id="validation-tanggungjawab" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="keteranganPsikologis" class="form-label">Keterangan Psikologis</label>
                  <textarea name="keteranganPsikologis" id="keteranganPsikologis" class="form-control" rows="3" placeholder="Masukkan keterangan psikologis"></textarea>
                  <div id="validation-keteranganPsikologis" class="invalid-feedback"></div>
                </div>
                <h5 class="card-title">Kondisi Sosial</h5>
                <div class="mb-3">
                  <label for="penyesuaian" class="form-label">Kemampuan penyesuaian diri</label>
                  <textarea name="penyesuaian" id="penyesuaian" class="form-control" rows="2" placeholder="Masukkan penyesuaian diri"></textarea>
                  <div id="validation-penyesuaian" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="kerjasama" class="form-label">Kerjasama</label>
                  <textarea name="kerjasama" id="kerjasama" class="form-control" rows="2" placeholder="Masukkan kerjasama"></textarea>
                  <div id="validation-kerjasama" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="sopan" class="form-label">Sopan Santun</label>
                  <textarea name="sopan" id="sopan" class="form-control" rows="2" placeholder="Masukkan sopan santun"></textarea>
                  <div id="validation-sopan" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="keteranganSosial" class="form-label">Keterangan Sosial</label>
                  <textarea name="keteranganSosial" id="keteranganSosial" class="form-control" rows="3" placeholder="Masukkan keterangan sosial"></textarea>
                  <div id="validation-keteranganSosial" class="invalid-feedback"></div>
                </div>
                <h5 class="card-title">Permasalahan</h5>
                <div class="mb-3">
                  <label for="gambaran" class="form-label">Gambaran secara jelas tentang apa masalahnya, faktor penyebab dan akibatnya</label>
                  <textarea name="gambaran" id="gambaran" class="form-control" rows="2" placeholder="Masukkan gambaran permasalahannya"></textarea>
                  <div id="validation-gambaran" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="penyeselaian" class="form-label">Langkah-langkah pemecahan masalah yang dilakukan</label>
                  <textarea name="penyeselaian" id="penyeselaian" class="form-control" rows="2" placeholder="Masukkan pemecahan masalah"></textarea>
                  <div id="validation-penyeselaian" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="perubahan" class="form-label">Perubahan yang telah dicapai</label>
                  <textarea name="perubahan" id="perubahan" class="form-control" rows="2" placeholder="Masukkan perubahan masalah"></textarea>
                  <div id="validation-perubahan" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <label for="keteranganPermasalahan" class="form-label">Keterangan Permasalahan</label>
                  <textarea name="keteranganPermasalahan" id="keteranganPermasalahan" class="form-control" rows="3" placeholder="Masukkan keterangan permasalahan"></textarea>
                  <div id="validation-keteranganPermasalahan" class="invalid-feedback"></div>
                </div>
              </div>
            </div>
          </div><!--end row-->
          <div class="col-12 mt-3">
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Simpan Data Perkembangan</button>
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
    $('#tanggal').bootstrapMaterialDatePicker({
      format: 'DD/MM/YYYY HH:mm',
    });

    $("#formAnak").on('submit', function(event) {
      event.preventDefault();
      var formdata = new FormData(this);
      $.ajax({
        url: '<?= base_url() ?>anak/proses?act=add_perkembangan',
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