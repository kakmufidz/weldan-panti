<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 mb-3">
  <div class="col">
    <div class="card radius-10 border-start border-0 border-3 border-info">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <?php
          $start = date("d/m/Y");
          $end = date("d/m/Y");
          if ($start == $end) {
            $tanggal = $start;
          } else {
            $tanggal = $start . " - " . $end;
          }
          ?>
          <div>
            <p class="mb-0 text-secondary"></p>
            <h4 class="my-1 text-info"><span class="counter"><?= sizeof($anak_asuh) ?></span> Anak</h4>
            <p class="mb-0 font-13">Jumlah Sesuai Filter</p>
          </div>
          <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bxs-group'></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive mt-3">
  <table id="dataAnak" class="table align-middle mb-0">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">NIP</th>
        <th class="text-center">NAMA</th>
        <th class="text-center">KATEGORI</th>
        <th class="text-center">USIA</th>
        <th class="text-center">TTL</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">KECAMATAN</th>
        <th class="text-center">AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($anak_asuh as $anak) : ?>
        <tr>
          <td class="text-center"><?= $no ?></td>
          <td class="text-center"><?= $anak['nip'] ?></td>
          <td>
            <div class="d-flex align-items-center">
              <div class="me-4">
                <a href="<?= base_url() ?>anak/profile?nip=<?= $anak['nip'] ?>">
                  <?php $gambar = json_decode($anak['foto']);
                  if (isset($gambar[0])) : ?>
                    <img src="<?= base_url() ?>/uploads/foto_anak/<?= $gambar[0] ?>" class="product-img-2" style="object-fit: cover;" alt="product img">
                  <?php else : ?>
                    <img src="<?= base_url() ?>/images/default-product.png" class="product-img-2" style="object-fit: cover;" alt="product img">
                  <?php endif; ?>
                </a>
              </div>
              <div>
                <a href="<?= base_url() ?>anak/profile?nip=<?= $anak['nip'] ?>" class="text-dark"><?= $anak['nama'] ?></a>
              </div>
            </div>
          </td>
          <td><?= $anak['kategori_anak'] ?></td>
          <td><?= umur($anak['tanggal_lahir'], "tahun") ?></td>
          <td><?= $anak['tempat_lahir'] . ", " . tgl_indo(date("Y-m-d", strtotime($anak['tanggal_lahir']))) ?></td>
          <td><?= $anak['status_anak'] . ", " . $anak['status_panti'] ?></td>
          <td>
            <?= ((isset($anak['desa']) && !empty($anak['desa'])) ? $anak['desa'] : "")
              . ((isset($anak['rt']) && !empty($anak['rt'])) ? " RT" . $anak['rt'] : "")
              . ((isset($anak['rw']) && !empty($anak['rw'])) ? " RW" . $anak['rw'] : "")
              . ((isset($anak['kecamatan']) && !empty($anak['kecamatan'])) ? ", Kec. " . $anak['kecamatan'] : "")
              . ((isset($anak['kabupaten']) && !empty($anak['kabupaten'])) ? ", Kab. " . $anak['kabupaten'] : "")
              . ((isset($anak['provinsi']) && !empty($anak['provinsi'])) ? " - " . $anak['provinsi'] : "");
            ?>
          </td>
          <td>
            <div class="d-flex order-actions">
              <a href="<?= base_url() ?>anak/profile?nip=<?= $anak['nip'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile Anak"><i class='bx bxs-user-circle'></i></a>
              <a href="javascript:;" class="text-danger ms-3 btnHapus" data-nip="<?= $anak['nip'] ?>"><i class='bx bxs-trash'></i></a>
            </div>
          </td>
        </tr>
      <?php $no++;
      endforeach; ?>
    </tbody>
  </table>
</div>