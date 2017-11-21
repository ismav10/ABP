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

//Método que recoge la información del formulario para usuarios administradores
function get_data_form_Admin() {

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
    if (!isset($_REQUEST['newPassword']) || $_REQUEST['newPassword'] == '') {
        $newPassword = '';
    } else {
        $newPassword = $_REQUEST['newPassword'];
    }
    //Si no se ha introducido un nuevo archivo se deja el que había
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] !== '')) {
        $foto = '../Documents/Administradores/' . $_REQUEST['dni'] . '/Foto/' . $_FILES['foto']['name'];
    } else {
        $foto = '';
    }

    $usuario = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, "", "", "", $newPassword);

    return $usuario;
}

//Método que recoge la información del formulario para usuarios entrenadores
function get_data_form_Entrenador() {

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
    $cuentaBanc = $_REQUEST['cuentaBanc'];
    if (!isset($_REQUEST['newPassword']) || $_REQUEST['newPassword'] == '') {
        $newPassword = '';
    } else {
        $newPassword = $_REQUEST['newPassword'];
    }

    //Si no se ha introducido un nuevo archivo se deja el que había
    if (isset($_FILES['foto']['name']) && ($_FILES['foto']['name'] !== '')) {
        $foto = '../Documents/Entrenadores/' . $_REQUEST['dni'] . '/Foto/' . $_FILES['foto']['name'];
    } else {
        $foto = '';
    }

    $entrenador = new USUARIO_Modelo($userName, $password, $tipoUsuario, $nombre, $apellidos, $dni, $fechaNac, $direccion, $telefono, $email, $foto, $cuentaBanc, "", "", $newPassword);

    return $entrenador;
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
    if (!isset($_REQUEST['newPassword']) || $_REQUEST['newPassword'] == '') {
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




Switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    case $strings['Seleccionar']:
        if (!isset($_REQUEST['user'])) {
            new USUARIO_Select('USUARIO_Controller.php');
        } else {
            if ($_REQUEST['user'] == "admin") { //Si aún no se ha establecido el usuario
                new USUARIO_Insertar('USUARIO_Controller.php?accion=' . $strings['Seleccionar']);
            } else if ($_REQUEST['user'] == "entrenador") {
                new ENTRENADOR_Insertar('USUARIO_Controller.php?accion=' . $strings['Seleccionar'], 'USUARIO_Controller.php?user=entrenador');
            } else if ($_REQUEST['user'] == "deportista") {
                new DEPORTISTA_Insertar('USUARIO_Controller.php?accion=' . $strings['Seleccionar'], 'USUARIO_Controller.php?user=deportista');
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
            new Mensaje($respuesta, 'USUARIO_Controller.php');
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
            new Mensaje($respuesta, 'USUARIO_Controller.php');
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
            new Mensaje($respuesta, 'USUARIO_Controller.php');
        }

        break;




    case $strings['Modificar']:

        if (ConsultarTipoUsuario($_REQUEST['userName']) == 1) {
            if (!isset($_REQUEST['dni'])) {
                //Crea un usuario solo con el user para posteriormente rellenar el formulario con sus datos
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('USUARIO_Modificar')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //Muestra el formulario de modificación
                    new USUARIO_Modificar($valores, 'USUARIO_Controller.php');
                }
            } else {
                $usuario = get_data_form_Admin();

                $carpetaFoto = '../Documents/Administradores/' . $_REQUEST['dni'] . '/Foto/';
                //Se realizan las modificaciones también en las carpetas de documentos
                if ($_FILES['foto']['name'] !== '') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
                }
                $respuesta = $usuario->Modificar();
                new Mensaje($respuesta, 'USUARIO_Controller.php');
            }
        } else if (ConsultarTipoUsuario($_REQUEST['userName']) == 2) {
            if (!isset($_REQUEST['dni'])) {
                //Crea un usuario solo con el user para posteriormente rellenar el formulario con sus datos
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('ENTRENADOR_Modificar')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //Muestra el formulario de modificación
                    new Entrenador_Modificar($valores, 'USUARIO_Controller.php');
                }
            } else {
                $entrenador = get_data_form_Entrenador();

                $carpetaFoto = '../Documents/Entrenadores/' . $_REQUEST['dni'] . '/Foto/';
                //Se realizan las modificaciones también en las carpetas de documentos
                if ($_FILES['foto']['name'] !== '') {
                    if (!file_exists($carpetaFoto)) {
                        mkdir($carpetaFoto, 0777, true);
                    }
                    move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaFoto . $_FILES['foto']['name']);
                }
                $respuesta = $entrenador->Modificar();
                new Mensaje($respuesta, 'USUARIO_Controller.php');
            }
        } else if (ConsultarTipoUsuario($_REQUEST['userName']) == 3) {
            if (!isset($_REQUEST['dni'])) {
                //Crea un usuario solo con el user para posteriormente rellenar el formulario con sus datos
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('DEPORTISTA_Modificar')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //Muestra el formulario de modificación
                    new Deportista_Modificar($valores, 'USUARIO_Controller.php');
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
                new Mensaje($respuesta, 'USUARIO_Controller.php');
            }
        }
        break;


    case $strings['Borrar']:
        if (ConsultarTipoUsuario($_REQUEST['userName']) == 1) {
            if (!isset($_REQUEST['nombre'])) {
                //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('USUARIO_Borrar')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //muestra el formulario de borrado
                    new USUARIO_Borrar($valores, 'USUARIO_Controller.php');
                }
            } else {
                $_REQUEST['password'] = '';
                $usuario = get_data_form_Admin();
                $respuesta = $usuario->Borrar();
                new Mensaje($respuesta, 'USUARIO_Controller.php');
            }
        } if (ConsultarTipoUsuario($_REQUEST['userName']) == 2) {
            if (!isset($_REQUEST['nombre'])) {
                //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('ENTRENADOR_Borrar')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //muestra el formulario de borrado
                    new ENTRENADOR_Borrar($valores, 'USUARIO_Controller.php');
                }
            } else {
                $_REQUEST['password'] = '';
                $entrenador = get_data_form_Entrenador();
                $respuesta = $entrenador->Borrar();
                new Mensaje($respuesta, 'USUARIO_Controller.php');
            }
        } if (ConsultarTipoUsuario($_REQUEST['userName']) == 3) {
            if (!isset($_REQUEST['nombre'])) {
                //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('DEPORTISTA_Borrar')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //muestra el formulario de borrado
                    new DEPORTISTA_Borrar($valores, 'USUARIO_Controller.php');
                }
            } else {
                $_REQUEST['password'] = '';
                $deportista = get_data_form_Deportista();
                $respuesta = $deportista->Borrar();
                new Mensaje($respuesta, 'USUARIO_Controller.php');
            }
        }
        break;



    case $strings['Ver']:
        if (ConsultarTipoUsuario($_REQUEST['userName']) == 1) {
            if (!isset($_REQUEST['nombre'])) {
                //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('USUARIO_SELECT_SHOW')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //muestra el formulario de borrado
                    new USUARIO_SELECT_SHOW($valores, 'USUARIO_Controller.php');
                }
            } else {
                $_REQUEST['password'] = '';
                $usuario = get_data_form_Admin();
                $respuesta = $usuario->Borrar();
                new Mensaje($respuesta, 'USUARIO_Controller.php');
            }
        } if (ConsultarTipoUsuario($_REQUEST['userName']) == 2) {
            if (!isset($_REQUEST['nombre'])) {
                //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('ENTRENADOR_SELECT_SHOW')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //muestra el formulario de borrado
                    new ENTRENADOR_SELECT_SHOW($valores, 'USUARIO_Controller.php');
                }
            } else {
                $_REQUEST['password'] = '';
                $entrenador = get_data_form_Entrenador();
                $respuesta = $entrenador->Borrar();
                new Mensaje($respuesta, 'USUARIO_Controller.php');
            }
        } if (ConsultarTipoUsuario($_REQUEST['userName']) == 3) {
            if (!isset($_REQUEST['nombre'])) {
                //Crea un usuario solo con el user para rellenar posteriormente sus datos y mostrarlos en el formulario
                $usuario = new USUARIO_Modelo($_REQUEST['userName'], '', ConsultarTipoUsuario($_REQUEST['userName']), '', '', '', '', '', '', '', '', '', '', '', '');
                $valores = $usuario->RellenaDatos();
                if (!tienePermisos('DEPORTISTA_SELECT_SHOW')) {
                    new Mensaje('No tienes los permisos necesarios', 'USUARIO_Controller.php');
                } else {
                    //muestra el formulario de borrado
                    new DEPORTISTA_SELECT_SHOW($valores, 'USUARIO_Controller.php');
                }
            } else {
                $_REQUEST['password'] = '';
                $deportista = get_data_form_Deportista();
                $respuesta = $deportista->Borrar();
                new Mensaje($respuesta, 'USUARIO_Controller.php');
            }
        }
        break;


    default: //Por defecto se realiza el show all
        if (!isset($_REQUEST['userName'])) {
            $usuario = new USUARIO_Modelo('', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
        } else {
            $usuario = get_data_form();
        }
        if (!isset($_REQUEST['user'])) {
            $_REQUEST['user'] = '';
        }
        $datos = $usuario->ConsultarTodo($_REQUEST['user']);

        if (!tienePermisos('USUARIO_Show')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            new USUARIO_Show($datos, '../Views/DEFAULT_Vista.php');
        }
}
?>
