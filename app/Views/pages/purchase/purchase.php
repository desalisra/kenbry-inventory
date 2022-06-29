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
    <h6 class="m-0 font-weight-bold text-primary">Purchase Produk</h6>
  </div>
  <div class="card-body">
    <form action="<?= base_url('/purchase')  ?>" method="post">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          
          <div class="form-group">
            <label>Customer</label>
            <select class="form-control" name="sph_cusId" required>
              <option value="">Pilih Customer</option>
              <?php foreach ($customer as $key => $value) : ?>
                <option value="<?= $value->cus_id ?>"><?= $value->cus_nama . " - " . $value->cus_tlpn ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="sph_tanggal" required>
          </div>

          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="sph_deskripsi" class="form-control" required></textarea>
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="row">
            <div class="col-md-5">Produk</div>
            <div class="col-md-2">Qty</div>
            <div class="col-md-5">Keterangan</div>
          </div>
          <div class="row mb-2">
            <div class="col-md-5">
              <select class="form-control" name="produk[]" required>
                <option value="">Pilih Produk</option>
                <?php foreach ($products as $key => $value) : ?>
                  <option value="<?= $value->prd_id ?>"><?= $value->prd_jenis . " - " . $value->prd_nama ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-md-2">
              <input type="number" class="form-control" name="qty[]" placeholder="Qty" required>
            </div>
            <div class="col-md-5">
              <input type="text" class="form-control" name="ket[]" placeholder="Keterangan" autocomplete="off">
            </div>
          </div>
          
          <div id="newRow"></div>
        </div>
        <div class="col-md-12">
          <hr>  
          <button class="btn btn-success btn-sm" type="button" id="addRow"><i class="fas fa-plus"></i> Add produk</button>
          <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-save"></i> Save Data</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Receiving Produk</h6>
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
            <th width="40%">Deskripsi</th>
            <th width="10%">Transaksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0; ?>
          <?php foreach($purchase as $key => $value) : ?>
          <tr>
            <td>
              <a class="btn btn-success btn-sm" href="<?= base_url('purchase/detail/' . $value->sph_number) ?>">
                <i class="fas fa-file"></i> Detail
              </a>
              <a class="btn btn-secondary btn-sm" target="_blank" href="<?= base_url('purchase/print/' . $value->sph_number) ?>">
                <i class="fas fa-print"></i> Print Invoice
              </a>
            </td>
            <td><?= $value->sph_number ?></td>
            <td><?= $value->sph_tanggal ?></td>
            <td><?= $value->cus_nama ?></td>
            <td><?= $value->sph_deskripsi ?></td>
            <td><?= number_format($value->sph_total) ?></td>
          </tr>
          <?php $total += $value->sph_total; ?>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th class="text-right" colspan="5">Total</th>
            <th><?= number_format($total); ?></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>



<?= $this->endSection() ?>