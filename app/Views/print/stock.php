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
            <th width="5%">No</th>
            <th width="10%">Kode Produk</th>
            <th width="45%">Nama Produk</th>
            <th width="5%">P</th>
            <th width="5%">L</th>
            <th width="10%">Qty</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($stock as $key => $value) : ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $value->prd_id ?></td>
            <td><?= $value->prd_nama ?></td>
            <td><?= $value->prd_panjang ?></td>
            <td><?= $value->prd_lebar ?></td>
            <td><?= $value->stock_qty ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>