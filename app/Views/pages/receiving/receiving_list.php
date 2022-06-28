<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="mb-2">
  <a class="btn btn-primary btn-sm" href="<?= base_url("receiving/add") ?>">
  <i class="fas fa-plus"></i> Produk In
  </a>
</div>

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


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Receiving Produk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="10%">No Transaksi</th>
            <th width="10%">Tanggal</th>
            <th width="65%">Deskripsi</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($receiving as $key => $value) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->recv_number ?></td>
            <td><?= $value->recv_tanggal ?></td>
            <td><?= $value->recv_deskripsi ?></td>
            <td>
              <a class="btn btn-success btn-sm" href="<?= base_url('receiving/detail/' . $value->recv_number) ?>">
                <i class="fas fa-file"></i> Detail
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