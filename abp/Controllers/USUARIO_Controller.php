<?php

//Controlador para la gestión de usuarios
include '../Models/USUARIO_Model.php';
include '../Views/USUARIO_EDIT_ACCIONES_Vista.php';
include '../Views/MENSAJEU_Vista.php';
include '../Views/LOGIN_Vista.php';


if (!IsAuthenticated()) {
    header('Location:../index.php');
}

include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';

$pags = generarIncludes(); //Realizamos los includes de las páginas a las que tiene acceso
for ($z = 0; $z < count($pags); $z++) {
    include $pags[$z];
}

//Método que recoge la información del formulario
function get_data_form() {

    //Atributos comunes a entrenadores y deportistas
    $userName = $_REQUEST['userName'];
    $password = $_REQUEST['password'];
    $nombre = $_REQUEST['nombre'];
    $tipoUsuario = ConsultarIDRol($_REQUEST['tipoUsuario']);
    $apellidos = $_REQUEST['apellidos'];
    $dni = $_REQUEST['dni'];
    $fechaNac = $_REQUEST['fechaNac'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];

    //Si no se ha introducido un nuevo archivo se deja el que había
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] !== '')) {
        $foto = '../Documents/Empleados/' . $_REQUEST['dni'] . '/Foto/' . $_FILES['foto']['name'];
    } else {
        $foto = '';
    }
    //Atributos especificos de entrenador
    if ($_REQUEST['id'] == "2") {
        $tipoUsuario = 2;
        $cuentaBanc = $_REQUEST['cuentaBanc'];

        //Creamos el usuario con los datos anteriores
        $usuario = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, $cuentaBanc, "", "");
        $id = $_REQUEST['id'];
        $accion = $_REQUEST['accion'];
        return $usuario;
    }

    //Atributos especificos de deportista
    if ($_REQUEST['id'] == "3") {
        $tipoUsuario = 3;
        $tipoDeportista = $_REQUEST['tipoDeportista'];
        $metodoPago = $_REQUEST['metodoPago'];

        //Creamos el usuario con los datos anteriores
        $usuario = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, "", $tipoDeportista, $metodoPago);
        $id = $_REQUEST['id'];
        $accion = $_REQUEST['accion'];
        return $usuario;
    }

    $id = $_REQUEST['id'];
    $accion = $_REQUEST['accion'];

    //Este caso se utiliza para crear usuarios que son admin
    //$tipoUsuario = 1;
    $usuario = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, "", "", "");

    return $usuario;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}

if (!isset($_REQUEST['id'])) {
    $_REQUEST['id'] = '';
}

Switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    case $strings['Insertar']:
            if (!isset($_REQUEST['userName'])) { //Si aún no se ha establecido el usuario
                $id = $_REQUEST['id'];
                new USUARIO_Insertar($id);
            } else {
                $usuario = get_data_form();

                //Creamos las carpetas para guardar los archivos
                $carpetaFoto = '../Documents/Empleados/' . $_REQUEST['dni'] . '/Foto/';

                if ($_FILES['foto']['name'] !== '') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
                }

                //Insertamos el usuario
                $respuesta = $usuario->Insertar();
                $id = $_REQUEST['id'];
                new MensajeUser($respuesta, $id, 'USUARIO_Controller.php?id=');
        }
        break;

    case $strings['Modificar']:
            if (!isset($_REQUEST['dni'])) {
                //Crea un usuario solo con el user para posteriormente rellenar el formulario con sus datos
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('USUARIO_Modificar')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //Muestra el formulario de modificación
                    $id = $_REQUEST['id'];
                    new USUARIO_Modificar($valores, $id, 'USUARIO_Controller.php?id=');
                }
            } else {
                $usuario = get_data_form();
                
                $carpetaFoto = '../Documents/Empleados/' . $_REQUEST['dni'] . '/Foto/';
                //Se realizan las modificaciones también en las carpetas de documentos
                if ($_FILES['foto']['name'] !== '') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
                }
                $id = $_REQUEST['id'];
                $login = ConsultarTipoUsuarioLogin();
                $respuesta = $usuario->Modificar($login);
                new MensajeUser($respuesta, $id, 'USUARIO_Controller.php?id=');
            }
        break;


    /*
      case  $strings['Consultar']: //Consultar los usuarios que cumplan unas ciertas condiciones
      if (!isset($_REQUEST['USUARIO_USER'])){
      if(!tienePermisos('USUARIO_Consultar')){
      new Mensaje('No tienes los permisos necesarios','USUARIO_Controller.php');
      }
      else { //Se muestra el formulario de consulta
      new USUARIO_Consultar();
      }
      }
      else{

      //Establecemos a cadena vacía la información que no se obtiene del formulario

      $_REQUEST['USUARIO_TIPO']='';
      $_REQUEST['USUARIO_ESTADO']='';


      $_REQUEST['USUARIO_PASSWORD']='';
      $_REQUEST['USUARIO_COMENTARIOS']='';

      $_REQUEST['USUARIO_FOTO']='';


      $usuario = get_data_form();
      $datos = $usuario->Consultar();


      new USUARIO_ShowConsulta($datos, 'USUARIO_Controller.php');
      }
      break;
      case $strings['Modificar acciones']:

      if (!isset($_REQUEST['funcionalidad_paginas'])) { //Consulta de las páginas asociadas
      $empleado = new USUARIO_Modelo($_REQUEST['USUARIO_USER'], '', '', '', '', '', '', '', '', '', '', '', '', '');

      $valores = $empleado->ConsultarPaginas();


      if (!tienePermisos('USUARIO_Edit_Accion')) {
      new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
      } else {

      new USUARIO_Edit_Accion($_REQUEST['USUARIO_USER'],$valores, 'USUARIO_Controller.php');
      }
      }
      else{
      $empleado = new USUARIO_Modelo($_REQUEST['USUARIO_USER'], '', '', '', '', '', '', '', '', '', '', '', '', '');
      $empleado->ModificarPaginas($_REQUEST['funcionalidad_paginas']);
      new Mensaje('El usuario se ha modificado con éxito', 'USUARIO_Controller.php');
      }
      break;
     */

    default: //Por defecto se realiza el show all
        if ($_REQUEST['id'] == "2") {
            if (!isset($_REQUEST['userName'])) {
                $usuario = new USUARIO_Modelo('', '', '2', '', '', '', '', '', '', '', '', '', '', '');
            } else {
                $usuario = get_data_form();
            }
            $datos = $usuario->ConsultarTodo();
        } else if ($_REQUEST['id'] == "3") {
            if (!isset($_REQUEST['userName'])) {
                $usuario = new USUARIO_Modelo('', '', '3', '', '', '', '', '', '', '', '', '', '', '');
            } else {
                $usuario = get_data_form();
            }
            $datos = $usuario->ConsultarTodo();
        } else if ($_REQUEST['id'] != "2" && $_REQUEST['id'] != "3") {
            if (!isset($_REQUEST['userName'])) {
                $usuario = new USUARIO_Modelo('', '', '', '', '', '', '', '', '', '', '', '', '', '');
            } else {
                $usuario = get_data_form();
            }

            $datos = $usuario->ConsultarTodo();
        }


        if (!tienePermisos('USUARIO_Show')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $id = $_REQUEST['id'];
            new USUARIO_Show($datos, $id, '../Views/DEFAULT_Vista.php');
        }
}
?>
