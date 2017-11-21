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
        $this->mysqli = new mysqli("localhost", "root", "", "gymgest");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }
    
//Actualiza en la base de datos la información de un determinado usuario
    function Aceptar() {

        $this->ConectarBD();
        $sql = "SELECT * FROM DEPORTISTA_INSCRIBIR_ACTIVIDADGRUPAL where userName = '" . $this->userName . "' AND idActividadGrupal = '" . $this->idActividadGrupal . "'";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1) {
            if ($this->newPassword == '') {
                $sql = "UPDATE USUARIO SET tipoUsuario ='" . $this->tipoUsuario . "',nombre= '" . $this->nombre . "',apellidos= '" . $this->apellidos . "',dni = '" . $this->dni . "',fechaNac= '" . $this->fechaNac . "',direccion= '" . $this->direccion . "',telefono= '" . $this->telefono . "',email= '" . $this->email . "'";
            } else {
                $sql = "UPDATE USUARIO SET password = '" . md5($this->newPassword) . "',tipoUsuario ='" . $this->tipoUsuario . "',nombre= '" . $this->nombre . "',apellidos= '" . $this->apellidos . "',dni = '" . $this->dni . "',fechaNac= '" . $this->fechaNac . "',direccion= '" . $this->direccion . "',telefono= '" . $this->telefono . "',email= '" . $this->email . "'";
            }
        } else {
            return "No existe la inscripcion";
        }
    }
            
    function ConsultarTodo() {
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
    

    //Funcion para ver una notificacion en detalle, es decir, con todos los campos.
    function VerDetalleNotificacion() {
        $this->ConectarBD();
        $sql = "SELECT * FROM NOTIFICACION WHERE idNotificacion ='" . $this->idNotificacion . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

    //Funcion para dar de baja una notificacion en el sistema.
    function BajaNotificacion() {
        $this->ConectarBD();
        $sql = "SELECT * FROM NOTIFICACION WHERE idNotificacion= '" . $this->idNotificacion . "'";

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else if ($resultado->num_rows == 0) {
            return 'No se puede borrar porque no existe esa notificacion.';
        } else {
            $sql = "DELETE FROM NOTIFICACION WHERE idNotificacion='" . $this->idNotificacion . "'";
            $this->mysqli->query($sql);
            return "La notificación fue borrada con éxito.";
        }
    }


}

?>
