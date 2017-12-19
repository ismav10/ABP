<?php

//-------------------------------------------------------
include '../Functions/LibraryFunctions.php';

class ACTIVIDAD_INDIVIDUAL_Model {

//Parámetros de la clase actividad individual
    var $idActividadIndividual;
    var $nombreActividadIndividual;
    var $descripcionActividadIndividual;
    var $mysqli;

    function __construct($idActividadIndividual, $nombreActividadIndividual, $descripcionActividadIndividual) {
        $this->idActividadIndividual = $idActividadIndividual;
        $this->nombreActividadIndividual = $nombreActividadIndividual;
        $this->descripcionActividadIndividual = $descripcionActividadIndividual;
    }

//Función para conectarnos a la Base de datos
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "root", "", "muevet");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

//Insertar Actividad Grupal
    function Insertar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM actividadindividual WHERE idActividadIndividual = '" . $this->idActividadIndividual . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows == 1) {
            return 'La actividad individual ya existe en la base de datos';
        } else {
            if ($result->num_rows == 0) {
                $sql = "INSERT INTO actividadindividual(nombreActividadIndividual, descripcionActividadIndividual) VALUES ('" . $this->nombreActividadIndividual . "','" . $this->descripcionActividadIndividual . "')";
                $this->mysqli->query($sql);
                return 'Añadida con exito';
            }
        }
    }

    function guardarCambios($id) {
        $this->ConectarBD();
        $sql = "UPDATE actividadindividual SET nombreActividadIndividual ='" . $this->nombreActividadIndividual . "', descripcionActividadIndividual ='" . $this->descripcionActividadIndividual . "' WHERE idActividadIndividual = '" . $id . "'";
        $result = $this->mysqli->query($sql);
        return "La actividad individual se ha modificado con exito";
    }

    function Modificar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM actividadindividual WHERE idActividadIndividual = '" . $this->idActividadIndividual . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows == 1) {

            $sql = "UPDATE actividadindividual SET nombreActividadIndividual ='" . $this->nombreActividadIndividual . "', descripcionActividadIndividual ='" . $this->descripcionActividadIndividual . "' WHERE idActividadIndividual = '" . $this->idActividadIndividual . "'";
            if (!($resultado = $this->mysqli->query($sql))) {
                return "Error en la consulta sobre la base de datos";
            } else {
                return "La actividad individual se ha modificado con exito";
            }
        } else
            return "La actividad no existe";
    }

    //Funcion para dar de baja una actividad individual en el sistema.
    function Borrar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM actividadindividual WHERE idActividadIndividual = '" . $this->idActividadIndividual . "'";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else if ($resultado->num_rows == 0) {
            return 'No se puede borrar porque no existe esa actividad individual';
        } else {
            $sql = "DELETE FROM actividadindividual WHERE idActividadIndividual ='" . $this->idActividadIndividual . "'";
            $this->mysqli->query($sql);
            return "La actividad individual fue borrada con exito";
        }
    }

    function Consultar() {
        $this->ConectarBD();

        if ($this->nombreActividadIndividual == '') { //0
            $sql = "SELECT nombreActividadIndividual, descripcionActividadIndividual FROM actividadindividual ";
        } else if ($this->nombreActividadIndividual != '') { //1
            $sql = "SELECT nombreActividadIndividual, descripcionActividadIndividual FROM actividadindividual WHERE nombreActividadIndividual = '" . $this->nombreActividadIndividual . "'";
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
        $sql = "SELECT * FROM ACTIVIDADINDIVIDUAL";
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

    //Funcion para ver una actividad individual en detalle, es decir, con todos los campos.
    function VerDetalle() {
        $this->ConectarBD();
        $sql = "SELECT * FROM actividadindividual WHERE idActividadIndividual ='" . $this->idActividadIndividual . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

    //Devuelve los valores almacenados para una determinada actividad individual para posteriormente rellenar un formulario
    function RellenaDatos() {
        $this->ConectarBD();
        $sql = "SELECT nombreActividadIndividual, descripcionActividadIndividual FROM actividadindividual WHERE actividadindividual.idActividadIndividual = '" . $this->idActividadIndividual . "'";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }
    

}

?>
