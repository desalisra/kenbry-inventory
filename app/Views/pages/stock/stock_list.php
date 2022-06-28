<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="mb-2">
  <a href="<?= base_url('stock/print') ?>" target="_blank" class="btn btn-success btn-sm">
    <i class="fas fa-print"></i> Print Laporan Stock
  </a>
  <a href="<?= base_url('stock/transaksi') ?>" target="_blank" class="btn btn-success btn-sm">
    <i class="fas fa-print"></i> Print Pergerakan Produk
  </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List Stock</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%" rowspan="2" class="text-center">No</th>
            <th width="10%" rowspan="2">Kode</th>
            <th rowspan="2">Produk</th>
            <th width="10%" colspan="2" class="text-center">Ukuran</th>
            <th width="5%" rowspan="2" class="text-center">Qty</th>
            <th width="5%" rowspan="2" class="text-center" >M2</th>
          </tr>
          <tr>
            <th class="text-center">P</th>
            <th class="text-center">L</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($stock as $key => $value) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->prd_id ?></td>
            <td><?= $value->prd_nama ?></td>
            <td class="text-center"><?= $value->prd_panjang ?></td>
            <td class="text-center"><?= $value->prd_lebar ?></td>
            <td class="text-center"><?= $value->stk_qty ?></td>
            <td class="text-center"><?= $value->prd_panjang * $value->prd_lebar * $value->stk_qty ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?= $this->endSection() ?>