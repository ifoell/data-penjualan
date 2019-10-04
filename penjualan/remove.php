<?php

require_once '../config/conn.php';

$output = array('success' => false, 'messages' => array());

$barangId = $_POST['barang_id'];

$sql = "DELETE FROM barang WHERE id = {$barangId}";
$query = $connect->query($sql);
if ($query === true) {
    $output['success'] = true;
    $output['messages'] = 'Successfully removed';
} else {
    $output['success'] = false;
    $output['messages'] = 'Error while removing the data';
}

// close database connection
$connect->close();

echo json_encode($output);
