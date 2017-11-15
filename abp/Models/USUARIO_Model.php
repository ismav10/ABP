<?php

//-------------------------------------------------------
include '../Functions/LibraryFunctions.php';

class USUARIO_Modelo {

//Parámetros de la clase usuario
    var $userName;
    var $password;
    var $tipoUsuario;
    var $nombre;
    var $apellidos;
    var $dni;
    var $fechaNac;
    var $direccion;
    var $telefono;
    var $email;
    var $foto;
    var $cuentaBanc;
    var $tipoDeportista;
    var $metodoPago;
    var $mysqli;

    function __construct($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, $cuentaBanc, $tipoDeportista, $metodoPago) {
        $this->userName = $userName;
        $this->password = $password;
        $this->tipoUsuario = $tipoUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->fechaNac = $fechaNac;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->foto = $foto;
        $this->cuentaBanc = $cuentaBanc;
        $this->tipoDeportista = $tipoDeportista;
        $this->medotoPago = $metodoPago;
    }

//Función para conectarnos a la Base de datos
    function ConectarBD() {
        $this->mysqli = new mysqli("localhost", "root", "", "gymgest");

        if ($this->mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }

//Comprueba que el usuario pueda loguearse
    function Login() {
        $this->ConectarBD();
        echo $this->userName;
        $sql = "SELECT * FROM USUARIO WHERE userName = '" . $this->userName . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows == 1) {
            $tupla = $result->fetch_array();

            if ($tupla['password'] == md5($this->password)) {
                return true;
            } else {
                return 'La contraseña para este usuario es errónea';
            }
        } else {
            return "El usuario no existe";
        }
    }

//Insertar usuario
    function Insertar() {
        $this->ConectarBD();
        if ($this->userName <> '') {
            $sql = "select * from USUARIO where userName = '" . $this->userName . "'";
            if (!$result = $this->mysqli->query($sql)) {
                return 'No se ha podido conectar con la base de datos';
            } else {
                if ($result->num_rows == 0) {
                    //Insertamos en la tabla USUARIO
                    $sql = "INSERT INTO USUARIO VALUES ('" . $this->userName . "','" . md5($this->password) . "','" . $this->tipoUsuario . "','" . $this->nombre . "','" . $this->apellidos . "','" . $this->dni . "','" . $this->fechaNac . "','" . $this->direccion . "','" . $this->telefono . "', '" . $this->email . "', '" . $this->foto . "');";
                    $this->mysqli->query($sql);

                    if ($this->tipoUsuario == 2) {
                        $sql = "INSERT INTO ENTRENADOR VALUES ( '" . $this->userName . "', '" . $this->cuentaBanc . "');";
                        $this->mysqli->query($sql);
                    }

                    if ($this->tipoUsuario == 3) {
                        $sql = "INSERT INTO DEPORTISTA VALUES ( '" . $this->userName . "', '" . $this->tipoDeportista . "', '" . $this->medotoPago . "');";
                        $this->mysqli->query($sql);
                    }

                    //Cogemos las páginas que le corresponden por pertenecer a un determinado rol
                    $sql = "SELECT DISTINCT PAGINA.idPagina FROM USUARIO, FUNCIONALIDAD_ROL, FUNCIONALIDAD_PAGINA, PAGINA  WHERE USUARIO.tipoUsuario=FUNCIONALIDAD_ROL.idRol AND FUNCIONALIDAD_ROL.idFuncionalidad=FUNCIONALIDAD_PAGINA.idFuncionalidad AND PAGINA.idPagina=FUNCIONALIDAD_PAGINA.idPagina AND userName='" . $this->userName . "'";

                    if (!($resultado = $this->mysqli->query($sql))) {
                        echo 'Error en la consulta sobre la base de datos';
                    } else {
                        while ($tupla = $resultado->fetch_array()) {
                            //Insertamos esas páginas en la tabla USUARIO_PÁGINA de la que se van a recoger las acciones permitidas
                            $sql = "INSERT INTO USUARIO_PAGINA (userName, idPagina) VALUES('" . $this->userName . "'," . $tupla['idPagina'] . ")";

                            $this->mysqli->query($sql);
                        }
                    }

                    return 'Inserción realizada con éxito';
                } else
                    return 'El usuario ya existe en la base de datos';
            }
        }
        else {

            return 'Introduzca un valor para username del usuario';
        }
    }

    /*
      //destrucción del objeto
      function __destruct()
      {

      }

      //Consulta por todos los campos
      function Consultar()
      {
      $this->ConectarBD();
      $sql = "select USUARIO_USER, USUARIO_PASSWORD, USUARIO_NOMBRE, USUARIO_APELLIDO, USUARIO_DNI, USUARIO_FECH_NAC, USUARIO_EMAIL, USUARIO_TELEFONO, USUARIO_CUENTA, USUARIO_DIRECCION, USUARIO_COMENTARIOS, USUARIO_TIPO, USUARIO_FOTO, USUARIO_ESTADO from USUARIO where (USUARIO_USER LIKE '".$this->USUARIO_USER."' )OR (USUARIO_NOMBRE LIKE '".$this->USUARIO_NOMBRE."' )OR (USUARIO_APELLIDO LIKE '".$this->USUARIO_APELLIDO."')OR (USUARIO_FECH_NAC LIKE '".$this->USUARIO_FECH_NAC."')OR(USUARIO_DNI LIKE '".$this->USUARIO_DNI."')OR (USUARIO_EMAIL LIKE '".$this->USUARIO_EMAIL."') OR (USUARIO_TELEFONO LIKE '".$this->USUARIO_TELEFONO."' ) OR (USUARIO_DIRECCION LIKE '".$this->USUARIO_DIRECCION."') OR (USUARIO_CUENTA LIKE '".$this->USUARIO_CUENTA."' )" ;

      if (!($resultado = $this->mysqli->query($sql))){
      return 'Error en la consulta sobre la base de datos';
      }
      else{
      $toret=array();
      $i=0;

      while ($fila= $resultado->fetch_array()) {


      $toret[$i]=$fila;
      $i++;

      }

      return $toret;
      }
      }
     */

//Devuelve la información de todos los usuarios en funcion de si son entrenadores o deportistas
    function ConsultarTodo() {
        $this->ConectarBD();
        if ($this->tipoUsuario == 2) {
            $sql = "SELECT * FROM USUARIO, ENTRENADOR WHERE tipoUsuario = '" . $this->tipoUsuario . "' AND USUARIO.userName=ENTRENADOR.userName";
        } else if ($this->tipoUsuario == 3) {
            $sql = "SELECT * FROM USUARIO, DEPORTISTA WHERE tipoUsuario = '" . $this->tipoUsuario . "' AND USUARIO.userName=DEPORTISTA.userName";
        } else {
            $sql = "SELECT * FROM USUARIO";
        }

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
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

    /*
      //Realiza el borrado lógico de un usuario cambiando su estado a Inactivo
      function Borrar()
      {
      $this->ConectarBD();
      $sql = "select * from USUARIO where USUARIO_USER = '".$this->USUARIO_USER."'";
      $result = $this->mysqli->query($sql);
      if ($result->num_rows == 1)
      {
      if ($this->USUARIO_ESTADO='Activo') {
      $sql = "UPDATE  USUARIO SET USUARIO_ESTADO='Inactivo' where USUARIO_USER = '" . $this->USUARIO_USER . "'";
      $this->mysqli->query($sql);
      return "El usuario ha sido borrado correctamente";
      }
      else {
      return "El usuario ya no se encuentra contratado";
      }
      }
      else
      return "El usuario no existe";
      }
     */

    //Devuelve los valores almacenados para un determinado usuario para posteriormente rellenar un formulario
    function RellenaDatos() {
        $this->ConectarBD();
        if ($this->tipoUsuario != 2 && $this->tipoUsuario != 3) {
            $sql = "SELECT * FROM USUARIO WHERE USUARIO.userName = '" . $this->userName . "'";
        } else if ($this->tipoUsuario == 2) {
            $sql = "SELECT * FROM USUARIO, ENTRENADOR WHERE USUARIO.userName = ENTRENADOR.userName AND ENTRENADOR.userName = '" . $this->userName . "'";
        } else if ($this->tipoUsuario == 3) {
            $sql = "SELECT * FROM USUARIO, DEPORTISTA WHERE USUARIO.userName = DEPORTISTA.userName AND DEPORTISTA.userName = '" . $this->userName . "'";
        }

        if (!($resultado = $this->mysqli->query($sql))) {
            return 'Error en la consulta sobre la base de datos';
        } else {
            $result = $resultado->fetch_array();
            return $result;
           
        }
    }

    
    //Actualiza en la base de datos la información de un determinado usuario
    function Modificar($login) {
        
        $this->ConectarBD();
        $sql = "SELECT * FROM USUARIO where userName = '" . $this->userName . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows == 1) {

            if ($login == 1) {
                $sql = "UPDATE USUARIO SET password = '" . md5($this->password) . "',tipoUsuario ='" . $this->tipoUsuario . "',nombre= '" . $this->nombre . "',apellidos= '" . $this->apellidos . "',dni = '" . $this->dni . "',fechaNac= '" . $this->fechaNac . "',direccion= '" . $this->direccion . "',telefono= '" . $this->telefono . "',email= '" . $this->email . "'";
            } else {
                $sql = "UPDATE USUARIO SET password = '" . md5($this->password) . "',nombre= '" . $this->nombre . "',apellidos= '" . $this->apellidos . "',dni = '" . $this->dni . "',fechaNac= '" . $this->fechaNac . "',direccion= '" . $this->direccion . "',telefono= '" . $this->telefono . "',email= '" . $this->email . "'";
            }
            
            if ($this->foto != '') {
                $sql.=", foto='" . $this->foto . "'";
            }
            
            //Funcionalidad propia de un usuario ADMIN
            if ($login == 1) {
                $sql1 = "DELETE FROM USUARIO_PAGINA WHERE userName='" . $this->userName . "'";
                $this->mysqli->query($sql1);
                
                //Cogemos las páginas que le corresponden por pertenecer a un determinado rol
                $sql2 = "SELECT DISTINCT PAGINA.idPagina FROM  FUNCIONALIDAD_ROL, FUNCIONALIDAD_PAGINA, PAGINA  WHERE FUNCIONALIDAD_ROL.idRol='" . consultarTipoUsuario($this->userName) . "' AND FUNCIONALIDAD_ROL.idFuncionalidad=FUNCIONALIDAD_PAGINA.idFuncionalidad AND PAGINA.idPagina=FUNCIONALIDAD_PAGINA.idPagina";

                if (!($resultado = $this->mysqli->query($sql2))) {
                    echo 'Error en la consulta sobre la base de datos';
                } else {
                    while ($tupla = $resultado->fetch_array()) {
                        //Insertamos esas páginas en la tabla USUARIO_PÁGINA de la que se van a recoger las acciones permitidas
                        $sql3 = "INSERT INTO USUARIO_PAGINA (userName, idPagina) VALUES('" . $this->userName . "'," . $tupla['idPagina'] . ")";

                        $this->mysqli->query($sql3);
                    }
                }

                //$sql.=", USUARIO_TIPO='" . $this->USUARIO_TIPO . "'";
            }

            $sql.=" WHERE userName='" . $this->userName . "'";




            //En caso de producirse un error en la modificación, deshacer los cambios sobre las páginas del usuario
            if (!($resultado = $this->mysqli->query($sql))) {
                return "Se ha producido un error en la modificación del usuario"; // sustituir por un try
            } else {
                $sql = "DELETE FROM USUARIO_PAGINA WHERE userName='" . $this->userName . "'";

                $this->mysqli->query($sql);

                $sql = "SELECT DISTINCT PAGINA.idPagina FROM USUARIO, FUNCIONALIDAD_ROL, FUNCIONALIDAD_PAGINA, PAGINA  WHERE USUARIO.tipoUsuario=FUNCIONALIDAD_ROL.idRol AND FUNCIONALIDAD_ROL.idFuncionalidad=FUNCIONALIDAD_PAGINA.idFuncionalidad AND PAGINA.idPagina=FUNCIONALIDAD_PAGINA.idPagina AND userName='" . $this->userName . "'";

                if (!($resultado = $this->mysqli->query($sql))) {
                    echo 'Error en la consulta sobre la base de datos';
                } else {
                    while ($tupla = $resultado->fetch_array()) {

                        $sql = "INSERT INTO USUARIO_PAGINA (userName, idPagina) VALUES('" . $this->userName . "'," . $tupla['idPagina'] . ")";

                        $this->mysqli->query($sql);
                    }
                }

                return "El usuario se ha modificado con éxito";
            }
        } else
            return "El usuario no existe";
    }

    /*
      //Nos permite modificar las acciones que puede realizar un determinado usuario
      function ModificarPaginas($pags){
      $this->ConectarBD();
      $sql="DELETE FROM USUARIO_PAGINA WHERE USUARIO_USER='".$this->USUARIO_USER."'";
      $this->mysqli->query($sql);
      for ($i=0;$i<count($pags);$i++){
      $sql="INSERT INTO  USUARIO_PAGINA(USUARIO_USER,PAGINA_ID) VALUES ('".$this->USUARIO_USER."', ".ConsultarIDPagina($pags[$i]).")";

      $this->mysqli->query($sql);
      }
      }


      //Nos devuelve las páginas a las que tiene acceso el usuario
      function ConsultarPaginas()
      {
      $this->ConectarBD();

      $sql = "select PAGINA_ID from USUARIO_PAGINA WHERE USUARIO_USER='".$this->USUARIO_USER."'";

      if (!($resultado = $this->mysqli->query($sql))){
      return 'Error en la consulta sobre la base de datos';
      }
      else{


      $toret=array();
      $i=0;

      while ($fila= $resultado->fetch_array()) {


      $toret[$i]=ConsultarNOMPagina($fila['PAGINA_ID']);
      $i++;

      }


      return $toret;

      }
      }

     */
}

?>
