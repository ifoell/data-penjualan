<?php

require_once '../config/conn.php';

if($_POST) {

    $validator = array('success' => false, 'message' => array());

    $kdToko = $_POST['kdToko'];
    $nmToko = $_POST['nmToko'];

    $sql = "INSERT INTO toko (KdToko, NmToko) VALUES ('$kdToko', '$nmToko')";
    $query = $connect->query($sql);

    if($query === TRUE) {
        $validator['success'] = true;
        $validator['message'] = "Successfully Added";
    } else {
        $validator['success'] = false;
        $validator['message'] = "Error while adding Barang";
    }

    $connect->close();

    echo json_encode($validator);
    
}