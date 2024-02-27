<?php

class conectar
{

  public function get_conexion()
  {
    $driver = 'mysql';
    $host = 'localhost';
    $dbname = 'prueba_tecnica';
    $username = 'root';
    $passwd = '';
    $server = $driver . ':host=' . $host . ';dbname=' . $dbname;


    try {

      $conexion = new PDO($server, $username, $passwd);
      $conexion->exec("set names utf8");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {

      $conexion = null;
      $conexion = 'null';
      echo '
            	<div style=" color: #D8000C; background-color: #FFBABA; border: 1px solid;
                  margin: 10px 0px;
                  padding:15px 10px 15px 50px;
                  background-repeat: no-repeat;
                  background-position: 10px center;
                  font-family:Arial, Helvetica, sans-serif;
                  font-size:13px;
                  text-align:left;
                  width:auto;">
            		<b>Error.</b><br/>ERROR AL CONECTARSE A LA BASE DE DATOS, PRESIONE F5
            	</div>
            	';

      exit();
    }
    return $conexion;
  }
}
