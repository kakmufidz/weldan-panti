<link href="<?= base_url() ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<div class="table-responsive mt-3">
  <table id="example2" class="table align-middle mb-0">
    <thead>
      <tr>
        <th class="text-center" style="width: 5%;">#</th>
        <th class="text-center" style="width: 15%;">TANGGAL</th>
        <th class="text-center" style="width: 35%;">JUDUL</th>
        <th class="text-center" style="width: 15%;">KATEGORI</th>
        <th class="text-center" style="width: 20%;">TOTAL</th>
        <th class="text-center" style="width: 20%;">AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($keuangan as $data) : ?>
        <tr>
          <td class="text-center"><?= $no ?></td>
          <td><?= tgl_indo($data['tgl_pengeluaran']) ?></td>
          <td><?= $data['judul'] ?></td>
          <td>
            <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3"><?= $data['kategori'] ?></div>
          </td>
          <td class="text-end"><?= rupiah($data['total_pengeluaran']) ?></td>
          <td>
            <div class="d-flex order-actions justify-content-center">
              <a href="<?= base_url() ?>keuangan/view?id=<?= $data['id'] ?>" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Pengeluaran"><i class='bx bx-detail'></i></a>
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