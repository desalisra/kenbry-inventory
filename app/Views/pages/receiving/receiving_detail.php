<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php if(isset($header)) : ?>
  <div class="row container">
    <a href="<?= base_url('receiving') ?>" class="mb-3 font-weight-bold text-secondary">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Receiving</h6>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-md-2">No Transaksi</div>
        <div class="col-md-7"> : <?= $header->recv_number ?></div>
      </div>
      <div class="row">
        <div class="col-md-2">Tanggal</div>
        <div class="col-md-7"> : <?= $header->recv_tanggal ?></div>
      </div>
      <div class="row mb-3">
        <div class="col-md-2">Deskripsi</div>
        <div class="col-md-7"> : <?= $header->recv_deskripsi ?></div>
      </div>

      <hr>

      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
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
            <?php foreach($detail as $key => $value) : ?>
              <tr>
                <td class="text-center"><?= $key + 1 ?></td>
                <td><?= $value->prd_id ?></td>
                <td><?= $value->prd_nama  ?></td>
                <td class="text-center"><?= $value->prd_panjang ?></td>
                <td class="text-center"><?= $value->prd_lebar ?></td>
                <td class="text-center"><?= $value->recv_qty ?></td>
                <td class="text-center"><?= $value->prd_panjang * $value->prd_lebar * $value->recv_qty ?></td>
              </tr>
            <?php endforeach; ?> 
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php endif ?>

<?= $this->endSection() ?>