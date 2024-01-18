<div class="table-responsive mt-3">
  <table id="tabelDonatur" class="table align-middle mb-0">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">NAMA</th>
        <th class="text-center">NO HP</th>
        <th class="text-center">ALAMAT</th>
        <th class="text-center">AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($donatur as $data) : ?>
        <tr>
          <td class="text-center"><?= $no ?></td>
          <td>
            <div class="d-flex align-items-center">
              <div class="me-4">
                <?php $gambar = json_decode($data['foto']);
                if (isset($gambar[0])) : ?>
                  <img src="<?= base_url() ?>/uploads/foto_donatur/<?= $gambar[0] ?>" class="product-img-2" style="object-fit: cover;" alt="product img">
                <?php else : ?>
                  <img src="<?= base_url() ?>/images/default-product.png" class="product-img-2" style="object-fit: cover;" alt="product img">
                <?php endif; ?>
              </div>
              <div>
                <a href="<?= base_url() ?>donatur/profile?id=<?= $data['id'] ?>" class="text-dark"><?= $data['nama'] ?></a>
              </div>
            </div>
          </td>
          <td class="text-center"><?= $data['nohp'] ?></td>
          <td>
            <?= ((isset($data['alamat']) && !empty($data['alamat'])) ? $data['alamat'] : "")
              . ((isset($data['desa']) && !empty($data['desa'])) ? $data['desa'] : "")
              . ((isset($data['rt']) && !empty($data['rt'])) ? " RT" . $data['rt'] : "")
              . ((isset($data['rw']) && !empty($data['rw']))  ? " RW" . $data['rw'] : "")
              . ((isset($data['kecamatan']) && !empty($data['kecamatan']))  ? ", Kec. " . $data['kecamatan'] : "")
              . ((isset($data['kabupaten']) && !empty($data['kabupaten']))  ? ", Kab. " . $data['kabupaten'] : "")
              . ((isset($data['provinsi']) && !empty($data['provinsi']))  ? " - " . $data['provinsi'] : "");
            ?>
          </td>
          <td class="text-center">
            <div class="d-flex order-actions">
              <a href="<?= base_url() ?>donatur/profile?id=<?= $data['id'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile Donatur"><i class='bx bxs-user-circle'></i></a>
              <a href="javascript:;" class="text-danger ms-3 btnHapus" data-id="<?= $data['id'] ?>"><i class='bx bxs-trash'></i></a>
            </div>
          </td>
        </tr>
      <?php $no++;
      endforeach; ?>
    </tbody>
  </table>
</div>