<?php

require_once '../config/conn.php';

$Id = $_POST['id'];
// $NoFaktur = $_POST['noFaktur'];

// $sql = "SELECT penjualan_header.id as id, penjualan_header.NoFaktur, toko.KdToko as KodeToko, toko.NmToko as NamaToko, barang.KdBarang as KodeBarang, barang.NmBarang AS NamaBarang, SUM(penjualan_detail.Qty) AS Qty, (SUM(penjualan_detail.Qty)*penjualan_detail.HargaSatuan) as Nilai, penjualan_detail.Diskon from penjualan_header join toko on penjualan_header.KdToko = toko.KdToko JOIN penjualan_detail ON penjualan_header.NoFaktur = penjualan_detail.NoFaktur JOIN barang on penjualan_detail.KdBarang = barang.KdBarang WHERE penjualan_header.id=$Id GROUP by kodetoko, kodebarang ORDER BY toko.KdToko ASC";
$sql = "SELECT penjualan_header.id as id, penjualan_header.NoFaktur, toko.KdToko as KodeToko, toko.NmToko as NamaToko, barang.KdBarang as KodeBarang, barang.NmBarang AS NamaBarang, SUM(penjualan_detail.Qty) AS Qty, penjualan_detail.HargaSatuan as HargaSatuan, (SUM(penjualan_detail.Qty)*penjualan_detail.HargaSatuan) as Nilai, penjualan_detail.Diskon from penjualan_header join toko on penjualan_header.KdToko = toko.KdToko JOIN penjualan_detail ON penjualan_header.NoFaktur = penjualan_detail.NoFaktur JOIN barang on penjualan_detail.KdBarang = barang.KdBarang WHERE penjualan_header.id=$Id GROUP by kodetoko, kodebarang ORDER BY toko.KdToko ASC";

// $sql = "SELECT penjualan_header.id as id, penjualan_header.NoFaktur, toko.KdToko as KodeToko, toko.NmToko as NamaToko, barang.KdBarang as KodeBarang, barang.NmBarang AS NamaBarang, SUM(penjualan_detail.Qty) AS Qty, penjualan_detail.HargaSatuan as HargaSatuan, (SUM(penjualan_detail.Qty)*penjualan_detail.HargaSatuan) as Nilai, penjualan_detail.Diskon from penjualan_header join toko on penjualan_header.KdToko = toko.KdToko JOIN penjualan_detail ON penjualan_header.NoFaktur = penjualan_detail.NoFaktur JOIN barang on penjualan_detail.KdBarang = barang.KdBarang WHERE penjualan_header.noFaktur=$NoFaktur and penjualan_detail.id=$id GROUP by kodetoko, kodebarang ORDER BY toko.KdToko ASC";

$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);
