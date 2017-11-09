<?php

//-------------------------------------------------------
include '../Functions/LibraryFunctions.php';

class USUARIO_Modelo
{

//Parámetros de la clase usuario
	var $username;
	var $password;
	var $tipo;
	var $nombre;
	var $apellido1;
	var $apellido2;
	var $dni;
	var $fechaNac;
	var $direccion;
	var $telefono;
 	var $email;
	var $foto;
	var $mysqli;

//Constructor de la clase usuario
function __construct($username, $password, $tipo, $nombre, $apellido1, $apellido2, $dni, $fechaNac, $direccion, $telefono, $email, $foto)
{
    $this->username =  $username; //nombre de usuario
	$this->password = $password; //contraseña
	$this->tipo = $tipo;//fecha de nacimiento
	$this->nombre = $nombre; //email
	$this->apellido1 =  $apellido1;//nombre del usuario
	$this->apellido2 =  $apellido2;//apellidos del usuario
	$this->dni = $dni;//dni del usuario
	$this->fechaNac =  $fechaNac;//teléfono
	$this->direccion =$direccion;//número de cuenta
	$this->telefono =$telefono;//dirección postal
	$this->email =$email;//comentarios
	$this->foto =$foto;//tipo de usuario:1->ADMIN, 2->PROFESOR, 3->ALUMNO, 4->PROFESOR RESPONSABLE


}

//Función para conectarnos a la Base de datos
function ConectarBD()
{
    $this->mysqli = new mysqli("localhost", "root", "" , "gymgest");
	
	if ($this->mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
	}
}


//Comprueba que el usuario pueda loguearse
	function Login(){

		$this->ConectarBD();
		$sql = "select * from USUARIO where username = '".$this->username."'";
		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1 ){
			$tupla = $result->fetch_array();
			
			if ($tupla['password'] == md5($this->password)){
				return true;
			}
			else{
				return 'La contraseña para este usuario es errónea';
			}
			
		}
		else{
			return "El usuario no existe";
		}

	}



/*
//Insertar usuario
function Insertar()
{
    $this->ConectarBD();
    if ($this->username <> '' ){
		
        $sql = "select * from USUARIO where username = '".$this->username."'";

		if (!$result = $this->mysqli->query($sql)){
			return 'No se ha podido conectar con la base de datos';
		}
		else {
			if ($result->num_rows == 0){

				//Insertamos en la tabla USUARIO
				$sql = "INSERT INTO USUARIO (username, password, tipo, nombre, apellido1, apellido2, dni, fechNaci, direccion, telefono, email, foto) VALUES ('";

				$sql = $sql . "$this->username', '".md5($this->username)."', '$this->USUARIO_FECH_NAC', '$this->USUARIO_EMAIL', '$this->USUARIO_NOMBRE', '$this->USUARIO_APELLIDO', '$this->USUARIO_DNI', '$this->USUARIO_TELEFONO','$this->USUARIO_CUENTA', '$this->USUARIO_DIRECCION', '$this->USUARIO_COMENTARIOS',  '$this->USUARIO_TIPO', '$this->USUARIO_ESTADO', '$this->USUARIO_FOTO')";

				$this->mysqli->query($sql);
				//Cogemos las páginas que le corresponden por pertenecer a un determinado rol
				$sql = "SELECT DISTINCT PAGINA.PAGINA_ID FROM USUARIO, ROL_FUNCIONALIDAD, FUNCIONALIDAD_PAGINA, PAGINA  WHERE USUARIO.USUARIO_TIPO=ROL_FUNCIONALIDAD.ROL_ID AND ROL_FUNCIONALIDAD.FUNCIONALIDAD_ID=FUNCIONALIDAD_PAGINA.FUNCIONALIDAD_ID AND PAGINA.PAGINA_ID=FUNCIONALIDAD_PAGINA.PAGINA_ID AND USUARIO_USER='" . $this->USUARIO_USER."'";

				if (!($resultado = $this->mysqli->query($sql))) {
					echo 'Error en la consulta sobre la base de datos';
				} else {
					while ($tupla=$resultado->fetch_array()){
						//Insertamos esas páginas en la tabla USUARIO_PÁGINA de la que se van a recoger las acciones permitidas
						$sql="INSERT INTO USUARIO_PAGINA (USUARIO_USER, PAGINA_ID) VALUES('".$this->USUARIO_USER."',".$tupla['PAGINA_ID'].")";

						$this->mysqli->query($sql);
					}

				}

				return 'Inserción realizada con éxito';
			}
			else
				return 'El usuario ya existe en la base de datos';
		}
    }
    else{

	return 'Introduzca un valor para usuario del usuario';
}
}

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
//Devuelve la información de todos los usuarios
	function ConsultarTodo()
	{
		$this->ConectarBD();
		$sql = "select * from USUARIO";
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
//Devuelve los valores almacenados para un determinado usuario para posteriormente rellenar un formulario
function RellenaDatos()
{
    $this->ConectarBD();
    $sql = "select * from USUARIO where USUARIO_USER = '".$this->USUARIO_USER."'";

    if (!($resultado = $this->mysqli->query($sql))){
	return 'Error en la consulta sobre la base de datos';
	}
    else{
	$result = $resultado->fetch_array();
	return $result;
	}
}
//Actualiza en la base de datos la información de un determinado usuario
function Modificar()
{
    $this->ConectarBD();
    $sql = "select * from USUARIO where USUARIO_USER = '".$this->USUARIO_USER."'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {if ($this->USUARIO_USER==='ADMIN') {
    	$this->USUARIO_TIPO=1;
	}
	$sql = "UPDATE USUARIO SET USUARIO_PASSWORD = '".md5($this->USUARIO_PASSWORD)."',USUARIO_FECH_NAC ='".$this->USUARIO_FECH_NAC."',USUARIO_EMAIL= '".$this->USUARIO_EMAIL."',USUARIO_NOMBRE= '".$this->USUARIO_NOMBRE."',USUARIO_APELLIDO = '".$this->USUARIO_APELLIDO."',USUARIO_DNI= '".$this->USUARIO_DNI."',USUARIO_TELEFONO= '".$this->USUARIO_TELEFONO."',USUARIO_CUENTA= '".$this->USUARIO_CUENTA."',USUARIO_DIRECCION= '".$this->USUARIO_DIRECCION."',USUARIO_COMENTARIOS= '".$this->USUARIO_COMENTARIOS."',USUARIO_ESTADO= '".$this->USUARIO_ESTADO."'";
	 if($this->USUARIO_FOTO!=''){
	 	$sql.=", USUARIO_FOTO='".$this->USUARIO_FOTO."'";
	 }
		if($this->USUARIO_TIPO!=''){
			$sql1="DELETE FROM USUARIO_PAGINA WHERE USUARIO_USER='".$this->USUARIO_USER."'";
			$this->mysqli->query($sql1);
			//Cogemos las páginas que le corresponden por pertenecer a un determinado rol
			$sql2 = "SELECT DISTINCT PAGINA.PAGINA_ID FROM  ROL_FUNCIONALIDAD, FUNCIONALIDAD_PAGINA, PAGINA  WHERE ROL_FUNCIONALIDAD.ROL_ID='".consultarRol($this->USUARIO_TIPO)."' AND ROL_FUNCIONALIDAD.FUNCIONALIDAD_ID=FUNCIONALIDAD_PAGINA.FUNCIONALIDAD_ID AND PAGINA.PAGINA_ID=FUNCIONALIDAD_PAGINA.PAGINA_ID";

			if (!($resultado = $this->mysqli->query($sql2))) {
				echo 'Error en la consulta sobre la base de datos';
			} else {
				while ($tupla=$resultado->fetch_array()){
					//Insertamos esas páginas en la tabla USUARIO_PÁGINA de la que se van a recoger las acciones permitidas
					$sql3="INSERT INTO USUARIO_PAGINA (USUARIO_USER, PAGINA_ID) VALUES('".$this->USUARIO_USER."',".$tupla['PAGINA_ID'].")";

					$this->mysqli->query($sql3);
				}

			}

			$sql.=", USUARIO_TIPO='".$this->USUARIO_TIPO."'";
		}

		$sql.=" WHERE USUARIO_USER='".$this->USUARIO_USER."'";





		if (!($resultado = $this->mysqli->query($sql))){
		return "Se ha producido un error en la modificación del usuario"; // sustituir por un try
	}
	else{
		$sql= "DELETE FROM USUARIO_PAGINA WHERE USUARIO_USER='".$this->USUARIO_USER."'";

		$this->mysqli->query($sql);

		$sql = "SELECT DISTINCT PAGINA.PAGINA_ID FROM USUARIO, ROL_FUNCIONALIDAD, FUNCIONALIDAD_PAGINA, PAGINA  WHERE USUARIO.USUARIO_TIPO=ROL_FUNCIONALIDAD.ROL_ID AND ROL_FUNCIONALIDAD.FUNCIONALIDAD_ID=FUNCIONALIDAD_PAGINA.FUNCIONALIDAD_ID AND PAGINA.PAGINA_ID=FUNCIONALIDAD_PAGINA.PAGINA_ID AND USUARIO_USER='" . $this->USUARIO_USER."'";

		if (!($resultado = $this->mysqli->query($sql))) {
			echo 'Error en la consulta sobre la base de datos';
		} else {
			while ($tupla=$resultado->fetch_array()){

				$sql="INSERT INTO USUARIO_PAGINA (USUARIO_USER, PAGINA_ID) VALUES('".$this->USUARIO_USER."',".$tupla['PAGINA_ID'].")";

				$this->mysqli->query($sql);
			}

		}

		return "El usuario se ha modificado con éxito";
	}
    }
    else
    return "El usuario no existe";
}
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
