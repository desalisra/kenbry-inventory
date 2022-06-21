<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<?php date_default_timezone_set("Asia/Jakarta"); ?>

<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
    <div class="me-4 mb-3 mb-sm-0">
        <h2 class="mb-0">Dashboard</h2>
        <div class="small">
            <span class="fw-500 text-primary"><?= date("l") ?></span>
            · <?= date("d M Y") ?>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body p-5" style="background-image: url(<?= base_url() ?>/img/bg-waves.svg); background-repeat: no-repeat; background-position:bottom">
        <div class="row align-items-center justify-content-between">
            <div class="col">
                <h3 class="text-primary">PT. Kenbry Marmer Pratama</h3>
                <p>Alamat: Kavling DPR, Jl. KH Hasyim Ashari Gg. Ambon No.174, RT.001/RW.004, Nerogtog, Kec. Cipondoh, Kota Tangerang, Banten 15145</p>
            </div>
            <div class="col  d-none d-lg-block mt-xxl-n4">
                <img src="<?= base_url() ?>/img/logo.png" class="img-fluid px-xl-4 mt-xxl-n5" alt="img">
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>