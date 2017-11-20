<?php
include_once '../Functions/LibraryFunctions.php';

class EJERCICIO_Model
{
	var $nombreEjercicio;
	var $descripcionEjercicio;
	var $gifEjercicio;
	
	function __construct($nombre, $descripcion, $gifurl)
	{
		$this->nombreEjercicio = $nombre;
		$this->descripcionEjercicio = $descripcion;
		$this->gifEjercicio = $gifurl;
    }
	
	function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "root", "", "gymgest");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }
	
	function obtenerEjercicios()
    {
      $this->ConectarBD();
      $sql = "SELECT * FROM ejercicio";
      if(!($resultado = $this->mysqli->query($sql)))
      {
        return 'Error en la consulta sobre la base de datos.';
      }
      else
      {
        $toret = array();
        $i = 0;
        while($fila = $resultado->fetch_array())
        {
          $toret[$i] = $fila;
          $i++;
        }
        return $toret;
      }
    }
	function eliminarEjercicio($id)
    {
      $this->ConectarBD();
      $sql = "DELETE FROM ejercicio WHERE idEjercicio='".$id."'";
      if(!($resultado = $this->mysqli->query($sql)))
      {
        return 'Error en la consulta sobre la base de datos.';
      }
      else
      {
        return true;
      }
    }
	function insertarEjercicio()
    {
      $this->ConectarBD();
      $sql = "INSERT INTO `ejercicio`(`nombreEjercicio`, `descripcionEjercicio`, `giftEjercicio`) VALUES ('".$this->nombreEjercicio."','".$this->descripcionEjercicio."','".$this->gifEjercicio."')";
      if(!($resultado = $this->mysqli->query($sql)))
      {
        return 'Error en la consulta sobre la base de datos.';
      }
      else
      {
        return true;
      }
    }
	function getEjercicio($id)
    {
      $this->ConectarBD();
      $sql = "SELECT * FROM ejercicio WHERE idEjercicio='".$id."'";
      if(!($resultado = $this->mysqli->query($sql)))
      {
        return 'Error en la consulta sobre la base de datos.';
      }
      else
      {
        return $resultado->fetch_array();
      }
    }
	function modificarEjercicio($id)
    {
      $this->ConectarBD();
      $sql = "UPDATE ejercicio SET nombreEjercicio='".$this->nombreEjercicio."',descripcionEjercicio='".$this->descripcionEjercicio."',giftEjercicio='".$this->gifEjercicio."' WHERE idEjercicio='".$id."'";
      if(!($resultado = $this->mysqli->query($sql)))
      {
        return 'Error en la consulta sobre la base de datos.';
      }
      else
      {
        return true;
      }
    }
}
?>