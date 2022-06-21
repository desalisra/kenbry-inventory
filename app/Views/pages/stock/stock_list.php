<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="mb-2">
  <a href="<?= base_url('stock/print') ?>" target="_blank" class="btn btn-success btn-sm">
    <i class="fas fa-print"></i> Print Laporan Stock
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
            <th width="5%">No</th>
            <th width="10%">Kode Produk</th>
            <th width="45%">Nama Produk</th>
            <th width="5%">P</th>
            <th width="5%">L</th>
            <th width="10%">Qty</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($stock as $key => $value) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->prd_id ?></td>
            <td><?= $value->prd_nama ?></td>
            <td><?= $value->prd_panjang ?></td>
            <td><?= $value->prd_lebar ?></td>
            <td><?= $value->stock_qty ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?= $this->endSection() ?>