<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data Penjualan</title>
	<link rel="stylesheet" href="_resource/dist/css/global.css" type="text/css">
	<link href="_resource/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="_resource/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="_resource/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="_resource/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>
<body class="backg col-md-10 col-md-offset-1">
	<a class="putih" href="index.php"><h1 class="page-header" align="center">Data Penjualan</h1></a>

	<div class="panel panel-primary">
    	<div class="panel-heading">Tabel Data Penjualan</div>
        <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Toko</th>
                                <th>Nama Toko</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Quantity</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                    	<tbody>
                            <?php
                                include ('config/conn.php'); //memangggil conn untuk menghubungkan ke database
                                $queri = "SELECT toko.KdToko as KodeToko, toko.NamaToko, barang.KdBarang as KodeBarang, barang.NamaBarang AS NamaBarang, SUM(penjualan_detail.Qty) AS Qty, (SUM(penjualan_detail.Qty)*penjualan_detail.HargaSatuan) as Nilai from toko join penjualan_header on toko.KdToko = penjualan_header.KdToko JOIN penjualan_detail ON penjualan_header.NoFaktur = penjualan_detail.NoFaktur JOIN barang on penjualan_detail.KdBarang = barang.KdBarang GROUP by kodetoko, kodebarang ORDER BY toko.KdToko ASC";
                                $counter = 1;
                                $total = 0;
                                $hasil = $konek->query($queri); //variabel penampung
                                if ($hasil === false) {
                                    trigger_error('Perintah SQL salah! ' . $queri . 'Error: ' . $konek->error, E_USER_ERROR);
                                    //pesan jika tidak perintah SQL salah
                                }else{
                                    //jika perintah SQL benar maka akan memanggil data sesuai pada database
                                    while ($data = $hasil->fetch_array()){
                                        $total += $data['Nilai'];
                                        echo "<tr>
                                            <td>".$counter."</td>
                                    		<td>".$data['KodeToko']."</td>
                                    		<td>".$data['NamaToko']."</td>
                                    		<td>".$data['KodeBarang']."</td>
                                    		<td>".$data['NamaBarang']."</td>
                                    		<td>".$data['Qty']."</td>
                                    		<td>".$data['Nilai']."</td>"?>
                                    	</tr>
                                        <?php $counter++; 
                                    }
                                }
                            ?>
                            <tr>
                                <td colspan=6 style="text-align:right"><b>Total</b></td>
                                <td>
                                    <?php
                                        echo $total;
                                    ?>
                                </td>
                            </tr>
                        </tbody>
					</table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
	</body>

	<script src="_resource/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="_resource/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="_resource/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="_resource/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="_resource/dist/js/global.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</html>