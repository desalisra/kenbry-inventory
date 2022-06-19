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

<div class="mb-2">
  <a href="<?= base_url('transaksi-out/add'); ?>" class="btn btn-primary btn-sm">
    <i class="fas fa-plus"></i> Add Transaksi
  </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List Produk Keluar</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%" class="text-center">No</th>
            <th width="10%">Id Transaksi</th>
            <th width="10%">Tanggal</th>
            <th width="20%">No Refrensi</th>
            <th width="25%" class="text-center">Deskripsi</th>
            <th width="10%" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($produkOut as $key => $value) : ?>
            <?php $date = date_create($value->trnh_date); ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $value->trnh_id ?></td>
              <td><?= date_format($date,"d/m/Y") ?></td>
              <td><?= $value->trnh_refrensi ?></td>
              <td><?= $value->trnh_deskripsi ?></td>
              <td>
                <a href="<?= base_url('transaksi-out').'/detail/'.$value->trnh_id ?>" class="btn btn-success btn-sm">Detail</a>  
              </td>
            </tr>
          <?php endforeach; ?>  
        </tbody>
      </table>
    </div>
  </div>
</div>


<?= $this->endSection() ?>