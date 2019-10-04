<?php

require_once '../config/conn.php';

$Id = $_POST['barang_id'];

$sql = "SELECT * FROM barang WHERE id = $Id";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);
