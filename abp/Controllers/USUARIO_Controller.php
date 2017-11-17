<?php

//Controlador para la gestión de usuarios
include '../Models/USUARIO_Model.php';
include '../Views/MENSAJE_Vista.php';


if (!IsAuthenticated()) {
    header('Location:../index.php');
}

include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';

$pags = generarIncludes(); //Realizamos los includes de las páginas a las que tiene acceso
for ($z = 0; $z < count($pags); $z++) {
    include $pags[$z];
}

//Método que recoge la información del formulario para usuarios administradores
function get_data_form_Admin() {

    //Atributos comunes a entrenadores y deportistas
    $userName = $_REQUEST['userName'];
    $password = $_REQUEST['password'];
    $nombre = $_REQUEST['nombre'];
    $tipoUsuario = 1;
    $apellidos = $_REQUEST['apellidos'];
    $dni = $_REQUEST['dni'];
    $fechaNac = $_REQUEST['fechaNac'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];

    //Si no se ha introducido un nuevo archivo se deja el que había
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] !== '')) {
        $foto = '../Documents/Administradores/' . $_REQUEST['dni'] . '/Foto/' . $_FILES['foto']['name'];
    } else {
        $foto = '';
    }

    $usuario = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, "", "", "");

    return $usuario;
}

//Método que recoge la información del formulario para usuarios entrenadores
function get_data_form_Entrenador() {

    //Atributos comunes a entrenadores y deportistas
    $userName = $_REQUEST['userName'];
    $password = $_REQUEST['password'];
    $nombre = $_REQUEST['nombre'];
    $tipoUsuario = 2;
    $apellidos = $_REQUEST['apellidos'];
    $dni = $_REQUEST['dni'];
    $fechaNac = $_REQUEST['fechaNac'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];
    $cuentaBanc = $_REQUEST['cuentaBanc'];

    //Si no se ha introducido un nuevo archivo se deja el que había
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] !== '')) {
        $foto = '../Documents/Entrenadores/' . $_REQUEST['dni'] . '/Foto/' . $_FILES['foto']['name'];
    } else {
        $foto = '';
    }

    $entrenador = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, $cuentaBanc, "", "");

    return $entrenador;
}

function get_data_form_Deportista() {

    //Atributos comunes a entrenadores y deportistas
    $userName = $_REQUEST['userName'];
    $password = $_REQUEST['password'];
    $nombre = $_REQUEST['nombre'];
    $tipoUsuario = 3;
    $apellidos = $_REQUEST['apellidos'];
    $dni = $_REQUEST['dni'];
    $fechaNac = $_REQUEST['fechaNac'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];
    $tipoDeportista = $_REQUEST['tipoDeportista'];
    $metodoPago = $_REQUEST['tipoDeportista'];

    //Si no se ha introducido un nuevo archivo se deja el que había
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] !== '')) {
        $foto = '../Documents/Deportistas/' . $_REQUEST['dni'] . '/Foto/' . $_FILES['foto']['name'];
    } else {
        $foto = '';
    }

    $deportista = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, "", $tipoDeportista, $metodoPago);

    return $deportista;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}


Switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    case $strings['Seleccionar']:
        if (!isset($_REQUEST['user'])) {
            new USUARIO_Select();
        } else {
            if ($_REQUEST['user'] == "admin") { //Si aún no se ha establecido el usuario
                new USUARIO_Insertar();
            } else if ($_REQUEST['user'] == "entrenador") {
                new ENTRENADOR_Insertar();
            } else if ($_REQUEST['user'] == "deportista") {
                new DEPORTISTA_Insertar();
            }
        }
        break;


    case $strings['Insertar']:

        if ($_REQUEST['user'] == "admin") {
            $usuario = get_data_form_Admin(); //Recogemos los datos del formulario
            //Creamos las carpetas para guardar los archivos
            $carpetaFoto = '../Documents/Administradores/' . $_REQUEST['dni'] . '/Foto/';

            if ($_FILES['foto']['name'] !== '') {
                if (!file_exists($carpetaFoto)) {
                    mkdir($carpetaFoto, 0777, true);
                }
                move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
            }

            $respuesta = $usuario->Insertar();
            new Mensaje($respuesta, 'USUARIO_Controller.php?accion=' . $strings['Seleccionar']);
        } else if ($_REQUEST['user'] == "entrenador") {
            $entrenador = get_data_form_Entrenador(); //Recogemos los datos del formulario
            //Creamos las carpetas para guardar los archivos
            $carpetaFoto = '../Documents/Entrenadores/' . $_REQUEST['dni'] . '/Foto/';

            if ($_FILES['foto']['name'] !== '') {
                if (!file_exists($carpetaFoto)) {
                    mkdir($carpetaFoto, 0777, true);
                }
                move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
            }

            $respuesta = $entrenador->Insertar();
            new Mensaje($respuesta, 'USUARIO_Controller.php?accion=' . $strings['Seleccionar']);
        
            
                } else if ($_REQUEST['user'] == "deportista") {
            $deportista = get_data_form_Deportista(); //Recogemos los datos del formulario
            //Creamos las carpetas para guardar los archivos
            $carpetaFoto = '../Documents/Deportistas/' . $_REQUEST['dni'] . '/Foto/';

            if ($_FILES['foto']['name'] !== '') {
                if (!file_exists($carpetaFoto)) {
                    mkdir($carpetaFoto, 0777, true);
                }
                move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
            }

            $respuesta = $deportista->Insertar();
            new Mensaje($respuesta, 'USUARIO_Controller.php?accion=' . $strings['Seleccionar']);
        }

        break;



//
//    case $strings['Modificar']:
//            if (!isset($_REQUEST['dni'])) {
//                //Crea un usuario solo con el user para posteriormente rellenar el formulario con sus datos
//                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '');
//                $valores = $usuario->RellenaDatos();
//                if (!tienePermisos('USUARIO_Modificar')) {
//                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
//                } else {
//                    //Muestra el formulario de modificación
//                    $id = $_REQUEST['id'];
//                    new USUARIO_Modificar($valores, $id, 'USUARIO_Controller.php?id=');
//                }
//            } else {
//                $usuario = get_data_form();
//                
//                $carpetaFoto = '../Documents/Empleados/' . $_REQUEST['dni'] . '/Foto/';
//                //Se realizan las modificaciones también en las carpetas de documentos
//                if ($_FILES['foto']['name'] !== '') {
//                    if (!file_exists($carpetaFoto)) {
//                        mkdir($carpetaFoto, 0777, true);
//                    }
//                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
//                }
//                $id = $_REQUEST['id'];
//                $login = ConsultarTipoUsuarioLogin();
//                $respuesta = $usuario->Modificar($login);
//                new MensajeUser($respuesta, $id, 'USUARIO_Controller.php?id=');
//            }
//        break;


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
        if (!isset($_REQUEST['userName'])) {
            $usuario = new USUARIO_Modelo('', '', '', '', '', '', '', '', '', '', '', '', '', '');
        } else {
            $usuario = get_data_form();
        }

        $datos = $usuario->ConsultarTodo();

        if (!tienePermisos('USUARIO_Show')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new USUARIO_Show($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>
