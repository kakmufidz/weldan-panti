<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link href="<?= base_url() ?>assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Profile Anak</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Profile Anak</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="container">
    <div class="main-body">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <?php $gambar = json_decode($anak['foto']);
                if (isset($gambar)) :
                  if (sizeof($gambar) != 0) : ?>
                    <img src="<?= base_url() ?>uploads/foto_anak/<?= $gambar[0] ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="200" height="200" style="object-fit: cover;">
                  <?php else : ?>
                    <img src="<?= base_url() ?>images/default-product.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="200" height="200" style="object-fit: cover;">
                  <?php endif; ?>
                <?php else : ?>
                  <img src="<?= base_url() ?>images/default-product.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="200" height="200" style="object-fit: cover;">
                <?php endif; ?>
                <div class="mt-3">
                  <h4>NIP: <?= $anak['nip'] ?><br><?= $anak['nama'] ?></h4>
                  <p class="text-secondary mb-1"><?= $anak['status_anak'] . ", " . $anak['status_panti'] ?></p>
                  <?php
                  // The birthdate in the format "YYYY-MM-DD"
                  $birthdate = date("Y-m-d", strtotime($anak['tanggal_lahir']));
                  // Create a DateTime object for the birthdate
                  $birthDate = new DateTime($birthdate);
                  // Get the current date
                  $currentDate = new DateTime();
                  // Calculate the interval between the birthdate and the current date
                  $age = $currentDate->diff($birthDate);
                  // Access the "years" property of the $age object to get the age
                  $ageYears = $age->y;
                  $ageMonths = $age->m;
                  $ageDays = $age->d;
                  ?>
                  <p class="text-muted font-size-sm">Umur: <?= $ageYears ?> Tahun <?= $ageMonths ?> Bulan <?= $ageDays ?> Hari</p>
                  <!-- <button class="btn btn-primary">Follow</button>
									<button class="btn btn-outline-primary">Message</button> -->
                </div>
              </div>
              <hr class="my-4" />
              <div class="d-flex flex-column align-items-center text-center">
                <a href="<?= base_url() ?>anak/edit?nip=<?= $anak['nip'] ?>" class="btn btn-primary px-5 radius-30"><i class='bx bxs-edit'></i> Edit Profile</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="tempatLahir" class="form-label">Tempat & Tanggal Lahir*</label>
                <div class="row">
                  <div class="col-5">
                    <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="<?= $anak['tempat_lahir'] ?>" placeholder="Masukkan tempat lahir" required disabled>
                  </div>
                  <div class="col-4">
                    <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="<?= date("Y-m-d", strtotime($anak['tanggal_lahir'])) ?>" placeholder="Masukkan tanggal lahir" value="<?= date("Y-m-d") ?>" required disabled>
                  </div>
                </div>
                <div id="validation-tempatLahir" class="invalid-feedback"></div>
                <div id="validation-tanggalLahir" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-2">
                    <label for="rt" class="form-label">RT*</label>
                    <input type="text" class="form-control" id="rt" name="rt" value="<?= $anak['rt'] ?>" placeholder="RT" required disabled>
                  </div>
                  <div class="col-2">
                    <label for="rw" class="form-label">RW*</label>
                    <input type="text" class="form-control" id="rw" name="rw" value="<?= $anak['rw'] ?>" placeholder="RW" required disabled>
                  </div>
                </div>
                <div id="validation-rt" class="invalid-feedback"></div>
                <div id="validation-rw" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-6">
                    <label for="desa" class="form-label">DESA*</label>
                    <input type="text" class="form-control" id="desa" name="desa" value="<?= $anak['desa'] ?>" placeholder="Masukkan Desa" required disabled>
                  </div>
                  <div class="col-6">
                    <label for="kecamatan" class="form-label">KECAMATAN*</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $anak['kecamatan'] ?>" placeholder="Masukkan Kecamatan" required disabled>
                  </div>
                </div>
                <div id="validation-desa" class="invalid-feedback"></div>
                <div id="validation-kecamatan" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-6">
                    <label for="kabupaten" class="form-label">KABUPATEN*</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $anak['kabupaten'] ?>" placeholder="Masukkan Kabupaten" required disabled>
                  </div>
                  <div class="col-6">
                    <label for="provinsi" class="form-label">PROVINSI*</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $anak['provinsi'] ?>" placeholder="Masukkan provinsi" required disabled>
                  </div>
                </div>
                <div id="validation-kabupaten" class="invalid-feedback"></div>
                <div id="validation-provinsi" class="invalid-feedback"></div>
              </div>
              <div class="mb-3">
                <label for="kategoriAnak" class="form-label">KATEGORI ANAK</label>
                <select class="form-select" id="kategoriAnak" name="kategoriAnak" aria-label="Default select example" disabled>
                  <?php $kategori = ['Yatim', 'Piatu', 'Yatim-Piatu', 'Dhuafa'];
                  foreach ($kategori as $value) :
                    $select = ($value == $anak['kategori_anak']) ? "selected" : "";
                  ?>
                    <option value="<?= $value ?>" <?= $select ?>><?= $value ?></option>
                  <?php endforeach; ?>
                </select>
                <div id="validation-kategoriAnak" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs nav-success" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" data-bs-toggle="tab" href="#dokumenAnak" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                      <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                      </div>
                      <div class="tab-title">Dokumen Anak</div>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="tab-content py-3">
                <div class="tab-pane fade active show" id="dokumenAnak" role="tabpanel">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <a href="<?= base_url() ?>anak/addDokumen?nip=<?= $anak['nip'] ?>" class="btn btn-primary ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Data"><i class="bx bx-plus me-0"></i> Tambah Dokumen</a>
                    </div>
                  </div>
                  <div class="table-responsive mt-3">
                    <table id="example2" class="table align-middle mb-0">
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 5%;">#</th>
                          <th class="text-center" style="width: 50%;">JUDUL DOKUMEN</th>
                          <th class="text-center" style="width: 35%;">FILE</th>
                          <th class="text-center" style="width: 10%;">AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        if (!empty($dokumen_anak)) :
                          foreach ($dokumen_anak as $dokumen) :
                        ?>
                            <tr>
                              <td class="text-center"><?= $no ?></td>
                              <td class="text-start"><?= $dokumen['judul'] ?></td>
                              <td class="text-start">
                                <?php $file = $dokumen['file'];
                                if (isset($file)) : ?>
                                  <div class="imageuploadify well mt-3" id="listFile" style="min-height: 0; border:0px;">
                                    <div class="imageuploadify-images-list" style="align-self: center;">
                                      <?php $extension = pathinfo($file, PATHINFO_EXTENSION); ?>
                                      <div class="imageuploadify-container" style="margin: 9px;" id="file<?= $no ?>">
                                        <?php if (in_array($extension, ["jpg", "png", "jpeg", "webp"])) : ?>
                                          <a target="_blank" href="<?= base_url() ?>uploads/dokumen_anak/<?= $file ?>"><img src="<?= base_url() ?>uploads/dokumen_anak/<?= $file ?>" alt="File Dokumen"></a>
                                        <?php else : ?>
                                          <a href="<?= base_url() ?>uploads/dokumen_anak/<?= $file ?>"><img src="<?= base_url() ?>uploads/dokumen_anak/document.jpg" alt="File Dokumen"></a>
                                        <?php endif; ?>
                                      </div>
                                    </div>
                                  </div>
                                <?php endif; ?>
                              </td>
                              <td class="text-start">
                                <a href="javascript:;" class="text-danger ms-3 btnHapus" data-id="<?= $dokumen['id'] ?>"><i class='bx bxs-trash'></i></a>
                              </td>
                            </tr>
                        <?php $no++;
                          endforeach;
                        endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script type="text/javascript">
  $(document).ready(function() {

    $("#dokumenAnak").on("click", ".btnHapus", function() {
      Swal.fire({
        html: `Apakah Anda yakin menghapus dokumen ini?`,
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
            url: '<?= base_url('anak/proses?act=delete_dokumen') ?>',
            type: 'POST',
            data: {
              id: id,
            },
            dataType: 'JSON',
            success: function(result) {
              window.location.reload();
            }
          });
        }
      });
    });

  });
</script>
<?= $this->endSection() ?>