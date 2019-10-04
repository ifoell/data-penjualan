<?php

require_once '../config/conn.php';

if($_POST) {

    $validator = array('success' => false, 'message' => array());

    $kdBarang = $_POST['kdBarang'];
    $nmBarang = $_POST['nmBarang'];

    $sql = "INSERT INTO barang (KdBarang, NmBarang) VALUES ('$kdBarang', '$nmBarang')";
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