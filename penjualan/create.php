<?php

require_once '../config/conn.php';

if($_POST) {

    $validator = array('success' => false, 'message' => array());

    $noFaktur = $_POST['noFaktur'];
    $kdBarang = $_POST['kdBarang'];
    $qty = $_POST['qty'];
    $hrgSatuan = $_POST['hrgSatuan'];
    $diskon = $_POST['diskon'];


    $sql = "INSERT INTO barang (NoFaktur, KdBarang, Qty, HargaSatuan, Diskon) VALUES ('$noFaktur', '$kdBarang', '$qty', '$hrgSatuan', '$diskon')";
    $query = $connect->query($sql);

    if($query === TRUE) {
        $validator['success'] = true;
        $validator['message'] = "Successfully Added";
    } else {
        $validator['success'] = false;
        $validator['message'] = "Error while adding Penjualan";
    }

    $connect->close();

    echo json_encode($validator);
    
}