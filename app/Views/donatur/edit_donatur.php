<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Donatur</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Edit Donatur</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-body p-4">
      <h5 class="card-title">Edit Data Donatur</h5>
      <hr />
      <div class="form-body mt-4">
        <form id="formDonatur" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-8">
              <div class="border border-3 p-4 rounded">
                <div class="mb-3">
                  <p class="text-danger">* Wajib diisi</p>
                  <label for="namaDonatur" class="form-label">Nama Donatur<span class="text-danger">*</span></label>
                  <input type="hidden" class="form-control" id="idDonatur" name="idDonatur" value="<?= $donatur['id'] ?>" required>
                  <input type="text" class="form-control" id="namaDonatur" name="namaDonatur" placeholder="Masukkan nama donatur" value="<?= $donatur['nama'] ?>" required>
                  <div id="validation-namaDonatur" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-6">
                      <label for="nohp" class="form-label">Nomor Handphone</label>
                      <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $donatur['nohp'] ?>" placeholder=" Masukkan Nomor Handphone">
                    </div>
                  </div>
                  <div id="validation-nohp" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-12">
                      <label for="alamat" class="form-label">Alamat</label>
                      <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= $donatur['alamat'] ?></textarea>
                    </div>
                  </div>
                  <div id="validation-alamat" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-2">
                      <label for="rt" class="form-label">RT</label>
                      <input type="text" class="form-control" id="rt" name="rt" value="<?= $donatur['rt'] ?>" placeholder="RT">
                    </div>
                    <div class="col-2">
                      <label for="rw" class="form-label">RW</label>
                      <input type="text" class="form-control" id="rw" name="rw" value="<?= $donatur['rw'] ?>" placeholder="RW">
                    </div>
                  </div>
                  <div id="validation-rt" class="invalid-feedback"></div>
                  <div id="validation-rw" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-6">
                      <label for="desa" class="form-label">DESA</label>
                      <input type="text" class="form-control" id="desa" name="desa" value="<?= $donatur['desa'] ?>" placeholder="Masukkan Desa">
                    </div>
                    <div class="col-6">
                      <label for="kecamatan" class="form-label">KECAMATAN</label>
                      <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $donatur['kecamatan'] ?>" placeholder="Masukkan Kecamatan">
                    </div>
                  </div>
                  <div id="validation-desa" class="invalid-feedback"></div>
                  <div id="validation-kecamatan" class="invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-6">
                      <label for="kabupaten" class="form-label">KABUPATEN</label>
                      <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $donatur['kabupaten'] ?>" placeholder="Masukkan Kabupaten">
                    </div>
                    <div class="col-6">
                      <label for="provinsi" class="form-label">PROVINSI</label>
                      <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $donatur['provinsi'] ?>" placeholder="Masukkan provinsi">
                    </div>
                  </div>
                  <div id="validation-kabupaten" class="invalid-feedback"></div>
                  <div id="validation-provinsi" class="invalid-feedback"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                  <div class="col-md-12">
                    <label for="fotoDonatur" class="form-label">Foto Donatur*</label>
                    <?php $gambar = json_decode($donatur['foto']);
                    if (isset($gambar)) : ?>
                      <div class="imageuploadify well" id="listGambar" style="min-height: 0;">
                        <div class="imageuploadify-images-list">
                          <?php $no = 1;
                          foreach ($gambar as $item) : ?>
                            <div class="imageuploadify-container" style="margin: 9px;" id="gambar<?= $no ?>">
                              <button type="button" class="btn btn-danger bx bx-x btnimage" data-id="<?= $donatur['id'] ?>" data-gambar="<?= $item ?>" data-no="<?= $no ?>"></button>
                              <img src="<?= base_url() ?>/uploads/foto_donatur/<?= $item ?>" alt="">
                            </div>
                          <?php $no++;
                          endforeach; ?>
                        </div>
                      </div>
                    <?php endif; ?>
                    <input id="fotoDonatur" class="form-control mt-1" type="file" name="fotoDonatur" accept="image/*">
                    <div id="validation-fotoDonatur" class="invalid-feedback"></div>
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
<script type="text/javascript">
  $(document).ready(function() {

    $('#listGambar').on('click', ".btnimage", function(event) {
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
          var gambar = $(this).attr("data-gambar");
          var no = $(this).attr("data-no");
          $.ajax({
            url: '<?= base_url() ?>donatur/proses?act=delete_foto',
            type: 'POST',
            data: {
              id: id,
              gambar: gambar
            },
            dataType: 'JSON',
            success: function(result) {
              $('#gambar' + no).remove();
            }
          });
        }
      });
    });

    $("#formDonatur").on('submit', function(event) {
      event.preventDefault();
      var formdata = new FormData(this);
      $.ajax({
        url: '<?= base_url() ?>donatur/proses?act=update_donatur',
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
              window.location.href = "<?= base_url('donatur/profile?id=' . $donatur['id'] . '') ?>";
            }
          }
        },
      });
    });
  });
</script>
<?= $this->endSection() ?>