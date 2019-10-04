<?php

require_once '../config/conn.php';

//if form is submitted
if ($_POST) {

    $validator = array('success' => false, 'messages' => array());

    $id = $_POST['barang_id'];
    $kdBarang = $_POST['editKdBarang'];
    $nmBarang = $_POST['editNmBarang'];

    $sql = "UPDATE barang SET KdBarang = '$kdBarang', NmBarang = '$nmBarang' WHERE id = $id";
    $query = $connect->query($sql);

    if ($query === true) {
        $validator['success'] = true;
        $validator['messages'] = "Successfully Updated";
    } else {
        $validator['success'] = false;
        $validator['messages'] = "Error while updating the data";
    }

    // close the database connection
    $connect->close();

    echo json_encode($validator);

}