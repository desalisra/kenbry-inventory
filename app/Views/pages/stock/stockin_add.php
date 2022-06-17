<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      <a href="<?= base_url('stock/in') ?>" class="mr-3">
        <i class="fas fa-arrow-left"></i>
      </a>
      Stock Masuk
    </h6>
  </div>
  <div class="card-body">
  <button class="btn btn-success px-4 mt-4" type="button" onClick="return addInputGroup()">
    <i class="fas fa-plus"></i>
  </button>
    <form action="<?= base_url('/stock/in')  ?>" method="post">
      <!-- <input type="hidden" class="form-control" name="product_id"> -->

      <div class="row">
        <div class="col-md-5">
          <label for="">Product Name</label>
          <select class="form-control"  name="product_id">
            <option value="">Pilih Product</option>
            <?php foreach ($products as $key => $value) : ?>
              <option value="<?= $value->prd_id ?>"><?= $value->prd_name ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-1">
          <label>Lebar</label>
          <input type="number" class="form-control" name="product_width" placeholder="Lebar" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label>Panjang</label>
          <input type="number" class="form-control" name="product_height" placeholder="Panjang" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label for="">Qty</label>
          <input type="number" class="form-control" name="product_qty" placeholder="Qty " autocomplete="off">
        </div>
        <div class="col">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" name="product_name" placeholder="Keterangan" autocomplete="off">
        </div>
      </div>

      <div class="row">
        <div class="col-md-5">
          <label for="">Product Name</label>
          <select class="form-control"  name="product_id">
            <option value="">Pilih Product</option>
            <?php foreach ($products as $key => $value) : ?>
              <option value="<?= $value->prd_id ?>"><?= $value->prd_name ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-1">
          <label>Lebar</label>
          <input type="number" class="form-control" name="product_width" placeholder="Lebar" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label>Panjang</label>
          <input type="number" class="form-control" name="product_height" placeholder="Panjang" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label for="">Qty</label>
          <input type="number" class="form-control" name="product_qty" placeholder="Qty " autocomplete="off">
        </div>
        <div class="col">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" name="product_name" placeholder="Keterangan" autocomplete="off">
        </div>
      </div>

      <div class="row">
        <div class="col-md-5">
          <label for="">Product Name</label>
          <select class="form-control"  name="product_id">
            <option value="">Pilih Product</option>
            <?php foreach ($products as $key => $value) : ?>
              <option value="<?= $value->prd_id ?>"><?= $value->prd_name ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-1">
          <label>Lebar</label>
          <input type="number" class="form-control" name="product_width" placeholder="Lebar" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label>Panjang</label>
          <input type="number" class="form-control" name="product_height" placeholder="Panjang" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label for="">Qty</label>
          <input type="number" class="form-control" name="product_qty" placeholder="Qty " autocomplete="off">
        </div>
        <div class="col">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" name="product_name" placeholder="Keterangan" autocomplete="off">
        </div>
      </div>

      <div class="row">
        <div class="col-md-5">
          <label for="">Product Name</label>
          <select class="form-control"  name="product_id">
            <option value="">Pilih Product</option>
            <?php foreach ($products as $key => $value) : ?>
              <option value="<?= $value->prd_id ?>"><?= $value->prd_name ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-1">
          <label>Lebar</label>
          <input type="number" class="form-control" name="product_width" placeholder="Lebar" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label>Panjang</label>
          <input type="number" class="form-control" name="product_height" placeholder="Panjang" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label for="">Qty</label>
          <input type="number" class="form-control" name="product_qty" placeholder="Qty " autocomplete="off">
        </div>
        <div class="col">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" name="product_name" placeholder="Keterangan" autocomplete="off">
        </div>
      </div>

      <div class="row">
        <div class="col-md-5">
          <label for="">Product Name</label>
          <select class="form-control"  name="product_id">
            <option value="">Pilih Product</option>
            <?php foreach ($products as $key => $value) : ?>
              <option value="<?= $value->prd_id ?>"><?= $value->prd_name ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-1">
          <label>Lebar</label>
          <input type="number" class="form-control" name="product_width" placeholder="Lebar" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label>Panjang</label>
          <input type="number" class="form-control" name="product_height" placeholder="Panjang" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label for="">Qty</label>
          <input type="number" class="form-control" name="product_qty" placeholder="Qty " autocomplete="off">
        </div>
        <div class="col">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" name="product_name" placeholder="Keterangan" autocomplete="off">
        </div>
      </div>

      <div class="row">
        <div class="col-md-5">
          <label for="">Product Name</label>
          <select class="form-control"  name="product_id">
            <option value="">Pilih Product</option>
            <?php foreach ($products as $key => $value) : ?>
              <option value="<?= $value->prd_id ?>"><?= $value->prd_name ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-1">
          <label>Lebar</label>
          <input type="number" class="form-control" name="product_width" placeholder="Lebar" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label>Panjang</label>
          <input type="number" class="form-control" name="product_height" placeholder="Panjang" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label for="">Qty</label>
          <input type="number" class="form-control" name="product_qty" placeholder="Qty " autocomplete="off">
        </div>
        <div class="col">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" name="product_name" placeholder="Keterangan" autocomplete="off">
        </div>
      </div>

      <div class="row">
        <div class="col-md-5">
          <label for="">Product Name</label>
          <select class="form-control"  name="product_id">
            <option value="">Pilih Product</option>
            <?php foreach ($products as $key => $value) : ?>
              <option value="<?= $value->prd_id ?>"><?= $value->prd_name ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-md-1">
          <label>Lebar</label>
          <input type="number" class="form-control" name="product_width" placeholder="Lebar" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label>Panjang</label>
          <input type="number" class="form-control" name="product_height" placeholder="Panjang" autocomplete="off">
        </div>
        <div class="col-md-1">
          <label for="">Qty</label>
          <input type="number" class="form-control" name="product_qty" placeholder="Qty " autocomplete="off">
        </div>
        <div class="col">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" name="product_name" placeholder="Keterangan" autocomplete="off">
        </div>
      </div>

      <button class="btn btn-primary mt-3 btn-sm" type="submit"><i class="fas fa-save"></i> Save Data</button>
    </form>
  </div>
</div>

<div class="container1">
    <button class="add_form_field">Add New Field &nbsp; 
      <span style="font-size:16px; font-weight:bold;">+ </span>
    </button>
    <div><input type="text" name="mytext[]"></div>
</div>



<?= $this->endSection() ?>