<html>
<body onLoad="window.print();">
   <?php
   include '../config/conn.php';
   ?>

<style type="text/css">
body {
  font-size:12px;
  font-family:Arial, Helvetica, sans-serif;
}
.style1{
  font-size:12px;
  font-family:Arial, Helvetica, sans-serif; 
}
</style>
        <?php

          $Id = $_POST['id'];

          $sql = "SELECT penjualan_header.id as id, penjualan_header.NoFaktur, toko.KdToko as KodeToko, toko.NmToko as NamaToko, barang.KdBarang as KodeBarang, barang.NmBarang AS NamaBarang, SUM(penjualan_detail.Qty) AS Qty, (SUM(penjualan_detail.Qty)*penjualan_detail.HargaSatuan) as Nilai, penjualan_detail.Diskon from penjualan_header join toko on penjualan_header.KdToko = toko.KdToko JOIN penjualan_detail ON penjualan_header.NoFaktur = penjualan_detail.NoFaktur JOIN barang on penjualan_detail.KdBarang = barang.KdBarang WHERE penjualan_header.id=$Id GROUP by kodetoko, kodebarang ORDER BY toko.KdToko ASC";

          $query = $connect->query($sql);

        //   $total = mysqli_num_rows($sql); 
        ?>

      <br/>
      <h1 align="center">LAPORAN DATA PENJUALAN</h1>

      <br/><br/><br/>

      
      <table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px" class="style1">
        
        <thead>
            <tr>
                <td width="4%" height="34" align="center" bgcolor="#CCCCCC">No</td>
                <td width="" bgcolor="#CCCCCC" align="center">Kode Barang</td>
                <td width="" bgcolor="#CCCCCC" align="center">Nama Barang</td>
                <td width="" bgcolor="#CCCCCC" align="center">Qty</td>
                <td width="" bgcolor="#CCCCCC" align="center">Harga</td>
            </tr>
        </thead>
        <?php
          $no = 1;
              
        //   while ($data=mysql_fetch_array($sql)) {
            while ($row = $query->fetch_assoc()) {
        ?>
        <tbody>
          <tr>
            <td height="27" align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo $row['KdBarang']; ?></td>
            <td align="center"><?php echo $row['']; ?></td>
            <td align="center"><?php echo $row['']; ?></td>
            <td align="center"><?php echo $row['']; ?></td>
                
          </tr>
          <?php $no++; ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
            </tr>
        </tfoot>

          <?php } ?>
      </table>

</body>
</html>