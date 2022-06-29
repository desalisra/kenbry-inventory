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
    <form action="<?= base_url('administrator')  ?>" method="post">
      <div class="form-group">
        <label>Karyawan</label>
        <select class="form-control" name="karyawan" required>
          <option value="">Pilih Karyawan</option>
          <?php foreach ($karyawan as $key => $value) : ?>
            <option value="<?= $value->kry_nip ?>"><?= $value->kry_nip . " - " . $value->kry_nama ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label>Akses Karyawan</label>
        <select class="form-control" name="role" required>
          <option value="">Pilih Akses</option>
          <option value="FINANCE">FINANCE</option>
          <option value="GUDANG">GUDANG</option>
        </select>
      </div>
      <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-save"></i> Add Account</button>
    </form>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Akun Login</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10%">Action</th>
            <th width="15%">Nip</th>
            <th width="20%">Nama</th>
            <th width="20%">Email</th>
            <th width="10%">Role</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($member as $key => $value) : ?>
          <tr>
            <td>
              <a class="btn btn-secondary btn-sm <?= $value->mem_role == "ADMIN" ? "disabled" : "" ?>"  href="<?= base_url('administrator/' . $value->mem_id) ?>">
                <i class="fas fa-trash"></i> Delete
              </a>
            </td>
            <td><?= $value->mem_nip ?></td>
            <td><?= $value->mem_nama ?></td>
            <td><?= $value->mem_email ?></td>
            <td><?= $value->mem_role ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<?= $this->endSection() ?>