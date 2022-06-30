<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Purchase</title>
</head>
<body>
  <h1 align="center">Rekap Transaksi Pengiriman</h1>
  <p>Tanggal : <?= date("Y/m/d"); ?></p>

  <br>


  <table width="100%" cellspacing="0">
    <tr style="padding: 10px 0; border-bottom: 1px solid ">
      <td style="padding-left: 20px">Produk</td>
      <td>M2</td>
      <td>Keterangan</td>
    </tr>
    <?php $do = ""; ?>
    <?php foreach ($shipping as $k => $v) : ?>
      <?php if ($v->ship_number != $do) : ?>
        <tr>
          <td style="padding: 10px 0;" colspan="2"><b><?= $v->ship_number . " - " . $v->cus_nama ?></b></td>
          <td style="padding: 10px 0;"><small><?= $v->ship_tanggal; ?></small></td>
        </tr>
      <?php endif ?>
      <tr>
        <td style="padding-left: 20px"><?= $v->ship_iteno . " - " . $v->prd_nama; ?></td>
        <td><?= $v->prd_panjang * $v->prd_lebar * $v->ship_qty ?></td>
        <td><?= $v->ship_keterangan == "" ? "-" : $v->ship_keterangan ?></td>
      </tr>
      <?php $do = $v->ship_number ?>
    <?php endforeach ?>
  </table>
</body>
</html>