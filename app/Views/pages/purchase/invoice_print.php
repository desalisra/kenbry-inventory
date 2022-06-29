<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Document</title>

  <style>
    *{
      margin: 0;
      padding:0;
    }
    body{
      padding: 10px 20px;
      font-family: sans-serif;
    }
  </style>
</head>
<body>
  <table width="100%" cellspacing="0">
    <tr>
      <td align="left">
        <h4>INVOICE : <?= $header->sph_number ?></h4>
      </td>
      <td align="right">
        <p>Tanggal : <?= $header->sph_tanggal ?></p>
      </td>
    </tr>
  </table>
  <br>
  <h1 align="center">PENJUALAN</h1>
  <hr>
  <br>
  <p>Dikirim ke :</p>
  <p><?= $header->cus_nama ?></p>
  <p><?= $header->cus_alamat . " - " . $header->cus_tlpn ?></p>
  <br>

  <table border="1" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th width="10%">Kode</th>
        <th width="45%" align="left">Nama Produk</th>
        <th width="10%">Jml Satuan</th>
        <th width="15%">Harga Satuan</th>
        <th width="15%">Sub Total</th>
      </tr>
    </thead>
    <tbody>
      <?php $total = 0; ?>
      <?php foreach($detail as $key => $value) : ?>
        <tr>
          <td align="center"><?= $key + 1 ?></td>
          <td align="center"><?= $value->prd_id ?></td>
          <td><?= $value->prd_nama  ?></td>
          <td align="center"><?= $value->prd_panjang * $value->prd_lebar * $value->spd_qty ?> m2</td>
          <td align="center"><?= number_format($value->prd_harga) ?></td>
          <td align="center"><?= number_format($value->spd_harga) ?></td>
        </tr>
      <?php $total += $value->spd_harga ?>
      <?php endforeach; ?> 
    </tbody>
    <tfoot>
      <tr>
        <th colspan="5" class="text-right">Total</th>
        <th><?= number_format($total) ?></th>
      </tr>
    </tfoot>
  </table>

  <br>

  <p>Note :</p>
  <ul style="margin: 10px 20px">
    <li>Pembayaran tidak dapat ditarik kembali bila pemesanan di batalkan</li>
    <li>Barang yang sudah di beli / dipesan tidak dapat ditukar / dikembalikan dengan alasan apapun</li>
    <li>Bukti pemesanan dianggap sah / berlaku bila pembayaran sudah diterima</li>
  </ul>

  <br>
  <table width="100%" cellspacing="0">
    <tr>
      <td align="left">
        <p>Sistem Pembayaran :</p>
        <p>BANK BCA 5930642187 A/N ALIANTO</p>
      </td>
      <td align="right">
        <p>Tanggerang : <?= date("Y-m-d") ?></p>
      </td>
    </tr>
  </table>
  <br>
  <table width="100%" cellspacing="0">
    <tr>
      <td align="left">Disetujui</td>
      <td align="center">Penjual</td>
      <td align="right">Pemesan</td>
    </tr>
  </table>

</body>
</html>