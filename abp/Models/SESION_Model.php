<?php

//-------------------------------------------------------
include '../Functions/LibraryFunctions.php';

class SESION_Model {

//Parámetros de la clase usuario
    var $idSesion;
    var $username;
    var $idTabla;
    var $comentarioSesion;
    var $idActividadIndividual;
    var $mysqli;

    function __construct($userName, $idSesion, $idTabla, $comentarioSesion, $idActividadIndividual) {
        $this->userName = $userName;
        $this->idSesion = $idSesion;
        $this->idTabla = $idTabla;
        $this->comentarioSesion = $comentarioSesion;
        $this->idActividadIndividual = $idActividadIndividual;
    }

//Función para conectarnos a la Base de datos
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "root", "", "gymgest");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

//Comprueba que el usuario pueda loguearse
    function Login() {
        $this->ConectarBD();
        echo $this->userName;
        $sql = "SELECT * FROM USUARIO WHERE userName = '" . $this->userName . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows == 1) {
            $tupla = $result->fetch_array();

            if ($tupla['password'] == md5($this->password)) {
                return true;
            } else {
                return 'La contraseña para este usuario es errónea';
            }
        } else {
            return "El usuario no existe";
        }
    }
//Insertar sesion
    function Insertar()
    {
      $this->ConectarBD();
      $sql = "SELECT * FROM SESION";
      if(!$resultado = $this->mysqli->query($sql))
      {
        return 'No se ha podido conectar con la base de datos.';
      }
      else
      {
        $sql="INSERT INTO SESION VALUES ('".$this->idSesion."','".$this->username."','".$this->idTabla."','".$this->comentarioSesion."'".$this->idActividadIndividual."');";
        $this->mysqli->query($sql);
        return 'La sesion se ha insertado con éxito.';
      }
    }

      //Devuelve la información de todas las sesiones que estan asociadas a un usuario, 
      //para esto hace falta saber que usuario esta accediendo a la funcion.
    function ConsultarSesiones()
    {
      $this->ConectarBD();
      $sql = "SELECT * FROM SESION WHERE username ='".$this->userName."'";
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

    //Devuelve los valores almacenados para un determinado usuario para posteriormente rellenar un formulario
    function RellenaDatos()
    {
      $this->ConectarBD();
      $sql = "SELECT * FROM SESION WHERE idSesion='". $this->idSesion."'";
      if(!($resultado = $this->mysqli->query($sql)))
      {
        return 'Error en la consulta sobre la base de datos.';
      }
      else
      {
        $result = $resultado->fetch_array();
        return $result;
      }
    }

    //Actualiza en la base de datos la información sobre una sesión.
    function Modificar()
    {
      $this->ConectarBD();
      $sql = "SELECT * FROM SESION";
      if(!($resultado = $this->mysqli->query($sql)))
      {
        return 'Error en la consulta sobre la base de datos.';
      }
      else
      {
        $sql = "UPDATE SESION SET comentarioSesion ='".$this->comentarioSesion."' WHERE idSesion='".$this->idSesion."'";
        $this->mysqli->query($sql);
        return 'La sesion se ha modificado con éxito.';
      }

    }
}

?>
