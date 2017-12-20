<?php

//-------------------------------------------------------
include '../Functions/LibraryFunctions.php';

class ACTIVIDAD_GRUPAL_Model {

//Parámetros de la clase actividad grupal
    var $idActividadGrupal;
    var $nombreActividadGrupal;
    var $descripcionActividadGrupal;
    var $numPlazasActividadGrupal;
    var $diaActividadGrupal;
    var $horaInicioActividadGrupal;
    var $horaFinActividadGrupal;
    var $fechaInicioActividadGrupal;
    var $fechaFinActividadGrupal;
    var $username;
    var $idInstalacion;
    var $mysqli;

    function __construct($idActividadGrupal, $nombreActividadGrupal, $descripcionActividadGrupal, $numPlazasActividadGrupal, $diaActividadGrupal, $horaInicioActividadGrupal, $horaFinActividadGrupal, $fechaInicioActividadGrupal, $fechaFinActividadGrupal, $username, $idInstalacion) {
        $this->idActividadGrupal = $idActividadGrupal;
        $this->nombreActividadGrupal = $nombreActividadGrupal;
        $this->descripcionActividadGrupal = $descripcionActividadGrupal;
        $this->numPlazasActividadGrupal = $numPlazasActividadGrupal;
        $this->diaActividadGrupal = $diaActividadGrupal;
        $this->horaInicioActividadGrupal = $horaInicioActividadGrupal;
        $this->horaFinActividadGrupal = $horaFinActividadGrupal;
        $this->fechaInicioActividadGrupal = $fechaInicioActividadGrupal;
        $this->fechaFinActividadGrupal = $fechaFinActividadGrupal;
        $this->username = $username;
        $this->idInstalacion = $idInstalacion;
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
        $sql = "SELECT * FROM actividadgrupal WHERE idActividadGrupal = '" . $this->idActividadGrupal . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows == 1) {
            return 'La actividad grupal ya existe en la base de datos';
        } else {
            if ($result->num_rows == 0) {

                //Consultar si para esas fechas,horario y dia la sala esta libre
                $sql1 = "SELECT * FROM actividadgrupal WHERE fechaInicioActividadGrupal BETWEEN '" . $this->fechaInicioActividadGrupal . "' AND '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal BETWEEN '" . $this->horaInicioActividadGrupal . "' AND '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "' AND diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND username = '" . $this->username . "' ";
                $result1 = $this->mysqli->query($sql1);
                if ($result1->num_rows >= 1) {
                    return 'Ya existe una actividad en esta fecha, instalacion y horario o el monitor esta ocupado';
                } else {
                    if ($result1->num_rows == 0) {
                        $sql2 = "INSERT INTO actividadgrupal (nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, diaActividadGrupal, horaInicioActividadGrupal, horaFinActividadGrupal, fechaInicioActividadGrupal, fechaFinActividadGrupal, username, idInstalacion) VALUES ('" . $this->nombreActividadGrupal . "','" . $this->descripcionActividadGrupal . "','" . $this->numPlazasActividadGrupal . "','" . $this->diaActividadGrupal . "','" . $this->horaInicioActividadGrupal . "','" . $this->horaFinActividadGrupal . "','" . $this->fechaInicioActividadGrupal . "','" . $this->fechaFinActividadGrupal . "','" . $this->username . "','" . $this->idInstalacion . "')";
                        $this->mysqli->query($sql2);
                        return 'Actividad Grupal añadida con exito';
                    }
                }
            }
        }
    }

//    function añadir($user, $instalacion) {
//        $this->ConectarBD();
//        $sql = "INSERT INTO actividadgrupal VALUES ('" . $this->nombreActividadGrupal . "','" . $this->descripcionActividadGrupal . "','" . $this->numPlazasActividadGrupal . "','" . $this->diaActividadGrupal . "','" . $this->horaInicioActividadGrupal . "','" . $this->horaFinActividadGrupal . "','" . $this->fechaInicioActividadGrupal . "','" . $this->fechaFinActividadGrupal . "','" . $user . "','" . $instalacion . "')";
//        $result = $this->mysqli->query($sql);
//        return true;
//    }
//    function guardarCambios($id) {
//        $this->ConectarBD();
//        $sql = "UPDATE actividadgrupal SET nombreActividadGrupal ='" . $this->nombreActividadGrupal . "', descripcionActividadGrupal ='" . $this->descripcionActividadGrupal . "', numPlazasActividadGrupal ='" . $this->numPlazasActividadGrupal . "', diaActividadGrupal ='" . $this->diaActividadGrupal . "',hpraInicioActividadGruapl ='" . $this->horaInicioActividadGrupal . "', horaFinActividadGrupal ='" . $this->horaFinActividadGrupal . "',fechaInicioActividadGrupal'" . $this->fechaInicioActividadGrupal . "',fechaFinActividadGrupal'" . $this->fechaFinActividadGrupal . "',username='" . $this->username . "', idInstalacion ='" . $this->idInstalacion . "' WHERE idActividadGrupal = '" . $id . "'";
//        $result = $this->mysqli->query($sql);
//        return true;
//    }

    function Modificar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM actividadgrupal WHERE idActividadGrupal = '" . $this->idActividadGrupal . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows == 1) {
            $sql = "UPDATE actividadgrupal SET nombreActividadGrupal = '" . $this->nombreActividadGrupal . "', descripcionActividadGrupal = '" . $this->descripcionActividadGrupal . "', numPlazasActividadGrupal = '" . $this->numPlazasActividadGrupal . "', diaActividadGrupal = '" . $this->diaActividadGrupal . "',horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "', horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "',fechaInicioActividadGrupal ='" . $this->fechaInicioActividadGrupal . "',fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "',username='" . $this->username . "', idInstalacion ='" . $this->idInstalacion . "' WHERE idActividadGrupal = '" . $this->idActividadGrupal . "'";
            if (!($resultado = $this->mysqli->query($sql))) {
                return "Error en la consulta sobre la base de datos";
            } else {
                return "La actividad grupal se ha modificado con exito";
            }
        } else
            return "La actividad no existe";
    }

    //Funcion para dar de baja una actividad grupal en el sistema.
    function Borrar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM actividadgrupal WHERE idActividadGrupal = '" . $this->idActividadGrupal . "'";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else if ($resultado->num_rows == 0) {
            return 'No se puede borrar porque no existe esa actividad grupal';
        } else {
            $sql = "DELETE FROM actividadgrupal WHERE idActividadGrupal='" . $this->idActividadGrupal . "'";
            $this->mysqli->query($sql);
            return "La actividad grupal fue borrada con exito";
        }
    }

    function Consultar() {
        $this->ConectarBD();

        if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //000000000
            $sql = "SELECT * FROM actividadgrupal ";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //00000001
            $sql = "SELECT * FROM actividadgrupal WHERE idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //00000010
            $sql = "SELECT * FROM actividadgrupal WHERE username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //00000011  
            $sql = "SELECT * FROM actividadgrupal WHERE username = '" . $this->username . " AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //00000100  
            $sql = "SELECT * FROM actividadgrupal WHERE horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //00000101
            $sql = "SELECT * FROM actividadgrupal WHERE horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //00000110
            $sql = "SELECT * FROM actividadgrupal WHERE horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //00000111
            $sql = "SELECT * FROM actividadgrupal WHERE horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //00001000
            $sql = "SELECT * WHERE  horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //00001001
            $sql = "SELECT * WHERE  horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //00001010
            $sql = "SELECT * WHERE  horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //00001011
            $sql = "SELECT * FROM actividadgrupal WHERE horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //00001100
            $sql = "SELECT * FROM actividadgrupal WHERE  horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //00001101
            $sql = "SELECT * FROM actividadgrupal WHERE  horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //00001110
            $sql = "SELECT * FROM actividadgrupal WHERE  horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //00001111
            $sql = "SELECT * FROM actividadgrupal WHERE  horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //00010000
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //00010001
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //00010010
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //00010011
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //00010100
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //00010101
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //00010110
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //00010111
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //00011000
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //00011001
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //00011010
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //00011011
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //00011100
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //00011101
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //00011110
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //00011111
            $sql = "SELECT * WHERE  fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //00100000
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //00100001
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //00100010
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //00100011
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //00100100
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaFinActividad = '" . $this->horaFinActividad . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //00100101
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaFinActividad = '" . $this->horaFinActividad . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //00100110
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaFinActividad = '" . $this->horaFinActividad . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //00100111
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaFinActividad = '" . $this->horaFinActividad . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //00101000
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaInicioActividad = '" . $this->horaInicioActividad . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //00101001
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaInicioActividad = '" . $this->horaInicioActividad . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //00101010
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaInicioActividad = '" . $this->horaInicioActividad . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //00101011
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaInicioActividad = '" . $this->horaInicioActividad . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //00101100
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaInicioActividad >= '" . $this->horaInicioActividad . "' AND horaFinActividad <= '" . $this->horaFinActividad . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //00101101
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaInicioActividad >= '" . $this->horaInicioActividad . "' AND horaFinActividad <= '" . $this->horaFinActividad . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //00101110
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaInicioActividad >= '" . $this->horaInicioActividad . "' AND horaFinActividad <= '" . $this->horaFinActividad . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //00101111
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal = '" . $this->fechaInicioActividadGrupal . "' AND horaInicioActividad >= '" . $this->horaInicioActividad . "' AND horaFinActividad <= '" . $this->horaFinActividad . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //00110000
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //00110001
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //00110010
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //00110011
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //00110100
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //00110101
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //00110110
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //00110111
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //00111000
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //00111001
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //00111010
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //00111011
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //00111100
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //00111101
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //00111110
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal == '' && $this->fechaInicioActividadGrupal != '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //00111111
            $sql = "SELECT * WHERE  fechaInicioActividadGrupal >= '" . $this->fechaInicioActividadGrupal . "' AND  fechaFinActividadGrupal <= '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //01000000
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //01000001
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //01000010
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //01000011
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //01000100
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //01000101
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //01000110
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //01000111
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //01001000
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //01001001
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //01001010
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //01001011
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //01001100
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //01001101
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //01001110
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal == '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //01001111
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //01010000
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //01010001
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //01010010
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //01010011
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //01010100
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //01010101
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //01010110
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal == '' && $this->horaFinActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //01010111
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaFinActividadGrupal = '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //01011000
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //01011001
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //01011010
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //01011011
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal = '" . $this->horaInicioActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //01011100
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //01011101
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //01011110
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //01011111
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->diaActividadGrupal != '' && $this->fechaInicioActividadGrupal == '' && $this->fechaFinActividadGrupal != '' && $this->horaInicioActividadGrupal != '' && $this->horaFinActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //10000000
            $sql = "SELECT * WHERE  diaActividadGrupal = '" . $this->diaActividadGrupal . "' AND fechaFinActividadGrupal = '" . $this->fechaFinActividadGrupal . "' AND horaInicioActividadGrupal >= '" . $this->horaInicioActividadGrupal . "' AND horaFinActividadGrupal <= '" . $this->horaFinActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
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
        $sql = "SELECT * FROM actividadGrupal";
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

    //Funcion para ver una actividad grupal en detalle, es decir, con todos los campos.
    function VerDetalle() {
        $this->ConectarBD();
        $sql = "SELECT * FROM actividadgrupal WHERE idActividadGrupal ='" . $this->idActividadGrupal . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

    //Devuelve los valores almacenados para una determinada actividad grupal para posteriormente rellenar un formulario
    function RellenaDatos() {
        $this->ConectarBD();
        $sql = "SELECT * FROM actividadgrupal WHERE actividadgrupal.idActividadGrupal = '" . $this->idActividadGrupal . "'";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

    //Devuelve los valores almacenados para una determinada actividad grupal para posteriormente rellenar un formulario
    function SolicitarInscripcion() {
        $this->ConectarBD();
        $sql = "SELECT * FROM DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL WHERE idActividadGrupal = '" . $this->idActividadGrupal . "' AND userName = '" . $this->username . "'";
        $resultado = $this->mysqli->query($sql);
        if ($resultado->num_rows == 0) {
            $sql1 = "SELECT plazasDisponibles FROM DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL where idActividadGrupal = '" . $this->idActividadGrupal . "'";
            $result = $this->mysqli->query($sql1);
            $resultado = $result->fetch_array();
            if ($resultado['plazasDisponibles'] != '') {
                $this->numPlazasActividadGrupal = $resultado['plazasDisponibles'];
            }
            $sql2 = "INSERT INTO DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL VALUES ( '" . $this->username . "', '" . $this->idActividadGrupal . "', 0, '" . $this->numPlazasActividadGrupal . "')";
            $result = $this->mysqli->query($sql2);
            return 'Solicitud tramitada';
        } else {
            return 'Ya existe esta solicitud';
        }
    }

    function ConsultarActividadesUser() {

        $this->ConectarBD();
        $sql = "SELECT * FROM actividadGrupal, DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL WHERE ACTIVIDADGRUPAL.idActividadGrupal = DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL.idActividadGrupal AND DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL.estado = 1 AND DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL.userName = '" . $this->username . "'";
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
