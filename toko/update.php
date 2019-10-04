<?php

require_once '../config/conn.php';

//if form is submitted
if ($_POST) {

    $validator = array('success' => false, 'messages' => array());

    $id = $_POST['toko_id'];
    $kdToko = $_POST['editKdToko'];
    $nmToko = $_POST['editNmToko'];

    $sql = "UPDATE toko SET KdToko = '$kdToko', NmToko = '$nmToko' WHERE id = $id";
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