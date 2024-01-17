<link href="<?= base_url() ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<div class="table-responsive mt-3">
  <table id="example2" class="table align-middle mb-0">
    <thead>
      <tr>
        <th class="text-center">#</th>
        <th class="text-center">SUMBER</th>
        <th class="text-center">NAMA</th>
        <th class="text-center">TANGGAL</th>
        <th class="text-center">JUMLAH</th>
        <th class="text-center">KETERANGAN</th>
        <th class="text-center">ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($pemasukan as $data) : ?>
        <tr>
          <td class="text-center"><?= $no ?></td>
          <td class="text-center">
            <?php
            $color = ($data['sumber'] == "sumber-donatur") ? "info" : "success";
            $textSumber = ($data['sumber'] == "sumber-donatur") ? "Donatur" : "Lainnya";
            ?>
            <div class="badge rounded-pill text-<?= $color ?> bg-light-<?= $color ?> p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i><?= $textSumber ?></div>
          </td>
          <td>
            <?php if ($data['sumber'] == "sumber-donatur") : ?>
              <a target="_blank" href="<?= base_url() ?>donatur/profile?id=<?= $data['id_donatur'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile <?= $data['nama'] ?>"><?= $data['nama'] ?></a>
            <?php else : ?>
              <?= $data['nama'] ?>
            <?php endif; ?>
          </td>
          <td class="text-center"><?= tgl_indo(date("Y-m-d", strtotime($data['tanggal_pemasukan']))) ?></td>
          <td class="text-end"><?= rupiah($data['jumlah']) ?></td>
          <td><?= $data['keterangan'] ?></td>
          <td class="text-center">
            <div class="d-flex order-actions justify-content-center">
              <?php $file = json_decode($data['file']);
              if (isset($file[0])) : ?>
                <a target="_blank" href="<?= base_url() ?>uploads/file_pemasukan/<?= $file[0] ?>" class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="File Pemasukan"><i class='bx bxs-folder-open'></i></a>
              <?php endif; ?>
              <a href="<?= base_url() ?>pemasukan/edit?id=<?= $data['id'] ?>" class="text-primary ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class='bx bxs-edit'></i></a>
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