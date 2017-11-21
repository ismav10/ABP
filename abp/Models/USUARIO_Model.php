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
    var $newPassword;
    var $mysqli;

    function __construct($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, $cuentaBanc, $tipoDeportista, $metodoPago, $newPassword) {
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
        $this->newPassword = $newPassword;
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
                    if($this->foto = ''){
                        $this->foto = '../img/user.jpg';
                    }
                    
                    $sql = "INSERT INTO USUARIO VALUES ('" . $this->foto . "', '" . $this->userName . "','" . md5($this->password) . "','" . $this->tipoUsuario . "','" . $this->nombre . "','" . $this->apellidos . "','" . $this->dni . "','" . $this->fechaNac . "','" . $this->direccion . "','" . $this->telefono . "', '" . $this->email . "');";
                    $this->mysqli->query($sql);

                    if ($this->tipoUsuario == 2) {
                        $sql = "INSERT INTO ENTRENADOR VALUES ( '" . $this->userName . "', '" . $this->cuentaBanc . "');";
                        $this->mysqli->query($sql);
                    }

                    if ($this->tipoUsuario == 3) {
                        $sql = "INSERT INTO DEPORTISTA VALUES ( '" . $this->userName . "', '" . $this->tipoDeportista . "', '" . $this->medotoPago . "');";
                        $this->mysqli->query($sql);
                    }

                    $sql = "INSERT INTO USUARIO_ROL (userName, idRol) VALUES('" . $this->userName . "'," . $this->tipoUsuario . ")";

                    $this->mysqli->query($sql);
                }
            }

            return 'Inserción realizada con éxito';
        } else
            return 'El usuario ya existe en la base de datos';
    }

  

//Devuelve la información de todos los usuarios en funcion de si son entrenadores o deportistas
    function ConsultarTodo($user) {

        $this->ConectarBD();
        if ($user == "entrenador") {
            $sql = "SELECT * FROM USUARIO, ENTRENADOR WHERE USUARIO.userName=ENTRENADOR.userName AND USUARIO.tipoUsuario=2";
        } else if ($user == "deportista") {
            $sql = "SELECT * FROM USUARIO, DEPORTISTA WHERE USUARIO.userName=DEPORTISTA.userName AND USUARIO.tipoUsuario=3";
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

    function Borrar() {
        $this->ConectarBD();
        $sql = "SELECT * FROM USUARIO WHERE userName = '" . $this->userName . "'";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1) {
            if ($this->tipoUsuario == 1) {
                $sql = "DELETE FROM USUARIO WHERE userName = '" . $this->userName . "'";
                $this->mysqli->query($sql);
                return "El usuario ha sido borrado correctamente";
            } else if ($this->tipoUsuario == 2) {
                $sql = "DELETE FROM ENTRENADOR WHERE userName = '" . $this->userName . "'";
                $this->mysqli->query($sql);
                $sql2 = "DELETE FROM USUARIO WHERE userName= '" . $this->userName . "'";
                $this->mysqli->query($sql2);
                return "El usuario ha sido borrado correctamente";
            } else if ($this->tipoUsuario == 3) {
                $sql = "DELETE FROM DEPORTISTA WHERE userName = '" . $this->userName . "'";
                $this->mysqli->query($sql);
                $sql3 = "DELETE FROM USUARIO WHERE userName= '" . $this->userName . "'";
                $this->mysqli->query($sql3);
                return "El usuario ha sido borrado correctamente";
            }
        } else
            return "El usuario no existe";
    }

//Devuelve los valores almacenados para un determinado usuario para posteriormente rellenar un formulario
    function RellenaDatos() {
        $this->ConectarBD();
        if ($this->tipoUsuario == 1) {
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
    function Modificar() {

        $this->ConectarBD();
        $sql = "SELECT * FROM USUARIO where userName = '" . $this->userName . "'";
        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1) {
            if ($this->newPassword == '') {
                $sql = "UPDATE USUARIO SET tipoUsuario ='" . $this->tipoUsuario . "',nombre= '" . $this->nombre . "',apellidos= '" . $this->apellidos . "',dni = '" . $this->dni . "',fechaNac= '" . $this->fechaNac . "',direccion= '" . $this->direccion . "',telefono= '" . $this->telefono . "',email= '" . $this->email . "'";
            } else {
                $sql = "UPDATE USUARIO SET password = '" . md5($this->newPassword) . "',tipoUsuario ='" . $this->tipoUsuario . "',nombre= '" . $this->nombre . "',apellidos= '" . $this->apellidos . "',dni = '" . $this->dni . "',fechaNac= '" . $this->fechaNac . "',direccion= '" . $this->direccion . "',telefono= '" . $this->telefono . "',email= '" . $this->email . "'";
            }
            
            if ($this->foto != '') {
                $sql.=", foto='" . $this->foto . "'";
            }

            if ($this->tipoUsuario != '') {
                $sql1 = "DELETE FROM USUARIO_ROL WHERE userName='" . $this->userName . "'";
                $this->mysqli->query($sql1);

                $sql3 = "INSERT INTO USUARIO_ROL (userName, idRol) VALUES('" . $this->userName . "'," . $this->tipoUsuario . ")";
                $this->mysqli->query($sql3);
            }

            $sql.=" WHERE userName='" . $this->userName . "'";

            if (!($resultado = $this->mysqli->query($sql))) {

                return "Se ha producido un error en la modificación del usuario";
            } else {
                return "El usuario se ha modificado con éxito";
            }
        } else {
            return "El usuario no existe";
        }
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
