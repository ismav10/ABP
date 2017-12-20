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

        if ($this->nombreActividadGrupal == '' && $this->numPlazasActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //0000
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal ";
        } else if ($this->nombreActividadGrupal == '' && $this->numPlazasActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //0001
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->numPlazasActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //0010
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->numPlazasActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //0011
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE username = '" . $this->username . " AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->numPlazasActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //0100
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE numPlazasActividadGrupal = '" . $this->numPlazasActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->numPlazasActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //0101
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE numPlazasActividadGrupal = '" . $this->numPlazasActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->numPlazasActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //0110
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE numPlazasActividadGrupal = '" . $this->numPlazasActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal == '' && $this->numPlazasActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //0111
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE numPlazasActividadGrupal = '" . $this->numPlazasActividadGrupal . "' AND username = '" . $this->username . "'AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal != '' && $this->numPlazasActividadGrupal == '' && $this->username == '' && $this->idInstalacion == '') { //1000
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE  nombreActividadGrupal = '" . $this->nombreActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal != '' && $this->numPlazasActividadGrupal == '' && $this->username == '' && $this->idInstalacion != '') { //1001
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE  nombreActividadGrupal = '" . $this->nombreActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal != '' && $this->numPlazasActividadGrupal == '' && $this->username != '' && $this->idInstalacion == '') { //1010
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE  nombreActividadGrupal = '" . $this->nombreActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal != '' && $this->numPlazasActividadGrupal == '' && $this->username != '' && $this->idInstalacion != '') { //1011
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE  nombreActividadGrupal = '" . $this->nombreActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal != '' && $this->numPlazasActividadGrupal != '' && $this->username == '' && $this->idInstalacion == '') { //1100
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE  nombreActividadGrupal = '" . $this->nombreActividadGrupal . "' AND numPlazasActividadGrupal = '" . $this->numPlazasActividadGrupal . "'";
        } else if ($this->nombreActividadGrupal != '' && $this->numPlazasActividadGrupal != '' && $this->username == '' && $this->idInstalacion != '') { //1101
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE  nombreActividadGrupal = '" . $this->nombreActividadGrupal . "' AND numPlazasActividadGrupal = '" . $this->numPlazasActividadGrupal . "' AND idInstalacion = '" . $this->idInstalacion . "'";
        } else if ($this->nombreActividadGrupal != '' && $this->numPlazasActividadGrupal != '' && $this->username != '' && $this->idInstalacion == '') { //1110
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE  nombreActividadGrupal = '" . $this->nombreActividadGrupal . "' AND numPlazasActividadGrupal = '" . $this->numPlazasActividadGrupal . "' AND username = '" . $this->username . "'";
        } else if ($this->nombreActividadGrupal != '' && $this->numPlazasActividadGrupal != '' && $this->username != '' && $this->idInstalacion != '') { //1111
            $sql = "SELECT nombreActividadGrupal, descripcionActividadGrupal, numPlazasActividadGrupal, username, idInstalacion FROM actividadgrupal WHERE  nombreActividadGrupal = '" . $this->nombreActividadGrupal . "' AND numPlazasActividadGrupal = '" . $this->numPlazasActividadGrupal . "' AND username = '" . $this->username . "' AND idInstalacion = '" . $this->idInstalacion . "'";
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
