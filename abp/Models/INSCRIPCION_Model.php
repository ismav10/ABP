<?php

include '../Functions/LibraryFunctions.php';

class INSCRIPCION_Model {

//Parámetros de la clase notificacion
    var $userName;
    var $idActividadGrupal;
    var $estado;
    var $numPlazasDisponibles;
    var $mysqli;

    function __construct($userName, $idActividadGrupal, $estado, $numPlazasDisponibles) {
        $this->userName = $userName;
        $this->idActividadGrupal = $idActividadGrupal;
        $this->estado = $estado;
        $this->numPlazasDisponibles = $numPlazasDisponibles;
    }

//Función para conectarnos a la Base de datos
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "root", "", "muevet");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

    function AceptarGrupal() {

        $this->ConectarBD();
        $sql = "SELECT plazasDisponibles FROM DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL where userName = '" . $this->userName . "' AND idActividadGrupal = '" . $this->idActividadGrupal . "'";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1) {
            $resultado = $result->fetch_array();
            if ($resultado['plazasDisponibles'] > 0) {
                $sql1 = "UPDATE DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL SET estado = 1 WHERE userName= '" . $this->userName . "' AND idActividadGrupal = '" . $this->idActividadGrupal . "'";
                $this->mysqli->query($sql1);
                $sql2 = "UPDATE deportista_inscribir_actividadgrupal SET plazasDisponibles = plazasDisponibles -1 WHERE idActividadGrupal = '" . $this->idActividadGrupal . "'";
                $this->mysqli->query($sql2);
                $sqlAux2 = "INSERT INTO NOTIFICACION(remitenteNotificacion, destinatarioNotificacion, asuntoNotificacion, mensajeNotificacion, username) VALUES ('" . ConsultarEmailUsuario($_SESSION['login']) . "', '" . ConsultarEmailUsuario($this->userName) . "', 'Resolución sobre petición para actividad " . ConsultarNombreActividadGrupal($this->idActividadGrupal) . "'  , 'Su solicitud para inscribirse en la actividad " . ConsultarNombreActividadGrupal($this->idActividadGrupal) . " ha sido aceptada por parte de MueveT. \n\n¡Esperamos que disfrute mucho de las clases!\n\n\nEquipo MueveT ', '" . $_SESSION['login'] . "')";
                $this->mysqli->query($sqlAux2);

                return "Solicitud aceptada";
            } else {
                return "No hay plazas para esa actividad";
            }
        } else {
            return "No existe la inscripcion";
        }
    }

    function AceptarIndividual() {
        $this->ConectarBD();
        $sql = "UPDATE DEPORTISTA_INSCRIBIR_ACTIVIDADINDIVIDUAL SET estado = 1 WHERE userName= '" . $this->userName . "' AND idActividadIndividual = '" . $this->idActividadGrupal . "'";
        $result = $this->mysqli->query($sql);
        return "Solicitud aceptada";
    }

    function RechazarGrupal() {

        $this->ConectarBD();
        $sql = "SELECT * FROM DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL where userName = '" . $this->userName . "' AND idActividadGrupal = '" . $this->idActividadGrupal . "'";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1) {
            $sql1 = "DELETE FROM DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL where userName = '" . $this->userName . "' AND idActividadGrupal = '" . $this->idActividadGrupal . "'";
            $this->mysqli->query($sql1);

            $sqlAux2 = "INSERT INTO NOTIFICACION(remitenteNotificacion, destinatarioNotificacion, asuntoNotificacion, mensajeNotificacion, username) VALUES ('" . ConsultarEmailUsuario($_SESSION['login']) . "', '" . ConsultarEmailUsuario($this->userName) . "', 'Resolución sobre petición para actividad " . ConsultarNombreActividadGrupal($this->idActividadGrupal) . "'  , 'Su solicitud para inscribirse en la actividad " . ConsultarNombreActividadGrupal($this->idActividadGrupal) . " ha sido rechazada por parte de MueveT. Esperamos que encuentre otras actividades de su gusto en nuestro catálogo. \n\n¡Esperamos verle pronto!\n\n\nEquipo MueveT ', '" . $_SESSION['login'] . "')";
            $this->mysqli->query($sqlAux2);

            return "Solicitud rechazada";
        } else {
            return "No existe la inscripcion";
        }
    }

    function RechazarIndividual() {

        $this->ConectarBD();
        $sql = "SELECT * FROM DEPORTISTA_INSCRIBIR_ACTIVIDADINDIVIDUAL where userName = '" . $this->userName . "' AND idActividadIndividual = '" . $this->idActividadGrupal . "'";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1) {
            $sql1 = "DELETE FROM DEPORTISTA_INSCRIBIR_ACTIVIDADINDIVIDUAL where userName = '" . $this->userName . "' AND idActividadIndividual = '" . $this->idActividadGrupal . "'";
            $this->mysqli->query($sql1);
            return "Solicitud rechazada";
        } else {
            return "No existe la inscripcion";
        }
    }

    function ConsultarTodoGrupales() {
        $this->ConectarBD();
        $sql = "SELECT * FROM DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL WHERE estado = 0";
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

    function ConsultarTodoIndividuales() {
        $this->ConectarBD();
        $sql = "SELECT * FROM DEPORTISTA_INSCRIBIR_ACTIVIDADINDIVIDUAL WHERE estado = 0";
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
