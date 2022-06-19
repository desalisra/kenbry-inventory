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
    <?php $date = date_create($header->trnh_date); ?>
    <p align="right">Jakarta, <?= date_format($date,"d/m/Y")?></p>
    
    <p>No Sj : <?= $header->trnh_id ?></p>
    <p>Kpd Yth : </p>
    <p>Deskripsi : </p>
  </section>
  <hr>

  <section class="data">
    <table border="1" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th width="5%" rowspan="2">No</th>
          <th align="left" rowspan="2">Produk</th>
          <th colspan="2">Ukuran</th>
          <th width="5%" rowspan="2">Qty</th>
          <th rowspan="2">Keterangan</th>
        </tr>
        <tr>
          <th width="5%">P</th>
          <th width="5%">L</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($detail as $key => $value) : ?>
        <tr>
          <td align="center"><?= $key + 1 ?></td>
          <td><?= $value->prd_id . " - " . $value->prd_nama  ?></td>
          <td align="center"><?= $value->prd_panjang ?></td>
          <td align="center"><?= $value->prd_lebar ?></td>
          <td align="center"><?= $value->trnd_qty ?></td>
          <td><?= $value->trnd_ket ?></td>
        </tr>
      <?php endforeach; ?> 
    </tbody>
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