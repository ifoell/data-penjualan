<?php

require_once '../config/conn.php';

$Id = $_POST['penjualanhdr_id'];

$sql = "SELECT * FROM penjualan_header WHERE id = $Id";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);
