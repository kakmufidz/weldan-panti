<link href="<?= base_url() ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<div class="table-responsive mt-3">
  <table id="example2" class="table align-middle mb-0">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">NIP</th>
        <th class="text-center" colspan="2">NAMA</th>
        <th class="text-center">TTL</th>
        <th class="text-center">KECAMATAN</th>
        <th class="text-center">KATEGORI</th>
        <th class="text-center">STATUS</th>
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
            <?php $gambar = json_decode($anak['foto']);
            if (isset($gambar[0])) : ?>
              <img src="<?= base_url() ?>/uploads/foto_anak/<?= $gambar[0] ?>" class="product-img-2" alt="product img">
            <?php else : ?>
              <img src="<?= base_url() ?>/images/default-product.png" class="product-img-2" alt="product img">
            <?php endif; ?>

          </td>
          <td><?= $anak['nama'] ?></td>
          <td><?= $anak['tempat_lahir'] . ", " . date("d-m-Y", strtotime($anak['tanggal_lahir'])) ?></td>
          <td><?= $anak['kecamatan'] ?></td>
          <!-- <td><?= "Desa " . $anak['desa'] . " RT0" . $anak['rt'] . "/RW0" . $anak['rw'] .  ", Kec. " . $anak['kecamatan'] . ", Kab " . $anak['kabupaten'] . " - " . $anak['provinsi'] ?></td> -->
          <td><?= $anak['kategori_anak'] ?></td>
          <td><?= $anak['status_anak'] . ", " . $anak['status_panti'] ?></td>
          <td>
            <div class="d-flex order-actions">
              <a href="<?= base_url() ?>anak/edit?nip=<?= $anak['nip'] ?>" class="text-primary"><i class='bx bxs-edit'></i></a>
              <a href="javascript:;" class="text-danger ms-3 btnHapus" data-nip="<?= $anak['nip'] ?>"><i class='bx bxs-trash'></i></a>
            </div>
          </td>
        </tr>
      <?php $no++;
      endforeach; ?>
    </tbody>
  </table>
</div>
<script src="<?= base_url() ?>/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example2').DataTable({
      lengthChange: false,
      buttons: ['copy', 'excel', 'pdf', 'print']
    });

    table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>