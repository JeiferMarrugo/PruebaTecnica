<?php
require("../models/conectar.php");
require("../models/autoload.php");
spl_autoload_register("AutoloadFunction01");


$usuarios_id = base64_decode($_GET['id']);

$usuariosEditar = new USUARIO();
$usuariosEditarInfo = $usuariosEditar->DeleteUser($usuarios_id);

if ($usuariosEditarInfo === 'Exito') {
  header('location: ../views/lista.usuarios.vw.php');
  $texto_msg = 'Usuario actualizado exitosamente.';
  mensaje_alert('success', 'Exito!', $texto_msg);
  die;
} else {
  $texto_msg = 'El usuario no se pudo actualizar, verifica tu consulta SQL.';
  mensaje_alert('danger', 'Error!', $texto_msg);
  die;
}
