<?php
include 'header.php';
?>
<!-- Custom styles for this page -->
  <link href="_resource/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<?php
include 'container.php';
?>

      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="barang.php" aria-expanded="true">
          <i class="fas fa-fw fa-cog"></i>
          <span>Barang</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="toko.php" aria-expanded="true">
          <i class="fas fa-fw fa-cog"></i>
          <span>Toko</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="penjualan.php" aria-expanded="true">
          <i class="fas fa-fw fa-cog"></i>
          <span>Penjualan</span>
        </a>
      </li>

      
<!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        </nav>
        <!-- End of Topbar -->

          <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
          <hr class="ne-divider my-0">

          <div class="removeMessages"></div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                <button class="btn btn-secondary pull pull-right" data-toggle="modal" data-target="#addBarang" id="addBarangModalBtn">
                        <span class="fa fa-plus-circle"></span>	Tambah Barang
                </button>
                <br /> <br />
              <div class="table-responsive">
                <table class="table table-bordered" id="dataBarang" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    
    <div class="modal fade" tabindex="-1" role="dialog" id="addBarang">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><span class="fa fa-plus-circle"> Tambah Barang</span></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
	      
          <form class="needs-validation" id="createBarangForm" novalidate>
	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group">
			    <label for="kdBarang" class="col-sm-6 control-label">Kode Barang</label>
			    <div class="col-sm-12"> 
			      <input type="text" class="form-control" maxlength="5" id="kdBarang" name="kdBarang" style="text-transform: uppercase;" required>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nmBarang" class="col-sm-6 control-label">Nama Barang</label>
			    <div class="col-sm-12">
			      <input type="text" class="form-control" id="nmBarang" name="nmBarang" style="text-transform: capitalize;" required>
			    </div>
			  </div>			 		

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	      </form> 
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="removeBarangModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><span class="fa fa-trash"></span> Hapus Barang</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
	      <div class="modal-body">
	        <p>Beneran mau dihapus ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="removeBtn">Hapus</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="editBarangModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><span class="fa fa-edit"> Ubah Data Barang</span></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
	      
          <form class="needs-validation" id="editBarangForm" novalidate>
            <div class="modal-body">
                <div class="editMessages"></div>

                <div class="form-group">
                    <label for="editKdBarang" class="col-sm-6 control-label">Kode Barang</label>
                    <div class="col-sm-12"> 
                    <input type="text" class="form-control" maxlength="5" id="editKdBarang" name="editKdBarang" style="text-transform: uppercase;" required>
                    <!-- here the text will apper  -->
                    </div>
                </div>
                <div class="form-group">
                    <label for="editNmBarang" class="col-sm-6 control-label">Nama Barang</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" id="editNmBarang" name="editNmBarang" style="text-transform: capitalize;" required>
                    </div>
                </div>			 		

            </div>
            <div class="modal-footer editBarangModal">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
	      </form> 
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->

<?php
include 'footer.php';
?>

  <!-- Page level plugins -->
  <script type="text/javascript" src="_resource/vendor/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="_resource/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script type="text/javascript" src="_resource/js/data-barang.js"></script>


</body>

</html>