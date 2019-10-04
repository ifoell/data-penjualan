<?php

require_once '../config/conn.php';

$output = array('data' => array());

$sql = "SELECT penjualan_detail.id as id, penjualan_header.id as hdr_id, penjualan_detail.NoFaktur, toko.KdToko as KodeToko, toko.NmToko as NamaToko, barang.KdBarang as KodeBarang, barang.NmBarang AS NamaBarang, SUM(penjualan_detail.Qty) AS Qty, penjualan_detail.HargaSatuan as hrgSatuan, (SUM(penjualan_detail.Qty)*penjualan_detail.HargaSatuan) as Nilai, penjualan_detail.Diskon from penjualan_detail JOIN penjualan_header ON penjualan_header.NoFaktur = penjualan_detail.NoFaktur join toko on penjualan_header.KdToko = toko.KdToko JOIN barang on penjualan_detail.KdBarang = barang.KdBarang GROUP by kodetoko, kodebarang ORDER BY toko.KdToko ASC";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
    // $total='';
    
    $actionButton = '
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="penjualan/print.php?id='.$row['id'].'"> <span class="fa fa-eye"></span> Cetak</a></li>
        <li><a class="dropdown-item" data-toggle="modal" data-target="#editPenjualanHdrModal" onclick="editPenjualanHdr('.$row['hdr_id'].')"> <span class="far fa-edit"></span> Edit Header</a></li>
        <li><a class="dropdown-item" data-toggle="modal" data-target="#editPenjualanModal" onclick="editPenjualan('.$row['hdr_id'].')"> <span class="fas fa-edit"></span> Edit Detail</a></li>
        <li><a class="dropdown-item" data-toggle="modal" data-target="#removePenjualanHdrModal" onclick="removePenjualanHdr('.$row['hdr_id'].')"> <span class="fa fa-trash"></span> Remove Header</a></li>
        <li><a class="dropdown-item" data-toggle="modal" data-target="#removePenjualanModal" onclick="removePenjualan('.$row['id'].')"> <span class="fa fa-trash"></span> Remove Detail</a></li>
	  </ul>
    </div>
    ';



    $output['data'][] = array(
        $x,
        $row['NoFaktur'],
        strtoupper($row['KodeBarang']),
        ucfirst($row['NamaBarang']),
        $row['Qty'],
        $row['hrgSatuan'],
        // $row['Diskon'],
        // $row['Nilai'],
        $actionButton
        // $footar
    );
    // $total =+ $row['Nilai'];

    $x++;
}

$connect->close();

echo json_encode($output);