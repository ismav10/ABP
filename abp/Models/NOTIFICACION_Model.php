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
        $this->mysqli = new mysqli("localhost", "root", "", "gymgest");

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
            return 'No se ha podido conectar con la base de datos';
        } else {
            $sql = "INSERT INTO NOTIFICACION VALUES ('','" . $this->remitente . "','"
                    . $this->destinatario . "','','" . $this->asunto . "','" . $this->mensaje . "','" . $this->username . "')";
            $this->mysqli->query($sql);
        }
    }

    function Consultar() {
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
            $sql = "SELECT idNotificacion, remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion ,asuntoNotificacion FROM NOTIFICACION WHERE destinatarioNotificacion ='" . $email . "'";
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

    function RellenaDatos()
    {
    	$this->ConectarBD();
    	$sql = "SELECT remitenteNotificacion, destinatarioNotificacion, fechaHoraNotificacion, 
    	asuntoNotificacion, mensajeNotificacion FROM NOTIFICACION WHERE idNotificacion= '".$this->idNotificacion."'";
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
