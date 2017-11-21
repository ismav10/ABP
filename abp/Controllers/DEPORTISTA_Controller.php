<?php

//Controlador para la gestión de usuarios
include '../Models/USUARIO_Model.php';
include '../Views/MENSAJE_Vista.php';


if (!IsAuthenticated()) {
    header('Location:../index.php');
}
include '../Views/header.php';
include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';

$pags = generarIncludes(); //Realizamos los includes de las páginas a las que tiene acceso
for ($z = 0; $z < count($pags); $z++) {
    include $pags[$z];
}

function get_data_form_Deportista() {

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
    $tipoDeportista = $_REQUEST['tipoDeportista'];
    $metodoPago = $_REQUEST['metodoPago'];
       if (!isset($_REQUEST['newPassword']) || $_REQUEST['newPassword'] == '' ) {
        $newPassword = '';
    } else {
        $newPassword = $_REQUEST['newPassword'];
    }

    //Si no se ha introducido un nuevo archivo se deja el que había
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] !== '')) {
        $foto = '../Documents/Deportistas/' . $_REQUEST['dni'] . '/Foto/' . $_FILES['foto']['name'];
    } else {
        $foto = '';
    }

    $deportista = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, "", $tipoDeportista, $metodoPago, $newPassword);

    return $deportista;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}

if (!isset($_REQUEST['user'])) {
    $_REQUEST['user'] = 'deportista';
}


Switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    case $strings['Insertar']:

        if ($_REQUEST['user'] == "deportista") {
            if (!isset($_REQUEST['nombre'])) { //Si no se ha introducido ningun valor, mostramos la vista con el formulario
                new DEPORTISTA_Insertar('DEPORTISTA_Controller.php', 'DEPORTISTA_Controller.php?user=deportista');
            } else {
                //Recogemos los datos del formulario
                $deportista = get_data_form_Deportista();
                //Creamos las carpetas para guardar los archivos
                $carpetaFoto = '../Documents/Deportistas/' . $_REQUEST['dni'] . '/Foto/';

                if ($_FILES['foto']['name'] !== '') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
                }

                $respuesta = $deportista->Insertar();
                new Mensaje($respuesta, 'DEPORTISTA_Controller.php');
            }
        }

        break;




    case $strings['Modificar']:

        if (ConsultarTipoUsuario($_REQUEST['userName']) == 3) {
            if (!isset($_REQUEST['dni'])) {
                //Crea un usuario solo con el user para posteriormente rellenar el formulario con sus datos
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('DEPORTISTA_Modificar')) {
                    new Mensaje('No tienes los permisos necesarios', 'DEPORTISTA_Controller.php');
                } else {
                    //Muestra el formulario de modificación
                    new Deportista_Modificar($valores, 'DEPORTISTA_Controller.php');
                }
            } else {
                $deportista = get_data_form_Deportista();

                $carpetaFoto = '../Documents/Deportistas/' . $_REQUEST['dni'] . '/Foto/';
                //Se realizan las modificaciones también en las carpetas de documentos
                if ($_FILES['foto']['name'] !== '') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
                }
                $respuesta = $deportista->Modificar();
                new Mensaje($respuesta, 'DEPORTISTA_Controller.php');
            }
        }
        break;


    case $strings['Borrar']:
        if (ConsultarTipoUsuario($_REQUEST['userName']) == 3) {
            if (!isset($_REQUEST['nombre'])) {
                //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('DEPORTISTA_Borrar')) {
                    new Mensaje('No tienes los permisos necesarios', 'DEPORTISTA_Controller.php');
                } else {
                    //muestra el formulario de borrado
                    new DEPORTISTA_Borrar($valores, 'DEPORTISTA_Controller.php');
                }
            }else {
                $_REQUEST['password'] = '';
                $deportista = get_data_form_Deportista();
                $respuesta = $deportista->Borrar();
                new Mensaje($respuesta, 'DEPORTISTA_Controller.php');
            }
        }
        break;

    case $strings['Ver']:
        if (!isset($_REQUEST['nombre'])) {
            //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
            $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
            $valores = $usuario->RellenaDatos();
            if (!tienePermisos('DEPORTISTA_SELECT_SHOW')) {
                new Mensaje('No tienes los permisos necesarios', 'DEPORTISTA_Controller.php');
            } else {
                //muestra el formulario de borrado
                new DEPORTISTA_SELECT_SHOW($valores, 'DEPORTISTA_Controller.php');
            }
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
        if (!isset($_REQUEST['userName'])) {
            $usuario = new USUARIO_Modelo('', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
        } else {
            $usuario = get_data_form_Deportista();
        }

        $datos = $usuario->ConsultarTodo($_REQUEST['user']);

        if (!tienePermisos('DEPORTISTA_Show')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new DEPORTISTA_Show($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>
