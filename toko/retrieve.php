<?php

require_once '../config/conn.php';

$output = array('data' => array());

$sql = "SELECT * FROM toko";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
    $actionButton = '
    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
	    <li><a class="dropdown-item" data-toggle="modal" data-target="#editTokoModal" onclick="editToko('.$row['id'].')"> <span class="fa fa-edit"></span> Edit</a></li>
	    <li><a class="dropdown-item" data-toggle="modal" data-target="#removeTokoModal" onclick="removeToko('.$row['id'].')"> <span class="fa fa-trash"></span> Remove</a></li>
	  </ul>
    </div>
    ';

    $output['data'][] = array(
        $x,
        strtoupper($row['KdToko']),
        ucfirst($row['NmToko']),
        $actionButton
    );

    $x++;
}

$connect->close();

echo json_encode($output);