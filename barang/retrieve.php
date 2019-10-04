<?php

require_once '../config/conn.php';

$output = array('data' => array());

$sql = "SELECT * FROM barang";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
    $actionButton = '
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
	    <li><a class="dropdown-item" data-toggle="modal" data-target="#editBarangModal" onclick="editBarang('.$row['id'].')"> <span class="fa fa-edit"></span> Edit</a></li>
	    <li><a class="dropdown-item" data-toggle="modal" data-target="#removeBarangModal" onclick="removeBarang('.$row['id'].')"> <span class="fa fa-trash"></span> Remove</a></li>
	  </ul>
    </div>
    ';

    $output['data'][] = array(
        $x,
        strtoupper($row['KdBarang']),
        ucfirst($row['NmBarang']),
        $actionButton
    );

    $x++;
}

$connect->close();

echo json_encode($output);