<?php include 'base_url.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/header.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>

    <?php include 'includes/menu.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
      <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
        <div class="nav-item dropdown">
          <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Close</a>
          <div class="dropdown-menu mt-0">
            <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close All</a>
            <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Close All Other</a>
          </div>
        </div>
        <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
        <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
        <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
        <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
      </div>
      <div class="tab-content">
        <div class="tab-empty">
          <h2 class="display-4">Ninguna pagina seleccionada!</h2>
        </div>
        <div class="tab-loading">
          <div>
            <h2 class="display-4">Cargando... <i class="fa fa-sync fa-spin"></i></h2>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->


    <?php include 'includes/footer.php'; ?>



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo BASE_PATH ?>/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo BASE_PATH ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo BASE_PATH ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo BASE_PATH ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo BASE_PATH ?>/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo BASE_PATH ?>/dist/js/demo.js"></script>
</body>

</html>
