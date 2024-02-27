<?php include '../base_url.php';

include_once("../models/autoload.php");
spl_autoload_register("AutoloadFunction01");

$usuarios = new USUARIO();
$usuariosInfo = $usuarios->InfoUsuarios();

if (!empty($usuariosInfo) && is_array($usuariosInfo)) {
  $usuarios_nombre = $usuariosInfo[0]['usuarios_nombre'];
  $usuarios_cc = $usuariosInfo[0]['usuarios_cc'];
  $usuarios_telefono = $usuariosInfo[0]['usuarios_telefono'];
  $usuarios_correo = $usuariosInfo[0]['usuarios_correo'];
  $usuarios_direccion = $usuariosInfo[0]['usuarios_direccion'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../includes/header.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
  <div class="wrapper">

    <?php include '../includes/navbar.php'; ?>

    <?php include '../includes/menu.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Usuarios</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Listado de usuarios</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>CC</th>
                        <th>Nombre(s)</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      for ($i = 0; $i < count($usuariosInfo); $i++) {
                      ?>
                        <tr>
                          <td><?php echo $usuariosInfo[$i]['usuarios_cc'] ?></td>
                          <td><?php echo $usuariosInfo[$i]['usuarios_nombre'] ?></td>
                          <td><?php echo $usuariosInfo[$i]['usuarios_telefono'] ?></td>
                          <td><?php echo $usuariosInfo[$i]['usuarios_correo'] ?></td>
                          <td><?php echo $usuariosInfo[$i]['usuarios_direccion'] ?></td>
                          <td>
                            <a class="btn btn-warning" href="editar.usuarios.vw.php?id='<?php echo base64_encode($usuariosInfo[$i]['usuarios_id']); ?>'">
                              <i class="fas fa-edit"></i>
                            </a>

                            <a class="btn btn-danger" href="../controllers/delete.usuarios.ct.php?id='<?php echo base64_encode($usuariosInfo[$i]['usuarios_id']); ?>'" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                              <i class=" fas fa-trash"></i>
                            </a>

                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




    <?php include '../includes/footer.php'; ?>



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo BASE_PATH ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo BASE_PATH ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo BASE_PATH ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo BASE_PATH ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo BASE_PATH ?>/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo BASE_PATH ?>/dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</body>



</html>
