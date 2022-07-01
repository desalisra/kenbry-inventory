<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="mb-2">
  <button class="btn btn-primary btn-sm" onclick="return tambahData()">
  <i class="fas fa-plus"></i> Add Produk
  </button>
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
    <h6 class="m-0 font-weight-bold text-primary">List Product</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="5%">Kode</th>
            <th width="25%">Nama Produk</th>
            <th width="10%">Jenis</th>
            <th width="10%">Produk</th>
            <th width="5%">P</th>
            <th width="5%">L</th>
            <th width="10%">Harga</th>
            <th width="5%">Status</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($products as $key => $value) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->prd_id ?></td>
            <td><?= $value->prd_nama ?></td>
            <td><?= $value->prd_jenis ?></td>
            <td><?= $value->prd_lokal ?></td>
            <td><?= $value->prd_panjang ?></td>
            <td><?= $value->prd_lebar ?></td>
            <td><?= number_format($value->prd_harga) ?></td>
            <td><?= $value->prd_aktifYN == "Y" ? "Aktif" : "Non Aktif" ?></td>
            <td>
              <button class="btn btn-success btn-sm" onclick="return ubahData('<?= $value->prd_id ?>')">
                <i class="fas fa-pen"></i> Edit
              </button>
              
              <form action="<?= base_url('produk/'.$value->prd_id) ?>" method="post" class="d-inline">
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Produk Modal-->
<div class="modal fade" id="produkModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Produk</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('/produk')  ?>" method="post">
        <div class="modal-body">
          <input type="hidden" class="form-control" id="prd_id" name="prd_id">
          <div class="form-group">
            <label for="">Nama Produk</label>
            <input type="text" class="form-control" id="prd_nama" name="prd_nama" placeholder="Masukan nama ..." autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Jenis</label>
            <select class="form-control" id="prd_jenis" name="prd_jenis">
              <option value="">-- Pilih Jenis --</option>
              <option value="Marmer">Marmer</option>
              <option value="Granit">Granit</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Lokal</label>
            <select class="form-control" id="prd_lokal" name="prd_lokal">
              <option value="">-- Pilih Jenis --</option>
              <option value="Lokal">Lokal</option>
              <option value="Import">Import</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Panjang (m)</label>
            <input type="number" class="form-control" id="prd_panjang" name="prd_panjang" placeholder="Masukan ukuran ..." autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Lebar (m)</label>
            <input type="number" class="form-control" id="prd_lebar" name="prd_lebar" placeholder="Masukan ukuran ..." autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Harga</label>
            <input type="number" class="form-control" id="prd_harga" name="prd_harga" placeholder="Masukan harga ..." autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function tambahData(){
    $("#prd_id").val("");		
    $("#prd_nama").val("");		
    $("#prd_jenis").val("");		
    $("#prd_lokal").val("");		
    $("#prd_panjang").val("");		
    $("#prd_lebar").val("");		
    $("#prd_harga").val("");
    $("#ModalLabel").text("Add Produk")
    $("#produkModal").modal('show');	
  }
  
  function ubahData(id){
    $.ajax({
              url: '<?= base_url('produk/'); ?>/' + id,
              method : "GET",
              async : false,
              dataType : 'json',
              success : function(data){	
                  $("#prd_id").val(data.prd_id);		
                  $("#prd_nama").val(data.prd_nama);	
                  $("#prd_jenis").val(data.prd_jenis);
                  $("#prd_lokal").val(data.prd_lokal);
                  $("#prd_panjang").val(data.prd_panjang);		
                  $("#prd_lebar").val(data.prd_lebar);		
                  $("#prd_harga").val(data.prd_harga);		
              }
          });
    $("#ModalLabel").text("Edit Produk")
    $("#produkModal").modal('show');
    return false;
  }
</script>

<?= $this->endSection() ?>