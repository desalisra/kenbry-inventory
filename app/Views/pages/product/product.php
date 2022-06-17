<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="mb-2">
  <a href="<?= base_url('product/add'); ?>" class="btn btn-primary btn-sm">
    <i class="fas fa-plus"></i> Add Product
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
    <h6 class="m-0 font-weight-bold text-primary">List Product</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="10%">Kode Produk</th>
            <th width="60%">Nama Produk</th>
            <th width="10%">Status</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($products as $key => $value) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->prd_id ?></td>
            <td><?= $value->prd_name ?></td>
            <td><?= $value->prd_aktifYN == "Y" ? "Aktif" : "Non Aktif" ?></td>
            <td>
              <a class="btn btn-success btn-sm mr-2" href="<?= base_url("/product/edit/$value->prd_id")?>">
                <i class="fas fa-pen"></i> Edit
              </a>
              <button class="btn btn-danger btn-sm" onclick="return ubahData(<?= $value->prd_id ?>)">
                <i class="fas fa-trash"></i> Test
              </button>
              
              <form action="<?= base_url('product/'.$value->prd_id) ?>" method="post" class="d-inline">
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

<script>
  function ubahData(id){
    // $("#m_kategori").modal('show');
    $.ajax({
              url: '<?= base_url('product/edit'); ?>/' + id,
              method : "GET",
              async : false,
              dataType : 'json',
              success : function(data){	
                  console.log(data)			
                  // var i;
                  // for(i=0; i<data.length; i++){
                  //   $("#id").val(data[i].User_Id);
                  //   $("#nama").val(data[i].User_Username);
                  //   $("#email").val(data[i].User_Email);
                  // }
              }
          });
    return false;
  }
</script>

<?= $this->endSection() ?>