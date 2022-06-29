<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Jalan</title>

  <style>
    .data{
      margin-bottom: 50px;
    }

    .m-ttd{
      height:50px;
    }
  </style>
</head>
<body>
  <section class="Judul">
    <h1 align="center">SURAT JALAN</h1>
  </section>
  
  <section class="header">
    <?php $date = date_create($header->ship_tanggal); ?>
    <p align="right">Jakarta, <?= date_format($date,"d/m/Y")?></p>
    
    <p>No Sj : <b><?= $header->ship_number ?></b></p>
    <p>Kpd Yth : <?= $header->cus_nama ?> </p>
    <p><?= $header->cus_alamat . " - " . $header->cus_tlpn ?></p>
    <p>Deskripsi : <?= $header->ship_deskripsi ?></p>
  </section>


  <section class="data">
    <table border="1" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th width="5%" rowspan="2">No</th>
          <th align="left" rowspan="2">Produk</th>
          <th colspan="2">Ukuran</th>
          <th width="5%" rowspan="2">Qty</th>
          <th width="10%" rowspan="2">M2</th>
          <th width="20%" rowspan="2">Keterangan</th>
        </tr>
        <tr>
          <th width="5%">P</th>
          <th width="5%">L</th>
        </tr>
      </thead>
      <tbody>
        <?php $totalQty = 0; $totalM2 = 0; ?>
        <?php foreach($detail as $key => $value) : ?>
          <tr>
            <td align="center"><?= $key + 1 ?></td>
            <td><?= $value->prd_id . " - " . $value->prd_nama  ?></td>
            <td align="center"><?= $value->prd_panjang ?></td>
            <td align="center"><?= $value->prd_lebar ?></td>
            <td align="center"><?= $value->ship_qty ?></td>
            <td align="center"><?= $value->prd_panjang * $value->prd_lebar * $value->ship_qty ?></td>
            <td><?= $value->ship_keterangan ?></td>
          </tr>
          <?php $totalQty += $value->ship_qty ?>
          <?php $totalM2  += ($value->prd_panjang * $value->prd_lebar * $value->ship_qty) ?>
        <?php endforeach; ?> 
        <tr><td colspan="7"></td></tr>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">Total</th>
          <th><?= $totalQty ?></th>
          <th><?= $totalM2 ?></th>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </section>
  


  <table width="100%" class="ttd">
    <tr>
      <td>Tanda Terima</td>
      <td>Pengirim</td>
      <td>Hormat Kami</td>
    </tr>
    <div class="m-ttd"></div>
    <tr>
      <td>(..............................)</td>
      <td>(..............................)</td>
      <td>(..............................)</td>
    </tr>
  </table>
</body>
</html>