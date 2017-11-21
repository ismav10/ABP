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
    var $fecha;
    var $horaInicio;
    var $horaFin;
    var $mysqli;

    function __construct($userName, $idSesion, $idTabla, $comentarioSesion, $idActividadIndividual, $fecha, $horaInicio, $horaFin) {
        $this->userName = $userName;
        $this->idSesion = $idSesion;
        $this->idTabla = $idTabla;
        $this->comentarioSesion = $comentarioSesion;
        $this->idActividadIndividual = $idActividadIndividual;
        $this->fecha = $fecha;
        $this->horaInicio = $horaInicio;
        $this->horaFin = $horaFin;
    }

//Función para conectarnos a la Base de datos
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "root", "", "gymgest");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

//Insertar sesion
    function Insertar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM SESION";
        if (!$resultado = $this->mysqli->query($sql)) {
            return 'No se ha podido conectar con la base de datos.';
        } else {
            $sql = "INSERT INTO SESION VALUES ('" . $this->idSesion . "','" . $this->username . "','" . $this->idTabla . "','" . $this->comentarioSesion . "','" . $this->idActividadIndividual . "','" . $this->fecha . "','" . $this->horaInicio . "','" . $this->horaFin . "');";
            $this->mysqli->query($sql);
            return 'La sesion se ha insertado con éxito.';
        }
    }

    function Consultar() {
        $this->ConectarBD();
        if ($this->comentarioSesion == '' && $this->fechaSesion == '') {
            $sql = "SELECT idTabla, comentarioSesion, idActividadIndividual, fechaSesion, horaInicio, horaFin FROM SESION WHERE username='" . $this->username . "'";
            if (!($resultado = $this->mysqli->query($sql))) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                $toret = array();
                $i = 0;
                while ($fila = $resultado->fetch_array()) {
                    $toret[$i] = $fila;
                    $i++;
                }
                for ($i = 0; $i < count($toret); $i++) {
                    $toret[$i]['idTabla'] = ConsultarNombreTabla($toret[$i]['idTabla']);
                    $toret[$i]['idActividadIndividual'] = ConsultarNombreActividadIndividual($toret[$i]['idActividadIndividual']);
                }
                return $toret;
            }
        } else if ($this->comentarioSesion == '' && $this->fechaSesion != '') {
            $sql = "SELECT idTabla, comentarioSesion, idActividadIndividual, fechaSesion, horaInicio, horaFin FROM SESION WHERE username= '" . $this->username . "' AND fechaSesion='" . $this->fecha . "'";
            if (!($resultado = $this->mysqli->query($sql))) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                $toret = array();
                $i = 0;
                while ($fila = $resultado->fetch_array()) {
                    $toret[$i] = $fila;
                    $i++;
                }
                for ($i = 0; $i < count($toret); $i++) {
                    $toret[$i]['idTabla'] = ConsultarNombreTabla($toret[$i]['idTabla']);
                    $toret[$i]['idActividadIndividual'] = ConsultarNombreActividadIndividual($toret[$i]['idActividadIndividual']);
                }
                return $toret;
            }
        } else if ($this->comentarioSesion != '' && $this->fechaSesion == '') {
            $sql = "SELECT idTabla, comentarioSesion, idActividadIndividual, fechaSesion, horaInicio, horaFin FROM SESION WHERE username= '" . $this->username . "' AND comentarioSesion='" . $this->comentarioSesion . "'";
            if (!($resultado = $this->mysqli->query($sql))) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                $toret = array();
                $i = 0;
                while ($fila = $resultado->fetch_array()) {
                    $toret[$i] = $fila;
                    $i++;
                }
                for ($i = 0; $i < count($toret); $i++) {
                    $toret[$i]['idTabla'] = ConsultarNombreTabla($toret[$i]['idTabla']);
                    $toret[$i]['idActividadIndividual'] = ConsultarNombreActividadIndividual($toret[$i]['idActividadIndividual']);
                }
                return $toret;
            }
        } else if ($this->comentarioSesion != '' && $this->fechaSesion != '') {
            $sql = "SELECT idTabla, comentarioSesion, idActividadIndividual, fechaSesion, horaInicio, horaFin FROM SESION WHERE username= '" . $this->username . "' AND comentarioSesion='" . $this->comentarioSesion . "' AND fechaSesion='" . $this->fechaSesion . "'";
            if (!($resultado = $this->mysqli->query($sql))) {
                return 'Error en la consulta sobre la base de datos';
            } else {
                $toret = array();
                $i = 0;
                while ($fila = $resultado->fetch_array()) {
                    $toret[$i] = $fila;
                    $i++;
                }
                for ($i = 0; $i < count($toret); $i++) {
                    $toret[$i]['idTabla'] = ConsultarNombreTabla($toret[$i]['idTabla']);
                    $toret[$i]['idActividadIndividual'] = ConsultarNombreActividadIndividual($toret[$i]['idActividadIndividual']);
                }
                return $toret;
            }
        }
    }

    //Devuelve la información de todas las sesiones que estan asociadas a un usuario, 
    //para esto hace falta saber que usuario esta accediendo a la funcion.
    function Listar() {
        $this->ConectarBD();
        $sql = "SELECT idSesion, idTabla, comentarioSesion, idActividadIndividual,fechaSesion, horaInicio, horaFin FROM SESION WHERE username ='" . $this->userName . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            $toret = array();
            $i = 0;
            while ($fila = $resultado->fetch_array()) {
                $toret[$i] = $fila;
                $i++;
            }
            for ($i = 0; $i < count($toret); $i++) {
                $toret[$i]['idTabla'] = $this->ConsultarNombreTabla($toret[$i]['idTabla']);
                $toret[$i]['idActividadIndividual'] = $this->ConsultarNombreActividadIndividual($toret[$i]['idActividadIndividual']);
            }
            return $toret;
        }
    }

    //Funciones auxiliares para hacer una traducción del dato del id de la tabla por un dato significativo para el usuario como es el nombre de esta.
    function ConsultarNombreTabla($id) {
        $this->ConectarBD();
        $sql = "SELECT nombreTabla FROM TABLA WHERE idTabla='" . $id . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            $result = $resultado->fetch_array();
            return $result['nombreTabla'];
        }
    }

    function ConsultarNombreActividadIndividual($id) {
        $this->ConectarBD();
        $sql = "SELECT nombreActividadIndividual FROM ACTIVIDADINDIVIDUAL WHERE idActividadIndividual='" . $id . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            $result = $resultado->fetch_array();
            return $result['nombreActividadIndividual'];
        }
    }

    //Devuelve los valores almacenados para un determinado usuario para posteriormente rellenar un formulario
    function RellenaDatos() {
        $this->ConectarBD();
        $sql = "SELECT idSesion, nombreTabla, nombreActividadIndividual, fechaSesion, horaInicio, horaFin, comentarioSesion FROM Sesion, actividadindividual, tabla WHERE Sesion.idTabla=Tabla.idTabla AND Sesion.idActividadIndividual = actividadindividual.idActividadIndividual AND idSesion = '". $this->idSesion."'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

    //Actualiza en la base de datos la información sobre una sesión.
    function Modificar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM SESION";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            $sql = "UPDATE SESION SET comentarioSesion ='" . $this->comentarioSesion . "' WHERE idSesion='" . $this->idSesion . "'";
            $this->mysqli->query($sql);
            return 'La sesion se ha modificado con éxito.';
        }
    }

}

?>
