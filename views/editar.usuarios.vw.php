<?php

include_once("../models/autoload.php");
spl_autoload_register("AutoloadFunction01");

$usuarios_id = base64_decode($_GET['id']);

$usuarios = new USUARIO();
$usuariosInfo = $usuarios->InfoUsuariosEdit($usuarios_id);

$usuarios_nombre = $usuariosInfo[0]['usuarios_nombre'];
$usuarios_cc = $usuariosInfo[0]['usuarios_cc'];
$usuarios_telefono = $usuariosInfo[0]['usuarios_telefono'];
$usuarios_correo = $usuariosInfo[0]['usuarios_correo'];
$usuarios_direccion = $usuariosInfo[0]['usuarios_direccion'];

include '../base_url.php';

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
              <a href="<?php echo BASE_PATH ?>/views/lista.usuarios.vw.php" class="btn btn-dark text-end"> <i class="fas fa-hand-point-left"></i> Volver</a>
              <h1>Editar usuario - <?php echo $usuarios_nombre ?></h1>
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
          <div class="row d-flex justify-content-center">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div id="mensajes"></div>
                <form method="post" id="formulario_usuarios" action="../controllers/editar.usuarios.ct.php">

                  <input type="hidden" name="usuarios_id" id="usuarios_id" value="<?php echo $usuarios_id; ?>">

                  <div class="card-body">
                    <div class="form-group">
                      <label for="usuarios_cc">CC</label>
                      <input type="text" class="form-control" id="usuarios_cc" name="usuarios_cc" value="<?php echo $usuarios_cc; ?>">
                    </div>
                    <div class="form-group">
                      <label for="usuarios_nombre">Nombre Completo</label>
                      <input type="text" class="form-control" id="usuarios_nombre" name="usuarios_nombre" value="<?php echo $usuarios_nombre; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="usuarios_telefono">Telefono</label>
                      <input type="number" class="form-control" id="usuarios_telefono" name="usuarios_telefono" value="<?php echo $usuarios_telefono; ?>">
                    </div>
                    <div class="form-group">
                      <label for="usuarios_correo">Correo</label>
                      <input type="email" class="form-control" id="usuarios_correo" name="usuarios_correo" value="<?php echo $usuarios_correo; ?>">
                    </div>
                    <div class="form-group">
                      <label for="usuarios_direccion">Direccion</label>
                      <input type="text" class="form-control" id="usuarios_direccion" name="usuarios_direccion" value="<?php echo $usuarios_direccion; ?>">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary">Editar Usuario</button>
                  </div>

                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
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

  <script src="<?php echo BASE_PATH ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo BASE_PATH ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?php echo BASE_PATH ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

  <script src="<?php echo BASE_PATH ?>/plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo BASE_PATH ?>/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo BASE_PATH ?>/dist/js/demo.js"></script>

  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          icon: 'info',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          icon: 'error',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          icon: 'warning',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.swalDefaultQuestion').click(function() {
        Toast.fire({
          icon: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });

      $('.toastrDefaultSuccess').click(function() {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultInfo').click(function() {
        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultError').click(function() {
        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
      $('.toastrDefaultWarning').click(function() {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });

      $('.toastsDefaultDefault').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultTopLeft').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'topLeft',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultBottomRight').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'bottomRight',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultBottomLeft').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          position: 'bottomLeft',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultAutohide').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          autohide: true,
          delay: 750,
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultNotFixed').click(function() {
        $(document).Toasts('create', {
          title: 'Toast Title',
          fixed: false,
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultFull').click(function() {
        $(document).Toasts('create', {
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          icon: 'fas fa-envelope fa-lg',
        })
      });
      $('.toastsDefaultFullImage').click(function() {
        $(document).Toasts('create', {
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          image: '../../dist/img/user3-128x128.jpg',
          imageAlt: 'User Picture',
        })
      });
      $('.toastsDefaultSuccess').click(function() {
        $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultInfo').click(function() {
        $(document).Toasts('create', {
          class: 'bg-info',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultWarning').click(function() {
        $(document).Toasts('create', {
          class: 'bg-warning',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultDanger').click(function() {
        $(document).Toasts('create', {
          class: 'bg-danger',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
      $('.toastsDefaultMaroon').click(function() {
        $(document).Toasts('create', {
          class: 'bg-maroon',
          title: 'Toast Title',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

  <script>
    $("#formulario_usuarios").validate({
      rules: {
        usuarios_cc: {
          required: true,
        },
        usuarios_nombre: {
          required: true,
          minlength: 5
        },
        usuarios_telefono: {
          required: true,
        },
        usuarios_correo: {
          required: true,
          email: true
        },
        usuarios_direccion: {
          required: true,
        }
      },
      messages: {
        usuarios_cc: {
          required: "<p style='color: red; font-style: italic;'>Este campo es obligatorio* <br> Por favor, ingrese la identificacion del usuario</p>",
        },
        usuarios_nombre: {
          required: "<p style='color: red; font-style: italic;'>Este campo es obligatorio* <br> Por favor, ingrese el nombre del usuario</p> </p>",
          minlength: "<p style='color: red;'>Debe tener como minimo 5 caracteres</p>"
        },
        usuarios_telefono: {
          required: "<p style='color: red; font-style: italic;'>Este campo es obligatorio* <br> Por favor, ingrese su numero de telefono</p>",
        },
        usuarios_correo: {
          required: "<p style='color: red; font-style: italic;'>Este campo es obligatorio* <br> Por favor, ingrese su correo electronico</p>",
          email: "<p style='color: red; font-style: italic;'>Ingrese una direccion de correo valida</p>"
        },
        usuarios_direccion: {
          required: "<p style='color: red; font-style: italic;'>Este campo es obligatorio* <br> Por favor, la direccion de su vivienda</p>",
        }
      },
      highlight: function(element, errorClass) {
        $(element).addClass(errorClass);
        $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element, errorClass) {
        $(element).removeClass(errorClass);
        $(element).closest('.form-group').removeClass('has-error');
      },

      submitHandler: function(form) {

        var btnEnviar = $("#btnEnviar");
        $.ajax({
          type: $(form).attr("method"),
          url: $(form).attr("action"),
          data: $(form).serialize(),
          beforeSend: function() {
            btnEnviar.val("Enviando");
            btnEnviar.attr("disabled", "disabled");
          },
          complete: function(data) {
            btnEnviar.val("Enviar formulario");
            btnEnviar.removeAttr("disabled");
          },
          success: function(data) {
            $("#mensajes").html(data);
            $("#formulario_usuarios")[0].reset();
          },
          error: function(data) {
            alert("Problemas al tratar de enviar el formulario");
          }
        });
        // Cancela el envío del formulario
        return false;

      }
    });
  </script>

</body>



</html>
