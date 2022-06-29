<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<?php if(session()->getFlashdata('success')) : ?>
  <div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">×</button>
      <b>Success !</b>
      <?= session()->getFlashdata('success')  ?>
    </div>
  </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')) : ?>
  <div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">×</button>
      <b>Error !</b>
      <?= session()->getFlashdata('error')  ?>
    </div>
  </div>
<?php endif; ?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Shipping Produk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="15%">Delivery Order</th>
            <th width="10%">Tanggal</th>
            <th width="10%">Customer</th>
            <th width="35%">Deskripsi</th>
            <th width="20%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($shipping as $key => $value) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->ship_number ?></td>
            <td><?= $value->ship_tanggal ?></td>
            <td><?= $value->cus_nama ?></td>
            <td><?= $value->ship_deskripsi ?></td>
            <td>
              <a class="btn btn-success btn-sm" href="<?= base_url('shipping/detail/' . $value->ship_number) ?>">
                <i class="fas fa-file"></i> Detail
              </a>
              <a class="btn btn-primary btn-sm" href="<?= base_url('shipping/confirm/' . $value->ship_number) ?>">
                <i class="fas fa-check"></i> Confirm
              </a>      
              <a href="<?= base_url('surat-jalan/' . $value->ship_number) ?>" target="_blank" class="btn btn-secondary btn-sm">
                <i class="fas fa-print"></i> Print
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?= $this->endSection() ?>