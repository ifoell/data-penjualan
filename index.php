<?php
    include ('header.php');
?>
  

<?php
    include ('container.php');
?>
<!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="barang.php" aria-expanded="true">
          <i class="fas fa-fw fa-archive"></i>
          <span>Barang</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="toko.php" aria-expanded="true">
          <i class="fas fa-fw fa-archway"></i>
          <span>Toko</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="penjualan.php" aria-expanded="true">
          <i class="fas fa-fw fa-book"></i>
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

        <div class="container-fluid">


          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                  <h2>Selamat Datang di Aplikasi Data Penjualan</h2>
                </div>
              </div>
            </div>

            
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
    include ('footer.php');
?>
      <!-- Page level plugins -->
  <script src="_resource/vendor/chart.js/Chart.min.js"></script>

</body>

</html>