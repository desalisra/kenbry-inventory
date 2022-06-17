<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      <a href="<?= base_url('product') ?>" class="mr-3">
        <i class="fas fa-arrow-left"></i>
      </a>
      Add Product
    </h6>
  </div>
  <div class="card-body">
    <form action="<?= base_url('/product')  ?>" method="post">
      <input type="hidden" class="form-control" name="product_id">
      <label for="">Product Name</label>
      <input type="text" class="form-control" name="product_name" placeholder="Product Name ..." autocomplete="off">
      <button class="btn btn-primary mt-3 btn-sm" type="submit"><i class="fas fa-save"></i> Save Data</button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>