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
            <th width="10%">Tanggal</th>
            <th width="15%">No Transaksi</th>
            <th width="45%">Nama Produk</th>
            <th width="5%">In / Out</th>
            <th width="5%">qty</th>
            <th width="5%">M2</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($stock as $key => $value) : ?>
        <tr>
            <td><?= $value->tanggal ?></td>
            <td><?= $value->number ?></td>
            <td><?= $value->kdProduk . " - " . $value->nmProduk ?></td>

            <td align="center"><?= substr($value->number, 0, 2) == "IN" ? "In" : "Out" ?></td>
            <td align="center"><?= $value->qty ?></td>
            <td align="center"><?= $value->panjang * $value->lebar * $value->qty ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>