<?php

require("../models/conectar.php");
require("../models/autoload.php");
spl_autoload_register("AutoloadFunction01");


$usuarios_id = $_POST['usuarios_id'];
$usuarios_cc = $_POST['usuarios_cc'];
$usuarios_nombre = $_POST['usuarios_nombre'];
$usuarios_correo = $_POST['usuarios_correo'];
$usuarios_correo = $_POST['usuarios_correo'];
$usuarios_direccion = $_POST['usuarios_direccion'];

$usuariosEditar = new USUARIO();
$usuariosEditarInfo = $usuariosEditar->EditarUsuario($usuarios_id, $usuarios_cc, $usuarios_nombre, $usuarios_telefono, $usuarios_correo, $usuarios_direccion);

if ($usuariosEditarInfo === 'Exito') {
  $texto_msg = '<p style: color:green;> Usuario actualizado exitosamente.</p>';
  mensaje_alert('success', 'Exito!', $texto_msg);
  die;
} else {
  $texto_msg = '<p style: color:green;> El usuario no se pudo actualizar, verifica tu consulta SQL.</p>';
  mensaje_alert('danger', 'Error!', $texto_msg);
  die;
}
