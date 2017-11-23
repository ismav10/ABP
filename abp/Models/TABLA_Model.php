<?php

include '../Functions/LibraryFunctions.php';

class TABLA_Model {

    var $nombreTabla;
    var $tablaTipo;
    var $descripcionTabla;

    function __construct($nombre, $tablaTipo, $descripcion) {
        $this->nombreTabla = $nombre;
        $this->tablaTipo = $tablaTipo;
        $this->descripcionTabla = $descripcion;
    }

    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "root", "", "muevet");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }
	function obtenerTablasUsuario($username)
	{
        $this->ConectarBD();
        $sql = "SELECT t2.idTabla,t2.nombreTabla, t2.descripcionTabla
FROM `deportista_asignar_tabla` as t1, tabla as t2
WHERE (t1.username='".$username."') AND
(t1.idTabla=t2.idTabla) GROUP BY t2.idTabla";
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
    function obtenerTablas() {
        $this->ConectarBD();
        $sql = "SELECT * FROM tabla";
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

    function eliminarTabla($id) {
        $this->ConectarBD();
        $sql = "DELETE FROM tabla WHERE idTabla='" . $id . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            return true;
        }
    }

    function insertarTabla() {
        $this->ConectarBD();
        $sql = "INSERT INTO `tabla`(`nombreTabla`, `tipo` , `descripcionTabla`) VALUES ('" . $this->nombreTabla . "','" . $this->tablaTipo . "','" . $this->descripcionTabla . "')";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            return true;
        }
    }

    function obtenerTablaDetalle($id) {
        $this->ConectarBD();
        $sql = "SELECT * FROM tabla WHERE idTabla='" . $id . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            return $resultado->fetch_array();
        }
    }

    function modificarTabla($id) {
        $this->ConectarBD();
        $sql = "UPDATE `tabla` SET nombreTabla='" . $this->nombreTabla . "',descripcionTabla='" . $this->descripcionTabla . "', tipo= '" . $this->tablaTipo. "' WHERE idTabla='" . $id . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            return true;
        }
    }

    function asignarEjercicios($idTabla, $listaEjercicios) {
        $this->ConectarBD();

        foreach ($listaEjercicios as $ejercicioByName) {
            $sql = "INSERT INTO `tabla_con_ejercicio`(`idTabla`, `idEjercicio`) VALUES ('" . $idTabla . "',(SELECT idEjercicio FROM ejercicio WHERE nombreEjercicio='" . $ejercicioByName . "'))";
            if (!($resultado = $this->mysqli->query($sql))) {
                return 'Error en la consulta sobre la base de datos.';
            }
        }
    }

    function obtenerRelacion_TablaEjercicios($idTabla) {
        $this->ConectarBD();
        $sql = "SELECT *
				FROM tabla_con_ejercicio as t1, ejercicio as t2
				WHERE (t1.idEjercicio=t2.idEjercicio) AND (t1.idTabla='" . $idTabla . "')
				GROUP BY t1.idEjercicio;";
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

}

?>