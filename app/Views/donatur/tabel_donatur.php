<link href="<?= base_url() ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<div class="table-responsive mt-3">
  <table id="example2" class="table align-middle mb-0">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center" colspan="2">NAMA</th>
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
            <?php $gambar = json_decode($data['foto']);
            if (isset($gambar[0])) : ?>
              <img src="<?= base_url() ?>/uploads/foto_donatur/<?= $gambar[0] ?>" class="product-img-2" style="object-fit: cover;" alt="product img">
            <?php else : ?>
              <img src="<?= base_url() ?>/images/default-product.png" class="product-img-2" style="object-fit: cover;" alt="product img">
            <?php endif; ?>
          </td>
          <td><?= $data['nama'] ?></td>
          <td class="text-center"><?= $data['nohp'] ?></td>
          <td>
            <?= (isset($data['desa']) ? $data['desa'] : "")
              . (isset($data['rt']) ? " RT" . $data['rt'] : "")
              . (isset($data['rw']) ? " RW" . $data['rw'] : "")
              . (isset($data['kecamatan']) ? ", Kec. " . $data['kecamatan'] : "")
              . (isset($data['kabupaten']) ? ", Kab. " . $data['kabupaten'] : "")
              . " - "
              . (isset($data['provinsi']) ? "" . $data['provinsi'] : "");
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