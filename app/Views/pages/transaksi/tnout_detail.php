<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
  <?php $date = date_create($header->trnh_date); ?>
  <div class="row container">
    <a href="<?= base_url('transaksi-in') ?>" class="mb-3 font-weight-bold text-secondary">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
      <a href="<?= base_url('transaksi-out/print')?>" class="btn btn-success btn-sm">
        <i class="fas fa-print"></i> Print
      </a>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-md-2">No Transaksi</div>
        <div class="col-md-7"> : <?= $header->trnh_id ?></div>
      </div>
      <div class="row">
        <div class="col-md-2">Tanggal</div>
        <div class="col-md-7"> : <?= date_format($date,"d/m/Y") ?></div>
      </div>
      <div class="row">
        <div class="col-md-2">No Refrensi</div>
        <div class="col-md-7"> : <?= $header->trnh_refrensi ?></div>
      </div>
      <div class="row mb-3">
        <div class="col-md-2">Deskripsi</div>
        <div class="col-md-7"> : <?= $header->trnh_deskripsi ?></div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="10%" rowspan="2" class="text-center">No</th>
              <th width="50%" rowspan="2">Produk</th>
              <th width="20%" colspan="2" class="text-center">Ukuran</th>
              <th width="20%" rowspan="2">Qty</th>
            </tr>
            <tr>
              <th width="5%" class="text-center">P</th>
              <th width="5%" class="text-center">L</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($detail as $key => $value) : ?>
              <tr>
                <td class="text-center"><?= $key + 1 ?></td>
                <td><?= $value->prd_id . " - " . $value->prd_nama  ?></td>
                <td class="text-center"><?= $value->prd_panjang ?></td>
                <td class="text-center"><?= $value->prd_lebar ?></td>
                <td><?= $value->trnd_qty ?></td>
              </tr>
            <?php endforeach; ?> 
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>