<?php

//-------------------------------------------------------
include '../Functions/LibraryFunctions.php';

class INSTALACION_Model {

//Parámetros de la clase instalacion
    var $idInstalacion;
    var $nombreInstalacion;
    var $descripcionInstalacion;
    var $aforoInstalacion;
    var $mysqli;

    function __construct($idInstalacion, $nombreInstalacion, $descripcionInstalacion, $aforoInstalacion) {
        $this->idInstalacion = $idInstalacion;
        $this->nombreInstalacion = $nombreInstalacion;
        $this->descripcionInstalacion = $descripcionInstalacion;
        $this->aforoInstalacion = $aforoInstalacion;
    }

//Función para conectarnos a la Base de datos
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "root", "", "muevet");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

//Insertar Instalacion
    function Insertar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM instalacion WHERE idInstalacion = '" . $this->idInstalacion . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows == 1) {
            return 'La instalacion ya existe en la base de datos';
        } else {
            if ($result->num_rows == 0) {
                $sql = "INSERT INTO instalacion(nombreInstalacion, descripcionInstalacion, aforoInstalacion) VALUES ('" . $this->nombreInstalacion . "','" . $this->descripcionInstalacion . "','" . $this->aforoInstalacion . "')";
                $this->mysqli->query($sql);
                return 'Añadida con exito';
            }
        }
    }

    function guardarCambios($id) {
        $this->ConectarBD();
        $sql = "UPDATE instalacion SET nombreInstalacion ='" . $this->nombreInstalacion . "', descripcionInstalacion ='" . $this->descripcionInstalacion . "', aforoInstalacion ='" . $this->aforoInstalacion . "' WHERE idInstalacion = '" . $id . "'";
        $result = $this->mysqli->query($sql);
        return "La instalacion se ha modificado con exito";
    }

    function Modificar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM instalacion WHERE idInstalacion = '" . $this->idInstalacion . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows == 1) {

            $sql = "UPDATE instalacion SET nombreInstalacion ='" . $this->nombreInstalacion . "', descripcionInstalacion ='" . $this->descripcionInstalacion . "', aforoInstalacion ='" . $this->aforoInstalacion . "' WHERE idInstalacion = '" . $this->idInstalacion . "'";
            if (!($resultado = $this->mysqli->query($sql))) {
                return "Error en la consulta sobre la base de datos";
            } else {
                return "La instalacion se ha modificado con exito";
            }
        } else
            return "La instalacion no existe";
    }

    //Funcion para dar de baja una instalacion en el sistema.
    function Borrar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM instalacion WHERE idInstalacion = '" . $this->idInstalacion . "'";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else if ($resultado->num_rows == 0) {
            return 'No se puede borrar porque no existe esa instalacion';
        } else {
            $sql = "DELETE FROM instalacion WHERE idInstalacion ='" . $this->idInstalacion . "'";
            $this->mysqli->query($sql);
            return "La instalacion fue borrada con exito";
        }
    }

    function Consultar() {
        $this->ConectarBD();

        if ($this->nombreInstalacion == '' && $this->aforoInstalacion == '') { //00
            $sql = "SELECT * FROM instalacion ";
        } else if ($this->nombreInstalacion == '' && $this->aforoInstalacion != '') { //01
            $sql = "SELECT * FROM instalacion WHERE aforoInstalacion = '" . $this->aforoInstalacion . "'";
        } else if ($this->nombreInstalacion != '' && $this->aforoInstalacion == '') { //10
            $sql = "SELECT * FROM instalacion WHERE nombreInstalacion = '" . $this->nombreInstalacion . "'";
        } else if ($this->nombreInstalacion != '' && $this->aforoInstalacion != '') { //11
            $sql = "SELECT * FROM instalacion WHERE nombreInstalacion = '" . $this->nombreInstalacion . "' AND aforoInstalacion = '" . $this->aforoInstalacion . "'";
        }

        if (!$resultado = $this->mysqli->query($sql)) {
            return 'No se ha podido conectar con la base de datos';
        } else {
            $toret = array();
            $i = 0;
            while ($fila = $resultado->fetch_array()) {
                $toret[$i] = $fila;
                $i++;
            }
            return $toret;
        }
    }

    function Listar() {

        $this->ConectarBD();
        $sql = "SELECT * FROM instalacion";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            $toret = array();
            $i = 0;
            while ($fila = $resultado->fetch_array()) {
                $toret[$i] = $fila;
                $i++;
            }
            return $toret;
        }
    }

    //Funcion para ver una instalacion en detalle, es decir, con todos los campos.
    function VerDetalle() {
        $this->ConectarBD();
        $sql = "SELECT * FROM instalacion WHERE idInstalacion ='" . $this->idInstalacion . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

    //Devuelve los valores almacenados para una determinada instalacion para posteriormente rellenar un formulario
    function RellenaDatos() {
        $this->ConectarBD();
        $sql = "SELECT nombreInstalacion, descripcionInstalacion, aforoInstalacion FROM instalacion WHERE instalacion.idInstalacion = '" . $this->idInstalacion . "'";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

}

?>
