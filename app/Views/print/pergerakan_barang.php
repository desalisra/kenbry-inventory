<?php date_default_timezone_set("Asia/Jakarta"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Stock</title>
</head>
<body>

<h2 align="center">Stock Produk</h2>

<p>Tanggal : <?= date("d/m/Y") ?></p>
<hr>
<br>
<table width="100%" cellspacing="0" border="1">
    <thead>
        <tr>
            <th align="left" rowspan="2" width="10%">Tanggal</th>
            <th colspan="2" width="20%">No transaksi</th>
            <th align="left" rowspan="2" width="50%">Produk</th>
            <th rowspan="2" width="10%">Qty</th>
        </tr>
        <tr>
            <th width="10%">IN</th>
            <th width="10%">Out</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($stock as $key => $value) : ?>
        <?php $date = date_create($value->trnd_updateTime); ?>
        <tr>
            <td><?= date_format($date, "d/m/Y") ?></td>
            <td align="center"><?= substr($value->trnd_id,0,2) == "IN" ? $value->trnd_id : "" ?></td>
            <td align="center"><?= substr($value->trnd_id,0,2) == "OT" ? $value->trnd_id : "" ?></td>
            <td><?= $value->trnd_produkId . " - " . $value->prd_nama . " (" . $value->prd_panjang . " x " . $value->prd_lebar . ")" ?></td>
            <td align="center"><?= $value->trnd_qty ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>