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
    <form action="<?= base_url('report')  ?>" method="post">
      <div class="form-group">
        <label for="">Jenis Laporan</label>
        <select class="form-control" name="jenis" required>
          <option value="">-- Pilih Jenis Laporan --</option>
          <option value="purchase">Purchasing</option>
          <option value="shipping">Shipping</option>
        </select>
      </div>
      
      <div class="row">
        <div class="col">
          <label for="">Periode Awal</label>
          <input type="date" class="form-control" name="prdAwal" required>
        </div>
        <div class="col">
          <label for="">Periode Akhir</label>
          <input type="date" class="form-control" name="prdAkhir" required>
        </div>
      </div>
      <button class="btn btn-success mt-3">
        <i class="fas fa-download"></i> Download
      </button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>