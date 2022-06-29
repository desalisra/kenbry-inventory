<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php if(isset($header)) : ?>
  <div class="row justify-content-between px-3 mb-2">
    <a href="<?= base_url('shipping') ?>" class="mb-3 font-weight-bold text-secondary">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <a href="<?= base_url('surat-jalan') . "/" . $header->sph_number ?>" target="_blank" class="btn btn-secondary btn-sm">
      <i class="fas fa-print"></i> Surat Jalan
    </a>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-md-2">INVOICE</div>
        <div class="col-md-7"> : <?= $header->sph_number ?></div>
      </div>
      <div class="row">
        <div class="col-md-2">Tanggal</div>
        <div class="col-md-7"> : <?= $header->sph_tanggal ?></div>
      </div>

      
      <div class="row">
        <div class="col-md-2">Nama Customer</div>
        <div class="col-md-7"> : <?= $header->cus_nama . " (" . $header->cus_tlpn . ")" ?></div>
      </div>
      <div class="row">
        <div class="col-md-2">Alamat</div>
        <div class="col-md-7"> : <?= $header->cus_alamat ?></div>
      </div>
      
      <div class="row mb-3">
        <div class="col-md-2">Deskripsi</div>
        <div class="col-md-7"> : <?= $header->sph_deskripsi ?></div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="5%" class="text-center">No</th>
              <th width="10%">Kode</th>
              <th>Nama Produk</th>
              <th width="10%" class="text-center">Jml Satuan</th>
              <th width="5%" class="text-center" >Harga Satuan</th>
              <th width="5%" class="text-center" >Sub Total</th>
            </tr>
          </thead>
          <tbody>
            <?php $total = 0; ?>
            <?php foreach($detail as $key => $value) : ?>
              <tr>
                <td class="text-center"><?= $key + 1 ?></td>
                <td><?= $value->prd_id ?></td>
                <td><?= $value->prd_nama  ?></td>
                <td class="text-center"><?= $value->prd_panjang * $value->prd_lebar * $value->spd_qty ?> m2</td>
                <td class="text-center"><?= number_format($value->prd_harga) ?></td>
                <td class="text-center"><?= number_format($value->spd_harga) ?></td>
              </tr>
            <?php $total += $value->spd_harga ?>
            <?php endforeach; ?> 
          </tbody>
          <tfoot>
            <tr>
              <th colspan="5" class="text-right">Total</th>
              <th><?= number_format($total) ?></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
<?php endif ?>

<?= $this->endSection() ?>