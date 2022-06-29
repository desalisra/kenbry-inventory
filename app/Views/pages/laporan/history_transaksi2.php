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
  <div class="card-body">
    <form action="<?= base_url('history-transaksi/search')  ?>" method="get">
      <div class="row">
        <div class="col">
          <label for="">Periode Awal</label>
          <input type="date" class="form-control" name="prdAwal">
        </div>
        <div class="col">
          <label for="">Periode Akhir</label>
          <input type="date" class="form-control" name="prdAkhir">
        </div>
      </div>
      <button class="btn btn-success mt-3">Seacrh</button>
    </form>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">History Transaksi</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="15%">Action</th>
            <th width="15%">Invoice</th>
            <th width="10%">Tanggal</th>
            <th width="10%">Customer</th>
            <th width="30%">Deskripsi</th>
            <th width="10%">Transaksi</th>
            <th width="10%">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0; ?>
          <?php foreach($purchase as $key => $value) : ?>
          <tr>
            <td>
              <a class="btn btn-success btn-sm" href="<?= base_url('history-transaksi/detail/' . $value->sph_number) ?>">
                <i class="fas fa-file"></i> Detail
              </a>
              <a class="btn btn-secondary btn-sm" target="_blank" href="<?= base_url('history-transaksi/detail/' . $value->sph_number) ?>">
                <i class="fas fa-print"></i> Print Invoice
              </a>
            </td>
            <td><?= $value->sph_number ?></td>
            <td><?= $value->sph_tanggal ?></td>
            <td><?= $value->cus_nama ?></td>
            <td><?= $value->sph_deskripsi ?></td>
            <td><?= number_format($value->sph_total) ?></td>
            <td><?= $value->sph_status ?></td>
          </tr>
          <?php $total += $value->sph_total; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection() ?>