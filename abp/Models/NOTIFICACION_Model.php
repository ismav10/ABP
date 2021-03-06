<?php

//-------------------------------------------------------
include '../Functions/LibraryFunctions.php';

class NOTIFICACION_Model {

//Parámetros de la clase notificacion
    var $idNotificacion;
    var $remitenteNotificacion;
    var $destinatarioNotificacion;
    var $fechaHoraNotificacion;
    var $asuntoNotificacion;
    var $mensajeNotificacion;
    var $userName;
    // var $password;
    // var $mail;
    var $mysqli;

    function __construct($idNotificacion, $remitenteNotificacion, $destinatarioNotificacion, $fechaHoraNotificacion, $asuntoNotificacion, $mensajeNotificacion, $userName) {
        $this->idNotificacion = $idNotificacion;
        $this->remitenteNotificacion = $remitenteNotificacion;
        $this->destinatarioNotificacion = $destinatarioNotificacion;
        $this->fechaHoraNotificacion = $fechaHoraNotificacion;
        $this->asuntoNotificacion = $asuntoNotificacion;
        $this->mensajeNotificacion = $mensajeNotificacion;
        $this->userName = $userName;
    }

//Función para conectarnos a la Base de datos
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "root", "", "muevet");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

//Insertar Notificacion para un usuario
    function Insertar() {
        $this->ConectarBD();
        //En el caso de las notificaciones no hace falta hacer comprobacion de si existe el id puesto que este es incremental
        $sql = "SELECT * FROM NOTIFICACION";
        if (!$result = $this->mysqli->query($sql)) {
            return 'No se ha podido conectar con la base de datos.';
        } else {

            $porciones = explode(",", $this->destinatarioNotificacion);
            //Vamos a utilizar la funcion strpos para determinar si el destinatario es un usuario/s o una actividad sobre la que vamos a crear un aviso. Para esto evaluamos si contiene una @
            if (strpos($this->ConsultarMailUsuario($porciones[0]), '@')) {
                //Vuelvo a construir un array con todas las direcciones de destinatarios
                $this->destinatarioNotificacion = explode(", ", $this->destinatarioNotificacion);

                //Para cada dirección de destinatario, creo una nueva notificación.
                foreach ($this->destinatarioNotificacion as $valor) {
                    $sql = "INSERT INTO NOTIFICACION(remitenteNotificacion, destinatarioNotificacion, asuntoNotificacion, mensajeNotificacion, username) VALUES ('" . $this->ConsultarMailUsuario($this->userName) . "','" . $this->ConsultarMailUsuario($valor) . "', '" . $this->asuntoNotificacion . "','" . $this->mensajeNotificacion . "','" . $this->userName . "')";
                    $this->mysqli->query($sql);
                }
                //$this->mysqli->query($sql);
                return 'Inserción realizada con éxito';
            } else if (strpos($this->destinatarioNotificacion, '@')) {

                //Vuelvo a construir un array con todas las direcciones de destinatarios
                $this->destinatarioNotificacion = explode(", ", $this->destinatarioNotificacion);

                //Para cada dirección de destinatario, creo una nueva notificación.
                foreach ($this->destinatarioNotificacion as $valor) {
                    $sql = "INSERT INTO NOTIFICACION(remitenteNotificacion, destinatarioNotificacion, asuntoNotificacion, mensajeNotificacion, username) VALUES ('" . $this->ConsultarMailUsuario($this->userName) . "','" . $valor . "', '" . $this->asuntoNotificacion . "','" . $this->mensajeNotificacion . "','" . $this->userName . "')";
                    $this->mysqli->query($sql);
                }
                //$this->mysqli->query($sql);
                return 'Inserción realizada con éxito';
            } else {
                //En caso de que no contenga ninguna @, vamos a obtener todos los correos de los deportistas de esa actividad y generar una notificacion
                $this->destinatarioNotificacion = ConsultarDeportistasActividad($this->destinatarioNotificacion);
                // var_dump($this->destinatarioNotificacion);

                foreach ($this->destinatarioNotificacion as $valor1) {
                    $sql = "INSERT INTO NOTIFICACION(remitenteNotificacion, destinatarioNotificacion, asuntoNotificacion, mensajeNotificacion, username) VALUES ('" . $this->ConsultarMailUsuario($this->userName) . "','" . $valor1 . "', '" . $this->asuntoNotificacion . "','" . $this->mensajeNotificacion . "','" . $this->userName . "')";
                    $this->mysqli->query($sql);
                }
                return 'Inserción realizada con éxito';
            }
        }
    }

    function ConsultarMailUsuario($username) {
        $this->ConectarBD();
        $sql = "SELECT email FROM USUARIO WHERE username ='" . $username . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'No se ha podido conectar con la base de datos.';
        } else {
            $result = $resultado->fetch_array();
            return $result['email'];
        }
    }

//    //Como el autoincremental de la base de datos no esta funcionando creo esta funcion auxiliar que devuelve el maximo valor en los ids de la tabla,
//    //De esta forma en el insertar inserto con el siguiente valor a ese
//    function MaximoID() {
//        $this->ConectarBD();
//        $sql = "SELECT MAX(idNotificacion) as Maximo FROM NOTIFICACION";
//        if (!($resultado = $this->mysqli->query($sql))) {
//            return 'No se ha podido conectar con la base de datos.';
//        } else {
//            $result = $resultado->fetch_array();
//            return $result['Maximo'] + 1;
//        }
//    }

    function Consultar() {
        $this->ConectarBD();

        if ($this->remitenteNotificacion == '' && $this->asuntoNotificacion == '' && $this->mensajeNotificacion == '') { //000
            $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $this->consultarEmail($this->userName) . "'";
        } else
        if ($this->remitenteNotificacion == '' && $this->asuntoNotificacion == '' && $this->mensajeNotificacion != '') { //001
            $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $this->consultarEmail($this->userName) . "' AND mensajeNotificacion LIKE '%" . $this->mensajeNotificacion . "%'";
        } else
        if ($this->remitenteNotificacion != '' && $this->asuntoNotificacion == '' && $this->mensajeNotificacion == '') { //100
            $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $this->consultarEmail($this->userName) . "' AND remitenteNotificacion LIKE '%" . $this->remitenteNotificacion . "%'";
        } else
        if ($this->remitenteNotificacion != '' && $this->asuntoNotificacion == '' && $this->mensajeNotificacion != '') { //101
            $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $this->consultarEmail($this->userName) . "' AND remitenteNotificacion LIKE '%" . $this->remitenteNotificacion . "%' AND mensajeNotificacion LIKE '%" . $this->mensajeNotificacion . "%'";
        } else if ($this->remitenteNotificacion == '' && $this->asuntoNotificacion != '' && $this->mensajeNotificacion == '') { //010
            $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $this->consultarEmail($this->userName) . "' AND asuntoNotificacion LIKE '%" . $this->asuntoNotificacion . "%'";
        } else if ($this->remitenteNotificacion == '' && $this->asuntoNotificacion != '' && $this->mensajeNotificacion != '') { //011
            $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $this->consultarEmail($this->userName) . "' AND asuntoNotificacion LIKE '%" . $this->asuntoNotificacion . "%' AND mensajeNotificacion LIKE '%" . $this->mensajeNotificacion . "%'";
        } else if ($this->remitenteNotificacion != '' && $this->asuntoNotificacion != '' && $this->mensajeNotificacion == '') { //110
            $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $this->consultarEmail($this->userName) . "' AND asuntoNotificacion LIKE '%" . $this->asuntoNotificacion . "%' AND remitenteNotificacion LIKE '%" . $this->remitenteNotificacion . "%'";
        } else if ($this->remitenteNotificacion != '' && $this->asuntoNotificacion != '' && $this->mensajeNotificacion != '') { //111
            $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $this->consultarEmail($this->userName) . "' AND asuntoNotificacion LIKE '%" . $this->asuntoNotificacion . "%' AND remitenteNotificacion LIKE '%" . $this->remitenteNotificacion . "%' AND mensajeNotificacion LIKE '%" . $this->mensajeNotificacion . "%'";
        }
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'No se ha podido conectar con la base de datos.';
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

    function ConsultarGrande() {
        $this->ConectarBD();

        if ($this->remitente == '' && $this->fechaHoraNotif == '' && $this->destinatario == '' && $this->username == '') { //0000
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION ";
        } else if ($this->remitente == '' && $this->fechaHoraNotif == '' && $this->destinatario == '' && $this->username != '') { //0001
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE username = '" . $this->username . "'";
        } else if ($this->remitente == '' && $this->fechaHoraNotif == '' && $this->destinatario != '' && $this->username == '') { //0010
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE destinatarioNotificacion = '" . $this->destinatario . "'";
        } else if ($this->remitente == '' && $this->fechaHoraNotif == '' && $this->destinatario != '' && $this->username != '') { //0011
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion,username FROM NOTIFICACION WHERE destinatarioNotificacion = '" . $this->destinatario . " AND username = '" . $this->username . "'";
        } else if ($this->remitente == '' && $this->fechaHoraNotif != '' && $this->destinatario == '' && $this->username == '') { //0100
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE fechaHoraNotificacion BETWEEN  '" . $this->fechaHoraNotif . "' AND '" . $this->fechaHora2 . "'";
        } else if ($this->remitente == '' && $this->fechaHoraNotif != '' && $this->destinatario == '' && $this->username != '') { //0101
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE (fechaHoraNotificacion BETWEEN  '" . $this->fechaHoraNotif . "' AND '" . $this->fechaHora2 . "') AND username = '" . $this->username . "'";
        } else if ($this->remitente == '' && $this->fechaHoraNotif != '' && $this->destinatario != '' && $this->username == '') { //0110
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE (fechaHoraNotificacion BETWEEN  '" . $this->fechaHoraNotif . "' AND '" . $this->fechaHora2 . "') AND destinatarioNotificacion = '" . $this->destinatario . "'";
        } else if ($this->remitente == '' && $this->fechaHoraNotif != '' && $this->destinatario != '' && $this->username != '') { //0111
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE (fechaHoraNotificacion BETWEEN  '" . $this->fechaHoraNotif . "' AND '" . $this->fechaHora2 . "') AND destinatarioNotificacion = '" . $this->destinatario . "'AND username = '" . $this->username . "'";
        } else if ($this->remitente != '' && $this->fechaHoraNotif == '' && $this->destinatario == '' && $this->username == '') { //1000
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE  remitenteNotificacion = '" . $this->remitente . "'";
        } else if ($this->remitente != '' && $this->fechaHoraNotif == '' && $this->destinatario == '' && $this->username != '') { //1001
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE  remitenteNotificacion = '" . $this->remitente . "' AND username = '" . $this->username . "'";
        } else if ($this->remitente != '' && $this->fechaHoraNotif == '' && $this->destinatario != '' && $this->username == '') { //1010
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE  remitenteNotificacion = '" . $this->remitente . "' AND destinatarioNotificacion = '" . $this->destinatario . "'";
        } else if ($this->remitente != '' && $this->fechaHoraNotif == '' && $this->destinatario != '' && $this->username != '') { //1011
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE  remitenteNotificacion = '" . $this->remitente . "' AND destinatarioNotificacion = '" . $this->destinatario . "' AND username = '" . $this->username . "'";
        } else if ($this->remitente != '' && $this->fechaHoraNotif != '' && $this->destinatario == '' && $this->username == '') { //1100
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE  remitenteNotificacion = '" . $this->remitente . "' AND (FechaHoraNotificacion BETWEEN  '" . $this->fechaHoraNotif . "' AND '" . $this->FechaHora2 . "')";
        } else if ($this->remitente != '' && $this->fechaHoraNotif != '' && $this->destinatario == '' && $this->username != '') { //1101
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE  remitenteNotificacion = '" . $this->remitente . "' AND (FechaHoraNotificacion BETWEEN  '" . $this->fechaHoraNotif . "' AND '" . $this->FechaHora2 . "') AND username = '" . $this->username . "'";
        } else if ($this->remitente != '' && $this->fechaHoraNotif != '' && $this->destinatario != '' && $this->username == '') { //1110
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion,asuntoNotificacion, username FROM NOTIFICACION WHERE  remitenteNotificacion = '" . $this->remitente . "' AND (FechaHoraNotificacion BETWEEN  '" . $this->fechaHoraNotif . "' AND '" . $this->FechaHora2 . "') AND destinatarioNotificacion = '" . $this->destinatario . "'";
        } else if ($this->remitente != '' && $this->fechaHoraNotif != '' && $this->destinatario != '' && $this->username != '') { //1111
            $sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, asuntoNotificacion, username FROM NOTIFICACION WHERE  remitenteNotificacion = '" . $this->remitente . "' AND (fechaHoraNotificacion BETWEEN  '" . $this->fechaHoraNotif . "' AND '" . $this->fechaHora2 . "') AND destinatarioNotificacion = '" . $this->destinatario . "' AND username = '" . $this->username . "'";
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

//Consulta todos los deportistas para que los entrenadores puedan enviarle notificaciones
    function ConsultarDeportistas() {
        $this->ConectarBD();
        $sql = "SELECT EMAIL FROM USUARIO U, DEPORTISTA D WHERE U.userName = D.userName";

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

//Consulta todos los deportistas para que los entrenadores puedan enviarle notificaciones
    function ConsultarActividades() {
        $this->ConectarBD();
        $sql = "SELECT DISTINCT nombreActividadGrupal FROM ACTIVIDADGRUPAL";

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

//Consulta todos los deportistas para que los entrenadores puedan enviarle notificaciones
    function ConsultarActividadesImpartidas($login) {
        $this->ConectarBD();
        $sql = "SELECT DISTINCT nombreActividadGrupal FROM ACTIVIDADGRUPAL G WHERE G.userName = '" . $login . "'";

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

//Consulta todos los usuarios para que los administradores puedan enviarle notificaciones
    function ConsultarUsuarios() {
        $this->ConectarBD();
        $sql = "SELECT username FROM USUARIO";

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

//Como en la base de datos solo hay guardado el username del que crea la notificacion,
//para listar las notificaciones que han sido enviadas a un usuario necesito conseguir su email a partir de su username
//de esta forma puedo listar todas las notificaciones asociadas a ese email.
    function consultarEmail() {
        $this->ConectarBD();
        $sql = "SELECT email FROM USUARIO WHERE userName='" . $this->userName . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            $result = $this->mysqli->query($sql)->fetch_array();
            return $result['email'];
        }
    }

//Devuelve la información de todas las notificaciones asociadas a este usuario
//para esto hace falta saber que usuario esta accediendo a la funcion.
    function Listar() {
        $email = $this->consultarEmail();
        if ($email == 'Error en la consulta sobre la base de datos.') {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            $this->ConectarBD();
            $sql = "SELECT estado, idNotificacion, remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion ,asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $email . "' ORDER BY fechaHoraNotificacion DESC";
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

     function ListarEnviados()
    {
        $this->ConectarBD();
        $sql = "SELECT estado,idNotificacion, remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion ,asuntoNotificacion FROM NOTIFICACION WHERE username ='" . $this->userName . "'";
        if(!($resultado = $this->mysqli->query($sql)))
        {
            return 'Error en la consulta sobre la base de datos.';
        }
        else {
                $toret = array();
                $i = 0;
                while ($fila = $resultado->fetch_array()) {
                    $toret[$i] = $fila;
                    $i++;
                }
                return $toret;
            }
    }


//Funcion para dar de baja una notificacion en el sistema.
    function Borrar() {
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

    function RellenaDatos() {
        $this->ConectarBD();
        $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, 
    	asuntoNotificacion, mensajeNotificacion FROM NOTIFICACION WHERE idNotificacion= '" . $this->idNotificacion . "'";
        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos.';
        } else {
            $result = $resultado->fetch_array();
            return $result;
        }
    }

    function Ver() {
        $this->ConectarBD();
        $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, 
    	asuntoNotificacion, mensajeNotificacion FROM NOTIFICACION WHERE idNotificacion= '" . $this->idNotificacion . "'";
        if (($resultado = $this->mysqli->query($sql))) {
            $sql1 = "UPDATE notificacion SET estado=0  WHERE idNotificacion= '" . $this->idNotificacion . "'";
            $this->mysqli->query($sql1);

            $result = $resultado->fetch_array();
            return $result;
        } else {
            return 'Error en la consulta sobre la base de datos.';
        }
    }

    function VerSinEstado() {
        $this->ConectarBD();
        $sql = "SELECT idNotificacion,remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, 
        asuntoNotificacion, mensajeNotificacion FROM NOTIFICACION WHERE idNotificacion= '" . $this->idNotificacion . "'";
        if (($resultado = $this->mysqli->query($sql))) {
            $result = $resultado->fetch_array();
            return $result;
        } else {
            return 'Error en la consulta sobre la base de datos.';
        }
    }

    function Enviar_Email() {

        $cont = 0;

        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "ssl";
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 465;
        $this->mail->username = $this->username;
        $this->mail->Password = $this->password;
        $this->mail->setFrom($this->remitente, $this->NOTIFICACION_NOMBRE_REMITENTE);
        $this->mail->addReplyTo($this->remitente, $this->NOTIFICACION_NOMBRE_REMITENTE);
        $this->mail->Subject = $this->asunto;
        $this->mail->msgHTML($this->mensaje);
        $this->mail->CharSet = "UTF-8";

        /*
          $destinatarios = explode(',', $this->NOTIFICACION_DESTINATARIOS); //Ya que en la vista convertimos el array de los checkbox a un string para pasarlo sin problemas al controlador y ahora al modelo, volvemos a convertir en un array los correos de destinatarios

          foreach ($destinatarios as $address) {
          $this->mail->addAddress($address, $this->NOTIFICACION_NOMBRE_REMITENTE);
          if ($this->mail->send()) {
          $cont = $cont + 1;
          $this->mail->clearAddresses();
          $this->Insertar($address);
          } else {
          return ("Ha ocurrido un error durante el envio de las notificaciones");
          }
          }

          if ($cont = count($destinatarios)) {

          return ("Notificacion enviada con exito");
          }^ */
    }

}

?>
