<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="mb-2">
  <button class="btn btn-primary btn-sm" onclick="return tambahData()">
  <i class="fas fa-plus"></i> Add Customer
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
    <h6 class="m-0 font-weight-bold text-primary">List Customer</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="25%">Customer</th>
            <th width="10%">Telpn</th>
            <th width="30%">Alamat</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($customer as $key => $value) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->cus_nama ?></td>
            <td><?= $value->cus_tlpn ?></td>
            <td><?= $value->cus_alamat ?></td>
            <td>
              <button class="btn btn-success btn-sm" onclick="return ubahData('<?= $value->cus_id ?>')">
                <i class="fas fa-pen"></i> Edit
              </button>
              
              <form action="<?= base_url('customer/'.$value->cus_id) ?>" method="post" class="d-inline">
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

<!-- Customer Modal-->
<div class="modal modeal-lg fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Customer</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('/customer')  ?>" method="post">
        <div class="modal-body">
          <input type="hidden" class="form-control" id="cus_id" name="cus_id">
          <div class="form-group">
            <label for="">Nama Customer</label>
            <input type="text" class="form-control" id="cus_nama" name="cus_nama" placeholder="Masukan Nama" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Telpn</label>
            <input type="text" class="form-control" id="cus_tlpn" name="cus_tlpn" placeholder="Masukan Telpn" >
          </div>
          
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea class="form-control" name="cus_alamat" id="cus_alamat" placeholder="Masukan Alamat" ></textarea>
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
    $("#cus_id").val("");		
    $("#cus_nama").val("");			
    $("#cus_tlpn").val("");		
    $("#cus_alamat").val("");
    $("#ModalLabel").text("Add Customer")
    $("#customerModal").modal('show');	
  }
  
  function ubahData(id){
    $.ajax({
              url: '<?= base_url('customer'); ?>/' + id,
              method : "GET",
              async : false,
              dataType : 'json',
              success : function(data){	
                  $("#cus_id").val(data.cus_id);		
                  $("#cus_nama").val(data.cus_nama);	
                  $("#cus_tlpn").val(data.cus_tlpn);	
                  $("#cus_alamat").val(data.cus_alamat);		
              }
          });
    $("#ModalLabel").text("Edit Customer")
    $("#customerModal").modal('show');
    return false;
  }
</script>

<?= $this->endSection() ?>