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
                  <p class="text-muted font-size-sm"><?= umur($anak['tanggal_lahir']) ?></p>
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
              <div class="">
                <label for="tempatLahir" class="form-label">Tempat & Tanggal Lahir*</label>
                <div class="row">
                  <div class="col-lg-5 mb-3">
                    <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="<?= $anak['tempat_lahir'] ?>" placeholder="Masukkan tempat lahir" required disabled>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <input type="text" class="form-control" id="tanggalLahir" name="tanggalLahir" value="<?= tgl_indo(date("Y-m-d", strtotime($anak['tanggal_lahir']))) ?>" placeholder="Masukkan tanggal lahir" required disabled>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-lg-2">
                    <label for="rt" class="form-label">RT*</label>
                    <input type="text" class="form-control" id="rt" name="rt" value="<?= $anak['rt'] ?>" placeholder="RT" required disabled>
                  </div>
                  <div class="col-lg-2">
                    <label for="rw" class="form-label">RW*</label>
                    <input type="text" class="form-control" id="rw" name="rw" value="<?= $anak['rw'] ?>" placeholder="RW" required disabled>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-lg-6">
                    <label for="desa" class="form-label">DESA*</label>
                    <input type="text" class="form-control" id="desa" name="desa" value="<?= $anak['desa'] ?>" placeholder="Masukkan Desa" required disabled>
                  </div>
                  <div class="col-lg-6">
                    <label for="kecamatan" class="form-label">KECAMATAN*</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $anak['kecamatan'] ?>" placeholder="Masukkan Kecamatan" required disabled>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col-lg-6">
                    <label for="kabupaten" class="form-label">KABUPATEN*</label>
                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= $anak['kabupaten'] ?>" placeholder="Masukkan Kabupaten" required disabled>
                  </div>
                  <div class="col-lg-6">
                    <label for="provinsi" class="form-label">PROVINSI*</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $anak['provinsi'] ?>" placeholder="Masukkan provinsi" required disabled>
                  </div>
                </div>
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
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-bs-toggle="tab" href="#perkembanganAnak" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                      <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                      </div>
                      <div class="tab-title">Perkembangan Anak</div>
                    </div>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" data-bs-toggle="tab" href="#orangtua" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                      <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                      </div>
                      <div class="tab-title">Orang Tua</div>
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
                <div class="tab-pane fade show" id="perkembanganAnak" role="tabpanel">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <a href="<?= base_url() ?>anak/addPerkembangan?nip=<?= $anak['nip'] ?>" class="btn btn-primary ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Data"><i class="bx bx-plus me-0"></i> Tambah Perkembangan</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Monitoring Perkembangan Anak</h5>
                    <hr>
                    <div class="accordion" id="accordionExample">
                      <?php $no_kembang = 1;
                      if (!empty($perkembangan_anak)) :
                        foreach ($perkembangan_anak as $kembang) :
                      ?>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="<?= $kembang['id'] ?>">
                              <button class="accordion-button <?= ($no_kembang == 1) ? "" : "collapsed" ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $kembang['id'] ?>" aria-expanded="<?= ($no_kembang == 1) ? "true" : "false" ?>">
                                <?= date("d/m/Y H:i", strtotime($kembang['waktu_rekam'])) . " di " . $kembang['tempat'] ?>
                              </button>
                            </h2>
                            <div id="collapse<?= $kembang['id'] ?>" class="accordion-collapse collapse <?= ($no_kembang == 1) ? "show" : "" ?>" aria-labelledby="heading<?= $kembang['id'] ?>" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                      <div class="toolbar hidden-print">
                                        <div class="text-end">
                                          <a href="<?= base_url() ?>anak/editPerkembangan?id=<?= $kembang['id'] ?>" class="btn btn-primary"><i class="bx bxs-edit"></i> Edit</a>
                                        </div>
                                        <hr>
                                      </div>
                                      <div class="mb-3">
                                        <div class="row">
                                          <div class="col-lg-4">
                                            <label for="tanggal" class="form-label">Tanggal dan Waktu<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                              <input class="result form-control" type="text" id="tanggal" name="tanggal" value="<?= date("d/m/Y H:i", strtotime($kembang['waktu_rekam'])) ?>" disabled> <span class="input-group-text" id="basic-addon2"><i class="bx bx-calendar-exclamation"></i></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="mb-3">
                                        <label for="tempat" class="form-label">Tempat<span class="text-danger">*</span></label>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $kembang['tempat'] ?>" disabled>
                                          </div>
                                        </div>
                                      </div>
                                      <h5 class="card-title">Keadaan Fisik</h5>
                                      <div class="row">
                                        <div class="col-lg-4 mb-3">
                                          <label for="tinggiFisik" class="form-label">Tinggi Badan<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="tinggiFisik" name="tinggiFisik" value="<?= $kembang['tinggibadan_fisik'] ?>" disabled>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                          <label for="beratFisik" class="form-label">Berat Badan<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="beratFisik" name="beratFisik" value="<?= $kembang['beratbadan_fisik'] ?>" disabled>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                          <label for="tekananDarahFisik" class="form-label">Tekanan Darah</label>
                                          <input type="text" class="form-control" id="tekananDarahFisik" name="tekananDarahFisik" value="<?= $kembang['tekanandarah_fisik'] ?>" disabled>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                          <label for="gulaDarahFisik" class="form-label">Gula Darah</label>
                                          <input type="text" class="form-control" id="gulaDarahFisik" name="gulaDarahFisik" value="<?= $kembang['guladarah_fisik'] ?>" disabled>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                          <label for="kolesterolFisik" class="form-label">Kolesterol</label>
                                          <input type="text" class="form-control" id="kolesterolFisik" name="kolesterolFisik" value="<?= $kembang['kolesterol_fisik'] ?>" disabled>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                          <label for="fungsiParuFisik" class="form-label">Fungsi Paru</label>
                                          <input type="text" class="form-control" id="fungsiParuFisik" name="fungsiParuFisik" value="<?= $kembang['fungsiparu_fisik'] ?>" disabled>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                          <label for="keteranganFisik" class="form-label">Keterangan Fisik</label>
                                          <textarea name="keteranganFisik" id="keteranganFisik" class="form-control" rows="3" disabled><?= $kembang['keterangan_fisik'] ?></textarea>
                                        </div>
                                      </div>
                                      <h5 class="card-title">Kondisi Mental Pskologis</h5>
                                      <div class="mb-3">
                                        <label for="percayadiri" class="form-label">Kepercayaan Diri</label>
                                        <textarea name="percayadiri" id="percayadiri" class="form-control" rows="2" disabled><?= $kembang['percayadiri_pskologis'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="mandiri" class="form-label">Kemandirian Diri</label>
                                        <textarea name="mandiri" id="mandiri" class="form-control" rows="2" disabled><?= $kembang['mandiri_pskologis'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="disiplin" class="form-label">Kedisiplinan</label>
                                        <textarea name="disiplin" id="disiplin" class="form-control" rows="2" disabled><?= $kembang['disiplin_pskologis'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="tanggungjawab" class="form-label">Tanggung Jawab</label>
                                        <textarea name="tanggungjawab" id="tanggungjawab" class="form-control" rows="2" disabled><?= $kembang['tanggungjawab_pskologis'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="keteranganPsikologis" class="form-label">Keterangan Psikologis</label>
                                        <textarea name="keteranganPsikologis" id="keteranganPsikologis" class="form-control" rows="3" disabled><?= $kembang['keterangan_pskologis'] ?></textarea>
                                      </div>
                                      <h5 class="card-title">Kondisi Sosial</h5>
                                      <div class="mb-3">
                                        <label for="penyesuaian" class="form-label">Kemampuan penyesuaian diri</label>
                                        <textarea name="penyesuaian" id="penyesuaian" class="form-control" rows="2" disabled><?= $kembang['penyesuaian_sosial'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="kerjasama" class="form-label">Kerjasama</label>
                                        <textarea name="kerjasama" id="kerjasama" class="form-control" rows="2" disabled><?= $kembang['kerjasama_sosial'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="sopan" class="form-label">Sopan Santun</label>
                                        <textarea name="sopan" id="sopan" class="form-control" rows="2" disabled><?= $kembang['sopan_sosial'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="keteranganSosial" class="form-label">Keterangan Sosial</label>
                                        <textarea name="keteranganSosial" id="keteranganSosial" class="form-control" rows="3" disabled><?= $kembang['keterangan_sosial'] ?></textarea>
                                      </div>
                                      <h5 class="card-title">Permasalahan</h5>
                                      <div class="mb-3">
                                        <label for="gambaran" class="form-label">Gambaran secara jelas tentang apa masalahnya, faktor penyebab dan akibatnya</label>
                                        <textarea name="gambaran" id="gambaran" class="form-control" rows="2" disabled><?= $kembang['gambaran_masalah'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="penyeselaian" class="form-label">Langkah-langkah pemecahan masalah yang dilakukan</label>
                                        <textarea name="penyeselaian" id="penyeselaian" class="form-control" rows="2" disabled><?= $kembang['penyelesaian_masalah'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="perubahan" class="form-label">Perubahan yang telah dicapai</label>
                                        <textarea name="perubahan" id="perubahan" class="form-control" rows="2" disabled><?= $kembang['perubahan_masalah'] ?></textarea>
                                      </div>
                                      <div class="mb-3">
                                        <label for="keteranganPermasalahan" class="form-label">Keterangan Permasalahan</label>
                                        <textarea name="keteranganPermasalahan" id="keteranganPermasalahan" class="form-control" rows="3" disabled><?= $kembang['keterangan_masalah'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      <?php $no_kembang++;
                        endforeach;
                      endif; ?>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade show" id="orangtua" role="tabpanel">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <h5 class="card-title">Biodata Orang Tua</h5>
                      </div>
                      <div class="col-lg-6">
                        <div class="text-end">
                          <a href="<?= base_url() ?>anak/editOrangtua?nip=<?= $anak['nip'] ?>" class="btn btn-primary"><i class="bx bxs-edit"></i> Edit</a>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-lg-6 p-3 border rounded">
                        <h5 class="card-title">Ayah</h5>
                        <div class="mb-3">
                          <label for="namaAyah" class="form-label">Nama Ayah<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="namaAyah" name="namaAyah" value="<?= (isset($orangtua['nama_ayah'])) ? $orangtua['nama_ayah'] : "" ?>" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="pekerjaanAyah" class="form-label">Pekerjaan Ayah<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="pekerjaanAyah" name="pekerjaanAyah" value="<?= (isset($orangtua['pekerjaan_ayah'])) ? $orangtua['pekerjaan_ayah'] : "" ?>" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="agamaAyah" class="form-label">Agama Ayah<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="agamaAyah" name="agamaAyah" value="<?= (isset($orangtua['agama_ayah'])) ? $orangtua['agama_ayah'] : "" ?>" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="hpAyah" class="form-label">Nomor HP Ayah<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="hpAyah" name="hpAyah" value="<?= (isset($orangtua['hp_ayah'])) ? $orangtua['hp_ayah'] : "" ?>" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="tempatLahirAyah" class="form-label">Tempat & Tanggal Lahir*</label>
                          <div class="row">
                            <div class="col-5">
                              <input type="text" class="form-control" id="tempatLahirAyah" name="tempatLahirAyah" value="<?= (isset($orangtua['tempatlahir_ayah'])) ? $orangtua['tempatlahir_ayah'] : "" ?>" required disabled>
                            </div>
                            <div class="col-4">
                              <input type="text" class="form-control" id="tanggalLahirAyah" name="tanggalLahirAyah" value="<?= (isset($orangtua['tgllahir_ayah'])) ? tgl_indo(date("Y-m-d", strtotime($orangtua['tgllahir_ayah']))) : "" ?>" required disabled>
                            </div>
                          </div>
                        </div>
                        <?php if (isset($orangtua['tgllahir_ayah'])) : ?>
                          <div class="mb-3">
                            <label for="usia" class="form-label"><?= umur($orangtua['tgllahir_ayah']) ?></label>
                          </div>
                        <?php endif; ?>
                        <div class="mb-3">
                          <div class="row">
                            <div class="col-2">
                              <label for="rtAyah" class="form-label">RT*</label>
                              <input type="text" class="form-control" id="rtAyah" name="rtAyah" value="<?= (isset($orangtua['rt_ayah'])) ? $orangtua['rt_ayah'] : "" ?>" required disabled>
                            </div>
                            <div class="col-2">
                              <label for="rwAyah" class="form-label">RW*</label>
                              <input type="text" class="form-control" id="rwAyah" name="rwAyah" value="<?= (isset($orangtua['rw_ayah'])) ? $orangtua['rw_ayah'] : "" ?>" required disabled>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="row">
                            <div class="col-6">
                              <label for="desaAyah" class="form-label">DESA*</label>
                              <input type="text" class="form-control" id="desaAyah" name="desaAyah" value="<?= (isset($orangtua['desa_ayah'])) ? $orangtua['desa_ayah'] : "" ?>" required disabled>
                            </div>
                            <div class="col-6">
                              <label for="kecamatanAyah" class="form-label">KECAMATAN*</label>
                              <input type="text" class="form-control" id="kecamatanAyah" name="kecamatanAyah" value="<?= (isset($orangtua['kecamatan_ayah'])) ? $orangtua['kecamatan_ayah'] : "" ?>" required disabled>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="row">
                            <div class="col-6">
                              <label for="kabupatenAyah" class="form-label">KABUPATEN*</label>
                              <input type="text" class="form-control" id="kabupatenAyah" name="kabupatenAyah" value="<?= (isset($orangtua['kabupaten_ayah'])) ? $orangtua['kabupaten_ayah'] : "" ?>" required disabled>
                            </div>
                            <div class="col-6">
                              <label for="provinsiAyah" class="form-label">PROVINSI*</label>
                              <input type="text" class="form-control" id="provinsiAyah" name="provinsiAyah" value="<?= (isset($orangtua['provinsi_ayah'])) ? $orangtua['provinsi_ayah'] : "" ?>" required disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 p-3 border rounded">
                        <h5 class="card-title">Ibu</h5>
                        <div class="mb-3">
                          <label for="namaIbu" class="form-label">Nama Ibu<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="namaIbu" name="namaIbu" value="<?= (isset($orangtua['nama_ibu'])) ? $orangtua['nama_ibu'] : "" ?>" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="pekerjaanIbu" class="form-label">Pekerjaan Ibu<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="pekerjaanIbu" name="pekerjaanIbu" value="<?= (isset($orangtua['pekerjaan_ibu'])) ? $orangtua['pekerjaan_ibu'] : "" ?>" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="agamaIbu" class="form-label">Agama Ibu<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="agamaIbu" name="agamaIbu" value="<?= (isset($orangtua['agama_ibu'])) ? $orangtua['agama_ibu'] : "" ?>" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="hpIbu" class="form-label">Nomor HP Ibu<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="hpIbu" name="hpIbu" value="<?= (isset($orangtua['hp_ibu'])) ? $orangtua['hp_ibu'] : "" ?>" disabled>
                        </div>
                        <div class="mb-3">
                          <label for="tempatLahirIbu" class="form-label">Tempat & Tanggal Lahir*</label>
                          <div class="row">
                            <div class="col-5">
                              <input type="text" class="form-control" id="tempatLahirIbu" name="tempatLahirIbu" value="<?= (isset($orangtua['tempatlahir_ibu'])) ? $orangtua['tempatlahir_ibu'] : "" ?>" required disabled>
                            </div>
                            <div class="col-4">
                              <input type="text" class="form-control" id="tanggalLahirIbu" name="tanggalLahirIbu" value="<?= (isset($orangtua['tgllahir_ibu'])) ? tgl_indo(date("Y-m-d", strtotime($orangtua['tgllahir_ibu']))) : "" ?>" required disabled>
                            </div>
                          </div>
                        </div>
                        <?php if (isset($orangtua['tgllahir_ibu'])) : ?>
                          <div class="mb-3">
                            <label for="usia" class="form-label"><?= umur($orangtua['tgllahir_ibu']) ?></label>
                          </div>
                        <?php endif; ?>
                        <div class="mb-3">
                          <div class="row">
                            <div class="col-2">
                              <label for="rtIbu" class="form-label">RT*</label>
                              <input type="text" class="form-control" id="rtIbu" name="rtIbu" value="<?= (isset($orangtua['rt_ibu'])) ? $orangtua['rt_ibu'] : "" ?>" required disabled>
                            </div>
                            <div class="col-2">
                              <label for="rwIbu" class="form-label">RW*</label>
                              <input type="text" class="form-control" id="rwIbu" name="rwIbu" value="<?= (isset($orangtua['rw_ibu'])) ? $orangtua['rw_ibu'] : "" ?>" required disabled>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="row">
                            <div class="col-6">
                              <label for="desaIbu" class="form-label">DESA*</label>
                              <input type="text" class="form-control" id="desaIbu" name="desaIbu" value="<?= (isset($orangtua['desa_ibu'])) ? $orangtua['desa_ibu'] : "" ?>" required disabled>
                            </div>
                            <div class="col-6">
                              <label for="kecamatanIbu" class="form-label">KECAMATAN*</label>
                              <input type="text" class="form-control" id="kecamatanIbu" name="kecamatanIbu" value="<?= (isset($orangtua['kecamatan_ibu'])) ? $orangtua['kecamatan_ibu'] : "" ?>" required disabled>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="row">
                            <div class="col-6">
                              <label for="kabupatenIbu" class="form-label">KABUPATEN*</label>
                              <input type="text" class="form-control" id="kabupatenIbu" name="kabupatenIbu" value="<?= (isset($orangtua['kabupaten_ibu'])) ? $orangtua['kabupaten_ibu'] : "" ?>" required disabled>
                            </div>
                            <div class="col-6">
                              <label for="provinsiIbu" class="form-label">PROVINSI*</label>
                              <input type="text" class="form-control" id="provinsiIbu" name="provinsiIbu" value="<?= (isset($orangtua['provinsi_ibu'])) ? $orangtua['provinsi_ibu'] : "" ?>" required disabled>
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