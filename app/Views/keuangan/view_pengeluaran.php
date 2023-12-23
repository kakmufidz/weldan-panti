<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link href="<?= base_url() ?>assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Detail Pengeluaran</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card radius-10">
        <div class="card-body">
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="text-start">
                            <a href="<?= base_url() ?>keuangan/edit?id=<?= $pengeluaran['id'] ?>" class="btn btn-primary"><i class="bx bx-message-square-edit"></i> Edit</a>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <div class="text-gray-light">JUDUL:</div>
                                <h2 class="to"><?= $pengeluaran['judul'] ?></h2>
                                <div class="date">Tanggal: <?= date("d-m-Y", strtotime($pengeluaran['tgl_pengeluaran'])) ?></div>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-left">ITEM</th>
                                    <th class="text-right">HARGA</th>
                                    <th class="text-right">JUMLAH</th>
                                    <th class="text-right">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($dataItem as $item) : ?>
                                    <tr>
                                        <td class="no"><?= $no ?></td>
                                        <td class="text-left">
                                            <h3>
                                                <a href="javascript:;">
                                                    <?= $item['item'] ?>
                                                </a>
                                            </h3>
                                        </td>
                                        <td class="unit"><?= rupiah($item['harga']) ?></td>
                                        <td class="qty"><?= $item['jumlah'] ?></td>
                                        <td class="total"><?= rupiah($item['total_harga']) ?></td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">GRAND TOTAL</td>
                                    <td><?= rupiah($pengeluaran['total_pengeluaran']) ?></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="notices">
                            <div>Keterangan:</div>
                            <div class="notice"><?= $pengeluaran['keterangan'] ?></div>
                        </div>
                        <?php $file = json_decode($pengeluaran['file']);
                        if (isset($file)) :
                            if (sizeof($file) != 0) : ?>
                                <div class="imageuploadify well mt-3" id="listFile" style="min-height: 0;">
                                    <div class="imageuploadify-images-list">
                                        <?php $no = 1;
                                        foreach ($file as $itemGambar) : ?>
                                            <?php $extension = pathinfo($itemGambar, PATHINFO_EXTENSION); ?>
                                            <div class="imageuploadify-container" style="margin: 9px;" id="file<?= $no ?>">
                                                <?php if (in_array($extension, ["jpg", "png", "jpeg", "webp"])) : ?>
                                                    <a target="_blank" href="<?= base_url() ?>uploads/pengeluaran/<?= $itemGambar ?>"><img src="<?= base_url() ?>uploads/pengeluaran/<?= $itemGambar ?>" alt="File pengeluaran"></a>
                                                <?php else : ?>
                                                    <a href="<?= base_url() ?>uploads/pengeluaran/<?= $itemGambar ?>"><img src="<?= base_url() ?>uploads/file_pemasukan/document.jpg" alt="File pengeluaran"></a>
                                                <?php endif; ?>
                                            </div>
                                        <?php $no++;
                                        endforeach; ?>
                                    </div>
                                </div>
                        <?php endif;
                        endif; ?>
                    </main>
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>