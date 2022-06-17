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

<div class="mb-2">
  <a href="<?= base_url('stock/in-add'); ?>" class="btn btn-primary btn-sm">
    <i class="fas fa-plus"></i> Add Stock Product
  </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">List Stock In</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%" rowspan="2" class="text-center">No</th>
            <th width="10%" rowspan="2">Tanggal</th>
            <th width="50%" rowspan="2">Product</th>
            <th width="10%" colspan="2" class="text-center">Ukuran</th>
            <th width="10%" rowspan="2" class="text-center">Qty</th>
            <th width="15%" rowspan="2">Action</th>
          </tr>
          <tr>
            <th class="text-center">P</th>
            <th class="text-center">L</th>
          </tr>
        </thead>
        <tbody>
          <!--  -->
        </tbody>
      </table>
    </div>
  </div>
</div>


<?= $this->endSection() ?>