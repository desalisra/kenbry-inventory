<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Purchase</title>
</head>
<body>
  <h1 align="center">Rekap Transaksi Penjualan</h1>
  <p>Tanggal : <?= date("Y/m/d"); ?></p>

  <br>


  <table width="100%" cellspacing="0">
    <tr style="padding: 10px 0; border-bottom: 1px solid ">
      <td style="padding-left: 20px">Produk</td>
      <td>M2</td>
      <td>Sub Total</td>
    </tr>
    <?php $invoice = ""; ?>
    <?php foreach ($purchase as $k => $v) : ?>
      <?php if ($v->sph_number != $invoice) : ?>
        <tr>
          <td style="padding: 10px 0;" colspan="3"><b><?= $v->sph_number . " - " . $v->cus_nama ?></b></td>
        </tr>
      <?php endif ?>
      <tr>
        <td style="padding-left: 20px"><?= $v->spd_iteno . " - " . $v->prd_nama; ?></td>
        <td><?= $v->prd_panjang * $v->prd_lebar * $v->spd_qty ?></td>
        <td><?= number_format($v->prd_harga * $v->spd_qty) ?></td>
      </tr>
      <?php $invoice = $v->sph_number ?>
    <?php endforeach ?>
  </table>
</body>
</html>