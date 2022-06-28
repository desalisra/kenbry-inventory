<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row container">
  <a href="<?= base_url('receiving') ?>" class="mb-3 font-weight-bold text-secondary">
    <i class="fas fa-arrow-left"></i> Kembali
  </a>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Produk In</h6>
  </div>
  <div class="card-body">

    <form action="<?= base_url('/receiving/add')  ?>" method="post">
      <!-- <input type="hidden" class="form-control" name="product_id"> -->

      <div class="form-group">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="recv_tanggal" required>
      </div>

      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="recv_deskripsi" class="form-control" required></textarea>
      </div>

      <hr>      

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

      <button class="btn btn-success btn-sm mt-3" type="button" id="addRow"><i class="fas fa-plus"></i> Add produk</button>
      <button class="btn btn-primary btn-sm mt-3" type="submit"><i class="fas fa-save"></i> Save Data</button>
    </form>
  </div>
</div>



<?= $this->endSection() ?>