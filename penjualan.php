<?php
include 'header.php';
?>
<!-- Custom styles for this page -->
  <link href="_resource/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https:

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
      <li class="nav-item">
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

      <li class="nav-item active">
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
          <h1 class="h3 mb-2 text-gray-800">Data Penjualan</h1>
          <hr class="ne-divider my-0">

          <div class="removeMessages"></div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">

                <div class="btn-group pull pull-right">
                    <button type="button" class="btn btn-secondary dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tambah Data Penjualan <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" data-toggle="modal" data-target="#addPenjualanHdr" id="addPenjualanHdrModalBtn"> <span class="fa fa-plus-square"></span> Tambah Penjualan Header</a></li>
                      <li><a class="dropdown-item" data-toggle="modal" data-target="#addPenjualan" id="addPenjualanModalBtn"> <span class="fa fa-plus-circle"></span> Tambah Penjualan Detail</a></li>
                    </ul>
                </div>
                <br /> <br />
              <div class="table-responsive">
                <table class="table table-bordered" id="dataPenjualan" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>No. Faktur</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Qty</th>
                      <th>Harga</th>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="addPenjualan">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><span class="fa fa-plus-circle"> Tambah Penjualan</span></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>

          <form class="needs-validation" id="createPenjualanForm" novalidate>
	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group">
			    <label for="noFaktur" class="col-sm-6 control-label">No. Faktur</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" maxlength="5" id="noFaktur" name="noFaktur" required>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="kdBarang" class="col-sm-6 control-label">Kode Barang</label>
			    <div class="col-sm-12">
			      <input type="text" class="form-control" id="kdBarang" name="kdBarang" style="text-transform: uppercase;" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="qty" class="col-sm-6 control-label">Quantity</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" id="qty" name="qty" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="hrgSatuan" class="col-sm-6 control-label">Harga Satuan</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" id="hrgSatuan" name="hrgSatuan" required>
			    </div>
			  </div>
        <div class="input-group form-group">
			    <label for="diskon" class="col-sm-6 control-label">Diskon</label>
			    <div class="col-sm-12">
			      <input type="text" class="form-control" id="diskon" name="diskon" required>
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

  <div class="modal fade" tabindex="-1" role="dialog" id="addPenjualanHdr">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><span class="fa fa-plus-circle"> Tambah Penjualan Header</span></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>

          <form class="needs-validation" id="createPenjualanHdrForm" novalidate>
	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group">
			    <label for="noFaktur" class="col-sm-6 control-label">No. Faktur</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" maxlength="5" id="noFakturHdr" name="noFakturHdr" required>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="tglHdr" class="col-sm-6 control-label">Tanggal</label>
			    <div class="col-sm-12">
			      <input type="date" class="form-control" id="tglHdr" name="tglHdr" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="kdTokoHdr" class="col-sm-6 control-label">Kode Toko</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" id="kdTokoHdr" name="kdTokoHdr" required>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="removePenjualanModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><span class="fa fa-trash"></span> Hapus Data Penjualan</h4>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="editPenjualanModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><span class="fa fa-edit"> Ubah Data Penjualan</span></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>

          <form class="needs-validation" id="editPenjualanForm" novalidate>
            <div class="modal-body">
                <div class="editMessages"></div>

                <div class="form-group">
			    <label for="editNoFaktur" class="col-sm-6 control-label">No. Faktur</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" maxlength="5" id="editNoFaktur" name="editNoFaktur" required>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editKdBarang" class="col-sm-6 control-label">Kode Barang</label>
			    <div class="col-sm-12">
			      <input type="text" class="form-control" id="editKdBarang" name="editKdBarang" style="text-transform: uppercase;" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="editQty" class="col-sm-6 control-label">Quantity</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" id="editQty" name="editQty" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="editHargaSatuan" class="col-sm-6 control-label">Harga Satuan</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" id="editHargaSatuan" name="editHargaSatuan" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="editDiskon" class="col-sm-6 control-label">Diskon</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" id="editDiskon" name="editDiskon" required>
			    </div>
			  </div>

            </div>
            <div class="modal-footer editPenjualanModal">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->

  <div class="modal fade" tabindex="-1" role="dialog" id="editPenjualanHdrModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><span class="fa fa-plus-circle"> Edit Penjualan Header</span></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>

          <form class="needs-validation" id="editPenjualanHdrForm" novalidate>
	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group">
			    <label for="editNoFakturHdr" class="col-sm-6 control-label">No. Faktur</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" maxlength="5" id="editNoFakturHdr" name="noFakturHdr" required>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="editTglHdr" class="col-sm-6 control-label">Tanggal</label>
			    <div class="col-sm-12">
			      <input type="date" class="form-control" id="editTglHdr" name="editTglHdr" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="editKdTokoHdr" class="col-sm-6 control-label">Kode Toko</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" id="editKdTokoHdr" name="editKdTokoHdr" required>
			    </div>
			  </div>

	      </div>
	      <div class="modal-footer editPenjualanHdrModal">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

  <div class="modal fade" tabindex="-1" role="dialog" id="showPenjualanModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><span class="fa fa-eye"> Data Penjualan</span></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>

            <div class="modal-body">
                <div class="form-group">
			    <label for="showNoFaktur" class="col-sm-6 control-label">No. Faktur</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" maxlength="5" id="showNoFaktur" name="showNoFaktur" required>
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="showKdBarang" class="col-sm-6 control-label">Kode Barang</label>
			    <div class="col-sm-12">
			      <input type="text" class="form-control" id="showKdBarang" name="showKdBarang" style="text-transform: uppercase;" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="showQty" class="col-sm-6 control-label">Quantity</label>
			    <div class="col-sm-12">
			      <input type="number" class="form-control" id="showQty" name="showQty" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="showHrgSatuan" class="col-sm-6 control-label">Harga Satuan</label>
			    <div class="col-sm-12">
			      <input type="text" class="form-control" id="showHrgSatuan" name="showHrgSatuan" required>
			    </div>
			  </div>
        <div class="form-group">
			    <label for="showDiskon" class="col-sm-6 control-label">Diskon</label>
			    <div class="col-sm-12">
			      <input type="text" class="form-control" id="showDiskon" name="showDiskon" required>
			    </div>
			  </div>

        </div>
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
  <!-- <script type="text/javascript" src="https:
  <script type="text/javascript" src="https:
  <script type="text/javascript" src="https: -->
  
  <script type="text/javascript" src="_resource/js/filterDropDown.js"></script>

  <!-- Page level custom scripts -->
  <script type="text/javascript" src="_resource/js/data-penjualan.js"></script>


</body>

</html>