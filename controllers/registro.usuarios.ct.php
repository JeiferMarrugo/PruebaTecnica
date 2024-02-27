<?php
require("../models/conectar.php");
require("../models/autoload.php");
spl_autoload_register("AutoloadFunction01");

$usuarios_cc = $_POST['usuarios_cc'];
$usuarios_nombre = $_POST['usuarios_nombre'];
$usuarios_telefono = $_POST['usuarios_telefono'];
$usuarios_correo = $_POST['usuarios_correo'];
$usuarios_direccion = $_POST['usuarios_direccion'];


$ExisteUsuarioCC = new USUARIO();
$ExisteUsuarioCCdata = $ExisteUsuarioCC->UsuariosExisteCC($usuarios_cc);

if (sizeof($ExisteUsuarioCCdata) > 0) {
    $UsuarioIExiste_nombre = $ExisteUsuarioCCdata[0]['usuarios_nombre'];
    $texto_msg = 'Identificacion ya existe: ' . $usuarios_cc . ' - Nombre de usuario: ' . $UsuarioIExiste_nombre;
    mensaje_alert('info', 'Info!', $texto_msg);
    die;
}


$ExisteUsuarioCorreo = new USUARIO();
$ExisteUsuarioCorreodata = $ExisteUsuarioCorreo->UsuariosExisteCorreo($usuarios_correo);

if (sizeof($ExisteUsuarioCorreodata) > 0) {
    $UsuarioIExiste_nombre = $ExisteUsuarioCorreodata[0]['usuarios_nombre'];
    $texto_msg = 'Este correo electronico ya existe: ' . $usuarios_correo . ' - En el usuario: ' . $UsuarioIExiste_nombre;
    mensaje_alert('info', 'Info!', $texto_msg);
    die;
}


//FUNCION DE REGISTRAR USUARIO
$UsuarioN = new USUARIO();
$UsuarioNuevo = $UsuarioN->NuevoUsuario($usuarios_cc, $usuarios_nombre, $usuarios_telefono, $usuarios_correo, $usuarios_direccion);

if ((int)$UsuarioNuevo > 0) {
    $texto_msg = 'Usuario registrado exitosamente';
    mensaje_alert('success', 'Exito!', $texto_msg);
    die;
} else {
    $texto_msg = 'Usuario registrado exitosamente ';
    mensaje_alert('danger', 'Error!', $texto_msg);
    die;
}

?>
