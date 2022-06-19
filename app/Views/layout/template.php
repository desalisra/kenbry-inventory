<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Iventory</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>/lib/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="<?= base_url(); ?>/lib/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?= $this->include('layout/sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Navbar -->
        <?= $this->include('layout/navbar') ?>
        <!-- End of Navbar -->
        
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?= $this->renderSection('content') ?>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PT Kenbry Marmer Pratama 2022</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>/lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>/lib/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url(); ?>/lib/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>/lib/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script>

  <script>
      $('#addRow').click(function () {
        var html = `
          <div class="row mb-2">
            <div class="col-md-5">
              <select class="form-control" name="produk[]" required>
                <option value="">Pilih Produk</option>
                <?php if(isset($products)) : ?>
                  <?php foreach ($products as $key => $value) : ?>
                    <option value="<?= $value->prd_id ?>"><?= $value->prd_nama . " - " . $value->prd_panjang . "m x ". $value->prd_lebar . "m" ?></option>
                  <?php endforeach ?>
                <?php endif ?>
              </select>
            </div>
            <div class="col-md-2">
              <input type="number" class="form-control" name="qty[]" placeholder="Qty" required>
            </div>
            <div class="col-md-5">
              <input type="text" class="form-control" name="ket[]" placeholder="Keterangan" autocomplete="off">
            </div>
          </div>
        `;

        $('#newRow').append(html);
    });
  
</script>

</body>
</html>