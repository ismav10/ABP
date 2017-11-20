<?php
//Controlador para la gestión de ejercicios
include '../Models/TABLA_Model.php';
include '../Models/EJERCICIO_Model.php';


if (!IsAuthenticated()) {
    header('Location:../index.php');
}
include '../Views/header.php';
include '../Locates/Strings_' . $_SESSION['IDIOMA'] . '.php';

/*
$pags = generarIncludes(); //Realizamos los includes de las páginas a las que tiene acceso
for ($z = 0; $z < count($pags); $z++) {
    include $pags[$z];
}
*/
function get_data_form()
{
	if( isset($_REQUEST['nombreTabla']) )
	{
		$nombreTabla = $_REQUEST['nombreTabla'];
	}else{
		$nombreTabla = "";
	}
	if( isset($_REQUEST['descripcionTabla']) )
	{
		$descripcionTabla =$_REQUEST['descripcionTabla'];
	}else{ $descripcionTabla = ""; }

	$tabla = new TABLA_Model($nombreTabla, $descripcionTabla);
	return $tabla;
}

if ( !isset($_REQUEST['accion']) )
{
    $_REQUEST['accion'] = '';
}

switch ($_REQUEST['accion']) { //Actúa según la acción elegida
    
	case 'ver':
			$tabla = get_data_form();
			$datos['tabla'] = $tabla->obtenerTablaDetalle(  $_REQUEST['id']);
			$datos['ejercicios'] = $tabla->obtenerRelacion_TablaEjercicios( $_REQUEST['id'] );
		
			require_once '../Views/TABLA_SHOWCURRENT_Vista.php';
            new TABLA_ShowCurrent($datos, '../Views/EJERCICIO_SHOWALL_Vista.php');
	break;
	
	case 'asignar':
		$tabla = get_data_form();
		$tabla->asignarEjercicios($_REQUEST['id'], $_POST['asignacionEjercicios']);
		header("Location: ../Controllers/TABLA_Controller.php");
	break;
	
	case 'insertar':
		$tabla = get_data_form();
		$tabla->insertarTabla();
		header("Location: ../Controllers/TABLA_Controller.php");
    break;


    case 'modificar':
		$tabla = get_data_form();
		$datos = $tabla->obtenerTablaDetalle(  $_REQUEST['id']);
		require_once '../Views/TABLA_EDIT_Vista.php';
        new TABLA_Show($datos, '../Views/EJERCICIO_SHOWALL_Vista.php');
    break;
	
	case 'guardarmod':
		$tabla = get_data_form();
		$datos = $tabla->modificarTabla(  $_REQUEST['id']);
		header("Location: ../Controllers/TABLA_Controller.php");
    break;


    case 'eliminar':
        $tabla = get_data_form();
		$tabla->eliminarTabla( $_REQUEST['id'] );
		header("Location: ../Controllers/TABLA_Controller.php");
    break;
    
    default: //Por defecto se realiza el show all
      
	    $tabla = get_data_form();
        $datos['tablas'] = $tabla->obtenerTablas();
		
		$ejercicios = new EJERCICIO_Model("","","");
		$datos['ejercicios'] = $ejercicios->obtenerEjercicios();	
        //if (!tienePermisos('EJERCICIO_Show')) {
            //new Mensaje('No tienes los permisos necesarios', '../Views/DEFAULT_Vista.php');
        //} else {
			require_once '../Views/TABLA_SHOWALL_Vista.php';
            new TABLA_Show($datos, '../Views/EJERCICIO_SHOWALL_Vista.php');
        //}
}


?>