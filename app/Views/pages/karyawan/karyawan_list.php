<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="mb-2">
  <button class="btn btn-primary btn-sm" onclick="return tambahData()">
  <i class="fas fa-plus"></i> Add Karyawan
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
    <h6 class="m-0 font-weight-bold text-primary">List Karyawan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="5%">NIP</th>
            <th width="25%">Nama</th>
            <th width="10%">JK</th>
            <th width="10%">Tgl Lahir</th>
            <th width="5%">Tlpn</th>
            <th width="5%">Email</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($karyawan as $key => $value) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->kry_nip ?></td>
            <td><?= $value->kry_nama ?></td>
            <td><?= $value->kry_jk == "L" ? "Laki-laki" : "Perempuan" ?></td>
            <td><?= $value->kry_tglLahir ?></td>
            <td><?= $value->kry_tlpn ?></td>
            <td><?= $value->kry_email ?></td>
            <td>
              <button class="btn btn-success btn-sm" onclick="return ubahData('<?= $value->kry_nip ?>')">
                <i class="fas fa-pen"></i> Edit
              </button>
              
              <form action="<?= base_url('karyawan/'.$value->kry_nip) ?>" method="post" class="d-inline">
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

<!-- Karyawan Modal-->
<div class="modal modeal-lg fade" id="karyawanModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Karyawan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('/karyawan')  ?>" method="post">
        <div class="modal-body">
          <input type="hidden" class="form-control" id="kry_nip" name="kry_nip">
          <div class="form-group">
            <label for="">Nama Karyawan</label>
            <input type="text" class="form-control" id="kry_nama" name="kry_nama" placeholder="Masukan nama" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select class="form-control" id="kry_jk" name="kry_jk">
              <option value="">-- Pilih Jenis Kelamin --</option>
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" id="kry_tglLahir" name="kry_tglLahir">
          </div>
          <div class="form-group">
            <label for="">Jabatan</label>
            <input type="text" class="form-control" id="kry_jabatan" name="kry_jabatan" placeholder="Masukan jabatan" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Telp</label>
            <input type="text" class="form-control" id="kry_tlpn" name="kry_tlpn" placeholder="Masukan Tlpn" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="kry_email" name="kry_email" placeholder="Masukan Email" autocomplete="off">
          </div>
          
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea class="form-control" name="kry_alamat" id="kry_alamat" ></textarea>
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
    $("#kry_nip").val("");		
    $("#kry_nama").val("");		
    $("#kry_jk").val("");		
    $("#kry_tglLahir").val("");		
    $("#kry_jabatan").val("");		
    $("#kry_tlpn").val("");		
    $("#kry_email").val("");
    $("#kry_alamat").val("");
    $("#ModalLabel").text("Add Karyawan")
    $("#karyawanModal").modal('show');	
  }
  
  function ubahData(id){
    $.ajax({
              url: '<?= base_url('karyawan/'); ?>/' + id,
              method : "GET",
              async : false,
              dataType : 'json',
              success : function(data){	
                  $("#kry_nip").val(data.kry_nip);		
                  $("#kry_nama").val(data.kry_nama);	
                  $("#kry_jk").val(data.kry_jk);
                  $("#kry_tglLahir").val(data.kry_tglLahir);
                  $("#kry_jabatan").val(data.kry_jabatan);		
                  $("#kry_tlpn").val(data.kry_tlpn);		
                  $("#kry_email").val(data.kry_email);	
                  $("#kry_alamat").val(data.kry_alamat);		
              }
          });
    $("#ModalLabel").text("Edit Karyawan")
    $("#karyawanModal").modal('show');
    return false;
  }
</script>

<?= $this->endSection() ?>