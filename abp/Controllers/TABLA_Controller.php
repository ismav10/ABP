<?php

//Controlador para la gestión de ejercicios
include '../Models/TABLA_Model.php';
include '../Models/EJERCICIO_Model.php';
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

function get_data_form() {
    if (isset($_REQUEST['nombreTabla'])) {
        $nombreTabla = $_REQUEST['nombreTabla'];
    } else {
        $nombreTabla = "";
    }

    if (isset($_REQUEST['tablaTipo'])) {
        $tablaTipo = $_REQUEST['tablaTipo'];
    } else {
        $tablaTipo = "";
    }

    if (isset($_REQUEST['descripcionTabla'])) {
        $descripcionTabla = $_REQUEST['descripcionTabla'];
    } else {
        $descripcionTabla = "";
    }

    $tabla = new TABLA_Model($nombreTabla, $tablaTipo, $descripcionTabla);
    return $tabla;
}

if (!isset($_REQUEST['accion'])) {
    $_REQUEST['accion'] = '';
}

switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    case 'vistainsertar':
        if (!tienePermisos('TABLA_ADD')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            require_once '../Views/TABLA_ADD_Vista.php';
            $datos = "";
            new TABLA_ADD($datos, '../Views/TABLA_SHOWALL_Vista.php');
        }
        break;

    case 'ver':
        if (!tienePermisos('TABLA_SHOWCURRENT')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $tabla = get_data_form();
            $datos['tabla'] = $tabla->obtenerTablaDetalle($_REQUEST['id']);
            $datos['ejercicios'] = $tabla->obtenerRelacion_TablaEjercicios($_REQUEST['id']);

            require_once '../Views/TABLA_SHOWCURRENT_Vista.php';
            new TABLA_ShowCurrent($datos, '../Views/EJERCICIO_SHOWALL_Vista.php');
        }
        break;

    case 'frmasignar':
        //FALTA DAR PERMISOS
        //if (!tienePermisos('TABLA_ASIGN')) {
        //    new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        //} else {
        require_once '../Views/TABLA_ASIGN_Vista.php';
        $tabla = get_data_form();
        $ejercicios = new EJERCICIO_Model("", "", "");
        $ejer = $ejercicios->obtenerEjercicios();
        $datos['selectejercicios'] = "";
        foreach ($ejer as &$valor) {
            $datos['selectejercicios'] .= "<option>" . $valor['nombreEjercicio'] . "</option>";
        }

        new TABLA_ASIGN($datos, '../Views/TABLA_SHOWALL_Vista.php');
        //}
        break;

    case 'asignar':

        //Recorremos todas las filas de 4 en 4
        $asign_data = $_POST;
        $tabla = get_data_form();
        $asign_data_formated = array_chunk($asign_data, 4, false);
        foreach ($asign_data_formated as $key => $value) {
            //Una vez tenemos cada seccion del array
            //Guardamos la asignacion en la bd con sus correspondientes datos de forma que
            // Orden del Array
            // 1 - Nombre de Ejercicio
            // 2 - NumRepeticiones
            // 3 - Num. Series
            // 4 - Duracion
            $tabla->asignarEjercicios($_REQUEST['id'], $value);
        }
        echo '<script> location.replace("../Controllers/TABLA_Controller.php?accion=ver&id=' . $_REQUEST['id'] . '"); </script>';
        exit(0);
        break;

    case 'desasignar':
        $tabla = get_data_form();
        $tabla->desasignarEjercicio($_REQUEST['idtabla'], $_REQUEST['idejercicio']);
        echo '<script> location.replace("../Controllers/TABLA_Controller.php?accion=ver&id=' . $_REQUEST['idtabla'] . '"); </script>';
        exit(0);
        break;
    case 'insertar':
        if (!tienePermisos('TABLA_ADD')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $tabla = get_data_form();
            $tabla->insertarTabla();
            echo '<script> location.replace("../Controllers/TABLA_Controller.php"); </script>';
            exit(0);
        }
        break;


    case 'modificar':
        if (!tienePermisos('TABLA_EDIT')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $tabla = get_data_form();
            $datos = $tabla->obtenerTablaDetalle($_REQUEST['id']);
            require_once '../Views/TABLA_EDIT_Vista.php';
            new TABLA_Edit($datos, '../Views/EJERCICIO_SHOWALL_Vista.php');
        }
        break;

    case 'guardarmod':
        if (!tienePermisos('TABLA_EDIT')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $tabla = get_data_form();
            $datos = $tabla->modificarTabla($_REQUEST['id']);
            echo '<script> location.replace("../Controllers/TABLA_Controller.php"); </script>';
            exit(0);
        }
        break;


    case 'eliminar':
        if (!tienePermisos('TABLA_EDIT')) {
            new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        } else {
            $tabla = get_data_form();
            $tabla->eliminarTabla($_REQUEST['id']);
            echo '<script> location.replace("../Controllers/TABLA_Controller.php"); </script>';
            exit(0);
        }
        break;

    default: //Si el usuario es administrador o entrenador ve todo
        if (ConsultarTipoUsuario($_SESSION['login']) != 3) {
            $tabla = get_data_form();
            $datos['tablas'] = $tabla->obtenerTablas();

            $ejercicios = new EJERCICIO_Model("", "", "");
            $datos['ejercicios'] = $ejercicios->obtenerEjercicios();

            require_once '../Views/TABLA_SHOWALL_Vista.php';
            new TABLA_Show($datos, '../Views/EJERCICIO_SHOWALL_Vista.php');
        } else {
            //Si no, cargaría una vista exactamente igual pero solo vería sus tablas asignadas
            $tabla = get_data_form();
            $datos['tablas'] = $tabla->obtenerTablasUsuario($_SESSION['login']);

            require_once '../Views/TABLA_SHOWALL_Vista.php';
            new TABLA_Show($datos, '../Views/EJERCICIO_SHOWALL_Vista.php');
        }
}
?>