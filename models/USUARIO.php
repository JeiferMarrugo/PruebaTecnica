<?php
require_once("conectar.php");
require_once("functions.php");


class USUARIO
{
  private $datos = array();


  public function InfoUsuarios()
  {
    try {
      $modelo = new conectar();
      $conexion = $modelo->get_conexion();
      $sql = "SELECT * FROM usuarios;";
      $sth = $conexion->prepare($sql);
      $sth->execute();

      while ($result = $sth->fetch()) {
        $this->datos[] = $result;
      }
      return $this->datos;
    } catch (PDOException $e) {
      $mensaje = "Error, el usuario ya existe: " . $e->getMessage();
      return $mensaje;
    }
  }


  public function InfoUsuariosEdit($usuarios_id)
  {
    try {
      $modelo = new conectar();
      $conexion = $modelo->get_conexion();
      $sql = "SELECT * FROM usuarios WHERE usuarios_id = :usuarios_id;";
      $sth = $conexion->prepare($sql);
      $sth->bindParam(':usuarios_id', $usuarios_id);
      $sth->execute();

      while ($result = $sth->fetch()) {
        $this->datos[] = $result;
      }
      return $this->datos;
    } catch (PDOException $e) {
      $mensaje = "Error, el usuario ya existe: " . $e->getMessage();
      return $mensaje;
    }
  }


  public function UsuariosExisteCC($usuarios_cc)
  {
    try {
      $modelo = new conectar();
      $conexion = $modelo->get_conexion();
      $sql = "SELECT usuarios_nombre FROM usuarios WHERE usuarios_cc = :usuarios_cc";
      $sth = $conexion->prepare($sql);
      $sth->bindParam(':usuarios_cc', $usuarios_cc);
      $sth->execute();

      while ($result = $sth->fetch()) {
        $this->datos[] = $result;
      }
      return $this->datos;
    } catch (PDOException $e) {
      $mensaje = "Error, el usuario ya existe: " . $e->getMessage();
      return $mensaje;
    }
  }


  public function UsuariosExisteCorreo($usuarios_correo)
  {
    try {
      $modelo = new conectar();
      $conexion = $modelo->get_conexion();
      $sql = "SELECT usuarios_nombre FROM usuarios WHERE usuarios_correo = :usuarios_correo";
      $sth = $conexion->prepare($sql);
      $sth->bindParam(':usuarios_correo', $usuarios_correo);
      $sth->execute();

      while ($result = $sth->fetch()) {
        $this->datos[] = $result;
      }
      return $this->datos;
    } catch (PDOException $e) {
      $mensaje = "Error, el usuario ya existe: " . $e->getMessage();
      return $mensaje;
    }
  }

  public function NuevoUsuario($usuarios_cc, $usuarios_nombre, $usuarios_telefono, $usuarios_correo, $usuarios_direccion)
  {
    try {
      $modelo = new conectar();
      $conexion = $modelo->get_conexion();
      $sql = "INSERT INTO usuarios(usuarios_cc, usuarios_nombre, usuarios_telefono, usuarios_correo, usuarios_direccion)
            VALUES
            (:usuarios_cc, :usuarios_nombre, :usuarios_telefono, :usuarios_correo, :usuarios_direccion);";

      $sth = $conexion->prepare($sql);
      $sth->bindParam(':usuarios_cc', $usuarios_cc);
      $sth->bindParam(':usuarios_nombre', $usuarios_nombre);
      $sth->bindParam(':usuarios_telefono', $usuarios_telefono);
      $sth->bindParam(':usuarios_correo', $usuarios_correo);
      $sth->bindParam(':usuarios_direccion', $usuarios_direccion);

      $sth->execute();

      $lastInsertId = $conexion->lastInsertId();
      return $lastInsertId;
    } catch (PDOException $e) {

      $mensaje = "Error al insertar un nuevo usuario: " . $e->getMessage();
      return $mensaje;
    }
  }


  public function EditarUsuario($usuarios_id, $usuarios_cc, $usuarios_nombre, $usuarios_telefono, $usuarios_correo, $usuarios_direccion)
  {
    try {
      $modelo = new conectar();
      $conexion = $modelo->get_conexion();
      $sql = "UPDATE usuarios SET usuarios_cc = :usuarios_cc, usuarios_nombre = :usuarios_nombre, usuarios_telefono = :usuarios_telefono, usuarios_correo = :usuarios_correo, usuarios_direccion = :usuarios_direccion WHERE usuarios_id = :usuarios_id";
      $sth = $conexion->prepare($sql);

      $sth->bindParam(':usuarios_id', $usuarios_id);
      $sth->bindParam(':usuarios_cc', $usuarios_cc);
      $sth->bindParam(':usuarios_nombre', $usuarios_nombre);
      $sth->bindParam(':usuarios_telefono', $usuarios_telefono);
      $sth->bindParam(':usuarios_correo', $usuarios_correo);
      $sth->bindParam(':usuarios_direccion', $usuarios_direccion);
      $sth->execute();
      return 'Exito';
    } catch (PDOException $e) {

      $mensaje = "Error al actualizar el usuario: " . $e->getMessage();
      return $mensaje;
    }
  }


  public function DeleteUser($usuarios_id)
  {
    try {
      $modelo = new conectar();
      $conexion = $modelo->get_conexion();
      $sql = "DELETE FROM usuarios WHERE usuarios_id = :usuarios_id";
      $sth = $conexion->prepare($sql);
      header('location: ../views/lista.usuarios.vw.php');

      $sth->bindParam(':usuarios_id', $usuarios_id);
      $sth->execute();
      return 'Exito';
    } catch (PDOException $e) {

      $mensaje = "Error al actualizar el usuario: " . $e->getMessage();
      return $mensaje;
    }
  }
}
